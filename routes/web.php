<?php

use App\Http\Controllers\Web\SupportController;
use Illuminate\Support\Facades\Route;

// Rutas con autorizacion
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/', '/chats')->name('/');
    Route::get('/chats', [SupportController::class, 'chats'])->name('chats');
    Route::get('/usuarios', [SupportController::class, 'usuarios'])->name('usuarios');
    Route::get('/reportes', [SupportController::class, 'reportes'])->name('reportes');
    Route::get('/bugs', [SupportController::class, 'bugs'])->name('bugs');
});

// Swagger UI route
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/swagger-ui', function () {
        echo("Swagger UI");
    });
});
