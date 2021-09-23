<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="{{ url('css/basketball.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('basketball.png') }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>ABI</title>
        <style>
            
        </style>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
        {{-- ---------------------------------------- --}}
        {{-- estilos del calendario --}}

        <link href='{{asset('core/main.css')}}' rel='stylesheet' />
        <link href='{{asset('daygrid/main.css')}}' rel='stylesheet' />
        <link href='{{asset('timegrid/main.css')}}' rel='stylesheet' />
        <script src='{{asset('list/main.css')}}'></script>
        <script src='{{asset('core/main.js')}}'></script>
        <script src='{{asset('core/locales/es.js')}}'></script>
        <script src='{{asset('interaction/main.js')}}'></script>
        <script src='{{asset('daygrid/main.js')}}'></script>
        <script src='{{asset('timegrid/main.js')}}'></script>
        <script src='{{asset('list/main.js')}}'></script>
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    
       {{-- ---------------------------------------- --}}
        <!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
         <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        
    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
    
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    

    <!-- Modernizr JS -->
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- jQuery -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- jQuery Easing -->
        <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Waypoints -->
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <!-- Stellar Parallax -->
        <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        <!-- Carousel -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <!-- Main -->
        <script src="{{ asset('js/main.js') }}"></script>


        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <script src="{{ asset('js/calendar.js') }}" defer></script>
            <script src="{{ asset('js/url.js') }}" defer></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
