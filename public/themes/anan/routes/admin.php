<?php

use Illuminate\Support\Facades\Route;

Route::get('anan', [
    'as' => 'admin.anan.settings.edit',
    'uses' => 'AnanController@edit',
]);

Route::put('anan', [
    'as' => 'admin.anan.settings.update',
    'uses' => 'AnanController@update',
]);
