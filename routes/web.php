<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AvailableCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CredentialsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionApprovalController;
use App\Http\Controllers\MovilCredentialsController;
use App\Http\Controllers\TransferCredentialsController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\InscriptionConfirmationController;
use App\Http\Controllers\PaymentStatusController;
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
        Route::get('login', 'create')
            ->name('login')
            ->middleware('prevent-back');
        
        Route::post('auth', 'store')
            ->name('auth');
    });
    
    Route::get('logout', 'destroy')
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

Route::group([
    'controller' => RegisterController::class,
    'middleware' => 'guest',
    'as' => 'register.',
], function () {
    Route::get('signup', 'create')
        ->name('create');
    
    Route::post('register', 'store')
        ->name('store');
});

Route::middleware('auth')->group(function () {
    // Instructors routes
    Route::resource('instructors', InstructorController::class);

    // Areas routes
    Route::resource('areas', AreaController::class)
        ->except('create');

    // Courses routes
    Route::resource('courses', CourseController::class);

    // Students routes
    Route::resource('students', StudentController::class);

    // Payments routes
    Route::get('pending-payments', [PendingPaymentController::class, 'index'])
        ->name('pending-payments.index');

    Route::patch('payments/{payment}/status', [PaymentStatusController::class, 'update'])
        ->name('payments.status.update');

    Route::get('payments/download', [PaymentController::class, 'download'])
        ->name('payments.download');

    Route::resource('payments', PaymentController::class)
        ->except('create', 'store', 'show');

    // Club routes
    Route::resource('club', ClubController::class);

    // Available Courses routes
    Route::get('available-courses', [AvailableCourseController::class])
        ->name('available-courses.index');

    // Enrollment routes
    Route::group([
        'controller' => EnrollmentController::class,
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

    // Credentials routes
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

    // Students-Payments routes
    Route::get('students/{student}/payments', [StudentPaymentController::class, 'index'])
        ->name('students-payments.index');

    // Home routes
    Route::get('home', HomeController::class)
        ->middleware('prevent-back')
        ->name('home');
});
