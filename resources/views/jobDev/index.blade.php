@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <!-- This is an example component -->


    <section class="p-8 bg-indigo-dark h-50">
        <div class="mt-20 text-center bg-white">
            <h3 class="text-sm font-thin dark:text-white">Importante</h3>
            <h1 class="text-3xl dark:text-white">Ofertas disponibles</h1>
            <h3 class="text-lg font-light dark:text-white">Si deseas puedes realizar una busqueda</h3>
          </div>
        <form class="container flex justify-center py-8 mx-auto" action="/ofert/filterBy" id="searchForm">
            <input name="searchby" id="search"
                class="w-2/3 h-12 px-3 mx-4 mb-8 rounded-full shadow-lg focus:outline-none focus:shadow-outline text-s"
                type="search" placeholder="Buscar por palabra clave">
            <button class="flex items-center justify-center w-10 h-10 px-4 py-4 mb-8 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105" type="button" onclick="SearchVerifed()"><i class="fas fa-search"></i></button>
        </form>
    </section>



    @if (sizeof($jobsDevs)==0)
        <h2 class="text-center text-blue">Tu busqueda no arrojo resultados</h2>

    @else
        @foreach ($jobsDevs as $jobDev)
        <a href="{{ route('jobdetail', [$jobDev->Title, $jobDev->id]) }}">
            <div class="w-5/6 h-auto mx-auto mb-2 duration-300 ease-in-out transform bg-white rounded-lg shadow-lg dark:bg-gray-700 sm:mx-10 sm:h-32 sm:flex hover:scale-105 ">
                <div class="flex">
                @if ($jobDev->profile_photo_path !== null)
                    @php
                        $path_photo_2 = 'storage/' . $jobDev->profile_photo_path;
                    @endphp
                @else
                    @php
                        $path_photo_2 = 'favicons/favicon.png';
                    @endphp
                @endif
                  <img class="object-cover w-full h-32 rounded-tl-lg rounded-bl-lg sm:w-48" src={{ asset($path_photo_2) }} alt="oferta">
                </div>
                <div class="py-4 mx-auto text-center sm:p-8">
                  <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase dark:text-blue-300">{{ $jobDev->Title }}</div>
                  <div class="text-xs font-light tracking-wide text-blue-700 uppercase dark:text-blue-400">{{ $jobDev->NameCompany }}</div>
                  <div class="flex flex-col sm:flex-row ">
                    <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
                        <p class="flex-1 mt-2 text-black lg:ml-10 sm:mt-0 md:mt-2 dark:text-white">Localización: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{ $jobDev->Location }}</p>
                    </div>
                    <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
                        <p class="flex-1 mt-2 text-black sm:mt-0 md:mt-2 lg:ml-10 dark:text-white">Salario: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{ $jobDev->Salary }} {{ $jobDev->currency }}<p>
                    </div>
                    <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
                        <p class="flex-1 mt-2 text-black lg:ml-10 sm:mt-0 md:mt-2 dark:text-white">Tiempo: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white"> {{ \Carbon\Carbon::parse($jobDev->created_at)->diffForHumans() }}</p>
                    </div>
                  </div>
                </div>
            </div>
        </a>

        @endforeach

    @endif



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
@stop

@section('js')
    <script>
        var search = document.getElementById("search");
        var formSearch = document.getElementById("searchForm")

        function SearchVerifed() {
            if (search.value === "") {
                swal.fire("Por favor escribe algo")
            } else {
                formSearch.submit()
            }
        }

    </script>
@stop
