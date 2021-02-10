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

Route::resource('/', App\Http\Controllers\BookShopController::class);

Route::group(['middleware' => 'CheckRole:admin'], function () {

    Route::prefix('/admin')->group(function () {
        Route::get('', [App\Http\Controllers\AdminController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\AdminController::class, 'create']);
        Route::get('{admin}', [App\Http\Controllers\AdminController::class, 'show']);
    });
    
    Route::resource('/book', App\Http\Controllers\BookController::class);
    Route::resource('/genre', App\Http\Controllers\GenreController::class);
    //Route::resource('/author', App\Http\Controllers\AuthorController::class);

});