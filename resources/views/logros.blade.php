@extends('layouts.templatebase')



@section('content')

<div class="flex flex-col flex-wrap items-center flex-1 px-4 py-8 overflow-y-hidden sm:flex-row dark:bg-gray-700">
    <div class="flex-1">
        <div class="inline">
            <h1 class="px-4 text-3xl dark:text-white"> 
            Es muy fácil <span class="px-2 text-3xl text-red-500 dark:text-blue-300">lograr concretar </span>tus ideas hoy mismo.</h1>
            <h3 class="pl-10 my-6 text-red-400 dark:text-blue-400">Entérate cómo tu empresa puede hacer más contando con:</h3>
        </div>
        <div class="flex flex-row flex-wrap justify-around sm:justify-center sm:flex-nowrap">
            <div class="flex flex-col w-40 h-auto m-3 bg-white rounded-lg shadow-lg dark:bg-gray-700 ">
                {{-- icono --}}
                <img src="https://image.freepik.com/vector-gratis/ordenador-portatil-marca-verificacion-fondo-garabatos-hojas-ilustracion-icono-seguridad-eleccion-aprobada-tarea-completada-actualizada-o-descarga-completa-aceptar-o-aprobar-marca-verificacion_175838-909.jpg" class="w-auto h-32 rounded-t-lg " alt="actyaliza tu web">
                {{-- texto --}}
                <p class="text-center dark:text-white">Renueva tu Web</p>
                <p class="ml-5 text-sm font-thin dark:text-white">Actualiza tu web y conviértela en una máquina de generar ventas.</p>
            </div>
            <div class="flex flex-col w-40 h-auto m-3 bg-white rounded-lg shadow-lg dark:bg-gray-700">
                {{-- icono --}}
                <img src="https://image.freepik.com/vector-gratis/ordenador-portatil-marca-verificacion-fondo-garabatos-hojas-ilustracion-icono-seguridad-eleccion-aprobada-tarea-completada-actualizada-o-descarga-completa-aceptar-o-aprobar-marca-verificacion_175838-909.jpg" class="w-auto h-32 rounded-t-lg " alt="actyaliza tu web">
                {{-- texto --}}
                <p class="text-center dark:text-white">Diseñadores Expertos</p>
                <p class="ml-5 text-sm font-thin dark:text-white">Diseños web, gráficos o para móviles, lo que necesites para acompañar a tu marca.</p>
            </div>
            <div class="flex flex-col w-40 h-auto m-3 bg-white rounded-lg shadow-lg dark:bg-gray-700">
                {{-- icono --}}
                <img src="https://image.freepik.com/vector-gratis/ordenador-portatil-marca-verificacion-fondo-garabatos-hojas-ilustracion-icono-seguridad-eleccion-aprobada-tarea-completada-actualizada-o-descarga-completa-aceptar-o-aprobar-marca-verificacion_175838-909.jpg" class="w-auto h-32 rounded-t-lg" alt="actyaliza tu web">
                {{-- texto --}}
                <p class="text-center dark:text-white">¡Y mucho más!</p>
                <p class="ml-5 text-sm font-thin dark:text-white">Consultores de negocios y financieros, legales, administrativos, etc.</p>
            </div>           
        </div>
        <div class="flex justify-center mt-6 sm:justify-end">
            <a href="{{ url('register') }}">
                <button class="p-4 text-red-500 bg-white rounded-full shadow-lg justufy-end hover:bg-red-500 hover:text-white dark:bg-blue-400 dark:hover:bg-blue-500 dark:text-white"><i class="fas fa-pen-alt"></i>
                  Regístrate
                </button>
            </a>
            
        </div>
    </div>
    <div class="flex-1">
      <img src={{ asset('favicons/logro.jpg') }}
      class="w-3/4 m-auto rounded-lg" alt="logros">
      {{-- designed by freepik --}}
    </div>
</div>
  
@endsection