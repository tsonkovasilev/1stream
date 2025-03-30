<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StreamController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [StreamController::class, 'index'])->name('dashboard');
    Route::resource('streams', StreamController::class)->except(['index'])->middleware('auth');
});

// No Auth - For Testing 
// Route::apiResource('streams', StreamApiController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('streams', StreamApiController::class);
});
    