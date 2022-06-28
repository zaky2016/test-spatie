<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/change' , [App\Http\Controllers\HomeController::class , 'change']);

Route::get('/file_test', [App\Http\Controllers\FileController::class, 'index'])->name('file_test');
Route::post('/file/upload', [App\Http\Controllers\FileController::class, 'store'])->name('file.upload');
