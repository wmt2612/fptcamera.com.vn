<?php

namespace Modules\Rating\Http\Controllers;

use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Entities\File;
use Modules\Rating\Entities\LikeRatingHistory;
use Modules\Rating\Entities\Rating;
use Modules\Rating\Http\Requests\Client\GetRatingListRequest;
use Modules\Rating\Http\Requests\Client\GetRatingOverviewRequest;
use Modules\Rating\Http\Requests\Client\LikeReviewRequest;
use Modules\Rating\Http\Requests\Client\ReplyReviewRequest;
use Modules\Rating\Http\Requests\Client\SeedingReplyReviewRequest;
use Modules\Rating\Http\Requests\Client\SeedingStoreRatingRequest;
use Modules\Rating\Http\Requests\Client\StoreRatingRequest;

class RatingController extends Controller
{
    public function getRatingList(GetRatingListRequest  $request)
    {
        $ratings = Rating::orderBy($request->sort_by ?? 'created_at', $request->sort_type ?? 'DESC')
            ->with(['replies' => function($query) {
                $query->with(['user'])->active();
            }, 'user'])
            ->when($request->filter_by, function($query) use($request){
                $query->where($request->filter_by, $request->filter_value);
            })
            ->filterByType($request->type, $request->url, $request->post_id)
            ->where(Rating::REPLY_ID, 0)
            ->active()
            ->paginate(5);
        return response()->json($ratings, 200);
    }

    public function storeRating(StoreRatingRequest  $request)
    {
        $user = Auth::user();
        $userId = 0;
        $customerName = $request->input('customer_name');
        $customerEmail = $request->input('customer_email');
        $uploadFiles = $request->upload_files ?? [];

        if ($user) {
            $userId = $user->id;
            $customerName = $user->full_name;
            $customerEmail = $user->email;
        }

        $rating = Rating::create([
            Rating::REVIEW => $request->review,
            Rating::TYPE => $request->type,
            Rating::POST_ID => $request->post_id,
            Rating::URL => $request->get('url'),
            Rating::RATING => $request->rating,
            Rating::USER_ID => $userId,
            Rating::CUSTOMER_NAME => $customerName,
            Rating::CUSTOMER_GENDER => $request->customer_gender,
            Rating::CUSTOMER_PHONE => $request->customer_phone,
            Rating::CUSTOMER_EMAIL => $customerEmail,
        ]);

        foreach ($uploadFiles as $file) {
            $path = Storage::putFile('media', $file);

            $storedFile = File::create([
                'user_id' => auth()->check() ? auth()->id() : 0,
                'disk' => config('filesystems.default'),
                'filename' => $file->getClientOriginalName(),
                'path' => $path,
                'extension' => $file->guessClientExtension() ?? '',
                'mime' => $file->getClientMimeType(),
                'size' => $file->getSize(),
            ]);

            DB::table('entity_files')->insert([
                'file_id' => $storedFile->id,
                'entity_id' => $rating->id,
                'entity_type' => get_class($rating),
                'zone' => 'review_photo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return response()->json($rating, 201);
    }

    public function seedingStoreRating(SeedingStoreRatingRequest $request)
    {
        $rating = Rating::create($request->all());
        return response()->json($rating, 201);
    }

    public function getRatingOverview(GetRatingOverviewRequest $request)
    {
        $total = Rating::where(Rating::REPLY_ID, 0)
            ->active()
            ->filterByType($request->type, $request->url, $request->post_id)
            ->count();
        $avgRating = Rating::where(Rating::REPLY_ID, 0)
            ->active()
            ->filterByType($request->type, $request->url, $request->post_id)
            ->avg(Rating::RATING);
        $avgRating = number_format($avgRating, 1) + 0;
        $details = Rating::select(
            DB::raw('COUNT(rating) as count'),
            Rating::RATING
        )->groupBy(Rating::RATING)
            ->where(Rating::REPLY_ID, 0)
            ->active()
            ->filterByType($request->type, $request->url, $request->post_id)
            ->orderByDesc(Rating::RATING)
            ->get()->toArray();
        foreach ($details as $key => $item) {
            $details[$key]['percent'] = $item['count'] / $total * 100;
        }
        return response()->json([
            'total_rating' => $total,
            'avg_rating' => $avgRating,
            'details' => $details
        ]);

    }

    public function likeReview(LikeReviewRequest  $request, $ratingId)
    {
        DB::beginTransaction();
        try{
            $rating = Rating::findOrFail($ratingId);
            $checkLiked = $rating->likeHistories()->where(LikeRatingHistory::IP_ADDRESS, $request->ip())->exists();
            if($checkLiked) {
                return response()->json(false, 400);
            }
            $rating->increment(Rating::TOTAL_LIKE);
            $rating->likeHistories()->create([
                LikeRatingHistory::IP_ADDRESS => $request->ip()
            ]);
            DB::commit();
            return response()->json(true);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(false, 500);
        }
    }

    public function replyReview(ReplyReviewRequest $request, $ratingId)
    {
        DB::beginTransaction();
        try {
            $rating = Rating::findOrFail($ratingId);
            $user = Auth::user();

            $userId = 0;
            $customerName = $request->input('customer_name');
            $customerEmail = $request->input('customer_email');
            $customerGender = $request->input('customer_gender');
            $status = Rating::PENDING;

            if ($user) {
                $userId = $user->id;
                $customerName = $user->full_name;
                $customerEmail = $user->email;
                $status = $user->isAdmin() || $user->isEditor() ? Rating::APPROVED : Rating::PENDING;
            }

            $reply = $rating->replies()->create([
                Rating::REVIEW => $request->review,
                Rating::TYPE => $request->type,
                Rating::USER_ID => $userId,
                Rating::CUSTOMER_NAME => $customerName,
                Rating::CUSTOMER_EMAIL => $customerEmail,
                Rating::CUSTOMER_PHONE => $request->customer_phone,
                Rating::CUSTOMER_GENDER => $customerGender,
                Rating::STATUS => $status,
            ]);
            DB::commit();
            return response()->json($rating, 201);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(false, 500);
        }

    }

    public function seedingReplyReview(SeedingReplyReviewRequest $request, $ratingId)
    {
        DB::beginTransaction();
        try {
            $rating = Rating::findOrFail($ratingId);
            $reply = $rating->replies()->create($request->all());
            if(Auth::check()) {
                $reply->update([
                    Rating::STATUS => Rating::APPROVED,
                    Rating::USER_ID => Auth::id(),
                ]);
            }
            DB::commit();
            return response()->json($rating, 201);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(false, 500);
        }

    }
}
