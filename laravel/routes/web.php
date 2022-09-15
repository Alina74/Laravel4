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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('welcome');

Route::get('/login',[\App\Http\Controllers\UserController::class, 'logIn'])->name('login');
Route::post('/login',[\App\Http\Controllers\UserController::class, 'loginPost']);

Route::get('/register',[\App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/register',[\App\Http\Controllers\UserController::class, 'registerPost']);

Route::middleware('auth')->group(function (){
    Route::get('/static-manager',[\App\Http\Controllers\MainController::class, 'staticManager'])->name('staticManager');

    Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
});
