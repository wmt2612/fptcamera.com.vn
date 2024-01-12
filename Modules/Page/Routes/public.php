<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('provinces', 'PageController@getProvinces')->name('pages.provinces');
