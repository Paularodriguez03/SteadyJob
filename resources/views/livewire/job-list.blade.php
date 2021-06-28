<div class="flex flex-col text-center dark:bg-gray-800">
    <h3 class="text-sm font-thin dark:text-white">Ultimas Vacantes</h3>
    <h1 class="text-3xl dark:text-white ">Trabajos destacados</h1>
    <br>
    <h2 class="text-sm font-light dark:text-white">Aplica y estarás un paso más cerca del empleo de tus sueños, en empresas como:</h2>
    <div class="flex flex-row">
      <!-- transform hover:scale-105 duration-300 ease-in-out -->
  </div>
  <br>
  <div class="flex flex-col justify-around flex-nowrap">
    @foreach ($jobs as $job)
    <a href="{{ route('vacancy', $job->Title) }}">
        <div class="w-5/6 h-auto mx-auto mb-2 duration-300 ease-in-out transform bg-white rounded-lg shadow-lg dark:bg-gray-700 sm:mx-10 sm:h-32 sm:flex hover:scale-105 ">
            <div class="flex">
                @if ($job->profile_photo_path !== null)
                @php
                    $path_photo = 'storage/' . $job->profile_photo_path;
                @endphp
                @else
                    @php
                        $path_photo = 'favicons/favicon.png';
                    @endphp
                @endif
              <img class="object-cover w-full h-32 rounded-tl-lg rounded-bl-lg sm:w-48" src={{ asset($path_photo) }} alt="A cat">
            </div>
            <div class="py-4 mx-auto text-center sm:p-8">
              <div class="text-sm font-semibold tracking-wide text-blue-500 uppercase dark:text-blue-300">{{ $job->Title }}</div>
              <div class="text-xs font-light tracking-wide text-blue-700 uppercase dark:text-blue-400">{{ $job->NameCompany }}</div>
              <div class="flex flex-col sm:flex-row ">
                <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
                    <p class="flex-1 mt-2 text-black lg:ml-10 sm:mt-0 md:mt-2 dark:text-white">Localización: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{ $job->Location }}</p>
                </div>
                <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
                    <p class="flex-1 mt-2 text-black sm:mt-0 md:mt-2 lg:ml-10 dark:text-white">Salario: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{ $job->Salary }}<p>
                </div>
                <div class="flex flex-row mx-auto sm:flex-col md:flex-row">
                    <p class="flex-1 mt-2 text-black lg:ml-10 sm:mt-0 md:mt-2 dark:text-white">Moneda: </p><p class="flex-1 mt-2 font-light sm:mt-0 md:mt-2 dark:text-white">{{ $job->currency }}</p>
                </div>
              </div>
            </div>
        </div>
    </a>
@endforeach
</div>
</div>