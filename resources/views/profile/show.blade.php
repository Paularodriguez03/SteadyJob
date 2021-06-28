
@extends('adminlte::page')

@section('title', 'perfil')

@section('content_header')
{{-- <header class="relative flex items-center justify-between flex-shrink-0 dark:bg-gray-700">
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
</headr> --}}
@endsection

@section('content')



<x-app-layout >

    <div>
      <div class="mt-20 text-center bg-white">
        <h3 class="text-sm font-thin dark:text-white">Información importante</h3>
        <h1 class="text-3xl dark:text-white">Aqui puede ver los datos de tú perfil</h1>
        <h3 class="text-lg font-light dark:text-white">Puedes revisar y cerrar sesiones además de cuidar tú privacidad</h3>
    </div>
        <div class="mx-auto bg-white dark:bg-gray-700 max-w-7xl">
            
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

            @endif
            <br><br>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-10">
                    @livewire('profile.update-password-form')
                </div>

            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
            <br>
            <br>
            <br>
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="mt-10 mb-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>


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
    <script> console.log('Hi!'); </script>
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

