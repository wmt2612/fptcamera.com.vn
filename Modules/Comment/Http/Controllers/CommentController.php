<?php

namespace Modules\Comment\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Comment\Emails\SendNewCommentEmail;
use Modules\Comment\Emails\SendReplyCommentEmail;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Entities\LikeCommentHistory;
use Modules\Comment\Http\Requests\Client\GetCommentListRequest;
use Modules\Comment\Http\Requests\Client\ReplyCommentRequest;
use Modules\Comment\Http\Requests\Client\SeedingCommentRequest;
use Modules\Comment\Http\Requests\Client\StoreCommentRequest;
use Modules\Comment\Services\GoogleSheetComment;
use Modules\Rating\Entities\Rating;
use Spatie\SchemaOrg\ComedyClub;

class CommentController extends Controller
{
    public function getCommentList(GetCommentListRequest  $request)
    {
        $comments = Comment::with(['replies' => function($query) {
                $query->with(['user'])->active();
            }, 'user'])
            ->orderBy($request->sort_by ?? 'created_at', $request->sort_type ?? 'DESC')
            ->filterByType($request->type, $request->url, $request->post_id)
            ->where(Comment::REPLY_ID, 0)
            ->search($request->keyword)
            ->active()
            ->paginate(5);

        return response()->json($comments);
    }

    public function storeComment(StoreCommentRequest $request)
    {
        $user = Auth::user();
        $userId = 0;
        $customerName = $request->input('customer_name');
        $customerEmail = $request->input('customer_email');
        $status = Rating::PENDING;

        if ($user) {
            $userId = $user->id;
            $customerName = $user->full_name;
            $customerEmail = $user->email;
            $status = $user->isAdmin() || $user->isEditor() ? Rating::APPROVED : Rating::PENDING;
        }

        $comment = Comment::create([
            Comment::TYPE => $request->type,
            Comment::USER_ID => $userId,
            Comment::CONTENT => $request->get('content'),
            Comment::POST_ID => $request->post_id,
            Comment::URL => $request->url,
            Comment::CUSTOMER_NAME => $customerName,
            Comment::CUSTOMER_EMAIL => $customerEmail,
            Comment::CUSTOMER_PHONE => $request->customer_phone,
            Comment::CUSTOMER_GENDER => $request->customer_gender,
            Comment::STATUS => $status,

        ]);

        $mails = setting('mail_from_address');

        Mail::to($mails)
            ->queue(new SendNewCommentEmail($comment));

        return response()->json($comment, 201);
    }

    public function seedingComment(SeedingCommentRequest  $request)
    {
        $comment = Comment::create($request->all());
        $mails = setting('mail_from_address');

        Mail::to($mails)
            ->queue(new SendNewCommentEmail($comment));

        return response()->json($comment, 201);
    }

    public function likeComment($commentId, Request $request)
    {
        DB::beginTransaction();
        try{
            $comment = Comment::findOrFail($commentId);
            $checkLiked = $comment->likeHistories()->where(LikeCommentHistory::IP_ADDRESS, $request->ip())->exists();
            if($checkLiked) {
                return response()->json(false, 400);
            }
            $comment->increment(Comment::TOTAL_LIKE);
            $comment->likeHistories()->create([
                LikeCommentHistory::IP_ADDRESS => $request->ip()
            ]);
            DB::commit();
            return response()->json(true);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(false, 500);
        }
    }

    public function replyComment($commentId, ReplyCommentRequest $request)
    {
        DB::beginTransaction();
        try {
            $comment = Comment::findOrFail($commentId);
            $user = Auth::user();
            $createdAt = Carbon::now();
            $userId = 0;
            $customerName = $request->input('customer_name');
            $customerEmail = $request->input('customer_email');
            $status = Rating::PENDING;

            if ($user) {
                $userId = $user->id;
                $customerName = $user->full_name;
                $customerEmail = $user->email;
                $status = $user->isAdmin() || $user->isEditor() ? Rating::APPROVED : Rating::PENDING;
            }

            $reply = $comment->replies()->create([
                Comment::TYPE => $request->type,
                Comment::USER_ID => $userId,
                Comment::CONTENT => $request->get('content'),
                Comment::POST_ID => $request->post_id,
                Comment::URL => $request->url,
                Comment::CUSTOMER_NAME => $customerName,
                Comment::CUSTOMER_GENDER => $request->input('customer_gender'),
                Comment::STATUS => $status,
                Comment::CUSTOMER_EMAIL => $customerEmail,
                Comment::CUSTOMER_PHONE => $request->input('customer_phone'),
                Comment::CREATED_AT => $createdAt,
                Comment::REPLY_TO => $request->reply_to
            ]);

            if($reply->replyTo && $reply->replyTo->customer_email) {
                Mail::to($reply->replyTo->customer_email)
                    ->queue(new SendReplyCommentEmail($comment, $reply));
            }

            DB::commit();

            return response()->json($comment);
        }catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(false, 500);
        }
    }

    public function seedingReplyComment($commentId, ReplyCommentRequest $request)
    {
        DB::beginTransaction();
        try {
            $comment = Comment::findOrFail($commentId);
            $reply = $comment->replies()->create($request->all());
            $user = Auth::user();
            $reply->update([
                Comment::USER_ID => Auth::id(),
                Comment::STATUS => $user->isAdmin() || $user->isEditor() ? Comment::APPROVED : Comment::PENDING,
            ]);
            DB::commit();
            if($reply->replyTo->customer_email) {
                Mail::to($reply->replyTo->customer_email)
                    ->queue(new SendReplyCommentEmail($reply));
            }
            return response()->json($comment);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(false, 500);
        }
    }
}
