<div class="flex flex-col h-auto max-w-3xl gap-5 p-2 mx-auto bg-white shadow-lg select-none w-80 sm:w-full sm:p-4 sm:h-64 rounded-2xl sm:flex-row">
    <div> 
        <img src={{ asset('favicons/personas.jpg') }}  class="object-cover h-52 sm:h-full sm:w-72 rounded-xl"alt="">
    </div>
    <div class="flex flex-col gap-2 p-1 sm:flex-1">
        <x-jet-action-section>
            <x-slot name="title">
                {{ __('Borrar cuenta') }}
            </x-slot>
        
            <x-slot name="description">
                {{ __('Elimina permanentemente tu cuenta.') }}
            </x-slot>
        
            <x-slot name="content">
                <div class="max-w-xl text-sm text-gray-600">
                    {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.') }}
                </div>
        
                <div class="mt-5">
                    <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                        {{ __('Eliminar Cuenta') }}
                    </x-jet-danger-button>
                </div>
        
                <!-- Delete User Confirmation Modal -->
                <x-jet-dialog-modal wire:model="confirmingUserDeletion">
                    <x-slot name="title">
                        {{ __('Delete Account') }}
                    </x-slot>
        
                    <x-slot name="content">
                        {{ __('¿Estás seguro de que deseas eliminar tu cuenta? Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}
        
                        <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                            <x-jet-input type="password" class="block w-3/4 mt-1"
                                        placeholder="{{ __('Password') }}"
                                        x-ref="password"
                                        wire:model.defer="password"
                                        wire:keydown.enter="deleteUser" />
        
                            <x-jet-input-error for="password" class="mt-2" />
                        </div>
                    </x-slot>
        
                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>
        
                        <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                            {{ __('Eliminar cuenta') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>
            </x-slot>
        </x-jet-action-section>
    </div>
</div>

