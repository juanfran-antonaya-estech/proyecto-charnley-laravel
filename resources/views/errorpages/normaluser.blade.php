<x-guest-layout>

 <div class="bg-base-200 p-4 w-fit mx-auto mt-4 rounded shadow text-center">
    <h1 class="text-6xl font-extrabold leading-none tracking-tight text-center text-error">
        Rol no autorizado
    </h1>
    <h2 class="mt-2 mb-4 text-xl text-error font-bold">
        Por favor, inicia sesión en la aplicación movil de {{ env("APP_NAME", "Hay que ponerle nombre crack") }}.
    </h2>
    <a class="btn btn-primary" href="{{ route('logout') }}">Cerrar sesión</a>
 </div>

</x-guest-layout>
