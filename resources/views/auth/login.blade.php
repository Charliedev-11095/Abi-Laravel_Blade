<x-guest-layout>
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tiltdata-tilt style="will-change: transform; transform: perspective(200px) rotateX(0deg) rotateY(0deg);">
                <img src="{{ asset('images/8.png') }}" alt="IMG">
                        </div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <div class="input-group wrap-input100 validate-input">
                <x-jet-input id="email" class="block mt-1 w-full input101" type="email" name="email" :value="old('email')" required autofocus required placeholder=" Ingresa tu Correo" />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full input101" type="password" name="password" required autocomplete="current-password" placeholder=" Ingresa tu Contraseña"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste la contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
        </div>
    </div>
</x-guest-layout>
