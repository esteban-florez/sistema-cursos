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

Route::view('test', 'test')->name('test');

Route::redirect('/', 'login')->middleware('guest');

// Auth routes

Route::group([
    'controller' => AuthController::class
], function () {
    
    Route::group([
        'middleware' => 'guest'
    ], function () {
        Route::view('login', 'login')
            ->name('login')
            ->middleware('prevent-back');
        
        Route::post('auth', 'authenticate')
            ->name('auth');
    });
    
    Route::get('logout', 'logout')
        ->name('logout')
        ->middleware('auth');
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
    
    Route::get('reset-password/{token}/{email}', 'edit')
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
    ->middleware('auth', 'prevent-back');
    
Route::resource('areas', AreaController::class)->except('create')
    ->middleware('auth:instructors');

Route::view('pagos', 'pagos')->name('pagos')
    ->middleware('auth');

Route::view('registrar-curso', 'registrar-curso')->name('registrar-curso')
    ->middleware('auth');