<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Mail\RecoveryPassword;
use Illuminate\Support\Facades\Mail;
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
// Route::get('/email', function () {
//     Mail::to('eflorez077@gmail.com')->send(new RecoveryPassword());
// });

// Auth routes

Route::redirect('/', 'login');

Route::view('login', 'login')
    ->name('login');

Route::post('auth', [AuthController::class, 'authenticate'])
    ->name('auth');

Route::get('logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::view('forgot-password', 'forgot-password')
    ->middleware('guest')
    ->name('password.forgot');

Route::post('forgot-password', [AuthController::class, 'sendLink'])
    ->middleware('guest')
    ->name('password.email');

Route::get('reset-password/{token}', function ($token) {
    return view('password-reset', ['token' => $token]);
})->middleware('guest')->name('password.edit');

Route::post('reset-password', [AuthController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.reset');

// User routes

Route::get('signup', [UserController::class, 'create'])
    ->name('users.create');

Route::post('users', [UserController::class, 'store'])
    ->name('users.store');

Route::view('home', 'home')->name('home')
    ->middleware('auth');

Route::view('test', 'test');

Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'areas',
    'as' => 'areas.',
], function () {
    Route::get('/', [AreaController::class, 'index'])->name('index');
});

Route::view('pagos', 'pagos')->name('pagos')
    ->middleware('auth', 'admin');
