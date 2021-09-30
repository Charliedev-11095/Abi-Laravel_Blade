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

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <a href="{{url('formtutores')}}"><img src="{{asset('images/icons/back-icon.png')}}"></a>
                    <h2 class="title">Registro de tutor </h2>
                </div>
                <div class="card-body">

<div class="form-row wrap-input100 validate-input">
    <div class="name ">Nombre(s)</div>
        <div class="input-group wrap-input100 validate-input" >
            <input id="nombres" class="input100" type="text" name="nombres" 
            value="{{isset($tutor->nombres)?$tutor->nombres:''}}" required autofocus autocomplete="nombres"/>
            <span class="focus-input100 "></span>
    <span class="symbol-input100">
        <i class="fa fa-envelope"></i>
    </span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input" >
    <div class="name ">Apellidos</div>
    <div class="input-group wrap-input100 validate-input ">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="apellido_paterno" class=" input101 " type="text " name="apellido_paterno" value="{{isset($tutor->apellido_paterno)?$tutor->apellido_paterno:''}}" required autofocus autocomplete="apellido_paterno">
                    <span class="focus-input100 "></span>
                    <label class="label--desc">Apellido Paterno</label>
                </div>
                <br>
            </div>
            <div class="col-9 wrap-input100 validate-input">
            <div class="input-group-desc ">
                <input id="apellido_materno" class=" input101 " type="text " name="apellido_materno" name="apellido_materno" value="{{isset($tutor->apellido_materno)?$tutor->apellido_materno:''}}" required autofocus autocomplete="apellido_materno">
                <span class="focus-input100 "></span>
                <label class="label--desc">Apellido Materno</label>
                </div>
                <br>
        </div>
    </div>
</div>

<div class="form-row wrap-input100 validate-input" >
<div class="name ">Calle</div>
<div class="input-group wrap-input100 validate-input">
    <input id="calle" class="input101" type="text" name="calle" value="{{isset($tutor->calle)?$tutor->calle:''}}" required autofocus autocomplete="calle"/>
    <span class="focus-input100 "></span>
</div>
</div>
    <div class="name ">Número</div>
    <div class="input-group wrap-input100 validate-input ">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="numero_interior" class=" input101 " type="text " name="numero_interior" value="{{isset($tutor->numero_interior)?$tutor->numero_interior:''}}" required autofocus autocomplete="numero_interior">
                    <span class="focus-input100 "></span>
                    <label class="label--desc">numero interior</label>
                </div>
                <br>

            </div>
            <div class="col-9 wrap-input100 validate-input ">
                <div class="input-group-desc ">
                    <input id="numero_exterior" class=" input101 " type="text " name="numero_exterior" value="{{isset($tutor->numero_exterior)?$tutor->numero_exterior:''}}" required autofocus autocomplete="numero_exterior">
                    <span class="focus-input100 "></span>
                    <label class="label--desc">numero exterior</label>
                </div>
                <br>
            </div>
        </div>
    </div>

    <div class="form-row wrap-input100 validate-input">
    <div class="name ">Colonia</div>
        <div class="input-group wrap-input100 validate-input">
            <input id="colonia" class="input101" type="text" name="colonia"value="{{isset($tutor->colonia)?$tutor->colonia:''}}" required autofocus autocomplete="colonia"/>
            <span class="focus-input100 "></span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input">
    <div class="name ">Ciudad</div>
        <div class="input-group wrap-input100 validate-input">
            <input id="ciudad" class="input101" type="text" name="ciudad" value="{{isset($tutor->ciudad)?$tutor->ciudad:''}}" required autofocus autocomplete="ciudad"/>
            <span class="focus-input100 "></span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input">
    <div class="name ">Estado</div>
        <div class="input-group wrap-input100 validate-input">
            <input id="estado" class="input101" type="text" name="estado" value="{{isset($tutor->estado)?$tutor->estado:''}}"required autofocus autocomplete="estado" />
            <span class="focus-input100 "></span>
        </div>
</div>

<div class=" form-row m-b-55 wrap-input100 validate-input ">
    <div class="name ">Extras</div>
    <div class="input-group wrap-input100 validate-input">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="Codigo_Postal" class=" input101 " type="number" name="Codigo_Postal" value="{{isset($tutor->codigo_postal)?$tutor->codigo_postal:''}}" required autofocus autocomplete="Codigo_Postal">
                    <span class="focus-input100 "></span>
                    <label class="label--desc">Codigo Postal</label>
                </div>
                <br>
            </div>
            <div class="col-9 wrap-input100 validate-input ">
                <div class="input-group-desc ">
                    <input id="curp" class=" input101 " type="text " name="curp" value="{{isset($tutor->curp)?$tutor->curp:''}}" required autofocus autocomplete="curp">
                    <span class="focus-input100 "></span>
                    <label class="label--desc">Curp</label>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<div class=" form-row m-b-55 wrap-input100 validate-input ">
    <div class="name ">fecha de nacimiento</div>
    <div class="input-group wrap-input100 validate-input ">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="fecha_de_nacimiento" class=" input101 " type="date" name="fecha_de_nacimiento" value="{{isset($tutor->fecha_de_nacimiento)?$tutor->fecha_de_nacimiento:''}}" required autofocus autocomplete="fecha_de_nacimiento" fecha">
                    <span class="focus-input100 "></span>
                </div>
            </div>
            <div class="col-9 wrap-input100 validate-input ">
                <div class="input-group-desc ">
                    <input id="telefono" class=" input100 " type="number" name="telefono"value="{{isset($tutor->telefono)?$tutor->telefono:''}}" required autofocus autocomplete="telefono" teléfono">
                    <span class="focus-input100 "></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone"></i>
                    </span>
                    <label class="label--desc">teléfono</label>
                </div>
            </div>

            <div class="hide">
                    <div class="input-group wrap-input100 validate-input">
                        <input id="alta_usuario" class="input101" type="text" name="alta_usuario" value="{{Auth::user()->id}}"/>
                        <span class="focus-input100 "></span>
                    </div>
            </div>

        </div>
    </div>
</div>

<div class="container-login100-form-btn ">
<input class="btn btn--radius-2 login100-form-btn validate-form " type="submit" value="{{$modo=='crear'?'agregar':'editar'}} ">
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