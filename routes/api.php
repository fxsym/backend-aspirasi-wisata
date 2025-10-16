<?php

use App\Http\Controllers\AspirationCategoryController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationCategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (Request $request) {
    return response()->json([
        'status' => 'success',
        'message' => 'API Test Berhasil!'
    ]);
})->middleware('auth:api');

//JWT Auth
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');
});

//Destination Categories
Route::get('/destination-categories', [DestinationCategoryController::class, 'index']);
Route::post('/destination-categories', [DestinationCategoryController::class, 'store'])->middleware('auth:api');
Route::patch('/destination-categories/{destinationCategory}', [DestinationCategoryController::class, 'update'])->middleware('auth:api');
Route::delete('/destination-categories/{destinationCategory}', [DestinationCategoryController::class, 'destroy'])
    ->middleware(['auth:api', 'can:delete,destinationCategory']);

//Destinations
Route::get('/destinations', [DestinationController::class, 'index']);
Route::post('/destinations', [DestinationController::class, 'store'])->middleware('auth:api');
Route::patch('/destinations/{destination}', [DestinationController::class, 'update'])->middleware('auth:api');
Route::delete('/destinations/{destination}', [DestinationController::class, 'destroy'])
    ->middleware(['auth:api', 'can:delete,destination']);    

//Aspiration Categories
Route::get('/aspiration-categories', [AspirationCategoryController::class, 'index']);

//Aspiration
Route::get('/aspirations', [AspirationController::class, 'index']);
Route::post('/aspirations', [AspirationController::class, 'store']);
Route::patch('/aspirations/{aspiration}', [AspirationController::class, 'update'])->middleware('auth:api'); //Ga kepake
Route::delete('/aspirations/{aspiration}', [AspirationController::class, 'destroy'])
    ->middleware(['auth:api', 'can:delete,aspiration']);

//User
Route::get('/users', [UserController::class, 'index'])->middleware('auth:api');
Route::patch('/users/{user}', [UserController::class, 'update'])->middleware('auth:api');