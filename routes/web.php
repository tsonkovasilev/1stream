<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StreamController;

Route::get('/', function () {
    return redirect(auth()->user() ? '/dashboard' : '/login');
});

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// The dashboard
Route::get('/dashboard', [StreamController::class, 'index'])->name('dashboard');

// When is logged
Route::middleware('auth')->group(function () {
    Route::resource('streams', StreamController::class)->except(['index'])->middleware('auth');
});
