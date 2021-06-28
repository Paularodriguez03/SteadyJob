{{-- desde que navegador esta concetado --}}

<div class=" md:grid md:grid-cols-2 md:gap-6" {{ $attributes }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }} </x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="">
            {{ $content }}
        </div>
    </div>
</div>
