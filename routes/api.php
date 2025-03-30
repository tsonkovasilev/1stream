<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StreamApiController;
use App\Http\Middleware\ApiKeyAuth;

Route::middleware(ApiKeyAuth::class)->group(function () {
    Route::apiResource('streams', StreamApiController::class);
});
