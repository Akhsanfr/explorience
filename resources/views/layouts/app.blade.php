<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tema" :data-theme="dark ? 'dark' : 'light'">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('head')

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- @stack('styles') --}}

        {{-- Icon Title --}}
        <link rel="icon" href="{{ asset('img/logo.png') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-base-100 leading-4" x-data="{ imgShow : false , imgSrc : '', imgTitle : '' }">
        {{-- Show Image --}}
        <div class="fixed top-0 left-0 bg-base-300 bg-opacity-80 w-screen h-screen z-50 flex flex-col justify-center items-center" x-show="imgShow">
            <div class="flex flex-col space-y-4">
                <div class="card bg-base-100 flex flex-row items-center justify-between space-x-2">
                    <span x-text="imgTitle"></span>
                    <button @click="imgShow = false" class="btn btn-xs btn-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="card bg-base-100">
                    <img :src="imgSrc" alt="" class="max-h-4/5-screen">
                </div>
            </div>
        </div>
        <livewire:c.header >
            <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <livewire:c.footer>
        @livewireScripts
        @stack('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('tema', () => ({
                    dark : true,
                    setTema(){
                        if(this.dark){
                            localStorage.setItem('tema', 'light')
                            this.dark = false;
                        } else {
                            localStorage.setItem('tema', 'dark')
                            this.dark = true;
                        }
                    },
                    cekTema(){
                        return this.dark = localStorage.getItem('tema') === 'dark' ? true : false;
                    },
                    init(){
                        this.cekTema();
                    }
                }))
            })
        </script>
    </body>
</html>
