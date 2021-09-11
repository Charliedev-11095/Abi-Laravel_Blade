<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" type="image/png" href="{{ url('css/basketball.png') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>ABI</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


        <!-- Scripts -->
 <!--===============================================================================================-->
 <script src="vendor/jquery/jquery-3.2.1.min.js "></script>
 <!--===============================================================================================-->
 <script src="vendor/bootstrap/js/popper.js "></script>
 <script src="vendor/bootstrap/js/bootstrap.min.js "></script>
 <!--===============================================================================================-->
 <script src="vendor/select2/select2.min.js "></script>
 <!--===============================================================================================-->
 <script src="vendor/tilt/tilt.jquery.min.js "></script>
 <script>
     $('.js-tilt').tilt({
         scale: 1.1
     })
 </script>
 <!--===============================================================================================-->
 <script src="js/main.js "></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- ///////////////////////// INICIO DE LIBRERIAS APP.BLADE.PHP///////////////////////// --}}

        <!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">

        <!-- Bootstrap esta no permite que se vea el nombre del navbar -->
        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
        
        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">


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



{{-- ////////////////////////FIN DE LIBRERIAS APP.BLADE.PHP///////////////////////// --}}


    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}

        </div>
    </body>
</html>
