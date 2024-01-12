<?php

use Illuminate\Support\Facades\Route;



Route::get('category-services/tree', [
    'as' => 'admin.category_services.tree',
    'uses' => 'CategoryServiceTreeController@index',
]);

Route::put('category-services/tree', [
    'as' => 'admin.category_services.tree.update',
    'uses' => 'CategoryServiceTreeController@update',
]);


Route::get('category-services', [
    'as' => 'admin.category_services.index',
    'uses' => 'CategoryServiceController@index',
    'middleware' => 'can:admin.category_services.index',
]);

Route::get('category-services/create', [
    'as' => 'admin.category_services.create',
    'uses' => 'CategoryServiceController@create',
    'middleware' => 'can:admin.category_services.create',
]);

Route::post('category-services', [
    'as' => 'admin.category_services.store',
    'uses' => 'CategoryServiceController@store',
    'middleware' => 'can:admin.category_services.create',
]);

Route::get('category-services/{id}', [
    'as' => 'admin.category_services.show',
    'uses' => 'CategoryServiceController@show',
]);


Route::get('category-services/{id}/edit', [
    'as' => 'admin.category_services.edit',
    'uses' => 'CategoryServiceController@edit',
    'middleware' => 'can:admin.category_services.edit',
]);

Route::put('category-services/{id}', [
    'as' => 'admin.category_services.update',
    'uses' => 'CategoryServiceController@update',
    // 'middleware' => 'can:admin.category_services.edit',
]);

Route::delete('category-services/{ids?}', [
    'as' => 'admin.category_services.destroy',
    'uses' => 'CategoryServiceController@destroy',
    'middleware' => 'can:admin.category_services.destroy',
]);

Route::get('category-services', [
    'as' => 'admin.category_services.index',
    'uses' => 'CategoryServiceController@index',
    'middleware' => 'can:admin.category_services.index',
]);

Route::get('category-services/create', [
    'as' => 'admin.category_services.create',
    'uses' => 'CategoryServiceController@create',
    'middleware' => 'can:admin.category_services.create',
]);

Route::post('category-services', [
    'as' => 'admin.category_services.store',
    'uses' => 'CategoryServiceController@store',
    'middleware' => 'can:admin.category_services.create',
]);

Route::get('category-services/{id}/edit', [
    'as' => 'admin.category_services.edit',
    'uses' => 'CategoryServiceController@edit',
    'middleware' => 'can:admin.category_services.edit',
]);

Route::put('category-services/{id}', [
    'as' => 'admin.category_services.update',
    'uses' => 'CategoryServiceController@update',
    'middleware' => 'can:admin.category_services.edit',
]);

Route::delete('category-services/{ids?}', [
    'as' => 'admin.category_services.destroy',
    'uses' => 'CategoryServiceController@destroy',
    'middleware' => 'can:admin.category_services.destroy',
]);
// append



