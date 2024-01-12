<?php

use Illuminate\Support\Facades\Route;


Route::get('post','PostController@index')->name('post.index');
Route::get('post/{slug}', 'PostController@show')->name('post.show');


