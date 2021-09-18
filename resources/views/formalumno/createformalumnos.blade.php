<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('Gestión de formulario de alumnos')}}
        </h2>
    </x-slot>

@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
</div>
@endif


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


</head>

<body>

                    <form action="{{url('/formalumnos')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('formalumno.formalumnos',['modo'=>'crear'])
                        <input type="hidden"  name="alta_usuario"  class="input101" value="{{Auth::user()->id}}">
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