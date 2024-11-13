<?php

use Modules\Rating\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('ratings')->group(function() {
    Route::get('/', [RatingController::class, 'getRatingList']);
    Route::get('/overview', [RatingController::class, 'getRatingOverview']);
    Route::post('/', [RatingController::class, 'storeRating']);
    Route::post('/{ratingId}/reply', [RatingController::class, 'replyReview']);
    Route::middleware(['auth'])->group(function() {
        Route::post('/seeding', [RatingController::class, 'seedingStoreRating']);
    });
    Route::post('/{ratingId}/like', [RatingController::class, 'likeReview']);
});
