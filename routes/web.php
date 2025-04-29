<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Rutas con autorizacion
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Swagger UI route
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/swagger-ui', function () {
        echo("Swagger UI");
    });
});
