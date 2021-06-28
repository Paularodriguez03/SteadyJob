@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<h2 class="text-xl text-center text-blue-500">Editar mis datos</h2></h2>

<form action="/developer/{{$developer->id}}" method="POST" enctype="multipart/form-data" autocomplete=”off”>
@csrf
@method('PUT')  
<div class="relative w-full py-4 mb-3 text-lg">
  <label for="fullName" class="p-2 text-blue-500">Nombre Completo</label>
  <input value={{$developer->fullName}} id="fullName" name="fullName" type="text" class="w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="Nombre Completo" style="transition: all 0.15s ease 0s;"  tabindex="1">    

</div>
<div class="relative w-full py-4 mb-3 text-lg">
  <label   for="experience" class="p-2 text-blue-500">Experiencia en meses</label>
  <input  value={{$developer->experience}} id="experience" name="experience" type="number" class="w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="Experiencia en meses" style="transition: all 0.15s ease 0s;"  tabindex="2">

</div>
<div class="relative w-full py-4 mb-3 text-lg">
  <label for="about_me" class="p-2 text-blue-500">Acerca de mí</label>
  <textarea  id="about_me" name="about_me" cols="30" rows="10" placeholder="cuentanos brevemente sobre ti" class="w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="Titulo de la vacante"  tabindex="3">{{$developer->about_me}}</textarea>

</div>
<div class="relative w-full py-4 mb-3 text-lg">
    <label for="curriculum" class="p-2 text-blue-500">curriculum</label>
     <div class="flex items-center justify-center w-full h-auto bg-grey-lighter">
       <label class="flex flex-col items-center w-full px-4 py-6 tracking-wide uppercase bg-white border rounded-lg shadow-lg cursor-pointer text-blue border-blue hover:bg-blue hover:text-white">
         <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
             <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
         </svg>
         <span class="mt-2 text-base leading-normal">Seleccione un archivo</span>
         <input id="curriculum" name="curriculum" type="file" accept="application/pdf" class="hidden" />
     </label>
     </div>
<div class="relative w-full py-4 mb-3 text-lg">
  <label for="github" class="p-2 text-blue-500">Perfil de github</label>
  <input  value={{$developer->githubProfile}} id="github" name="github" type="url" class="w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring" placeholder="Link al Perfil de Github" style="transition: all 0.15s ease 0s;"  tabindex="3">

</div>
<div class="mt-4 mb-32 text-center">
  <a href="/developerdata">
  <button type="submit" class="justify-center w-32 p-3 mx-6 text-white bg-green-600 rounded-lg shadow outline-none focus:bg-green-700 hover:bg-green-500" tabindex="4">cancelar</button>
  </a>
    

    <button type="submit" class="justify-center w-32 p-3 mx-6 text-white bg-green-600 rounded-lg shadow outline-none focus:bg-green-700 hover:bg-green-500" tabindex="4">editar</button>
  
</div>
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
@stop



