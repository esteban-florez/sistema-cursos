<?php

use App\Models\Area;
use App\Models\Club;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Rules\ValidID;
use Illuminate\Support\Facades\Cache;

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

Route::get('areas', function () {
    return Area::all(['id', 'name']);
})->name('api.areas.index');

Route::post('areas', function (Request $request) {
    $data = $request->validate([
        'area_name' => ['required', 'string', 'min:5', 'max:50', 'unique:areas,name', 'exclude'],
        'pnf_id' => ['required', 'numeric', 'integer', new ValidID('PNF')]
    ]);

    $data['name'] = $request->input('area_name');

    $area = Area::create($data);

    return response($area, 201);
})->name('api.areas.store');

Route::get('dolar', function () {
    // IMPROVE -> 4
    $ch = curl_init("https://www.bcv.org.ve/");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($ch);
    
    if (curl_error($ch)) {
       return null; 
    }

    curl_close($ch);
    
    return response($res);
})->name('api.dolar');

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
})->name('api.schedule');