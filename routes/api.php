<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\FirebaseAuthMiddleware;
use App\Http\Controllers\Api\User\IndexController;
use App\Http\Controllers\Api\User\RegisterController;
use App\Http\Controllers\Api\User\LoginController;
use App\Http\Controllers\Api\User\UpdateController;
use App\Http\Controllers\Api\Item\ItemCategoryController;
use App\Http\Controllers\Api\Store\StoreListController;

Route::middleware(FirebaseAuthMiddleware::class)->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/{id}', [IndexController::class, 'index']);
        Route::post('/register', [RegisterController::class, 'store']);
        Route::get('/login', [LoginController::class, 'index']);
        Route::post('/update', [UpdateController::class, 'store']);
    });

    Route::prefix('items')->group(function () {
        Route::get('/categories', [ItemCategoryController::class, 'index']);
    });

    Route::prefix('stores')->group(function () {
        Route::get('/list', [StoreListController::class, 'index']);
    });
});
