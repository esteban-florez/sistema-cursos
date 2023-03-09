<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AvailableClubController;
use App\Http\Controllers\AvailableCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ClubLoanController;
use App\Http\Controllers\CredentialsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentApprovalController;
use App\Http\Controllers\MovilCredentialsController;
use App\Http\Controllers\TransferCredentialsController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\EnrollmentConfirmationController;
use App\Http\Controllers\ItemStockController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PendingPaymentController;
use App\Http\Controllers\PNFController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UnfulfilledPaymentController;
use App\Http\Controllers\UserClubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserEnrollmentController;
use App\Http\Controllers\UserMembershipController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\UserRoleController;
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
        ->except('create', 'show', 'destroy');

    // Courses routes
    Route::resource('courses', CourseController::class)
        ->except('destroy');

    Route::get('available-courses', [AvailableCourseController::class, 'index'])
        ->name('available-courses.index');

    // Users routes
    Route::resource('users', UserController::class)
        ->except('destroy');

    Route::get('users/{user}/payments', [UserPaymentController::class, 'index'])
        ->name('users.payments.index');
    
    Route::controller(UserEnrollmentController::class)->group(function () {
        Route::get('users/{user}/enrollments', 'index')
            ->name('users.enrollments.index');
        
        Route::get('users/enrollments/{enrollment}', 'show')
            ->name('users.enrollments.show');
    });

    Route::controller(UserMembershipController::class)->group(function () {
        Route::get('users/{user}/memberships', 'index')
            ->name('users.memberships.index');

        Route::get('users/memberships/{membership}', 'show')
            ->name('users.memberships.show');
    });

    Route::get('users/{user}/courses', [UserCourseController::class, 'index'])
        ->name('users.courses.index');

    Route::get('users/{user}/clubs', [UserClubController::class, 'index'])
        ->name('users.clubs.index');

    // Change password routes
    Route::group([
        'controller' => PasswordController::class,
        'as' => 'password.',
    ],
    function () {
        Route::get('change-password', 'change')
            ->name('change');

        Route::post('update-password', 'update')
            ->name('update');
    });

    // Payments routes
    Route::resource('payments', PaymentController::class)
        ->only('index', 'edit', 'update');

    Route::get('pending-payments', [PendingPaymentController::class, 'index'])
        ->name('pending-payments.index');

    Route::patch('payments/{payment}/status', [PaymentStatusController::class, 'update'])
        ->name('payments.status.update');

    Route::group([
        'controller' => UnfulfilledPaymentController::class,
        'as' => 'unfulfilled-payments.',
    ], function () {
        Route::get('unfulfilled-payments', 'index')
            ->name('index');
        
        Route::get('unfulfilled-payments/{payment}/edit', 'edit')
            ->name('edit');
    
        Route::patch('unfulfilled-payments/{payment}', 'update')
            ->name('update');
    });

    // Clubs routes
    Route::resource('clubs', ClubController::class)
        ->except('destroy');
        
    Route::get('available-clubs', [AvailableClubController::class, 'index'])
        ->name('available-clubs.index');

    Route::get('club-loans', [ClubLoanController::class, 'index'])
        ->name('club-loans.index');

    // Membership routes
    Route::resource('memberships', MembershipController::class)
        ->only('index', 'store', 'destroy');

    // Enrollment routes
    Route::resource('enrollments', EnrollmentController::class)
        ->only('index', 'create', 'store');
        
    Route::get('enrollments/{enrollment}/success', [EnrollmentController::class, 'success'])
        ->name('success');

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

    // PNFs routes
    Route::resource('pnfs', PNFController::class)
        ->except('show', 'destroy');

    // Schedule route
    Route::get('schedule', ScheduleController::class)
        ->name('schedule');

    // Items routes
    Route::resource('items', ItemController::class)
        ->except('create', 'show', 'destroy');
    
    Route::get('items-stock', [ItemStockController::class, 'index'])
        ->name('items.stock.index');
    
    Route::get('items-stock/create', [ItemStockController::class, 'create'])
        ->name('items.stock.create');
    
    // Operations routes
    Route::resource('operations', OperationController::class)
        ->only('index', 'store');

    // Loans routes
    Route::resource('loans', LoanController::class)
        ->only('index', 'store', 'update');

    // Home routes
    Route::get('home', HomeController::class)
        ->middleware('prevent-back')
        ->name('home');

    // PDF routes
    Route::group([
        'controller' => PDFController::class,
        'as' => 'pdf.',
        'prefix' => 'pdf'
    ], function () {
        Route::get('enrollments', 'enrollments')
            ->name('enrollments');

        Route::get('enrollment/{enrollment}', 'enrollment')
            ->name('enrollment');

        Route::get('payments', 'payments')
            ->name('payments');

        Route::get('certificate/{enrollment}', 'certificate')
            ->name('certificate');

        Route::get('memberships', 'memberships')
            ->name('memberships');

        Route::get('items', 'items')
            ->name('items');
    });
});
