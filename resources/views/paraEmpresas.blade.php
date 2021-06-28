@extends('layouts.templatebase')



@section('content')

<div class="flex flex-col flex-wrap items-center flex-1 px-4 py-8 overflow-y-hidden sm:flex-row">
    <div class="flex-1">
        <div class="inline">
            <h1 class="px-4 text-3xl dark:text-white"> 
            Potencia tu <span class="px-2 text-3xl text-red-500 dark:text-blue-400">negocio</span>con freelancers a través de un solo proveedor.</h1>
        </div>
        <h3 class="pl-10 mt-6 text-red-400 dark:text-blue-300">Entérate cómo tu empresa puede hacer más.</h3>
        <h3 class="mt-6 ml-5 text-black ">Acelera tu crecimiento con freelancers y muévete a la velocidad que te exige el mercado.</h3>
      <div class="flex justify-center mt-6 mr-5 sm:justify-end">
        <a href="{{ url('register') }}">
            <button class="p-4 text-red-500 bg-white rounded-full shadow-lg dark:bg-blue-400 dark:hover:bg-blue-500 dark:text-white justufy-end hover:bg-red-500 hover:text-white"><i class="fas fa-pen-alt"></i>
              Regístrate
            </button>
        </a>
        
      </div>
    </div>
    <div class="flex-1">
      <img src={{ asset('favicons/empresas.jpg') }}
      class="mt-8 rounded-lg" alt="">
      {{-- designed by freepik --}}
    </div>
  </div>
        
@endsection