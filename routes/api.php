<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('books', [App\Http\Controllers\Api\BooksController::class, 'index'])->name('index');
Route::get('books/{book}', [App\Http\Controllers\Api\BooksController::class, 'show'])->name("show");

Route::get('reviews/{book_id}', [App\Http\Controllers\Api\ReviewsController::class, 'show'])->name('reviews_show');

Route::post('reviews_store', [App\Http\Controllers\Api\ReviewsController::class, 'reviews_store'])->name('reviews_store');
Route::delete('reviews/{review}/destroy', [App\Http\Controllers\Api\ReviewsController::class, 'destroy']);