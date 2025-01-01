<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Middleware\FirebaseAuthMiddleware;
use App\Http\Controllers\Api\User\IndexController;
use App\Http\Controllers\Api\User\RegisterController;
use App\Http\Controllers\Api\User\LoginController;
use App\Http\Controllers\Api\User\UpdateController;

Route::middleware(FirebaseAuthMiddleware::class)->group(function () {
    // Route::get('/items', [ItemController::class, 'index']);
    // Route::get('/items/{id}', [ItemController::class, 'show']);

    Route::prefix('users')->group(function () {
        Route::get('/{id}', [IndexController::class, 'index']);
        Route::post('/register', [RegisterController::class, 'store']);
        Route::get('/login', [LoginController::class, 'index']);
        Route::post('/update', [UpdateController::class, 'store']);
    });
});
