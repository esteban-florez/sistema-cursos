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
use App\Http\Controllers\InscriptionApprovalController;
use App\Http\Controllers\MovilCredentialsController;
use App\Http\Controllers\TransferCredentialsController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\InscriptionConfirmationController;
use App\Http\Controllers\PendingPaymentController;
use App\Http\Controllers\StudentPaymentController;
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

Route::redirect('/', 'login')
    ->middleware('guest');


// Auth routes

Route::group([
    'controller' => AuthController::class
], function () {
    Route::group([
        'middleware' => 'guest'
    ], function () {
        Route::get('login', 'login')
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
    ->middleware('guest')
    ->name('register.create');

Route::post('register', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('register.store');


// Instructors routes

Route::resource('instructors', InstructorController::class)
    ->middleware('auth');


// Areas routes

Route::resource('areas', AreaController::class)
    ->except('create')
    ->middleware('auth');


// Courses routes

Route::resource('courses', CourseController::class)
    ->middleware('auth');


// Students routes

Route::resource('students', StudentController::class)
    ->middleware('auth');

Route::get('students/{student}/payments', [StudentPaymentController::class, 'index'])
    ->middleware('auth')
    ->name('students.payments.index');


// Payments routes

Route::get('pending-payments', [PendingPaymentController::class, 'index'])
    ->middleware('auth')    
    ->name('pending.index');

Route::put('pending-payments/{payment}', [PendingPaymentController::class, 'update'])
    ->middleware('auth')    
    ->name('pending.update');

Route::get('payments/download', [PaymentController::class, 'download'])
    ->middleware('auth')
    ->name('payments.download');

Route::resource('payments', PaymentController::class)
    ->middleware('auth')
    ->only('index', 'edit', 'update', 'destroy');

//Club routes

Route::resource('club', ClubController::class)
    ->middleware('auth'); //por ahora así pa que se vea el show en students too


// Course market

Route::group([
    'middleware' => 'auth',
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
    'middleware' => 'auth',
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

Route::middleware('auth')->group(function () {
    Route::controller(InscriptionController::class)->group(function () {
        Route::get('inscriptions', 'index')
            ->name('inscriptions.index');
        
        Route::get('inscriptions/download', 'download')
            ->name('inscriptions.download');
    });
    
    Route::put('inscriptions/{inscription}/approval', 
    [InscriptionApprovalController::class, 'update'])
        ->name('inscriptions.approval');
    
    Route::put('inscriptions/{inscription}/confirmation', 
    [InscriptionConfirmationController::class, 'update'])
        ->name('inscriptions.confirmation');
});



// Credentials routes

Route::middleware('auth')->group(function () {
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


// Student Payment routes

Route::get('students/{student}/payments', [StudentPaymentController::class, 'index'])
    ->middleware('auth')
    ->name('students-payments.index');


// Misc

Route::get('home', [HomeController::class, 'index'])->name('home')
    ->middleware('auth', 'prevent-back');
