<x-guest-layout>
        <h1 class="mb-2 text-4xl font-extrabold leading-none tracking-tight text-center"><img class="inline w-20 h-20" src="{{ asset("icono.png") }}"> Bienvenido a {{ env("APP_NAME", "Hay que ponerle nombre crack") }}</h1>
            <div role="alert" class="alert alert-warning cols-4 w-xl m-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <span>
                    Este área es para el staff, los usuarios deben descargarse la aplicación movil
                </span>
            </div>
        @session('status')
            <div class="mb-4 font-medium text-sm text-success-600">
                {{ $value }}
            </div>
        @endsession
        @if (env('APP_ENV') == 'local')
            <livewire:hinty />

        @endif
        <div class="my-4 flex flex-row items-center justify-center">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <input id="email" type="email" name="email" :value="old('email')" required class="input validator" placeholder="Email" />
            </div>

            <div class="mt-2">
                <input id="password" type="password" name="password" required class="input validator" placeholder="Contraseña"/>
            </div>

            <div class="mt-4">
                <input type="checkbox"
                id="remember_me"
                name="remember"
                checked="checked"
                class="toggle" />
                Recuérdame
            </div>

            <div class="flex items-center justify-end mt-4 gap-2">
                @if (Route::has('password.request'))
                    <a class="link" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>
    </div>
</x-guest-layout>
