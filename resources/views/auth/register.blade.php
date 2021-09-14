<x-guest-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <a href="{{url('/')}}"> <img src="images/icons/back-icon.png"> </a>
                    <h2 class="title">Formulario de Registro </h2>
                </div>
        

        <x-jet-validation-errors class="mb-4" />
        <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-row wrap-input100 validate-input">
                <x-jet-label class="name" value="{{ __('Nombre(s)') }}" />
                <div class="input-group wrap-input100 validate-input">
                    <x-jet-input id="name" class="input100 block mt-1 w-full input100" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder=" Ingresa tu Nombre" />
                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                    </span>
            </div>
            </div>

            <div class="form-row wrap-input100 validate-input">
                <x-jet-label class="name" value="{{ __('Correo Electrónico') }}" />
                <div class="input-group wrap-input100 validate-input">
                <x-jet-input id="email" class="input100 block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder=" Ingresa tu Correo" />
                <span class=" focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                </div>
            </div>

            <div class="form-row wrap-input100 validate-input">
                <x-jet-label class="name" value="{{ __('Contraseña') }}" />
                <div class="input-group wrap-input100 validate-input">
                <x-jet-input id="password" class="input101 block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Ingresa la contraseña" />
                </div>
            </div>

            <div class="form-row wrap-input100 validate-input">
                <x-jet-label class="name" value="{{ __('Confirmar contraseña') }}" />
                <div class="input-group wrap-input100 validate-input">
                <x-jet-input id="password_confirmation" class="input101 block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ingresala nuevamente"/>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya estabas registrad@?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
        </div>
    </div>
    </div>
    </div>
</x-guest-layout>
