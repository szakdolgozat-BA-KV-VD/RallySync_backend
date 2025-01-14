<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

    Route::get('/userget', [UserController::class, 'index']);
    Route::post('/userstore', [UserController::class, 'store']);
    Route::destroy('/userdestroy/{id}', [UserController::class, 'destroy']);
    Route::get('/usergetone/{id}', [UserController::class, 'getone']);
});
