@extends('layouts.templatebase')


@section('content')


<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" class="dark:text-white" value="{{ __('Nombre de usuario') }}" />
                <x-jet-input id="name" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" type="text" name="name" placeholder="Nombre" autofocus required  />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" class="dark:text-white" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="dark:text-white" value="{{ __('Constraseña') }}" />
                <x-jet-input id="password" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" type="password" name="password" placeholder="Contraseña" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" class="dark:text-white" value="{{ __('Confirma la contraseña') }}" />
                <x-jet-input id="password_confirmation" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-non" type="password" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role_id" class="dark:text-white" value="{{ __('Registrate como:') }}" />
                <select name="role_id" x-model="role_id" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-non">
                    <option value="Recruiter">Empresa</option>
                    <option value="Developer">Freelancer</option>
                </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('Acepto las: condiciones_de_servicio y: política_de_privacidad', [
                                        'términos de servicio' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900 dark:text-white dark:hover:text-blue-300" href="{{ route('login') }}">
                    {{ __('¿Ya estas registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Regístrate') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>


@endsection