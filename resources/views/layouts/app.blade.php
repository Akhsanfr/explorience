<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tema()" :data-theme="tema" x-init="cekTema()">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-base-100 leading-4">
        <livewire:c.header >
            <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <livewire:c.footer>
        <script>
            function tema(){
                return {
                    tema : 'dark',
                    setTema(){
                        console.log(this.tema);
                        if(this.tema == 'light'){
                            document.cookie = "tema=dark; expires= 18 Dec 2022 12:00:00 UTC; SameSite=None; Secure";
                            this.tema = 'dark';
                        } else {
                            document.cookie = "tema=light; expires= 18 Dec 2022 12:00:00 UTC; SameSite=None; Secure";
                            this.tema = 'light';
                        }
                    },
                    cekTema(){
                        let tema;
                        let key = 'tema';
                        Cookies = decodeURIComponent(document.cookie).split(';');
                        Cookies.forEach((e)=>{
                            Cookie = e.substr(1);
                            NamaCookie = Cookie.split('=')[0];
                            if(NamaCookie == key){
                                tema = Cookie.split('=')[1];
                            }
                        });
                        return this.tema = tema;
                    }
                }
            }
        </script>
    </body>
</html>
