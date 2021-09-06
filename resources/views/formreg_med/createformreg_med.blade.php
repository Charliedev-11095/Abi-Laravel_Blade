<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('Gestión de formulario de registro médico')}}
        </h2>
    </x-slot>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>formulario</title>

    <!-- Icons font CSS-->
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

   
    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
                    <form action="{{url('/formreg_med')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('formreg_med.formreg_med',['modo'=>'crear'])
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js "></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js "></script>
    <script src="vendor/datepicker/moment.min.js "></script>
    <script src="vendor/datepicker/daterangepicker.js "></script>

    <!-- Main JS-->
    <script src="js/global.js "></script>
    <script src="js/main.js "></script>

</body>
</html>

</x-app-layout>