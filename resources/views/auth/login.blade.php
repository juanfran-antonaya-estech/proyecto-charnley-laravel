<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label class="floating-label">
                    <input id="email" type="email" name="email" :value="old('email')" required class="input validator input-md" />
                    <div class="validator-hint">Enter valid email address</div>
                    <span>{{ __('Email') }}</span>
                </label>
            </div>

            <div class="mt-4">
                <label class="floating-label">
                    <input id="password" type="password" name="password" required class="input validator input-md"/> <!-- placeholder para poder acceder con la contraseña password -->
                    {{-- <input id="password" type="password" name="password" required class="input validator input-md" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/> --}}
                    <p class="validator-hint">
                        Must be more than 8 characters, including
                        <br/>At least one number
                        <br/>At least one lowercase letter
                        <br/>At least one uppercase letter
                    </p>
                    <span>{{ __('Password') }}</span>
                </label>
            </div>

            <div class="block mt-4">
                <fieldset class="fieldset">
                    <label class="label">
                        <input type="checkbox" id="remember_me" name="remember" checked="checked" class="checkbox" />
                        {{ __('Remember me') }}
                    </label>
                </fieldset>
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
    </x-authentication-card>
</x-guest-layout>
