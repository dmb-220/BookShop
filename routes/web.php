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

Route::resource('/', App\Http\Controllers\BookController::class);

Route::group(['middleware' => 'CheckRole:admin'], function () {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
    
    Route::resource('/genre', App\Http\Controllers\GenreController::class);

});