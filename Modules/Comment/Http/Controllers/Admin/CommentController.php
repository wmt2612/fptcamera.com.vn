<?php

namespace Modules\Comment\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Http\Requests\Admin\UpdateCommentRequest;
use Modules\Comment\Http\Requests\SaveCommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user')->latest()->paginate(10);
        return view('comment::admin.comments.index', compact('comments'));
    }

    public function updateStatus($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->update([
            Comment::STATUS => $comment->status != 1 ? Comment::APPROVED : Comment::REJECTED
        ]);
        return $comment;
    }

    public function update(UpdateCommentRequest  $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->update($request->all());
        return response()->json($comment);
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id)->delete();
        return back();
    }
}
