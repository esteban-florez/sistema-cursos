<?php

use App\Http\Requests\StoreAreaRequest;
use App\Models\Area;
use Illuminate\Support\Facades\Route;

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

Route::post('areas', function (StoreAreaRequest $request) {
    $data = $request->validated();

    Area::create($data);

    return response('', 201);
})->name('api.areas.store');