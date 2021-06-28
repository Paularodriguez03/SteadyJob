@extends('adminlte::page')



@section('title', 'Dashboard')

@section('content_header')
<header class="relative flex items-center justify-between flex-shrink-0 dark:bg-gray-700">
    <form action="#" class="flex-1">
      <!--TODO: botones de vista grande  -->
    </form>
    <div class="items-center hidden ml-4 sm:flex">
      <button
        id="switchTheme"
        class="px-3 py-2 mr-4 text-lg text-gray-400 transition duration-300 ease-in-out transform bg-white rounded-full shadow-md dark:bg-gray-900 focus:outline-none hover:scale-105"
      >
        <span class="sr-only">dark mode</span>
        <i class="fas fa-moon hover:text-blue-500"></i>
      </button>
</headr>
@endsection
@section('content')
   
    @if (Auth::user()->hasRole('Developer'))
    <div class="flex flex-col flex-wrap items-center flex-1 w-full h-full px-4 py-8 overflow-y-hidden dark:bg-gray-700 sm:flex-row">
      <div class="flex-1">
          <div class="inline">
          <h1 class="px-4 text-3xl dark:text-white"> 
          Bienvenido a la mejor  <span class="px-2 text-3xl text-red-500 dark:text-blue-500 ">plataforma </span>para aplicar a propuestas laborales del mundo.</h1>
          </div>
          <div class="inline">
              <h3 class="mt-6 ml-6 text-red-400 dark:text-blue-500 "><span class="px-2 text-red-500 text-md dark:text-blue-500 ">¡ATENCION!</span> Para tener uns buena experiencia es importante que por favor completa tu perfil y si deseas puedes segir los pasos espacificados en el menú, muchas gracias.</h3>
          </div>
          <div class="flex flex-col justify-center mt-6 sm:flex-row">
              <a href="{{ url('/developerdata') }}">
                <button class="w-auto px-4 py-3 mx-2 my-2 text-red-500 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg dark:text-white dark:bg-blue-400 hover:bg-red-500 hover:text-white dark:hover:bg-blue-500 hover:scale-105"><i class="px-2 fas fa-user-edit"></i>
                  Tú perfil
                </button>
              </a>
            </div>
          </div>
          <div class="flex-1 bg-white rounded-lg shadow-lg">
            <img src={{ asset('favicons/personas.jpg') }} class="mt-5 rounded-lg" alt="">
            {{-- designed by freepik --}}
          </div>
        </div>
    @elseif (Auth::user()->hasRole('Recruiter'))
        <div class="flex flex-col flex-wrap items-center flex-1 w-full h-full px-4 py-8 overflow-y-hidden dark:bg-gray-700 sm:flex-row">
            <div class="flex-1">
                <div class="inline">
                <h1 class="px-4 text-3xl dark:text-white"> 
                Bienvenido a la mejor  <span class="px-2 text-3xl text-red-500 dark:text-blue-500 ">plataforma </span>para ofertar vacantes laborales del mundo.</h1>
                </div>
                <div class="inline">
                    <h3 class="mt-6 ml-6 text-red-400 dark:text-blue-500 "><span class="px-2 text-red-500 text-md dark:text-blue-500 ">¡ATENCION!</span> Para tener uns buena experiencia es importante que por favor completa tu perfil y si deseas puedes segir los pasos espacificados en el menú, muchas gracias.</h3>
                </div>
                <div class="flex flex-col justify-center mt-6 sm:flex-row">
                    <a href="{{ url('/companydata') }}">
                      <button class="w-auto px-4 py-3 mx-2 my-2 text-red-500 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg dark:text-white dark:bg-blue-400 hover:bg-red-500 hover:text-white dark:hover:bg-blue-500 hover:scale-105"><i class="px-2 fas fa-building"></i>
                        Perfil de la empresa
                      </button>
                    </a>
                  </div>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-lg">
                  <img src={{ asset('favicons/personas.jpg') }} class="mt-5 rounded-lg" alt="">
                  {{-- designed by freepik --}}
                </div>
              </div>
    @elseif (Auth::user()->hasRole('Admin'))
            <h1>¡Hola Querido admin!</h1>
    @endif<a class="text-pink-500 underline" href="https://undraw.co/">
@stop



        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
            <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
            <link
                rel="stylesheet"
                href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
                crossorigin="anonymous"
            />
            <link rel="stylesheet" href={{ URL::asset('css/app.css') }}>
        @stop

        @section('js')
            <script>
                console.log('Hi!');

            </script>
            <script>
                // On page load or when changing themes, best to add inline in `head` to avoid FOUC
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                  document.documentElement.classList.add('dark')
                } else {
                  document.documentElement.classList.remove('dark')
                }
                // Whenever the user explicitly chooses light mode
                localStorage.theme = 'light'
                // Whenever the user explicitly chooses dark mode
                localStorage.theme = 'dark'
                // Whenever the user explicitly chooses to respect the OS preference
                localStorage.removeItem('theme');
            </script>
            <script>
                document.getElementById('switchTheme').addEventListener('click', function() {
                   let htmlclases = document.querySelector('html').classList;
                   let iconDarkMode =document.querySelector('#switchTheme');
                   console.log(iconDarkMode);
         
                   if(localStorage.theme == 'dark') {
                     htmlclases.remove('dark');
                     localStorage.removeItem('theme');
         
         
                     iconDarkMode.innerHTML =``;
                     iconDarkMode.innerHTML = `
                       <span class="sr-only">dark mode</span>
                       <i class="fas fa-moon hover:text-blue-500"></i>`;
                    
                   }else{
                     htmlclases.add('dark');
                     localStorage.theme = 'dark';
                     
                     iconDarkMode.innerHTML =``;
                     iconDarkMode.innerHTML = `
                       <span class="sr-only">dark mode</span>                                        
                       <i class="fas fa-sun hover:text-yellow-500"></i>`;
                     console.log('día ', iconDarkMode)
                     console.log('noche');
                   };
                 });
               </script>
        @stop
