<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\ModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/brands', [BrandController::class, 'index']);
Route::get('/models', [ModelController::class, 'index']);
Route::controller(CarController::class)->group(function () {
    Route::get('/cars', 'index');
    Route::post('/cars', 'store');
    Route::get('/cars/{id}', 'show');
    Route::put('/cars/{id}', 'update');
    Route::delete('/cars/{id}', 'destroy');
});

