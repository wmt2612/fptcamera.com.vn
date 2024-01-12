<?php

use Illuminate\Support\Facades\Route;

Route::get('reviews', [
    'as' => 'admin.reviews.index',
    'uses' => 'ReviewController@index',
    'middleware' => 'can:admin.reviews.index',
]);

Route::get('reviews/{id}/edit', [
    'as' => 'admin.reviews.edit',
    'uses' => 'ReviewController@edit',
    'middleware' => 'can:admin.reviews.edit',
]);

Route::put('reviews/{id}', [
    'as' => 'admin.reviews.update',
    'uses' => 'ReviewController@update',
    'middleware' => 'can:admin.reviews.edit',
]);

Route::delete('reviews/{ids?}', [
    'as' => 'admin.reviews.destroy',
    'uses' => 'ReviewController@destroy',
    'middleware' => 'can:admin.reviews.destroy',
]);


//Review question
Route::get('review-questions', [
    'as' => 'admin.review_questions.index',
    'uses' => 'ReviewQuestionController@index',
    'middleware' => 'can:admin.reviews.edit',
]);

Route::get('review-questions/create', [
    'as' => 'admin.review_questions.create',
    'uses' => 'ReviewQuestionController@create',
    'middleware' => 'can:admin.reviews.edit',
]);

Route::post('review-questions', [
    'as' => 'admin.review_questions.store',
    'uses' => 'ReviewQuestionController@store',
    'middleware' => 'can:admin.reviews.edit',
]);

Route::get('review-questions/{id}/edit', [
    'as' => 'admin.review_questions.edit',
    'uses' => 'ReviewQuestionController@edit',
    'middleware' => 'can:admin.reviews.edit',
]);

Route::put('review-questions/{id}/edit', [
    'as' => 'admin.review_questions.update',
    'uses' => 'ReviewQuestionController@update',
    'middleware' => 'can:admin.reviews.edit',
]);

Route::delete('review-questions/{ids?}', [
    'as' => 'admin.review_questions.destroy',
    'uses' => 'ReviewQuestionController@destroy',
    'middleware' => 'can:admin.reviews.edit',
]);

