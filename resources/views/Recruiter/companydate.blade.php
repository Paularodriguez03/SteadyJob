@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content')
    <div class="mt-20 text-center bg-white">
        <h3 class="text-sm font-thin dark:text-white">1er paso</h3>
        <h1 class="text-3xl dark:text-white">Llena los datos de tú empresa</h1>
        <h3 class="text-lg font-light dark:text-white">Al llenar estos datos proporciones mayor credibilidad y desbloqueas las demas opciones.</h3>
    </div>

    @if (sizeof($users) !== 0)
        <form class="w-5/6 mx-auto" action="/companydata/{{ $users[0]->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="relative w-full py-4 mb-3 text-lg">
                <label for="fullName" class="p-2 ">Nombre compañia</label>
                <input id="namecompany" name="namecompany" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none"  id="grid-first-name"
                    type="text" placeholder="Nombre de la compañia" tabindex="1" value="{{ $users[0]->NameCompany }}"
                    required>                
            </div>

            <div class="relative w-full mb-3 text-lg">
                <label for="fullName" class="p-2 ">Descripción</label>
                <textarea id="descripcion" cols="30" rows="10"  name="descripcion" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 shadow rounded-xl dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" type="text"
                    placeholder="Somos una empresa que busca" tabindex="2" value="{{ $users[0]->DescriptionCompany }}"
                    required>{{ $users[0]->DescriptionCompany }}</textarea>
            </div>

            <div class="relative w-full mb-3 text-lg">
                <label for="fullName" class="p-2 ">Website</label>
                <input id="website" name="website" type="url" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" id="grid-first-name" type="text"
                    placeholder="www.mistersas.com" tabindex="3" value="{{ $users[0]->WebsiteCompany }}" required>
            </div>

            <div class="relative w-full mb-3 text-lg">
                <label for="fullName" class="p-2 ">NIT</label>
                <input id="nitcompany" name="nitcompany" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" id="grid-first-name" type="text"
                    placeholder="NIT OR ID" tabindex="3" value="{{ $users[0]->idCompany }}" required>
            </div>

            <button type="submit" class="flex justify-center w-32 p-3 mx-auto mb-10 text-white bg-green-600 rounded-full shadow outline-none focus:bg-green-700 hover:bg-green-500" tabindex="4" id="update" onclick="Update()">Actualizar</button>
        </form>

    @else
        <form action="{{ route('companydata.store') }}" method="POST" class="w-5/6 mx-auto">
            @csrf
            <div class="relative w-full mb-3 text-lg">
                <label for="fullName" class="p-2 ">Nombre compañia</label>
                <input id="namecompany_1" name="namecompany" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" id="grid-first-name" tabindex="1" required>
            </div>
            <div class="relative w-full mb-3 text-lg">
                <label for="fullName" class="p-2 ">Descripción</label>
                <textarea id="descripcion_1" name="descripcion" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 shadow rounded-xl dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" placeholder="Somos una empresa que busca"  tabindex="2"  required></textarea>
            </div>
            <div class="relative w-full mb-3 text-lg">
                <label for="fullName" class="p-2 ">Website</label>
                <input id="website_1" name="website" type="url" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" tabindex="3" required>
            </div>
            <div class="relative w-full mb-3 text-lg">
                <label for="fullName" class="p-2 ">NIT</label>
                <input id="nitcompany_1" name="nitcompany" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" tabindex="3"  required>
            </div>
            <a href="/dashboard" class="flex justify-center w-32 p-3 mx-6 mb-10 text-white bg-red-400 rounded-full shadow outline-none focus:bg-red-500 hover:bg-red-500" tabindex="5">
                <button>Cancelar</button> </a>
            <button type="submit" class="flex justify-center w-32 p-3 mx-6 mb-10 text-white bg-green-600 rounded-full shadow outline-none focus:bg-green-700 hover:bg-green-500" onclick="createDateCompany()" tabindex="4">Guardar</button>
        </form>
    @endif


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
@stop


@section('js')


    <script>
        var namecompany = document.getElementById("namecompany")
        var descripcion = document.getElementById("descripcion")
        var website = document.getElementById("website")
        var nitcompany = document.getElementById("nitcompany")



        var namecompany_1 = document.getElementById("namecompany_1")
        var descripcion_1 = document.getElementById("descripcion_1")
        var website_1 = document.getElementById("website_1")
        var nitcompany_1 = document.getElementById("nitcompany_1")


        function Update() {

            if (namecompany.value !== "" & descripcion.value !== "" & website.value !== "" & nitcompany.value !== "") {
                swal.fire('¡Tus datos han sido actulizados!')
            } else {
                swal.fire("¡Llena todos los campos!")
            }

        }

        function createDateCompany(){
            if (namecompany_1.value !== "" & descripcion_1.value !== "" & website_1.value !== "" & nitcompany_1.value !== "") {
                swal.fire('¡Tus datos han sido guardados!')
            } else {
                swal.fire("¡Llena todos los campos!")
            }
        }

    </script>
@stop
