@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-xl font-bold text-center text-red-600">{{ __('¡Ups! Algo salió mal.') }}</div>

        <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <p class="text-center">{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif
