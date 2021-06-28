<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ URL::asset('css/app.css') }}>
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <title>SteadyJob</title>
    <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
      } else {
        document.documentElement.classList.remove('dark')
      }
      // Whenever the user explicitly chooses light mode
      localStorage.theme = 'light'
      // Whenever the user explicitly chooses dark mode
      localStorage.theme = 'dark'
      // Whenever the user explicitly chooses to respect the OS preference
      localStorage.removeItem('theme');
    </script>
</head>
<body>
    @auth
        <a href="url('dashboard')" class="text-sm text-gray-700 underline ">Dashboard</a>
    @else
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-gray-800 dark:text-light">
          <!-- Loading screen -->
          <div
            x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-red-500"
          >
            Loading.....
          </div>
  
          <!-- Sidebar -->
          <div class="flex flex-shrink-0 transition-all">
            <div
              x-show="isSidebarOpen"
              @click="isSidebarOpen = false"
              class="fixed inset-0 z-10 bg-opacity-50 lg:hidden"
            ></div>
            <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-white dark:bg-gray-800"></div>
  
            <!-- Mobile bottom bar -->
            <nav
              aria-label="Options"
              class="fixed inset-x-0 bottom-0 z-30 flex flex-row-reverse items-center justify-between px-4 py-2 bg-white border-t border-indigo-100 sm:hidden shadow-t rounded-t-3xl dark:bg-gray-700"
            >
              <!-- Menu button -->
              <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 px-3 transition-colors rounded-full shadow-md hover:bg-blue-500 hover:text-white focus:outline-none dark:hover:bg-red-400"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-blue-600 dark:bg-red-500' : 'text-gray-500 bg-white dark:bg-gray-900 dark:text-white dark:hover:bg-red-400 '"
              >
                <span class="sr-only">Toggle sidebar</span>
                <i class="fas fa-home"></i>
              </button>
  
              <!-- Logo de la vista movil-->
              <a href="{{ url('/') }}">
                <img
                  class="w-16 h-auto rounded-sm "
                  src={{ asset('favicons/logo4.jpg') }}
                  alt="SteadyJob-logo-movil"
                />
              </a>
  
              <!-- login button -->
              <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
                <a href="{{ url('login') }}"> 
                    <!-- TODO: link a la vista de login -->
                    <button class="justify-center p-2 px-3 text-lg text-gray-500 transition-colors bg-white rounded-full shadow-md dark:bg-gray-900 dark:text-white dark:hover:bg-red-400 hover:bg-blue-500 hover:text-white focus:outline-none ">
                      <i class="fas fa-sign-in-alt "></i>
                    </button>
                </a>
              </div>
            </nav>
  
            <!-- Left mini bar -->
            <nav
              aria-label="Options"
              class="z-20 flex-col items-center flex-shrink-0 hidden w-16 py-2 bg-white border-r-2 border-indigo-100 shadow-md dark:bg-gray-800 dark:border-gray-600 sm:flex rounded-tr-3xl rounded-br-3xl"
            >
              <!-- Logo -->
              <div class="flex-shrink-0 py-4">
              <a href="{{ url('/') }}">
                <img
                  class="w-10 h-auto rounded-sm "
                  src={{ asset('favicons/logo2.jpg') }}
                  alt="SteadyJob-logo-nav"
                />
              </a>
              </div>
              <div class="flex flex-col items-center flex-1 p-2 space-y-4">
                <!-- TODO: Menu button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                  class="p-2 px-3 transition-colors rounded-full shadow-md hover:bg-blue-500 hover:text-white focus:outline-none dark:hover:bg-red-400"
                  :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-blue-600 dark:bg-red-500' : 'text-gray-500 bg-white dark:bg-gray-900 dark:text-white dark:hover:bg-red-400 '"
                >
                  <span class="sr-only">Toggle sidebar</span>
                  <i class="fas fa-home"></i>
                </button>
                <!-- Our button -->
                <a href="{{ url('/nosotros') }}">
                        <button
                        class="p-2 px-3 text-lg text-gray-500 transition-colors bg-white rounded-full shadow-md hover:bg-blue-500 hover:text-white focus:outline-none dark:bg-gray-900 dark:text-white dark:hover:bg-red-400"
                    >
                        <span class="sr-only">Toggle Our panel</span>
                        <i class="fas fa-users"></i>
                    </button>
                </a>
                <!-- Contact button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
                  class="p-2 px-3 transition-colors rounded-full shadow-md hover:bg-blue-500 hover:text-white focus:outline-none dark:hover:bg-red-400"
                  :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-blue-600 dark:bg-red-500' : 'text-gray-500 bg-white dark:bg-gray-900 dark:text-white dark:hover:bg-red-400 '"
                >
                  <span class="sr-only">Toggle contact panel</span>
                  <i class="fas fa-id-card"></i>
                </button>
              </div>
              
              <!-- login -->
              <!-- x-data="{ isOpen: false } con esto se hace que se quede abierto el submenu -->
              <div class="relative flex items-center flex-shrink-0 p-2" ">
                <a href="{{ url('login') }}"">
                    <!-- TODO: link a la vista de inciar sesion -->
                    <button class="justify-center p-2 px-3 text-lg text-gray-500 transition-colors bg-white rounded-full shadow-md dark:bg-gray-900 dark:text-white dark:hover:bg-red-400 hover:bg-blue-500 hover:text-white focus:outline-none ">
                        <i class="fas fa-sign-in-alt "></i>
                    </button>
                </a>
              </div>
            </nav>
  
            <div
              x-transition:enter="transform transition-transform duration-300"
              x-transition:enter-start="-translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transform transition-transform duration-300"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="-translate-x-full"
              x-show="isSidebarOpen"
              class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-white border-r-2 border-indigo-100 shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64 dark:bg-gray-700 dark:border-gray-400"
            >
              <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center flex-shrink-0 py-10">
                  <a href="#">
                    <img
                      class="w-auto h-24 rounded-sm "
                      src={{ asset('favicons/logo4.jpg') }}
                      alt="steadyJob-logo-panel"
                    />
                  </a>
                </div>
  
                <!-- Links -->
                <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto">
                  <a href="{{ url('/') }}" class="flex items-center w-full space-x-2 text-white bg-blue-500 rounded-full dark:bg-red-400 ">
                    <span aria-hidden="true" class="p-2 px-3 text-lg bg-blue-600 rounded-full dark:bg-red-500">
                        <i class="fas fa-star"></i>
                    </span>
                    <span>Inicio</span>
                  </a>
                  <a
                    href="{{ url('register') }}"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                    <i class="fas fa-pen-alt"></i>
                    </span>
                    <span>Registro</span>
                  </a>
                  <a
                    href="{{ url('/vacantes') }}"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="fas fa-briefcase"></i>
                    </span>
                    <span>Algunos trabajos</span>
                  </a>
                  <a
                    href="{{ url('/habilidades') }}"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="far fa-bookmark"></i>
                    </span>
                    <span>Habilidades</span>
                  </a>
                  <a
                    href="{{ url('/empresas') }}"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                    <i class="far fa-building"></i>
                    </span>
                    <span>Empresas</span>
                  </a>
                  <a
                    href="{{ url('/paraEmpresas') }}"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                    <i class="fas fa-city"></i>
                    </span>
                    <span>Para Empresas</span>
                  </a>
                  <a
                    href="{{ url('/logros') }}"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="fas fa-trophy"></i>
                    </span>
                    <span>¿Que puedes lograr?</span>
                  </a>
                </div>
  
                
              </nav>
  
              <section x-show="currentSidebarTab == 'messagesTab'" class="px-4 py-6">
                <div class="flex items-center justify-center flex-shrink-0 py-10">
                  <a href="#">
                    <img
                      class="w-auto h-24 "
                      src={{ asset('favicons/logo4.jpg') }}
                      alt="SteadyJob-logo-panel-contact"
                    />
                  </a>
                </div>
                <h2 class="px-2 text-xl text-center text-red-500">Contacto</h2>
                <hr>
                <br>
                <a
                    href="#"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="far fa-envelope"></i>
                    </span>
                    <span>SteadyJob@gmail.com</span>
                  </a>
                <a
                    href="#"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="fas fa-phone"></i>
                    </span>
                    <span>+57 3106699985</span>
                  </a>
                <a
                    href="#"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="fab fa-instagram"></i>
                    </span>
                    <span>Instagram</span>
                  </a>
                  <a
                    href="#"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="fab fa-facebook"></i>
                    </span>
                    <span>Facebook</span>
                  </a>
                  <a
                    href="#"
                    class="flex items-center space-x-2 text-blue-600 transition-colors rounded-full hover:text-white hover:texwhite dark:text-white group hover:bg-blue-500 dark:hover:bg-red-400 dark:hover:text-white">
                    <span
                      aria-hidden="true"
                      class="p-2 px-3 text-lg transition-colors rounded-full group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-red-500">
                      <i class="fab fa-twitter"></i>
                    </span>
                    <span>twitter</span>
                  </a>
              </section>
            </div>
          </div>
          <div class="flex flex-col flex-1">
            <header class="relative flex items-center justify-between flex-shrink-0 p-4">
              <form action="#" class="flex-1">
                <!--TODO: botones de vista grande  -->
              </form>
              <div class="items-center hidden ml-4 sm:flex">
                <button
                  id="switchTheme"
                  class="px-3 py-2 mr-4 text-lg text-gray-400 transition duration-300 ease-in-out transform bg-white rounded-full shadow-md dark:bg-gray-900 focus:outline-none hover:scale-105"
                >
                  <span class="sr-only">dark mode</span>
                  <i class="fas fa-moon hover:text-blue-500"></i>
                </button>
  
                <!-- Github link -->
                <a
                  {{--TODO: href="" --}}
                  target="_blank"
                  class="px-3 py-2 mr-4 text-lg text-white bg-black rounded-full shadow-md dark:bg-white dark:text-gray-900 hover:text-gray-200 dark:hover:bg-gray-700 focus:outline-none"
                >
                  <span class="sr-only">github link</span>
                  <i class="fab fa-github"></i>
                </a>
              </div>
  
              <!-- Mobile sub header button -->
              <button
                @click="isSubHeaderOpen = !isSubHeaderOpen"
                class="p-2 px-5 text-lg text-gray-400 bg-white rounded-full shadow-md dark:text-white dark:bg-gray-900 sm:hidden hover:text-gray-600 focus:outline-non"
              >
                <span class="sr-only">More</span>
  
                <i class="fas fa-ellipsis-v"></i>
              </button>
  
              <!-- Mobile sub header -->
              <div
                x-transition:enter="transform transition-transform"
                x-transition:enter-start="translate-y-full opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transform transition-transform"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="translate-y-full opacity-0"
                x-show="isSubHeaderOpen"
                @click.away="isSubHeaderOpen = false"
                class="absolute top-0 flex flex-col items-center justify-center w-1/5 p-2 bg-white rounded-md shadow-lg dark:bg-gray-700 sm:hidden left-5 right-5"
              >
                <!-- dark mode button -->
                <button
                  id="switchTheme2"
                  @click="isSettingsPanelOpen = true; isSubHeaderOpen = false"
                  class="px-3 py-2 mx-auto mb-2 text-lg text-gray-400 transition duration-300 ease-in-out transform bg-white rounded-full shadow-md dark:bg-gray-900 focus:outline-none hover:scale-105"
                >
                  <span class="sr-only">dark mode</span>
                  <!-- TODO:TODO: -->
                  <i class="fas fa-moon hover:text-blue-500"></i>
                </button>
                <!-- Our button -->
                <a href="{{ url('/nosotros') }}">
                  <button
                  class="p-2 px-3 mb-2 text-lg text-gray-500 transition-colors bg-white rounded-full shadow-md hover:bg-blue-500 hover:text-white focus:outline-none dark:bg-gray-900 dark:text-white dark:hover:bg-red-400"
                  >
                    <span class="sr-only">Toggle Our panel</span>
                    <i class="fas fa-users"></i>
                  </button>
                </a>
                <!-- Contact button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
                  class="p-2 px-3 mb-2 transition-colors rounded-full shadow-md hover:bg-blue-500 hover:text-white focus:outline-none dark:hover:bg-red-400"
                  :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-blue-600 dark:bg-red-500' : 'text-gray-500 bg-white dark:bg-gray-900 dark:text-white dark:hover:bg-red-400 '"
                >
                  <span class="sr-only">Toggle contact panel</span>
                  <i class="fas fa-id-card"></i>
                </button>
                <!-- Github link -->
                <a
                {{--TODO: href="" --}}
                target="_blank"
                class="px-3 py-2 mx-auto mb-2 text-lg text-white bg-black rounded-full shadow-md dark:bg-white dark:text-gray-900 hover:text-gray-200 dark:hover:bg-gray-700 focus:outline-none"
              >
                <span class="sr-only">github link</span>
                <i class="fab fa-github"></i>
              </a>
              </div>
            </header>
  
            <div class="w-full ">
              <!-- Main -->
              <main >
                @yield('content')
              </main>
            </div>
          </div>
        </div>
  
        <!-- Panels -->
  
        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div
          x-show="isSettingsPanelOpen"
          class=""
          @click="isSettingsPanelOpen = false"
          aria-hidden="true"
        ></div>
        @endif
    </div>
      </div>
  
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
      <script>
          const setup = () => {
              return {
              isSidebarOpen: false,
              currentSidebarTab: null,
              isSettingsPanelOpen: false,
              isSubHeaderOpen: false,
              watchScreen() {
                  if (window.innerWidth <= 1024) {
                  this.isSidebarOpen = false
                  }
              },
          }
        };
      </script>
      <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
      <script src="https://unpkg.com/tippy.js@4"></script>
      <script>
        document.getElementById('switchTheme').addEventListener('click', function() {
           let htmlclases = document.querySelector('html').classList;
           let iconDarkMode =document.querySelector('#switchTheme');
           console.log(iconDarkMode);
 
           if(localStorage.theme == 'dark') {
             htmlclases.remove('dark');
             localStorage.removeItem('theme');
 
 
             iconDarkMode.innerHTML =``;
             iconDarkMode.innerHTML = `
              <span class="sr-only">dark mode</span>
              <i class="fas fa-moon hover:text-blue-500"></i>`;
            
           }else{
             htmlclases.add('dark');
             localStorage.theme = 'dark';
             
             iconDarkMode.innerHTML =``;
             iconDarkMode.innerHTML = `
             <span class="sr-only">dark mode</span>                                        
              <i class="fas fa-sun hover:text-yellow-500"></i>`;
             console.log('día ', iconDarkMode)
             console.log('noche');
           };
         });
       </script>
      <script>
        document.getElementById('switchTheme2').addEventListener('click', function() {
           let htmlclases = document.querySelector('html').classList;
           let iconDarkMode =document.querySelector('#switchTheme2');
           console.log(iconDarkMode);
 
           if(localStorage.theme == 'dark') {
             htmlclases.remove('dark');
             localStorage.removeItem('theme');
 
 
             iconDarkMode.innerHTML =``;
             iconDarkMode.innerHTML = `
              <span class="sr-only">dark mode</span>
              <i class="fas fa-moon hover:text-blue-500"></i>`;
            
           }else{
             htmlclases.add('dark');
             localStorage.theme = 'dark';
             
             iconDarkMode.innerHTML =``;
             iconDarkMode.innerHTML = `
             <span class="sr-only">dark mode</span>                                        
              <i class="fas fa-sun hover:text-yellow-500"></i>`;
             console.log('día ', iconDarkMode)
             console.log('noche');
           };
         });
       </script>
    </script>
</body>
</html>