<?php

use Modules\Rating\Http\Controllers\Admin\RatingController;

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

Route::prefix('ratings')->middleware('can:admin.comments.index')->name('admin.ratings.')->group(function() {
    Route::get('/', [RatingController::class, 'index'])->name('index');
    Route::put('/{ratingId}/status', [RatingController::class, 'updateStatus'])->name('updateStatus');
    Route::put('/{ratingId}', [RatingController::class, 'update'])->name('update');
    Route::get('/{ratingId}/delete', [RatingController::class, 'delete'])->name('delete');
});
