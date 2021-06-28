@extends('adminlte::page')

@section('title', 'Dashboard')

    

@section('content')
    <h2 class="text-xl text-center text-blue-500">Candidatos</h2></h2>
    @if ($developers->count()==0)
        <h6>por ahora no tenemos candidatos para mostrar</h6>
        
    @else
        @foreach ($developers as $dev )
        
        <div class="mb-2 shadow borderrounded-lg lg:flex">
            <div class="block h-full py-1 rounded-lg shadow-inner lg:w-2/12">
                <div class="h-full tracking-wide text-center ">
                      @if ($dev->profile_photo_path !== null)
                          @php
                              $path_photo_2 = 'storage/' . $dev->profile_photo_path;
                          @endphp
                      @else
                          @php
                              $path_photo_2 = 'favicons/favicon_user.jpg';
                          @endphp
                      @endif
                      <img src="{{ asset($path_photo_2) }}" class="relative z-10 object-cover w-96 h-96 "
                          alt="logo de la empresa">
                </div>
            </div>
            <div class="flex flex-row flex-wrap justify-around w-full px-1 py-5 tracking-wide bg-white lg:w-11/12 xl:w-full lg:px-2 lg:py-2">
                <div class="flex flex-row justify-center lg:justify-start">
                    <div class="px-2 text-sm font-bold text-center text-gray-700 lg:text-left">
                          Nombre: {{ $dev->fullName}}
                    </div>
                </div>
                <div>
                    <div class="px-2 font-semibold text-center text-gray-800 uppercase text-l lg:text-left">
                        {{ $dev->about_me }}
                  </div>
                  <div class="px-2 pt-1 text-sm font-medium text-center text-gray-600 uppercase lg:text-left">
                        {{ $dev->country }}
                  </div>
                </div>
                <div class="flex flex-col">
                    <a href="{{ $dev->curriculum }}" target="blank">
                    <button class="p-2 my-3 text-green-500 bg-white rounded-lg shadow-sm hover:bg-green-500 hover:text-white">ver curriculum</button></a>
                    <a href="{{ $dev->githubProfile }}" target="blank">
                      <button class="p-2 text-green-500 bg-white rounded-lg shadow-sm hover:bg-green-500 hover:text-white">github</button>
                    </a>
                    
                </div>
            </div>
        </div>
        </div>

        
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
