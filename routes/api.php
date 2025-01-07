<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars2', [CarController::class, 'osszesAutoMarkajaCategoriakkalAllapottal']);
Route::get('/foglaltAutok', [CarController::class, 'osszesFoglaltAuto']);
Route::get('/szabadAutok', [CarController::class, 'osszesSzabadAuto']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
