<?php

use Illuminate\Support\Facades\Route;

Route::get('comments', [
    'as' => 'admin.comments.index',
    'uses' => 'CommentController@index',
    'middleware' => 'can:admin.comments.index',
]);

Route::put('comments/{commentId}/status', [
    'as' => 'admin.comments.updateStatus',
    'uses' => 'CommentController@updateStatus',
    'middleware' => 'can:admin.comments.updateStatus',
]);

Route::put('comments/{commentId}', [
    'as' => 'admin.comments.update',
    'uses' => 'CommentController@update',
    'middleware' => 'can:admin.comments.update',
]);

Route::get('comments/{commentId}/delete', [
    'as' => 'admin.comments.delete',
    'uses' => 'CommentController@delete',
    'middleware' => 'can:admin.comments.delete',
]);


// append

