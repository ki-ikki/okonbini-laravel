<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Middleware\FirebaseAuthMiddleware;

Route::middleware(FirebaseAuthMiddleware::class)->group(function () {
    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/items/{id}', [ItemController::class, 'show']);
});
