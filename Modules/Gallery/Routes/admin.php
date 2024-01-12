<?php

use Illuminate\Support\Facades\Route;

Route::get('galleries', [
    'as' => 'admin.galleries.index',
    'uses' => 'GalleryController@index',
    'middleware' => 'can:admin.galleries.index',
]);

Route::get('galleries/create', [
    'as' => 'admin.galleries.create',
    'uses' => 'GalleryController@create',
    'middleware' => 'can:admin.galleries.create',
]);

Route::post('galleries', [
    'as' => 'admin.galleries.store',
    'uses' => 'GalleryController@store',
    'middleware' => 'can:admin.galleries.create',
]);

Route::get('galleries/{id}/edit', [
    'as' => 'admin.galleries.edit',
    'uses' => 'GalleryController@edit',
    'middleware' => 'can:admin.galleries.edit',
]);

Route::put('galleries/{id}', [
    'as' => 'admin.galleries.update',
    'uses' => 'GalleryController@update',
    'middleware' => 'can:admin.galleries.edit',
]);

Route::delete('galleries/{ids?}', [
    'as' => 'admin.galleries.destroy',
    'uses' => 'GalleryController@destroy',
    'middleware' => 'can:admin.galleries.destroy',
]);

// append

