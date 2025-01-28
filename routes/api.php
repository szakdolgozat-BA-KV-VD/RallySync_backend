<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->get('/competitor', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->get('/admin', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::patch('/users/{id}/update-password', [UserController::class, 'updatePassword']);

Route::get("/cars", [CarController::class, 'index']);
Route::get("/osszesAuto", [CarController::class, "osszesAutoMarkajaCategoriakkalAllapottal"]);
route::get("/car/{id}", [CarController::class, "show"]);
route::get("/compets-cars/{id}", [CarController::class, "CompetCars"]);
route::get("/szabadAutok", [CarController::class, "osszesSzabadAuto"]);
route::get("/places", [PlaceController::class, "index"]);
route::get("/place/{id}", [PlaceController::class, "show"]);
route::get("/categories", [CategoryController::class, "index"]);

Route::post('/register',[RegisteredUserController::class, 'store']);
Route::post('/login',[AuthenticatedSessionController::class, 'store']);
Route::post('/carUpload', [CarController::class, 'store']);
Route::post('/placeUpload', [PlaceController::class, 'store']);
Route::post('/categoryUpload', [CategoryController::class, 'store']);

Route::patch('/carUpdate/{id}', [CarController::class, 'update']);

Route::delete('/placeDel/{id}', [PlaceController::class, 'destroy']);
Route::delete('/carDel/{id}', [CarController::class, 'destroy']);
Route::delete('/categoryDel/{id}', [CategoryController::class, 'destroy']);