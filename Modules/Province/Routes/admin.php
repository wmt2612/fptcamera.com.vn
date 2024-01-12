<?php

use Illuminate\Support\Facades\Route;

Route::get('provinces', [
    'as' => 'admin.provinces.index',
    'uses' => 'ProvinceController@index',
    'middleware' => 'can:admin.provinces.index',
]);

Route::get('provinces/create', [
    'as' => 'admin.provinces.create',
    'uses' => 'ProvinceController@create',
    'middleware' => 'can:admin.provinces.create',
]);

Route::post('provinces', [
    'as' => 'admin.provinces.store',
    'uses' => 'ProvinceController@store',
    'middleware' => 'can:admin.provinces.create',
]);

Route::get('provinces/{id}/edit', [
    'as' => 'admin.provinces.edit',
    'uses' => 'ProvinceController@edit',
    'middleware' => 'can:admin.provinces.edit',
]);

Route::put('provinces/{id}', [
    'as' => 'admin.provinces.update',
    'uses' => 'ProvinceController@update',
    'middleware' => 'can:admin.provinces.edit',
]);

Route::delete('provinces/{ids?}', [
    'as' => 'admin.provinces.destroy',
    'uses' => 'ProvinceController@destroy',
    'middleware' => 'can:admin.provinces.destroy',
]);

// append

