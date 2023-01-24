<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AvailableCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CredentialsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentApprovalController;
use App\Http\Controllers\MovilCredentialsController;
use App\Http\Controllers\TransferCredentialsController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\EnrollmentConfirmationController;
use App\Http\Controllers\EnrollmentPDFController;
use App\Http\Controllers\PaymentPDFController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\PendingPaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPaymentController;
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

Route::middleware('guest')->group(function () {
    Route::redirect('/', 'login');

    // Auth routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'create')
            ->name('login')
            ->middleware('prevent-back');
        
        Route::post('auth', 'store')
            ->name('auth');

        Route::get('logout', 'destroy')
            ->name('logout')
            ->withoutMiddleware('guest');
    });

    // Password recovery

    Route::group([
        'controller' => PasswordController::class,
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
        'as' => 'register.',
    ], function () {
        Route::get('signup', 'create')
            ->name('create');

        Route::post('register', 'store')
            ->name('store');
    });
});

Route::middleware('auth')->group(function () {
    // Areas routes
    Route::resource('areas', AreaController::class)
        ->except('create');

    // Courses routes
    Route::resource('courses', CourseController::class);

    // Users routes
    Route::resource('users', UserController::class);

    // Payments routes
    Route::get('pending-payments', [PendingPaymentController::class, 'index'])
        ->name('pending-payments.index');

    Route::patch('payments/{payment}/status', [PaymentStatusController::class, 'update'])
        ->name('payments.status.update');

    Route::resource('payments', PaymentController::class)
        ->except('create', 'store', 'show');

    // Clubs routes
    Route::resource('clubs', ClubController::class);

    // Available Courses routes
    Route::get('available-courses', [AvailableCourseController::class, 'index'])
        ->name('available-courses.index');

    // Enrollment routes
    Route::group([
        'controller' => EnrollmentController::class,
        'as' => 'enrollments.',
    ], function () {
        Route::get('enrollments', 'index')
            ->name('index');

        Route::middleware('enroll')->group(function () {
            Route::get('enrollments/create', 'create')
                ->name('create');
        
            Route::post('enrollments', 'store')
                ->name('store');
        });
        // TODO -> ruta de success por crudizar
        Route::get('enrollments/{enrollment}/success', 'success')
            ->name('success');
    }); 

    Route::patch('enrollments/{enrollment}/approval', 
    [EnrollmentApprovalController::class, 'update'])
        ->name('enrollments.approval.update');
    
    Route::patch('enrollments/{enrollment}/confirmation', 
    [EnrollmentConfirmationController::class, 'update'])
        ->name('enrollments.confirmation.update');

    // Credentials routes
    Route::get('credentials', [CredentialsController::class, 'index'])
        ->name('credentials.index');

    Route::controller(MovilCredentialsController::class)->group(function () {
        Route::post('movil-credentials', 'store')
            ->name('movil.store');
        
        Route::put('movil-credentials', 'update')
            ->name('movil.update');
    });

    Route::controller(TransferCredentialsController::class)->group(function () {
        Route::post('transfer-credentials', 'store')
            ->name('transfer.store');
        
        Route::put('transfer-credentials', 'update')
            ->name('transfer.update');
    });

    // Users Payments routes
    Route::get('users/{user}/payments', [UserPaymentController::class, 'index'])
        ->name('users.payments.index');

    // Home routes
    Route::get('home', HomeController::class)
        ->middleware('prevent-back')
        ->name('home');

    // PDF routes
    Route::group([
        'controller' => EnrollmentPDFController::class,
        'as' => 'enrollments-pdf.'
    ], function () {
        Route::get('enrollments-pdf', 'index')
            ->name('index');
    
        Route::get('enrollments-pdf/{enrollment}', 'show')
            ->name('show');
    });

    Route::get('payments-pdf', [PaymentPDFController::class, 'index'])
        ->name('payments-pdf.index');
});


