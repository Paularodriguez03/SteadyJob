@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>

    <div class="mt-20 text-center bg-white">
        <h3 class="text-sm font-thin dark:text-white">3er paso</h3>
        <h1 class="text-3xl dark:text-white">Cuentanos sobre tú educación</h1>
       
    </div>

    @if ($userEducation === 'mensaje de error')
        <div class="flex flex-col items-center justify-center w-full mx-auto text-center md:w-4/5 md:text-center">
            <h3 class="text-lg font-light dark:text-white">Por favor primero completa tus datos.</h3>

            <a href="/developerdata">
                <button
                    class="px-8 py-2 mb-8 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105">Completar
                    perfil</button> </a>
        </div>

    @elseif(count($userEducation)== 0 )
        <div class="flex flex-col items-center justify-center w-full mx-auto text-center md:w-4/5 md:text-center">
            <h3 class="text-lg font-light dark:text-white">No haz registrado tu formación acádemica.</h3>
        </div>


        <form action={{ route('education.store') }} method="POST">
            @csrf
            <div class="flex flex-row flex-wrap">
                <select id="career" name="career" required
                    class="flex-1 block p-2 mx-2 mt-1 bg-white border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($education as $edu)
                        <option value="{{ $edu }}">{{ $edu }}</option>
                    @endforeach

                </select>
                <select id="level" name="level" required
                    class="flex-1 block w-1/2 p-2 mx-2 mt-1 bg-white border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($level as $lev)
                        <option value="{{ $lev }}">{{ $lev }}</option>
                    @endforeach
                </select>
                <input type="submit" value="guardar"
                    class="flex-0.5 px-4 py-2 m-auto mx-6 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105">
            </div>
        </form>    @else

        <body class="flex items-center justify-center">
            <h3 class="text-lg font-light text-center dark:text-white">Al llenar estos datos proporcionas mayor credibilidad y desbloqueas las demas opciones.</h3>
	<div class="container flex flex-row flex-wrap justify-center mt-10">
        @foreach ($userEducation as $userEdu)
        <div class="w-full h-auto mx-2 mt-6 bg-white rounded-lg shadow-lg sm:w-1/4">
            <div class="inline-grid w-full h-full grid-cols-3 grid-rows-2">
                <p class="flex-1 pt-2 text-center text-white bg-green-500 rounded-tl-lg ">Carrera</p>
                <p class="flex-1 pt-2 text-center text-white bg-green-500 ">Nivel</p>
                <p class="flex-1 pt-2 text-center text-white bg-green-500 rounded-tr-lg ">Acciones</p>
                <p class="flex-1 pt-2 text-center">{{ $userEdu->nameEducation }}</p>
                <p class="flex-1 pt-2 text-center">{{ $userEdu->level }}</p>
                <form action="{{ route('education.destroy', $userEdu->education_id) }}" method="POST" id={{ $userEdu->education_id }}>

                    @csrf
                    @method('DELETE')
                    <button type="button"
                    class="px-4 py-2 font-bold text-red-500 hover:border-red-400"
                    onclick="deleteEducation({{ $userEdu->education_id }})">
                    <i class="fas fa-trash-alt"></i>Eliminar
                    </button>
                </form>
            </div>
        </div>
        @endforeach
	</div>
</body>

        <style>
            html,
            body {
                height: 100%;
            }

            @media (min-width: 640px) {
                table {
                    display: inline-table !important;
                }

                thead tr:not(:first-child) {
                    display: none;
                }
            }

            td:not(:last-child) {
                border-bottom: 0;
            }

            th:not(:last-child) {
                border-bottom: 2px solid rgba(0, 0, 0, .1);
            }

        </style>
        {{-- form añadir educacion --}}
        <form action="{{ route('education.store') }}" method="POST" class="my-6">
            <hr>
            <h3 class="text-lg font-light text-center dark:text-white">Agrega más contendio a tú perfil.</h3>
            @csrf
            <div class="flex flex-row flex-wrap">
                <select id="career" name="career" required
                    class="flex-1 block p-2 mx-2 mt-1 bg-white border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($education as $edu)
                        <option value="{{ $edu }}">{{ $edu }}</option>
                    @endforeach
                </select>

                <select id="level" name="level" required
                    class="flex-1 block p-2 mx-2 mt-1 bg-white border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($level as $lev)
                        <option value="{{ $lev }}">{{ $lev }}</option>
                    @endforeach
                </select>
                <button
                    class="flex-0.5 px-4 py-2 m-auto mx-6 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105"
                    type="submit"> Agregar</button>
            </div>
        </form>

    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        function deleteEducation(id) {

            var formulario = document.getElementById(id);

            Swal.fire({
                title: '¿Estas seguro de querer eliminar esta educación?',
                text: "¡No podras revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si,Eliminar!',
                cancelButtonText: "Cancelar"
            }).then((result) => {

                    confirmation = result.value
                    if (confirmation === true) {

                        swal.fire(
                            'Eliminada!',
                            'Esta habilidad ha sido eliminada.',
                            'success'
                        ), formulario.submit()
                    }
                }

            )


        }

    </script>


@stop
