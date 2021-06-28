<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mt-10 mb-4 text-sm text-gray- dark:text-white">
            {{ __('Esta es un área segura de la aplicación. Confirme su contraseña antes de continuar.') }}
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" class="mt-20" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" class="dark:text-white" value="{{ __('Confirmar contraseña') }}" />
                <x-jet-input id="password" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none"  placeholder="Confirmar contraseña" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Confirm') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
