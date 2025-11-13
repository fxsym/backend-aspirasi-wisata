<?php

use App\Http\Controllers\AspirationCategoryController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationCategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\JwtCookieMiddleware;
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
    Route::post('/logout', [AuthController::class, 'logout'])->middleware(JwtCookieMiddleware::class);
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware(JwtCookieMiddleware::class);
    Route::get('/me', [AuthController::class, 'me'])->middleware(JwtCookieMiddleware::class);
});

//Destination Categories
Route::get('/destination-categories', [DestinationCategoryController::class, 'index']);
Route::post('/destination-categories', [DestinationCategoryController::class, 'store'])->middleware(JwtCookieMiddleware::class);
Route::patch('/destination-categories/{destinationCategory}', [DestinationCategoryController::class, 'update'])->middleware(JwtCookieMiddleware::class);
Route::delete('/destination-categories/{destinationCategory}', [DestinationCategoryController::class, 'destroy'])
    ->middleware([JwtCookieMiddleware::class, 'can:delete,destinationCategory']);

//Destinations
Route::get('/destinations', [DestinationController::class, 'index']);
Route::get('/destinations/{slug}', [DestinationController::class, 'show']);
Route::post('/destinations', [DestinationController::class, 'store'])->middleware(JwtCookieMiddleware::class);
Route::patch('/destinations/{destination}', [DestinationController::class, 'update'])->middleware(JwtCookieMiddleware::class);
Route::delete('/destinations/{destination}', [DestinationController::class, 'destroy'])
    ->middleware([JwtCookieMiddleware::class, 'can:delete,destination']);    

//Aspiration Categories
Route::get('/aspiration-categories', [AspirationCategoryController::class, 'index']);

//Aspiration
Route::get('/aspirations', [AspirationController::class, 'index'])->middleware(JwtCookieMiddleware::class);
Route::post('/aspirations', [AspirationController::class, 'store']);
Route::patch('/aspirations/{aspiration}', [AspirationController::class, 'update'])->middleware(JwtCookieMiddleware::class); //Ga kepake
Route::delete('/aspirations/{aspiration}', [AspirationController::class, 'destroy'])
    ->middleware([JwtCookieMiddleware::class, 'can:delete,aspiration']);

//User
Route::get('/users', [UserController::class, 'index'])->middleware(JwtCookieMiddleware::class);
Route::patch('/users/{user}', [UserController::class, 'update'])->middleware(JwtCookieMiddleware::class);