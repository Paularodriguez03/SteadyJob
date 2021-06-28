<div class="w-5/6 p-3 mx-auto bg-blue-300 rounded-lg shadow-lg">

    <x-jet-form-section submit="updateProfileInformation">
        <x-slot name="title">
            <h1 class="text-2xl leading-tight text-white">{{ __('Informacion de perfil') }}</h1>
        </x-slot>

        <x-slot name="description">
            <h2 class="text-xs leading-tight text-white">{{ __('Actualice la información de perfil y la dirección de correo electrónico de su cuenta.') }}</h2>
        </x-slot>


        <x-slot name="form">
            {{-- imagen de perfil --}}
        <div class="w-full mx-12 md:w-1/3">
            {{-- <img class="antialiased rounded-lg shadow-lg" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png">   --}}
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label class="text-lg text-white"  for="photo" value="{{ __('Foto de perfil') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        @if (Auth::user()->profile_photo_path)
                        <img class="object-cover antialiased rounded-lg shadow-lg w-60 h-60" src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                        @else
                        <img class="object-cover antialiased rounded-lg shadow-lg w-60 h-60" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @endif    
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <span class="block rounded-lg w-60 h-60 "
                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif
        </div>
        {{-- infromación --}}
        <div class="flex flex-row flex-wrap w-full px-3 md:w-2/3">
            <div class="relative w-full pt-3 font-semibold text-right text-gray-700 md:pt-0">
            {{-- <div class="text-2xl leading-tight text-white">Admin User</div> --}}
            <!-- Name -->
            <div class="my-6 text-2xl leading-tight text-white">
                <x-jet-label class="text-lg text-white" for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-lg text-white"  for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" wire:model.defer="state.email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>
            
            </div>
        </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Guardar') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>

{{-- perfil tradicional --}}

{{-- <x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <h1>{{ __('Informacion de perfil') }}</h1>
    </x-slot>

    <x-slot name="description">
        <h2>{{ __('Actualice la información de perfil y la dirección de correo electrónico de su cuenta.') }}</h2>
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    @if (Auth::user()->profile_photo_path)
                    <img class="object-cover w-8 h-8 " src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                    @else
                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    @endif    
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block w-20 h-20 rounded-full"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardar') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section> --}}
