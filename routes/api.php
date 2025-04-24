<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\V0_5\AuthController;
use Laravel\Jetstream\Http\Middleware\AuthenticateSession;
use App\Http\Middleware\Authenticate;

//Rutas sin autorizacion

Route::prefix('/V0_5')->group(function () {
    Route::middleware([Authenticate::class])->group(function () {
        Route::prefix('/auth')->group(function () {
            Route::post('/login', [AuthController::class, 'login']);

            Route::middleware(['auth:sanctum'])->group(function () {
                Route::get('/unlog', [AuthController::class, 'unlog']);
                Route::post('/changePassword', [AuthController::class, 'changePassword']);
                Route::get('/getUserToken', [AuthController::class, 'getUserToken']);
            });
        });

        Route::prefix('/user')->group(function() {

        });

        Route::prefix('/familiar')->group(function() {

        });
    });
});
