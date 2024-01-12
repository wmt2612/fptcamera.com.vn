<?php

use Illuminate\Support\Facades\Route;

Route::get('groups/tree', [
    'as' => 'admin.groups.tree',
    'uses' => 'GroupTreeController@index',
]);

Route::put('groups/tree', [
    'as' => 'admin.groups.tree.update',
    'uses' => 'GroupTreeController@update',
]);

Route::get('groups', [
    'as' => 'admin.groups.index',
    'uses' => 'GroupController@index',
]);

Route::post('groups', [
    'as' => 'admin.groups.store',
    'uses' => 'GroupController@store',
]);

Route::get('groups/{id}', [
    'as' => 'admin.groups.show',
    'uses' => 'GroupController@show',
]);

Route::put('groups/{id}', [
    'as' => 'admin.groups.update',
    'uses' => 'GroupController@update',
]);

Route::delete('groups/{id}', [
    'as' => 'admin.groups.destroy',
    'uses' => 'GroupController@destroy',
]);
