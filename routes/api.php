<?php

use App\Http\Controllers\AspirationCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationCategoryController;
use App\Http\Controllers\DestinationController;
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
Route::get('/destination', [DestinationController::class, 'index']);
Route::post('/destination', [DestinationController::class, 'store'])->middleware('auth:api');
Route::patch('/destination/{destination}', [DestinationController::class, 'update'])->middleware('auth:api');
Route::delete('/destination/{destination}', [DestinationController::class, 'destroy'])
    ->middleware(['auth:api', 'can:delete,destination']);    

//Aspiration Categories
Route::get('/aspiration-categories', [AspirationCategoryController::class, 'index']);
Route::post('/aspiration-categories', [AspirationCategoryController::class, 'store'])->middleware('auth:api');
Route::patch('/aspiration-categories/{aspirationCategory}', [AspirationCategoryController::class, 'update'])->middleware('auth:api');
Route::delete('/aspiration-categories/{aspirationCategory}', [AspirationCategoryController::class, 'destroy'])
    ->middleware(['auth:api', 'can:delete,aspirationCategory']);