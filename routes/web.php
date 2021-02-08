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
Route::get('/book_create', [App\Http\Controllers\BookController::class, 'create']);
//Route::get('/post', ShowPosts::class);

//Route::resource('book', BookController::class);