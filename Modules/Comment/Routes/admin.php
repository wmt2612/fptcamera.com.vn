<?php

use Illuminate\Support\Facades\Route;

Route::get('comments', [
    'as' => 'admin.comments.index',
    'uses' => 'CommentsController@index',
    'middleware' => 'can:admin.comments.index',
]);

Route::get('comments/create', [
    'as' => 'admin.comments.create',
    'uses' => 'CommentsController@create',
    'middleware' => 'can:admin.comments.create',
]);

Route::post('comments', [
    'as' => 'admin.comments.store',
    'uses' => 'CommentsController@store',
    'middleware' => 'can:admin.comments.create',
]);

Route::get('comments/{id}/edit', [
    'as' => 'admin.comments.edit',
    'uses' => 'CommentsController@edit',
    'middleware' => 'can:admin.comments.edit',
]);

Route::put('comments/{id}', [
    'as' => 'admin.comments.update',
    'uses' => 'CommentsController@update',
    'middleware' => 'can:admin.comments.edit',
]);

Route::delete('comments/{ids?}', [
    'as' => 'admin.comments.destroy',
    'uses' => 'CommentsController@destroy',
    'middleware' => 'can:admin.comments.destroy',
]);

// append

