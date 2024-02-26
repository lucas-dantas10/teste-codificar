<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\Post\PostController;
use App\Http\Controllers\Api\V1\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/create/user', [UserController::class, 'store'])->name('user.store');

    Route::middleware('auth:sanctum')->group(function() {
        Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::apiResource('/posts', PostController::class);
        Route::get('/current-user', [UserController::class, 'getCurrentUser'])->name('user.current');
    });
});
