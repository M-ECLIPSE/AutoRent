<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('cars/{cars}/show' ,[\App\Http\Controllers\CarsController::class, 'show']);
Route::get('cars/list' ,[\App\Http\Controllers\CarsController::class, 'showList']);
Route::post('cars/store',[\App\Http\Controllers\CarsController::class,'StoreCar']);

Route::get('admin/{admin}/show' ,[\App\Http\Controllers\AdminController::class, 'show']);
Route::get('admin/list' ,[\App\Http\Controllers\AdminController::class, 'showList']);
Route::post('admin/store',[\App\Http\Controllers\AdminController::class,'StoreAdmin']);

Route::middleware('auth:sanctum')->group( function () {


});

