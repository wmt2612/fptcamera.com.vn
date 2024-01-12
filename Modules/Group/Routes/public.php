<?php

use Illuminate\Support\Facades\Route;


Route::get('blog','GroupController@index')->name('blog.index');
Route::get('blog/{slug}', 'GroupController@show')->name('blog.show');