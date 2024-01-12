<?php

use Illuminate\Support\Facades\Route;

Route::get('services', [
    'as' => 'admin.services.index',
    'uses' => 'ServiceController@index',
    'middleware' => 'can:admin.services.index',
]);

Route::get('services/create', [
    'as' => 'admin.services.create',
    'uses' => 'ServiceController@create',
    'middleware' => 'can:admin.services.create',
]);

Route::post('services', [
    'as' => 'admin.services.store',
    'uses' => 'ServiceController@store',
    'middleware' => 'can:admin.services.create',
]);

Route::get('services/{id}/edit', [
    'as' => 'admin.services.edit',
    'uses' => 'ServiceController@edit',
    'middleware' => 'can:admin.services.edit',
]);

Route::put('services/{id}', [
    'as' => 'admin.services.update',
    'uses' => 'ServiceController@update',
    'middleware' => 'can:admin.services.edit',
]);

Route::delete('services/{ids?}', [
    'as' => 'admin.services.destroy',
    'uses' => 'ServiceController@destroy',
    'middleware' => 'can:admin.services.destroy',
]);

// append

Route::get('price-list', [
    'as' => 'admin.price_list.index',
    'uses' => 'PriceListController@index',
    'middleware' => 'can:admin.services.index',
]);

Route::get('get-province-area', [
    'as' => 'admin.price_list.getProvinceArea',
    'uses' => 'PriceListController@getProvinceArea'
]);

Route::get('search', [
    'as' => 'admin.price_list.search',
    'uses' => 'PriceListController@search'
]);

Route::post('update-price', [
    'as' => 'admin.price_list.update',
    'uses' => 'PriceListController@update'
]);

