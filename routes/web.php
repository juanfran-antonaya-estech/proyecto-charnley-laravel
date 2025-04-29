<?php

use Illuminate\Support\Facades\Route;

// Rutas con autorizacion
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/', '/imagenes')->name('/');
    Route::get('/imagenes', function () {
        return view('imagenes');
    })->name('imagenes');
    Route::get('/chats', function () {
        return view('chats');
    })->name('chats');
    Route::get('/usuarios', function () {
        return view('usuarios');
    })->name('usuarios');
    Route::get('/reportar', function () {
        return view('reportar');
    })->name('reportar');
    Route::get('/bugs', function () {
        return view('bugs');
    })->name('bugs');
});

// Swagger UI route
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/swagger-ui', function () {
        echo("Swagger UI");
    });
});
