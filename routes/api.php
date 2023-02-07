<?php

use App\Models\Area;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Rules\ValidID;

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
        'area_name' => ['required', 'max:50', 'unique:areas,name', 'exclude'],
        'pnf_id' => ['required', new ValidID('PNF')]
    ]);

    $data['name'] = $request->input('area_name');

    $area = Area::create($data);

    return response($area, 201);
})->name('api.areas.store');