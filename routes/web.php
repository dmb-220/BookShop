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

Route::get('/', [App\Http\Controllers\BookController::class, 'index']);

Route::get('genre/{genre}', [App\Http\Controllers\GenreController::class, 'index'])->name("genres_view");

Route::resource('books', App\Http\Controllers\BookController::class);

//USER
Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::resource('user', App\Http\Controllers\User\UserController::class);
    Route::resource('books', App\Http\Controllers\User\BookController::class);

    Route::resource('reviews', App\Http\Controllers\User\ReviewController::class);
    Route::resource('reports', App\Http\Controllers\User\ReportController::class);

});

//ADMIN
Route::group(['middleware' => 'CheckRole:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('admin', App\Http\Controllers\Admin\AdminController::class);
    //Route::get('', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin_index');
    //Route::get('create', [App\Http\Controllers\Admin\AdminController::class, 'create']);
    //Route::get('{admin}', [App\Http\Controllers\Admin\AdminController::class, 'show']);

    Route::resource('books', App\Http\Controllers\Admin\BookController::class);
    Route::resource('genres', App\Http\Controllers\Admin\GenreController::class);
    Route::resource('authors', App\Http\Controllers\Admin\AuthorController::class);
    Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class);
    Route::resource('reports', App\Http\Controllers\Admin\ReportController::class);
});