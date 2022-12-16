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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\AlbumsController::class, 'index']);
Route::get('/albums', [App\Http\Controllers\AlbumsController::class, 'index']);
Route::get('/albums/create', [App\Http\Controllers\AlbumsController::class, 'create'])->name('album.create');
Route::post('/albums/store', [App\Http\Controllers\AlbumsController::class, 'store'])->name('album.store');
Route::get('/albums/{id}', [App\Http\Controllers\AlbumsController::class, 'show'])->name('album.show');

Route::get('/photos/create/{albumId}', [App\Http\Controllers\PhotosController::class, 'create'])->name('photo.create');
Route::post('/photos/store', [App\Http\Controllers\PhotosController::class, 'store'])->name('photo.store');
Route::get('/photos/{id}',[App\Http\Controllers\PhotosController::class,'show'])->name('photo.show');
Route::delete('/photos/{id}',[App\Http\Controllers\PhotosController::class,'destroy'])->name('photo.destroy');