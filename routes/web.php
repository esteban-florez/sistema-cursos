<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CredentialsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovilCredentialsController;
use App\Http\Controllers\TransferCredentialsController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Controllers\CourseStudentsController;
use App\Http\Controllers\InscriptionConfirmationController;
use App\Http\Controllers\PendingPaymentController;
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
    ->name('register.create');

Route::post('register', [RegisterController::class, 'store'])
    ->name('register.store');


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

Route::get('students/{student}/payments', [StudentPaymentController::class, 'index'])
    ->middleware('auth:student')
    ->name('students.payments.index');


// Payments routes

Route::get('pending-payments', [PendingPaymentController::class, 'index'])
    ->middleware('auth:instructor', 'admin')    
    ->name('pending.index');

Route::put('pending-payments/{payment}', [PendingPaymentController::class, 'index'])
    ->middleware('auth:instructor', 'admin')    
    ->name('pending.update');

Route::resource('payments', PaymentController::class)
    ->middleware('auth:instructor', 'admin')
    ->only('index', 'destroy');


//Club routes

Route::resource('club', ClubController::class)
    ->middleware('auth:instructor', 'admin');


// Course market

Route::group([
    'middleware' => 'auth:student',
    'prefix' => 'market',
    'as' => 'market.'
], function () {
    Route::get('/', [MarketController::class, 'index'])
        ->name('index');

    Route::get('{course}', [MarketController::class, 'show'])
        ->name('show');
});


// Course enrollment

Route::group([
    'controller' => EnrollmentController::class,
    'middleware' => 'auth:student',
    'prefix' => 'enrollment',
    'as' => 'enrollment.',
], function () {
    Route::middleware('enroll')->group(function () {
        Route::get('{course}', 'create')
            ->name('create');
    
        Route::post('{course}', 'store')
            ->name('store');
    });
    
    Route::get('{inscription}/success', 'success')
        ->name('success');

    Route::get('{inscription}/download', 'download')
        ->name('download');
}); 


// Inscriptions routes

Route::get('courses/{course}/students', [CourseStudentsController::class, 'index'])
    ->middleware('auth:instructor')
    ->name('courses.students.index');

Route::put('inscriptions/{inscription}/confirmation', 
[InscriptionConfirmationController::class, 'update'])
    ->middleware('auth:instructor')
    ->name('inscription.confirmation');


// Credentials routes

Route::middleware('auth:instructor', 'admin')->group(function () {
    Route::get('credentials', [CredentialsController::class, 'index'])
        ->name('credentials.index');
    
    Route::post('movil-credentials', [MovilCredentialsController::class, 'store'])
        ->name('movil.store');
    
    Route::put('movil-credentials', [MovilCredentialsController::class, 'update'])
        ->name('movil.update');
    
    Route::post('transfer-credentials', [TransferCredentialsController::class, 'store'])
        ->name('transfer.store');
    
    Route::put('transfer-credentials', [TransferCredentialsController::class, 'update'])
        ->name('transfer.update');
});


// Misc

Route::get('home', ([HomeController::class, 'index']))->name('home')
    ->middleware('auth', 'prevent-back');

Route::view('pagos', 'pagos')->name('pagos')
    ->middleware('auth');

