<?php

use App\Http\Controllers\LoginController;
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

Route::view('/login', 'login')
    ->name('login');

Route::post('/auth', [LoginController::class, 'authenticate'])
    ->name('auth');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::view('/home', 'home')->name('home')
    ->middleware('auth');