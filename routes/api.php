<?php

use App\Http\Controllers\V0_5\UserController;
use Illuminate\Http\Request;

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V0_5\AuthController;
use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

//Rutas sin autorizacion

Route::prefix('/V0_5')->group(function () {
    Route::middleware([AuthenticateSession::class])->group(function () {
        Route::prefix('/auth')->group(function () {
            Route::post('/login', [AuthController::class, 'login']);

            Route::middleware(['auth:sanctum'])->group(function () {
                Route::get('/unlog', [AuthController::class, 'unlog']);
                Route::post('/changePassword', [AuthController::class, 'changePassword']);
                Route::get('/getUserToken', [AuthController::class, 'getUserToken']);
            });
        });

        Route::prefix('/user')->group(function() {
            Route::post('/uploadImage', [UserController::class, 'uploadImage']);
            Route::get('/photo', [UserController::class, 'listAllOwnPhotos']);
            Route::get('/photo/{id}', [UserController::class, 'getPhotoDetail']);
            Route::get('/chat', [UserController::class, 'getChatrooms']);
            Route::get('/chat/{id}', [UserController::class, 'getMessagesByChatroom']);
        });

        Route::prefix('/familiar')->group(function() {

        });
    });
});
