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

//GUEST
Auth::routes();

Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('index');
Route::get('genres_show/{genre_show}', [App\Http\Controllers\BookController::class, 'genres_show'])->name("genres_show");
Route::get('books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name("book_show");
Route::post('search_show', [App\Http\Controllers\BookController::class, 'search_show'])->name("search_show");
//Route::resource('books', App\Http\Controllers\BookController::class);

//USER
Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {

    Route::put('password_update/{user}', [App\Http\Controllers\User\UserController::class, 'password_update'])->name('password_update');
    Route::resource('user', App\Http\Controllers\User\UserController::class);

    Route::put('discount_update/{book}', [App\Http\Controllers\User\BookController::class, 'discount_update'])->name('discount_update');
    Route::resource('books', App\Http\Controllers\User\BookController::class);

    Route::resource('reviews', App\Http\Controllers\User\ReviewController::class);
    Route::resource('reports', App\Http\Controllers\User\ReportController::class);

});

//ADMIN
Route::group(['middleware' => 'CheckRole:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('user_control', App\Http\Controllers\Admin\UserControlController::class);

    Route::put('approved_update/{book}', [App\Http\Controllers\Admin\BookController::class, 'approved_update'])->name('approved_update');
    Route::resource('books', App\Http\Controllers\Admin\BookController::class);

    Route::resource('genres', App\Http\Controllers\Admin\GenreController::class);
    Route::resource('authors', App\Http\Controllers\Admin\AuthorController::class);
    Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class);
    Route::resource('reports', App\Http\Controllers\Admin\ReportController::class);
});