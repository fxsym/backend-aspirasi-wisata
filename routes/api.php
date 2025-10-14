<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationCategoryController;
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
