@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')

    <div class="mt-20 text-center bg-white">
        <h3 class="text-sm font-thin dark:text-white">Importante</h3></h3>
        <h1 class="text-3xl dark:text-white">Edita los datos de la vacante</h1>
        <h3 class="text-lg font-light dark:text-white">Algo salio mal al subir la vacante? ¡no te preocupes! tienes todos los datos para ajustar lo a tus necesidades o cerrar la vacante si ya contratas te a alguien.</h3>
    </div>

    <form action="/vacante/{{ $vacante->id }}" method="POST" class="w-5/6 mx-auto">
        @csrf
        @method('PUT')
        <div class="relative w-full mb-3 text-lg">
            <label for="fullName" class="p-2 ">Titulo</label>
            <input type="text" name="title" id="title" tabindex="1"
                class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none"
                value="{{ $vacante->Title }}" style="transition: all 0.15s ease 0s;" required />
        </div>
        <div class="relative w-full mb-3 text-lg">
            <label for="fullName" class="p-2 ">Experiencia requerida</label>
            <input name="experience" id="experience" type="number" tabindex="1"
                class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none"
                value="{{ $vacante->ExperienceRequire }}" style="transition: all 0.15s ease 0s;" required />
        </div>

        <div class="relative w-full mb-3 text-lg">
            <label for="fullName" class="p-2 ">Salario</label>
            <input name="salary" id="salary" type="number" tabindex="1"
                class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none"
                value="{{ $vacante->Salary }}" style="transition: all 0.15s ease 0s;" required />
        </div>

        <div class="relative w-full mb-3 text-lg">
            <label for="fullName" class="p-2 ">Lugar</label>
            <input type="text" name="location" id="lugar"
                class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 focus:outline-none"
                value="{{ $vacante->Location }}" style="transition: all 0.15s ease 0s;" required />
        </div>

        <div>
            <label for="fullName" class="p-2 ">Moneda</label>
            <div class="flex flex-col w-full h-64 mx-auto md:w-1/2">
                <select name="currency" id="currency"
                    class="flex w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow focus:outline-none focus:ring">
                    <div class="w-full bg-blue-400 border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100">
                        <option class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                            {{ $vacante->currency }}</option>
                        <option value="USD"
                            class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">USD</option>
                        <option value="COP"
                            class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">COP</option>
                        <option value="EUR"
                            class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">EUR</option>
                    </div>
                </select>
            </div>
        </div>

        <div class="relative w-full mb-3 text-lg">
            <label for="fullName" class="p-2 ">Descripción de la vacante</label>
            <textarea name="descriptionjob" id="descriptionjob" cols="30" rows="10" tabindex="1"
                class="w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow focus:outline-none focus:ring"
                required>{{ $vacante->DescriptionVacancy }}</textarea>
        </div>

        <div>
            <label for="fullName" class="p-2 ">Estado</label>
            <div class="flex flex-col w-full h-64 mx-auto md:w-1/2">
                <select name="state" id="state"
                    class="flex w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow focus:outline-none focus:ring">
                    <div class="w-full bg-blue-400 border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100">

                        <option value="1" class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent"
                            required>
                            Abierto</option>
                        <option value="0" class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent"
                            required>
                            Cerrado</option>

                    </div>
                </select>
            </div>
        </div>



        <label for="fullName" class="p-2 ">Tecnologias requeridas</label>
        <div>
            <label for="fullName" class="p-2 ">Actuales</label>

            <div class="flex flex-wrap">
                {{-- call vacancy --}}
                @foreach ($userTecno as $tec)
                    <div
                        class="flex w-auto max-w-sm mx-4 my-2 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex items-center justify-center w-12 bg-blue-500">
                            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                            </svg>
                        </div>

                        <div class="px-4 py-2 -mx-3">
                            <div class="mx-3">
                                <span class="font-semibold text-blue-500 dark:text-blue-400">
                                    {{ $tec->tecno }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <label for="fullName" class="p-2 ">Editar</label>
            <style>
                [x-cloak] {
                    display: none;
                }

            </style>
            <select x-cloak id="select">
                @foreach ($tecnologies as $tecno)
                    <option value={{ $tecno->id }}>{{ $tecno->tecno }}</option>
                @endforeach
            </select>
            <div x-data="dropdown()" x-init="loadOptions()" class="flex flex-col w-full h-64 mx-auto md:w-1/2">
                <input name="values" type="hidden" x-bind:value="selectedValues()" required>
                <div class="relative inline-block w-full">
                    <div class="relative flex flex-col items-center">
                        <div x-on:click="open" class="w-full svelte-1l8159u">
                            <div
                                class="flex w-full p-4 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded-full shadow focus:outline-none focus:ring">
                                <div class="flex flex-wrap flex-auto">
                                    <template x-for="(option,index) in selected" :key="options[option].value">
                                        <div
                                            class="flex items-center justify-center w-2/5 px-2 py-1 m-1 font-medium text-teal-700 bg-white bg-teal-100 border border-teal-300 rounded-full ">
                                            <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                options[option]" x-text="options[option].text"></div>
                                            <div class="flex flex-row-reverse flex-auto">
                                                <div x-on:click="remove(index,option)">
                                                    <svg class="w-6 h-6 rounded-full fill-current hover:bg-blue-200 "
                                                        role="button" viewBox="0 0 20 20">
                                                        <path style="fill:#D1403F;" d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                   c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                   l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                   C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <div x-show="selected.length    == 0" class="flex-1">
                                        <input placeholder="Selecciona tecnologias" autocomplete="off"
                                            class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                            x-bind:value="selectedValues()" name="userTecno_up" id="userTecno_up" required>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 border-l border-gray-200 svelte-1l8159u">

                                    <button type="button" x-show="isOpen() === true" x-on:click="open"
                                        class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                        <svg version="1.1" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                            c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                            L17.418,6.109z" />
                                        </svg>

                                    </button>
                                    <button type="button" x-show="isOpen() === false" @click="close"
                                        class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                            c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                            " />
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4">
                            <div x-show.transition.origin.top="isOpen()"
                                class="absolute z-40 w-full overflow-y-auto bg-white rounded shadow top-100 lef-0 max-h-select svelte-5uyqqj"
                                x-on:click.away="close">
                                <div class="flex flex-col w-full">
                                    <template x-for="(option,index) in options" :key="option">
                                        <div>
                                            <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                @click="select(index,$event)">
                                                <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                    class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                    <div class="flex items-center w-full">
                                                        <div class="mx-2 leading-6" x-model="option" x-text="option.text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-4 mb-32 text-center">

            <button type="submit" onclick="Update()"
                class="justify-center w-32 p-3 mx-6 text-white bg-green-600 rounded-full shadow outline-none focus:bg-green-700 hover:bg-green-500"
                tabindex="4">Guardar</button>
        </div>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')

    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>



    <script>
        function dropdown() {
            return {
                options: [],
                selected: [],
                show: false,
                open() {
                    this.show = true
                },
                close() {
                    this.show = false
                },
                isOpen() {
                    return this.show === true
                },
                select(index, event) {

                    if (!this.options[index].selected) {

                        this.options[index].selected = true;
                        this.options[index].element = event.target;
                        this.selected.push(index);

                    } else {
                        this.selected.splice(this.selected.lastIndexOf(index), 1);
                        this.options[index].selected = false
                    }
                },
                remove(index, option) {
                    this.options[option].selected = false;
                    this.selected.splice(index, 1);


                },
                loadOptions() {
                    const options = document.getElementById('select').options;
                    for (let i = 0; i < options.length; i++) {
                        this.options.push({
                            value: options[i].value,
                            text: options[i].innerText,
                            selected: options[i].getAttribute('selected') != null ? options[i].getAttribute(
                                'selected') : false
                        });
                    }
                },
                selectedValues() {
                    return this.selected.map((option) => {
                        return this.options[option].value;
                    })
                }
            }
        }

    </script>




    <script>
        var title = document.getElementById("title")
        var experience = document.getElementById("experience")
        var salary = document.getElementById("salary")
        var currency = document.getElementById("currency")
        var descriptionjob = document.getElementById("descriptionjob")
        var state = document.getElementById("state")
        var userTecno_up = document.getElementById("userTecno_up")
        var lugar = document.getElementById("lugar")


        function Update() {

            if (title.value != "" & experience.value != "" & salary.value !== "" & lugar.value !== "" & currency
                .value !== "" & descriptionjob.value !== "" & state.value !== "" & userTecno_up.value !== "") {
                swal.fire('¡Tu vacante ha sido actulizada!')
            } else {
                swal.fire("¡Llena todos los campos!")
            }

        }

    </script>



@stop
