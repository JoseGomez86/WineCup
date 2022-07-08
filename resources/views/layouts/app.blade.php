<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="logoWC.png">
    <title>{{ config('Wine Cup', 'Wine Cup') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    {{-- Hlider --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css"
        integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- Glider --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"
        integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script> --}}
    {{-- FlexSlider Slider para imagenes --}}
    <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}" defer></script>
    {{-- cdn para alertas --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-200">
        @livewire('navigation')
        <main>
            {{ $slot }}
        </main>
    </div>
    @stack('modals')

    @livewireScripts
    {{-- Script para el menu desplegable de categorias --}}
    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {
                        //Se cierra el menú
                        this.open = false;
                        //Muestra el scroll de la pagina
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    } else {
                        //Se abre el menú
                        this.open = true;
                        //Oculta el scroll de la pagina
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                },
                close() {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                }
            }
        }
    </script>
    @stack('scriptGlider')
    @stack('scriptFlexSlider')
    {{-- Script para alertas --}}
    <script>
        Livewire.on('alert', function(title,message,type) {
            Swal.fire(
                title,
                message,
                type
            )
        })
    </script>
</body>

</html>