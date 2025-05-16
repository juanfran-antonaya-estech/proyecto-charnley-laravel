<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="container bg-base-100 grid-cols-4 mx-auto">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight">Bienvenido a {{ env("APP_NAME", "Hay que ponerle nombre crack") }}</h1>
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
