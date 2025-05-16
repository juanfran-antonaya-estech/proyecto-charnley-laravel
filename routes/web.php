<?php

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
    Route::get('/logout', [AuthController::class, 'unlog'])->name('logout');
    Route::get('/chats', function() {
        echo("conchetumadre");
    })->name('chats');
    Route::get('/usuarios', [SupportController::class, 'usuarios'])->name('usuarios');
    Route::get('/reportes', [SupportController::class, 'reportes'])->name('reportes');
    Route::get('/bugs', [SupportController::class, 'bugs'])->name('bugs');
    Route::redirect('/', '/chats')->name('/');
});

Route::get('/unwantedrole', [AuthController::class, 'unwantedrole'])->name('unwantedrole');

// Swagger UI route
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/swagger-ui', function () {
        echo("Swagger UI");
    });
});
