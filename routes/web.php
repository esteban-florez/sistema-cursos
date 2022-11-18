<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
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

Route::get('test', function () {
    return view('test');
})->name('test');

Route::post('test', function () {
    dd([
        request()->input('filters|is_admin', ''),
        request()->input('filters|gender', )
    ]);
});

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


// Signup routes

Route::get('signup', [RegisterController::class, 'create'])
    ->name('students.create');

Route::post('register', [RegisterController::class, 'store'])
    ->name('students.store');


// Instructors routes

Route::resource('instructors', InstructorController::class)
    ->middleware('auth:instructor', 'admin');


// Areas routes

Route::resource('areas', AreaController::class)
    ->except('create')
    ->middleware('auth:instructor');


// Courses routes

Route::resource('courses', CourseController::class)
    ->middleware('auth:instructor', 'admin');


// Students routes

Route::resource('students', StudentController::class)
    ->middleware('auth:instructor', 'admin');


// Misc

Route::view('home', 'home')->name('home')
    ->middleware('auth', 'prevent-back');

Route::view('pagos', 'pagos')->name('pagos')
    ->middleware('auth');
