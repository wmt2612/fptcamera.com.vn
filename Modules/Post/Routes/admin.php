<?php

use Illuminate\Support\Facades\Route;

Route::get('posts', [
    'as' => 'admin.posts.index',
    'uses' => 'PostController@index',
]);


Route::get('posts/create', [
    'as' => 'admin.posts.create',
    'uses' => 'PostController@create',
]);

Route::post('posts', [
    'as' => 'admin.posts.store',
    'uses' => 'PostController@store',
]);

Route::get('posts/{id}/edit', [
    'as' => 'admin.posts.edit',
    'uses' => 'PostController@edit',
]);

Route::put('posts/{id}', [
    'as' => 'admin.posts.update',
    'uses' => 'PostController@update',
]);

Route::delete('posts/{ids?}', [
    'as' => 'admin.posts.destroy',
    'uses' => 'PostController@destroy',
]);

Route::get('updateDate', [
    'as' => 'admin.posts.updateDate',
    'uses' => 'PostController@updateDate',
]);

// append

Route::get('/preview', 'PostController@postPreview')->name('pages.post.preview');
Route::post('/redirectPreview', 'PostController@redirectPreview')->name('pages.post.redirectPreview');
