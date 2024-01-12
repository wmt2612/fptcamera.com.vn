<?php

use Illuminate\Support\Facades\Route;

Route::get('flash-sale', 'FlashSaleController@index')->name('flash.index');