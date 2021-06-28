<x-jet-form-section submit="updatePassword">
    
    <x-slot name="title">
        <h2 class="mb-2 text-xl font-semibold">{{ __('Actualiza contraseña') }}</h2>
    </x-slot>

    <x-slot name="description">
        <p class="mt-2 text-gray-800">{{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}</p>
    </x-slot>

    <x-slot name="form">
        <!-- Start of component -->
        <div class="w-2/3 p-5 mx-auto tracking-wide bg-white rounded-md shadow-lg">
            <div id="header" class="flex flex-col gap-12 sm:flex-row"> 
            <div id="body" class="flex flex-col ">
                <div class="col-span-6 mt-2 sm:col-span-4">
                    <x-jet-label for="current_password" value="{{ __('Contraseña actual') }}" />
                    <x-jet-input id="current_password" type="password" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" wire:model.defer="state.current_password" autocomplete="current-password" />
                    <x-jet-input-error for="current_password" class="mt-2" />
                </div>
        
                <div class="col-span-6 mt-2 sm:col-span-4">
                    <x-jet-label for="password" value="{{ __('Nueva contraseña') }}" />
                    <x-jet-input id="password" type="password" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" wire:model.defer="state.password" autocomplete="new-password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>
        
                <div class="col-span-6 mt-2 sm:col-span-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                    <x-jet-input id="password_confirmation" type="password" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                </div>
                  <!-- End of component -->
                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Guardar.') }}
                    </x-jet-action-message>
            
                    <x-jet-button>
                        {{ __('Guardar') }}
                    </x-jet-button>
                </x-slot>
            </div>
            <img alt="mountain" class="w-auto mx-auto rounded-md h-52" src={{ asset('favicons/personas.jpg') }} />
            </div>
          
        </div>
        
    </x-slot>

    
</x-jet-form-section>

