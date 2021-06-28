<!--Plantilla base del login-->
{{-- <div class="m-auto bg-black"> --}}
    <div class="flex flex-col items-center justify-center flex-1 h-full px-4 mb-20 sm:mb-0 mb:mb-0 lg:mb-0 xl:mb-0 sm:px1">
        <div class="flex w-full bg-white rounded-lg shadow-lg dark:bg-gray-700 sm:w-3/4 lg:w-2/4 sm:mx-0" style="height: 550px">
            <div class="flex flex-col w-full px-8 py-4 md:w-full">
                <div class="flex flex-col justify-center flex-1 mb-8">
                    <h1 class="text-4xl font-thin text-center dark:text-white">Bienvenido</h1>
                    <hr>
                    <div class="w-full mt-4"> 
                       {{ $slot }}
                    </div>
                </div>
            </div>
            <div class="hidden rounded-r-lg md:block md:w-1/2" style="background: url('https://image.freepik.com/vector-gratis/personas-dibujadas-mano-plana-que-trabajan-misma-habitacion_52683-54965.jpg'); background-size: cover; background-position: center;"></div>
        </div>
    </div>
