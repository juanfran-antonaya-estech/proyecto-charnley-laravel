<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

// Rutas con autorizacion
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/', '/chats')->name('/');
    Route::get('/chats', [Controller::class, 'chats'])->name('chats');
    Route::get('/usuarios', [Controller::class, 'usuarios'])->name('usuarios');
    Route::get('/reportes', [Controller::class, 'reportes'])->name('reportes');
    Route::get('/bugs', [Controller::class, 'bugs'])->name('bugs');
});

// Swagger UI route
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/swagger-ui', function () {
        echo("Swagger UI");
    });
});
