<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
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
Route::view('test', 'test');

Route::redirect('/', 'login');

// Auth routes

Route::group([
    'controller' => AuthController::class
], function () {
    Route::view('login', 'login')
        ->name('login');
    
    Route::post('auth', 'authenticate')
        ->name('auth');
    
        Route::get('logout', 'logout')
        ->name('logout');
});


// Password recovery

Route::group([
    'controller' => PasswordController::class,
    'middleware' => 'guest',
    'as' => 'password.',
],
function () {
    Route::get('forgot-password', 'forgot')
        ->name('forgot');
    
    Route::post('forgot-password', 'mail')
        ->name('email');
    
    Route::get('reset-password/{token}', 'edit')
        ->name('edit');
    
    Route::post('reset-password', 'reset')
        ->name('reset');
});


// User routes

Route::get('signup', [UserController::class, 'create'])
    ->name('users.create');

Route::post('users', [UserController::class, 'store'])
    ->name('users.store');

Route::view('home', 'home')->name('home')
    ->middleware('auth');
    
Route::resource('areas', AreaController::class)->except('create')
    ->middleware(['auth', 'admin']);

Route::view('pagos', 'pagos')->name('pagos')
    ->middleware('auth', 'admin');

Route::view('registrar-curso', 'registrar-curso')->name('registrar-curso')
    ->middleware('auth', 'admin');