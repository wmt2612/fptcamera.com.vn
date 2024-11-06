<?php

use Illuminate\Support\Facades\Route;

Route::get('auto-links', [
    'as' => 'admin.auto_links.index',
    'uses' => 'AutoLinkController@index',
    'middleware' => 'can:admin.auto_links.index',
]);

Route::get('auto-links/create', [
    'as' => 'admin.auto_links.create',
    'uses' => 'AutoLinkController@create',
    'middleware' => 'can:admin.auto_links.create',
]);

Route::post('auto-links', [
    'as' => 'admin.auto_links.store',
    'uses' => 'AutoLinkController@store',
    'middleware' => 'can:admin.auto_links.create',
]);

Route::get('auto-links/{id}/edit', [
    'as' => 'admin.auto_links.edit',
    'uses' => 'AutoLinkController@edit',
    'middleware' => 'can:admin.auto_links.edit',
]);

Route::put('auto-links/{id}', [
    'as' => 'admin.auto_links.update',
    'uses' => 'AutoLinkController@update',
    'middleware' => 'can:admin.auto_links.edit',
]);

Route::delete('auto-links/{ids?}', [
    'as' => 'admin.auto_links.destroy',
    'uses' => 'AutoLinkController@destroy',
    'middleware' => 'can:admin.auto_links.destroy',
]);

// append

