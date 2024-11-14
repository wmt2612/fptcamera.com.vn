<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\Http\Controllers\CommentController;

Route::prefix('comments')->name('comments.')
    ->group(function() {
        Route::get('/', [CommentController::class, 'getCommentList'])->name('index');
        Route::post('/', [CommentController::class, 'storeComment'])->name('store');
        Route::post('/{commentId}/reply', [CommentController::class, 'replyComment'])->name('replyComment');
        Route::middleware(['auth'])->group(function($query) {
            Route::post('/seeding', [CommentController::class, 'seedingComment'])->name('seedingComment');
        });
        Route::post('/{commentId}/like', [CommentController::class, 'likeComment'])->name('likeComment');
    });

//Route::get('/comments/mail', function () {
//    $comment = \Modules\Comment\Entities\Comment::find(1);
//    return new \Modules\Comment\Emails\SendCommentNoticeMail($comment);
//});

