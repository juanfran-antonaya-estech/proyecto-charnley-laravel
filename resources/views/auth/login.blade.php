<x-guest-layout>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
        <div class="my-4 flex flex-row items-center justify-center bg-primary">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label class="floating-label">
                    <input id="email" type="email" name="email" :value="old('email')" required class="input validator input-md" placeholder="Email" />
                    <div class="validator-hint">Introduce un correo válido</div>
                </label>
            </div>

            <div class="mt-4">
                <label class="floating-label">
                    <input id="password" type="password" name="password" required class="input validator input-md" placeholder="Contraseña"/>
                    <p class="validator-hint">
                        Deben ser al menos 8 caracteres
                        <br/>Al menos un número
                        <br/>Al menos una minúscula
                        <br/>Al menos una mayúscula
                    </p>
                </label>
            </div>

            <div class="block mt-4">
                <input type="checkbox"
                id="remember_me"
                name="remember"
                checked="checked"
                class="toggle" />
                Recuérdame
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg xl:btn-xl">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>
</x-guest-layout>
