<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\BookController::class, 'index']);
Route::resource('book', App\Http\Controllers\BookController::class);

Route::group(['middleware' => 'CheckRole:admin'], function () {

    Route::prefix('admin')->group(function () {
        Route::get('', [App\Http\Controllers\Admin\AdminController::class, 'index']);
        Route::get('create', [App\Http\Controllers\Admin\AdminController::class, 'create']);
        Route::get('{admin}', [App\Http\Controllers\Admin\AdminController::class, 'show']);

    //Route::resource('book', App\Http\Controllers\Admin\BookController::class);
    //Route::resource('genre', App\Http\Controllers\Admin\GenreController::class);
    });
    
    Route::resource('abook', App\Http\Controllers\Admin\BookController::class);
    Route::resource('genre', App\Http\Controllers\Admin\GenreController::class);
    Route::resource('review', App\Http\Controllers\ReviewController::class);
    Route::resource('report', App\Http\Controllers\ReportController::class);
    Route::resource('author', App\Http\Controllers\AuthorController::class);

});