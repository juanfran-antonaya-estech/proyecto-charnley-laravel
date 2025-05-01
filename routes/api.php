<?php

use App\Http\Controllers\V0_5\UserController;
use Illuminate\Http\Request;

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V0_5\AuthController;
use App\Http\Controllers\V0_5\BotController;
use App\Http\Controllers\V0_5\FamiliarController;
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

        Route::middleware(['auth:sanctum'])->group(function() {
            Route::prefix('/user')->group(function() {
                Route::post('/uploadImage', [UserController::class, 'uploadImage']);
                Route::get('/photo', [UserController::class, 'listAllOwnPhotos']);
                Route::get('/photo/{id}', [UserController::class, 'getPhotoDetail']);
                Route::get('/chat', [UserController::class, 'getChatrooms']);
                Route::get('/chat/{id}', [UserController::class, 'getMessagesByChatroom']);
                Route::post('/chat/{id}', [UserController::class, 'sendMessage']);
            });

            Route::prefix('/familiar')->group(function() {
                Route::get('/chat', [FamiliarController::class, 'getChatsICanView']);
                Route::get('c/hat/{id}', [FamiliarController::class, 'getChatRoomDetail']);
                Route::get('/photo', [FamiliarController::class, 'getImagesByMySon']);
                Route::get('/photo/{id}', [FamiliarController::class, 'getImageDetail']);
            });

            Route::prefix('/bot')->group(function() {
                Route::post('/uploadImage', [BotController::class, 'uploadImage']);
                Route::post('/subimage', [BotController::class, 'uploadSubImage']);
                Route::post('/modImage', [BotController::class, 'uploadNewModifiedImage']);
            });
        });
    });
});

/**
 * @swagger
 * /V0_5/auth/login:
 *   post:
 *     summary: Login a user
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               email:
 *                 type: string
 *               password:
 *                 type: string
 *     responses:
 *       200:
 *         description: Successful login
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 token:
 *                   type: string
 *                 user:
 *                   type: object
 *       401:
 *         description: Unauthorized
 */

/**
 * @swagger
 * /V0_5/auth/unlog:
 *   get:
 *     summary: Logout a user
 *     responses:
 *       200:
 *         description: Successfully logged out
 *       404:
 *         description: User not found
 */

/**
 * @swagger
 * /V0_5/auth/changePassword:
 *   post:
 *     summary: Change user password
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               current_password:
 *                 type: string
 *               new_password:
 *                 type: string
 *     responses:
 *       200:
 *         description: Password changed successfully
 *       401:
 *         description: Current password is incorrect
 */
