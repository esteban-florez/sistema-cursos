<?php

use App\Models\Area;
use App\Models\Club;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Rules\ValidID;
use Illuminate\Support\Facades\Cache;
use App\Services\ExchangeRate;
use App\Http\Controllers\ChartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::as('api.')->group(function () {
    // Areas routes
    Route::get('areas', function () {
        return Area::all(['id', 'name']);
    })->name('areas.index');

    Route::post('areas', function (Request $request) {
        $data = $request->validate([
            'area_name' => ['required', 'string', 'min:5', 'max:50', 'unique:areas,name', 'exclude'],
            'pnf_id' => ['required', 'numeric', 'integer', new ValidID('PNF')]
        ]);

        $data['name'] = $request->input('area_name');

        $area = Area::create($data);

        return response($area, 201);
    })->name('areas.store');

    // Dolar routes
    Route::get('dolar', function () {
        return ['price' => ExchangeRate::get()];
    })->name('dolar');

    // Schedule routes
    Route::get('schedule/{user}', function (User $user) {
        if ($user->role === 'Instructor') {
            $courses = Course::latest()
                ->phase('En curso')
                ->whereBelongsTo($user, 'instructor')
                ->get();
            
            $clubs = Club::latest()
                ->whereBelongsTo($user, 'instructor')
                ->get();
        } else {
            $courses = Course::latest()
                ->phase('En curso')
                ->whereHas('students', function ($query) use ($user) {
                    return $query->where('users.id', $user->id);
                })->get();
            
            $clubs = Club::latest()
                ->whereHas('members', function ($query) use ($user) {
                    return $query->where('users.id', $user->id);
                })->get();
        }

        return $courses->concat($clubs)->all();
    })->name('schedule');

    Route::group([
        'controller' => ChartController::class,
        'prefix' => 'charts',
    ], function () {
        Route::get('payments-per-type', 'paymentsPerType')
            ->name('charts.payments-per-type');

        Route::get('payments-per-status', 'paymentsPerStatus')
            ->name('charts.payments-per-status');
        
        Route::get('students-per-grade', 'studentsPerGrade')
            ->name('charts.students-per-grade');

        Route::get('payments-per-category', 'paymentsPerCategory')
            ->name('charts.payments-per-category');

        Route::get('courses-per-phase', 'coursesPerPhase')
            ->name('charts.courses-per-phase');

        Route::get('enrollments-per-status', 'enrollmentsPerStatus')
            ->name('charts.enrollments-per-status');
    });
});
