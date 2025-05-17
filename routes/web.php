<?php

use App\Http\Controllers\HospitalFloorLinesController;
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
    Route::get('/logout', [AuthController::class, 'unlog'])->withoutMiddleware(NonUser::class)->name('logout');

    //Bushismo
    Route::get('/decider', HospitalFloorLinesController::class)->name('decider');

    Route::name('support.')->prefix('/support')->group(function(){
        Route::get('/chats', [SupportController::class, 'chats'])->name('chats');
    });
    Route::name('admin.')->prefix('/admin')->group(function(){
        Route::get('/chats', function(){
            echo 'trippi troppi troppa trippa';
        })->name('chats');
    });
    Route::name('sadmin.')->prefix('/sadmin')->group(function(){
        Route::get('/chats', function(){
            echo 'trippi troppi troppa trippa';
        })->name('chats');
    });
    Route::redirect('/', '/decider')->name('/');
});

Route::get('/unwantedrole', [AuthController::class, 'unwantedrole'])->name('unwantedrole');
