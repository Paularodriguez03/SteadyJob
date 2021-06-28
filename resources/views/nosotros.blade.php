@extends('layouts.templatebase')


@section('content')
<div class="flex flex-col flex-wrap items-center flex-1 px-4 py-8 overflow-y-hidden sm:flex-row">
    <div class="flex-1">
        <div class="inline">
            <h1 class="px-4 text-3xl dark:text-white"> 
            En <span class="px-2 text-3xl text-red-500 dark:text-blue-500"> Steady Job </span>estamos para ti 24/7 con el proposito de ayudar a te a <span class="px-2 text-3xl text-red-500 dark:text-blue-500">crecer.</span></h1>
            <h3 class="pl-10 my-4 text-red- dark:text-blue-500 "> Es ideal para empresas y freelancers!</h3>
            <p class="pl-10 my-6 dark:text-white"> Somos la mejor plataforma para ofertar y aplicar a propuestas laborales del mundo</p>
        </div>
        <div class="flex justify-center mx-3 my-6 sm:justify-end">
            <a href="{{ url('register') }}">
                <button class="p-4 mx-2 text-red-500 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg dark:text-white dark:bg-blue-400 hover:bg-red-500 hover:text-white dark:hover:bg-blue-500 hover:scale-105"><i class="mr-4 fas fa-pen-alt"></i>
                  Regístrate
                </button>
            </a>
            
        </div>
    </div>
    <div class="flex-1">
      <img src={{ asset('favicons/nosotros.jpg') }}
      class="m-auto rounded-t-lg" alt="logros">
      {{-- designed by freepik --}}
    </div>
</div>

@endsection
