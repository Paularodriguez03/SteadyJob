@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')

 <div class="relative w-5/6 p-5 mx-auto text-gray-800 bg-white rounded shadow-xl dark:bg-gray-700 sm:p-5 md:text-left">
    <!-- candado de solo para usuarios -->
    <div class="flex flex-row ">
        <a href={{ url('/ofertas') }}>
            <button class="w-10 h-10 duration-300 ease-in-out transform bg-white rounded-lg shadow-lg dark:text-white dark:bg-gray-800 hover:scale-105 hover:text-red-400 focus:no-underline"><i class="fas fa-chevron-left"></i></button>    
        </a>  
        <p class="flex items-center ml-10 text-sm text-gray-600">
            <svg class="w-3 h-3 mr-2 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
            </svg>
            solo usuarios
        </p>
    </div>
    <!-- contenedor de imagen y descripción -->
    <div class="items-center mx-5 md:flex">
        <!-- imagen principal -->
        <div class="w-full px-5 mb-10 md:w-1/2 md:mb-0">
            <div class="relative">
                @if ($vacancy[0]->profile_photo_path !== null)
                    @php
                    $path_photo_2 = 'storage/' . $vacancy[0]->profile_photo_path;
                    @endphp
                @else
                    @php
                    $path_photo_2 = 'favicons/favicon.png';
                    @endphp
                @endif
                <img src="{{ asset($path_photo_2) }}" class="relative z-10 object-cover m-auto rounded-lg w-96 h-60"
                    alt="logo de la empresa">

            </div>
        </div>
        <!-- info vacanet -->
        <div class="w-full px-5 md:w-1/2">
            <div class="mb-10">
                <p class="text-sm dark:text-white">Vacante<br></p>
                <h1 class="mb-5 text-2xl font-bold uppercase dark:text-white">{{ $vacancy[0]->Title }}</h1>
                <p class="text-sm dark:text-white">{{ $vacancy[0]->DescriptionVacancy }}</p>
                <br>
                {{-- tnecnologias --}}
                <div class="flex flex-row flex-wrap">
                    {{-- call vacancy --}}
                    @foreach ($userTecno as $tec)
                    <div class="flex justify-around max-w-md mx-5 overflow-hidden bg-white rounded-md shadow-lg dark:bg-gray-800">
                        <div class="w-2 bg-blue-400 dark:bg-red-400"></div>
                        <div class="flex items-center px-2 py-3">
                            <div class="mx-3">
                                <h2 class="text-sm font-semibold text-gray-800 dark:text-white">{{ $tec->tecno }} </h2>
                            </div>
                        </div>
                    </div>
                        {{-- <h2>{{$tec->tecno}}</h2> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- otros datos como salirio lugar moneda -->
    <div class="items-center w-full px-5 md:flex ">
        <!-- colum1 -->
        <div class="flex-1">
            <div class="flex flex-row mt-5 md:flex-col lg:flex-row">
                <div>
                    <!-- Ubicación -->
                    <div class="flex mt-4 md:mt-0 lg:mt-4">
                        <p class="flex-0.5 mb-5 md:mb-0 lg:mb-5 font-bold uppercase text-md dark:text-white">Ubicación:</p>
                        <p class="flex-0.5 dark:text-white">{{ $vacancy[0]->Location }}</p>
                    </div>
                    <!-- info empresa -->
                   <div class="flex mt-6">
                        <p class="flex-0.5 mb-5  md:mb-0 lg:mb-5 font-bold uppercase text-md dark:text-white">Empresa:</p>
                        <p class="flex-0.5 dark:text-white"> {{ $vacancy[0]->NameCompany }}</p>
                   </div>
                </div>
                <div class="ml-4">
                    <div class="flex mx-auto mt-2">
                        <a class="flex-0.5 mb-5 uppercase text-sm" href={{ $vacancy[0]->WebsiteCompany }} target="_blank">
                            <button class="px-3 py-2 mx-auto text-green-700 duration-300 ease-in-out transform bg-green-400 rounded-full shadow-lg hover:text-white dark:text-white hover:bg-green-500 hover:scale-105">
                                <i class="mr-2 far fa-eye"></i> Sitio web
                            </button>
                        </a>
                    </div>
                    <div class="flex">
                        <div class="flex mt-4 md:mt-0 lg:mt-4">
                            <p class="flex-0.5 mb-5 md:mb-0 lg:mb-5 font-bold uppercase text-md dark:text-white">Tiempo: </p>
                            <p class="flex-0.5 dark:text-white">{{ \Carbon\Carbon::parse($vacancy[0]->created_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- colum2 -->
        <div class="flex-1 mt-5">
            <!-- salario -->
            <div class="flex">
                <p class="flex-0.5 mb-5 text-lg font-bold uppercase dark:text-white">Salario:</p>
                <div class="flex-0.5 ml-4 inline-block mr-5 align-bottom">
                    <span class="text-2xl font-medium leading-none align-baseline dark:text-white">{{ $vacancy[0]->Salary }}</span>
                    <span class="font-light leading-none align-baseline text-md dark:text-white">{{ $vacancy[0]->currency }}</span>
                </div>
            </div>
            <div class="mt-2 ">
                <form action="{{route('applications.store')}}" method="POST">
                    @csrf
                    <input id="vacancy_id" name="vacancy_id" type="hidden" value={{ $vacancy[0]->id }}>
                    <button 
                        type=submit
                        class="px-10 py-3 mx-20 font-semibold text-blue-600 duration-300 ease-in-out transform bg-blue-400 rounded-full shadow-lg hover:text-white hover:bg-blue-500 focus:outline-none dark:text-white dark:bg-green-500 dark:hover:bg-green-600 hover:scale-105"><i
                            class="mr-2 -ml-2 mdi mdi-cart "></i><i class="ml-2 fas fa-check"></i> Aplicar</button></a>
                </form>
            </div>
        </div>

    </div>
</div>




@stop

@section('css')
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
