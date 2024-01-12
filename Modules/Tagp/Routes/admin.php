<?php

use Illuminate\Support\Facades\Route;

Route::get('tag-ps', [
    'as' => 'admin.tag_ps.index',
    'uses' => 'TagPController@index',
    'middleware' => 'can:admin.tag_ps.index',
]);

Route::get('tag-ps/create', [
    'as' => 'admin.tag_ps.create',
    'uses' => 'TagPController@create',
    'middleware' => 'can:admin.tag_ps.create',
]);

Route::post('tag-ps', [
    'as' => 'admin.tag_ps.store',
    'uses' => 'TagPController@store',
    'middleware' => 'can:admin.tag_ps.create',
]);

Route::get('tag-ps/{id}/edit', [
    'as' => 'admin.tag_ps.edit',
    'uses' => 'TagPController@edit',
    'middleware' => 'can:admin.tag_ps.edit',
]);

Route::put('tag-ps/{id}', [
    'as' => 'admin.tag_ps.update',
    'uses' => 'TagPController@update',
    'middleware' => 'can:admin.tag_ps.edit',
]);

Route::delete('tag-ps/{ids?}', [
    'as' => 'admin.tag_ps.destroy',
    'uses' => 'TagPController@destroy',
    'middleware' => 'can:admin.tag_ps.destroy',
]);

Route::get('post-tags', [
    'as' => 'admin.post_tags.index',
    'uses' => 'PostTagController@index',
    'middleware' => 'can:admin.post_tags.index',
]);

Route::get('post-tags/create', [
    'as' => 'admin.post_tags.create',
    'uses' => 'PostTagController@create',
    'middleware' => 'can:admin.post_tags.create',
]);

Route::post('post-tags', [
    'as' => 'admin.post_tags.store',
    'uses' => 'PostTagController@store',
    'middleware' => 'can:admin.post_tags.create',
]);

Route::get('post-tags/{id}/edit', [
    'as' => 'admin.post_tags.edit',
    'uses' => 'PostTagController@edit',
    'middleware' => 'can:admin.post_tags.edit',
]);

Route::put('post-tags/{id}', [
    'as' => 'admin.post_tags.update',
    'uses' => 'PostTagController@update',
    'middleware' => 'can:admin.post_tags.edit',
]);

Route::delete('post-tags/{ids?}', [
    'as' => 'admin.post_tags.destroy',
    'uses' => 'PostTagController@destroy',
    'middleware' => 'can:admin.post_tags.destroy',
]);

// append


