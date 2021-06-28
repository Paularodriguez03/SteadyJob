@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content')

    @if ($vacantes !== 'mensaje de error')

        <div class="content-center p-4 border-b ">
            <div class="text-center">
                <a href="vacante/create"
                    class="justify-center w-32 p-3 mx-6 text-white bg-green-600 rounded-lg shadow outline-none focus:bg-green-700 hover:bg-green-500">Crear
                    Vacante</a>
            </div>

            <!-- Start of component -->
            @foreach ($vacantes as $vacante)
            <div class="max-w-md mx-auto mb-4 overflow-hidden bg-white shadow-md rounded-xl md:max-w-2xl">
                <div class="w-full">
                  <div class="p-8">
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase">Titulo:</div>
                        <p class="font-light">{{ $vacante->Title }}</p>
                    </div>
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase">Experiencia requerida (meses):</div>
                        <p class="font-light">{{ $vacante->ExperienceRequire }} meses</p>
                    </div>
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase">Salario:</div>
                        <p class="font-light">{{ $vacante->Salary }} {{ $vacante->currency }}</p>
                    </div>
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase">Estado:</div>
                        <p class="font-light">
                            @if ($vacante->state == 0)
                                Cerrada
                            @else
                                Abierta
                            @endif
                        </p>
                    </div>
                    <div class="flex flex-row">
                        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase"> Descripción de la vacante:</div>
                        <p class="font-light">{{ $vacante->DescriptionVacancy }}</p>
                    </div>
                    <div class="flex items-center justify-between w-full p-2">
                        <form action="{{ route('vacante.destroy', $vacante->id) }}" method="POST"
                            id={{$vacante->id}}>
                            <a href="/vacante/{{ $vacante->id }}/edit"
                                class="px-3 py-2 text-xs font-bold text-white bg-green-500 rounded-full hover:bg-green-600 "><i
                                    class="fas fa-pencil-alt"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="DeleteVacancy({{$vacante->id}})"
                                class="px-3 py-2 text-xs font-bold text-white bg-red-400 rounded-full hover:bg-red-500"><i
                                    class="outline-none fas fa-trash"></i>
                                </i></button>
                        </form>
                        <a href="/candidates/{{ $vacante->id }}">
                            <button class="px-3 py-2 text-xs font-bold text-white bg-blue-400 rounded-full hover:bg-blue-500"><i class="fas fa-users"></i></button></a>
                    </div>
                    
                  </div>
                </div>
        </div>
        @endforeach
        @else
            <div class="text-center">
                <h1 class="mb-8 text-center text-black-600">LLena tus datos antes de crear una vacante</h1>
                <p class="mb-8 text-center text-black-600">
                    Completa los datos para que puedas crear convocatorias y recibir los mejores perfiles
                    en el slider del lado izquierdo podras encontrar el formulario para realizar este importante paso en el
                    icono de edificio
                    adelante genera empleo y construye el mejor equipo
                    <br />
                    <br />
                    <a class="text-pink-500 underline" href="https://undraw.co/"></a>
                </p>

                <img src="https://peaku.co/img/business/illustration9.svg" height="500px" width="60%" alt="panel-main" />


            </div>

        </div>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">

@stop


@section('js')
    <script>
        function DeleteVacancy(id) {
        var formulario = document.getElementById(id);
            Swal.fire({
                title: '¿Estas seguro de querer eliminar esta vacante?',
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
                            'Tu vacante ha sido eliminada.',
                            'success'
                        )   
                        formulario.submit();


                    }
                }

            )


        }

    </script>
@stop
