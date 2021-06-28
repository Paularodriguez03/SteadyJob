@extends('layouts.templatebase')



@section('content')
<div class="flex flex-col flex-wrap items-center flex-1 px-4 py-8 overflow-y-hidden sm:flex-row dark:bg-gray-800">
  <div class="flex-1">
    <div class="inline">
      <h1 class="px-4 text-3xl dark:text-white"> 
        En Steady Job tenemos miles de <span class="px-2 text-3xl text-red-500 dark:text-blue-500 ">freelancers</span>listos para comenzar a trabajar en tus proyectos.</h1>
    </div>
    <h3 class="pl-10 mt-6 text-red-400 dark:text-blue-500 ">Estas list@ para conocer sobre nosotros?</h3>
    <div class="flex flex-col justify-center mt-6 sm:flex-row sm:justify-end">
      <a href="{{ url('/logros') }}">
        <button class="p-4 mx-2 my-2 text-red-500 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg dark:text-white dark:bg-blue-400 hover:bg-red-500 hover:text-white dark:hover:bg-blue-500 hover:scale-105"><i class="px-2 fas fa-trophy"></i>
          ¿Que puedes lograr?
        </button>
      </a>
      <a href="{{ url('/vacantes') }}">
        <button class="p-4 mx-2 my-2 text-red-500 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg dark:hover:bg-blue-500 lue-500 dark:text-white dark:bg-blue-400 hover:bg-red-500 hover:text-white hover:scale-105"><i class="px-2 fas fa-briefcase"></i>
          Ultimos trabajos
        </button>
      </a>
    </div>
  </div>
  <div class="flex-1 bg-white rounded-lg shadow-lg">
    <img src={{ asset('favicons/personas.jpg') }} class="mt-5 rounded-lg" alt="">
    {{-- designed by freepik --}}
  </div>
</div>

        
@endsection
