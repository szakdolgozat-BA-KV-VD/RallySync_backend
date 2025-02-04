<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompcategController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Organisers;
use Illuminate\Support\Facades\Route;



// PUBLIC
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::patch('/users/{id}/update-password', [UserController::class, 'updatePassword']);

Route::get("/cars", [CarController::class, 'index']);
route::get("/car/{id}", [CarController::class, "show"]);
route::get("/compets-cars/{id}", [CarController::class, "CompetCars"]);
route::get("/szabadAutok", [CarController::class, "osszesSzabadAuto"]);
route::get("/places", [PlaceController::class, "index"]);
route::get("/place/{id}", [PlaceController::class, "show"]);
route::get("/categories", [CategoryController::class, "index"]);


Route::post('/register',[RegisteredUserController::class, 'store']);
Route::post('/login',[AuthenticatedSessionController::class, 'store']);


// USER
Route::middleware(['auth:sanctum'])->group(function () {

});

// ORGANISER
Route::middleware(['auth:sanctum', Organisers::class])->group(function () {


});

// ADMIN
Route::middleware(['auth:sanctum', Admin::class])->group(function () {
    route::get("/competitions", [CompetitionController::class, "index"]);
    route::get("/competition/{id}", [CompetitionController::class, "show"]);
    route::get("/compcategs", [CompcategController::class, "index"]);
    route::get("/compcateg/{id}", [CompcategController::class, "show"]);

    Route::post('/carUpload', [CarController::class, 'store']);
    Route::post('/placeUpload', [PlaceController::class, 'store']);
    Route::post('/categoryUpload', [CategoryController::class, 'store']);

    Route::delete('/placeDel/{id}', [PlaceController::class, 'destroy']);
    Route::delete('/carDel/{id}', [CarController::class, 'destroy']);
    Route::delete('/categoryDel/{id}', [CategoryController::class, 'destroy']);

    Route::patch('/carUpdate/{id}', [CarController::class, 'update']);
    Route::patch('/competitionUpdate/{id}', [CompetitionController::class, 'update']);
    Route::patch('/compcategUpdate/{id}', [CompcategController::class, 'update']);
});