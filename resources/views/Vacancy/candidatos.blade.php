@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    @if ($candidates->count()==0)
        <h3>Aún no hay candidatos para esta vacante</h3>
    @else
        {{-- @dd($candidates) --}}
        <div class="mt-20 text-center bg-white">
            <h3 class="text-sm font-thin dark:text-white">Importante</h3>
            <h1 class="text-3xl dark:text-white">Estos son los candidatos para el trabajo</h1>
            <h3 class="text-lg font-light dark:text-white">Si te gusta el perfil de uno puedes contactar lo por medio de su correo electronico.</h3>
        </div>
        @foreach ($candidates as $candidate )
            <div class="max-w-md mx-auto mb-4 overflow-hidden bg-white shadow-md rounded-xl md:max-w-2xl">
                <div class="w-full">
                  <div class="p-8">
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase">Nombre:</div>
                        <p class="font-light">{{ $candidate->fullName }}</p>
                    </div>
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase">Experiencia (meses):</div>
                        <p class="font-light"> {{ $candidate->experience }} meses</p>
                    </div>
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase">Perfil:</div>
                        <p class="font-light">{{ $candidate->about_me }}</p>
                    </div>
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase"> País:</div>
                        <p class="font-light">{{$candidate->country}}</p>
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex items-center justify-between p-2 space-x-2 ">
                            <a href="{{ $candidate->githubProfile }}" target="blank">
                                <button class="w-10 h-10 text-white bg-blue-400 rounded-full hover:bg-blue-500"><i class="fab fa-github"></i></button>
                            </a>
                            <a href="/{{$candidate->curriculum}}" target="blank">
                                <button class="w-10 h-10 text-white bg-green-500 rounded-full hover:bg-green-600">
                                   <i class="far fa-address-book"></i>
                                </button>
                            </a>
                        </div>
                    </div>         
                                        
                  </div>
                </div>
        </div>
    </div>
            
        @endforeach   
    @endif
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')

<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>

@stop