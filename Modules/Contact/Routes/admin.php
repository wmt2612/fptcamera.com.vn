<?php

use Illuminate\Support\Facades\Route;

Route::get('contacts', [
    'as' => 'admin.contacts.index',
    'uses' => 'ContactsController@index',
    'middleware' => 'can:admin.contacts.index',
]);

Route::get('contacts/{id}/edit', [
    'as' => 'admin.contacts.edit',
    'uses' => 'ContactsController@edit',
    'middleware' => 'can:admin.contacts.edit',
]);

Route::put('contacts/{id}', [
    'as' => 'admin.contacts.update',
    'uses' => 'ContactsController@update',
    'middleware' => 'can:admin.contacts.edit',
]);

Route::delete('contacts/{ids?}', [
    'as' => 'admin.contacts.destroy',
    'uses' => 'ContactsController@destroy',
    'middleware' => 'can:admin.contacts.destroy',
]);

// append

