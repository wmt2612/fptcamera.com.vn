<?php

use Illuminate\Support\Facades\Route;

Route::get('areas', [
    'as' => 'admin.areas.index',
    'uses' => 'AreaController@index',
    'middleware' => 'can:admin.areas.index',
]);

Route::get('areas/create', [
    'as' => 'admin.areas.create',
    'uses' => 'AreaController@create',
    'middleware' => 'can:admin.areas.create',
]);

Route::post('areas', [
    'as' => 'admin.areas.store',
    'uses' => 'AreaController@store',
    'middleware' => 'can:admin.areas.create',
]);

Route::get('areas/{id}/edit', [
    'as' => 'admin.areas.edit',
    'uses' => 'AreaController@edit',
    'middleware' => 'can:admin.areas.edit',
]);

Route::put('areas/{id}', [
    'as' => 'admin.areas.update',
    'uses' => 'AreaController@update',
    'middleware' => 'can:admin.areas.edit',
]);

Route::delete('areas/{ids?}', [
    'as' => 'admin.areas.destroy',
    'uses' => 'AreaController@destroy',
    'middleware' => 'can:admin.areas.destroy',
]);

Route::get('area-province', [
    'as' => 'admin.areas.area_province',
    'uses' => 'AreaProvinceController@show',
    'middleware' => 'can:admin.areas.index',
]);

Route::post('area-province', [
    'as' => 'admin.areas.area_province.checked',
    'uses' => 'AreaProvinceController@checked',
    'middleware' => 'can:admin.areas.index',
]);

// append

//CUONG
Route::get('price-list', [
    'as' => 'admin.price_list.index',
    'uses' => 'AreaController@index',
    'middleware' => 'can:admin.price-list.index',
]);

Route::get('price-list/create', [
    'as' => 'admin.price_list.create',
    'uses' => 'AreaController@create',
    'middleware' => 'can:admin.price-list.create',
]);

Route::post('price-list', [
    'as' => 'admin.price_list.store',
    'uses' => 'AreaController@store',
    'middleware' => 'can:admin.price-list.create',
]);

Route::get('price-list/{id}/edit', [
    'as' => 'admin.price_list.edit',
    'uses' => 'AreaController@edit',
    'middleware' => 'can:admin.price-list.edit',
]);

Route::put('price-list/{id}', [
    'as' => 'admin.price_list.update',
    'uses' => 'AreaController@update',
    'middleware' => 'can:admin.price-list.edit',
]);

Route::delete('price-list/{ids?}', [
    'as' => 'admin.price_list.destroy',
    'uses' => 'AreaController@destroy',
    'middleware' => 'can:admin.price-list.destroy',
]);