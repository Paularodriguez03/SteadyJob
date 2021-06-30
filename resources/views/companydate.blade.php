@extends('adminlte::page')

@section('title', 'Steady Job')


@section('content')

    <div class="flex items-center justify-center min-h-screen bg-gray-200">
        <div class="max-w-2xl p-5 tracking-wide border-2 border-gray-300 rounded-md shadow-lg bg-blue">
            <div id="header" class="flex">
                <form action="{{ route('recruiter.store') }}" method="POST">
                    @csrf
                    <div class="relative w-full mb-3 text-lg">
                        <label for="fullName" class="p-2 ">Nombre compañia</label>
                        <input id="namecompany" name="namecompany" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" tabindex="1">
                    </div>
                    <div class="relative w-full mb-3 text-lg">
                        <label for="fullName" class="p-2 ">Descripción</label>
                        <textarea id="descripcion" name="descripcion" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" tabindex="2"></textarea>
                    </div>
                    <div class="relative w-full mb-3 text-lg">
                        <label for="fullName" class="p-2 ">Website</label>
                        <input id="website" name="website" type="url" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" tabindex="3">
                    </div>
                    <div class="relative w-full mb-3 text-lg">
                        <label for="fullName" class="p-2 ">NIT</label>
                        <input id="nitcompany" name="nitcompany" type="text" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none" tabindex="3">
                    </div>
                    <a href="/dashboard" class="btn btn-secondary" tabindex="5">Cancelar</a>
                    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                </form>

            </div>
        </div>
    </div>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
@stop
