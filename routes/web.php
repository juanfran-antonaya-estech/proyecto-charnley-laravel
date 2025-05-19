<?php

use App\Http\Controllers\HospitalFloorLinesController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\SupportController;
use App\Http\Middleware\NonUser;
use Illuminate\Support\Facades\Route;

// Rutas con autorizacion
Route::middleware([
    'auth:sanctum',
    'verified',
    NonUser::class,
])->group(function () {
    Route::get('/logout', [AuthController::class, 'unlog'])->withoutMiddleware(NonUser::class)->name('web.logout');

    //Bushismo
    Route::get('/decider', HospitalFloorLinesController::class)->name('decider');

    Route::name('support.')->prefix('/support')->group(function(){
        Route::get('/chats', [SupportController::class, 'chats'])->name('chats');
    });
    Route::name('admin.')->prefix('/admin')->group(function(){
        Route::get('/chats', [AdminController::class, 'chats'])->name('chats');
        Route::get('/chat/{sala}', [AdminController::class, 'chat'])->name('chat');
        Route::get('/images', [AdminController::class, 'images'])->name('images');
        Route::get('/image/{imagen}', [AdminController::class, 'image'])->name('image');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/user/{user}', [AdminController::class, 'user'])->name('user');
    });
    Route::name('sadmin.')->prefix('/sadmin')->group(function(){
        Route::get('/chats', [AdminController::class, 'chats'])->name('chats');
        Route::get('/images', [AdminController::class, 'images'])->name('images');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/user', function(){
            echo 'trippi troppi troppa trippa';
        })->name('user.create');
    });
    Route::redirect('/', '/decider')->name('/');
});

Route::get('/unwantedrole', [AuthController::class, 'unwantedrole'])->name('unwantedrole');
