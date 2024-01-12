<?php

use Illuminate\Support\Facades\Route;

Route::get('lecturers', [
    'as' => 'admin.lecturers.index',
    'uses' => 'LecturerController@index',
    'middleware' => 'can:admin.lecturers.index',
]);

Route::get('lecturers/create', [
    'as' => 'admin.lecturers.create',
    'uses' => 'LecturerController@create',
    'middleware' => 'can:admin.lecturers.create',
]);

Route::post('lecturers', [
    'as' => 'admin.lecturers.store',
    'uses' => 'LecturerController@store',
    'middleware' => 'can:admin.lecturers.create',
]);

Route::get('lecturers/{id}/edit', [
    'as' => 'admin.lecturers.edit',
    'uses' => 'LecturerController@edit',
    'middleware' => 'can:admin.lecturers.edit',
]);

Route::put('lecturers/{id}', [
    'as' => 'admin.lecturers.update',
    'uses' => 'LecturerController@update',
    'middleware' => 'can:admin.lecturers.edit',
]);

Route::delete('lecturers/{ids?}', [
    'as' => 'admin.lecturers.destroy',
    'uses' => 'LecturerController@destroy',
    'middleware' => 'can:admin.lecturers.destroy',
]);

// append

