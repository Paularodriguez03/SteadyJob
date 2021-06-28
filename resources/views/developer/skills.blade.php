@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>

<div class="mt-20 text-center bg-white">
    <h3 class="text-sm font-thin dark:text-white">2do paso</h3>
    <h1 class="text-3xl dark:text-white">Llena tus datos</h1>
   
  </div>


@if($userSkills === "mensaje de error")
<div class="flex flex-col items-center justify-center w-full mx-auto text-center md:w-4/5 md:text-center">
    <h3 class="text-lg font-light dark:text-white">Por favor primero completa tus datos.</h3>

    <a href="/developerdata">
        <button class="px-8 py-2 mb-8 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105">Completar perfil</button> </a>
</div>

@elseif(count($userSkills)== 0 )
<div class="flex flex-col items-center justify-center w-full mx-auto text-center md:w-4/5 md:text-center">
    <h3 class="text-lg font-light dark:text-white">No haz registrado tu formación acádemica.</h3>
    <a href="skills/show">
        <button class="px-8 py-2 mb-8 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105">
            registrar
        </button> </a>
</div>
@else
<body class="flex flex-row items-center justify-center mx-auto">
    <h3 class="text-lg font-light text-center dark:text-white">Al llenar estos datos proporcionas mayor credibilidad y desbloqueas las demas opciones.</h3>
	<div class="container flex flex-row flex-wrap justify-center mt-10">
        @foreach ($userSkills as $userSkill)
        <div class="w-full h-auto mx-2 mt-6 bg-white rounded-lg shadow-lg sm:w-1/4">
            <div class="inline-grid w-full h-full grid-cols-2 grid-rows-2">
                <p class="flex-1 pt-2 text-center text-white bg-green-500 rounded-tl-lg ">Skill</p>
                <p class="flex-1 pt-2 text-center text-white bg-green-500 rounded-tr-lg ">Acciones</p>
                <p class="flex-1 pt-2 text-center">{{ $userSkill->skillName }}</p>
                <form action="{{route('skills.destroy', $userSkill->skill_id)}}" method="POST" id={{$userSkill->skill_id}} class="flex-1 py-2 text-center" aria-hidden="true">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="px-4 py-2 font-bold text-red-500 hover:border-red-400" onclick="deleteSkills({{$userSkill->skill_id}})">
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


<div class="flex flex-row justify-end mx-auto">
    <a href="skills/show">
        <button class="px-8 py-2 mb-8 font-bold text-green-600 transition duration-300 ease-in-out transform bg-green-200 rounded-full shadow-lg lg:mx-0 focus:outline-none focus:shadow-outline hover:bg-green-500 hover:text-white hover:scale-105">Editar</button>
    </a>
</div>


@endif






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


<script>


function deleteSkills(id) {

var formulario = document.getElementById(id);

Swal.fire({
    title: '¿Estas seguro de querer eliminar esta habilidad?',
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