@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<div class="mt-20 text-center bg-white">
  <h3 class="text-sm font-thin dark:text-white">Importante</h3>
  <h1 class="text-3xl dark:text-white">Tus aplicaciones</h1>
 
</div>
@if($userApplication=="mensaje de error")
<div class="flex flex-col items-center justify-center w-full mx-auto text-center md:w-4/5 md:text-center">
  <h3 class="text-lg font-light dark:text-white">Por favor primero completa tus datos.</h3>

  <a href="/developerdata">
      <button
          class="px-8 py-2 mb-8 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105">Completar
          perfil</button> </a>
</div>
@elseif($userApplication->count()==0)
<div class="flex flex-col items-center justify-center w-full mx-auto text-center md:w-4/5 md:text-center">
  <h3 class="text-lg font-light dark:text-white">Aún no has aplicado a ninguna oferta.</h3>
</div>
@else
{{-- @dd($userApplication) --}}
<h3 class="text-lg font-light text-center dark:text-white">Puedes revisar las vacantes a las que aplicaste y eliminar la aplicación si ya tienes un trabajo o no te interesa.</h3>
    @foreach ($userApplication as $ap )
    <div class="w-5/6 h-auto mx-auto mb-2 duration-300 ease-in-out transform bg-white rounded-lg shadow-lg dark:bg-gray-700 sm:mx-10 sm:h-32 sm:flex hover:scale-105 ">
      <div class="flex">
        @if ($ap->profile_photo_path !== NULL)
          @php
            $path_photo_2 = "storage/".$ap->profile_photo_path;
          @endphp
        @else
          @php
            $path_photo_2 = 'favicons/favicon.png'
          @endphp
        @endif
        <img class="object-cover w-full h-32 rounded-tl-lg rounded-bl-lg sm:w-48" src={{ asset($path_photo_2) }} alt="empresas">
      </div>
      <div class="py-4 mx-auto text-center sm:p-8">
        <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase dark:text-blue-300"> {{ \Carbon\Carbon::parse($ap->created_at)->diffForHumans() }}</div>
        <div class="text-xs font-light tracking-wide text-blue-700 uppercase dark:text-blue-400">{{ $ap->NameCompany}}</div>
        <div class="flex flex-col sm:flex-row ">
          <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
              <p class="flex-1 mt-2 text-black lg:ml-10 sm:mt-0 md:mt-2 dark:text-white">Titúlo: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{$ap->Title}}</p>
          </div>
          <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
              <p class="flex-1 mt-2 text-black sm:mt-0 md:mt-2 lg:ml-10 dark:text-white">Salario: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{$ap->Salary}} {{$ap->currency}}<p>
          </div>
          <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
              <p class="flex-1 mt-2 text-black lg:ml-10 sm:mt-0 md:mt-2 dark:text-white">Localización: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{$ap->Location}}</p>
          </div>
          <form action="{{ route('applications.destroy', $ap->vacancy_id) }}" method="POST" id={{$ap->vacancy_id}}>
            @csrf
            @method('DELETE')
            <div class="text-right">
              <button type="button" onclick="DeleteApplication({{$ap->vacancy_id}})" class="justify-center w-10 px-2 py-2 mx-6 text-white bg-red-400 rounded-full shadow outline-none focus:bg-red-600 hover:bg-red-500">
                <i class="fas fa-trash-alt"></i>
              </button>
          </div>
          </form>
        </div>
      </div>
  </div>
    @endforeach
@endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
@stop


@section('js')
    <script>
        function DeleteApplication(id) {
        var formulario = document.getElementById(id);
            Swal.fire({
                title: '¿Estas seguro de querer eliminar tu aplicación?',
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
                            '',
                            'ya no estas aplicando a la vacante',
                            'success'
                        )
                        formulario.submit();


                    }
                }

            )


        }

    </script>
@stop
