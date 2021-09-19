
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
   
    <!-- Title Page-->
    <title>formulario</title>

   
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <a href="{{url('formentrenadores')}}"><img src="{{asset('images/icons/back-icon.png')}}"></a>
                    <h2 class="title">Registro de entrenador </h2>
                </div>
                <div class="card-body">
<div class="form-row wrap-input100 validate-input">
    <div class="name ">Nombre(s)</div>
        <div class="input-group wrap-input100 validate-input" >
            <input id="nombres" class="input100" type="text" name="nombres" value="{{isset($entrenador->nombres)?$entrenador->nombres:''}}" required autofocus autocomplete="nombres">
            <span class="focus-input100 "></span>
    <span class="symbol-input100">
        <i class="fa fa-user"></i>
    </span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input" >
    <div class="name ">Apellidos</div>
    <div class="input-group wrap-input100 validate-input ">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="apellido_paterno" class=" input101 " type="text " name="apellido_paterno" value="{{isset($entrenador->apellido_paterno)?$entrenador->apellido_paterno:''}}" required autofocus autocomplete="apellido_paterno">
                    <span class="focus-input100 "></span> 
                    <label class="label--desc">Apellido Paterno</label>
                </div>
                <br>
            </div>
            <div class="col-9 wrap-input100 validate-input">
            <div class="input-group-desc ">
                <input id="apellido_materno" class=" input101 " type="text " name="apellido_materno" name="apellido_materno" value="{{isset($entrenador->apellido_materno)?$entrenador->apellido_materno:''}}" required autofocus autocomplete="apellido_materno">
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
    <input id="calle" class="input101" type="text" name="calle" value="{{isset($entrenador->calle)?$entrenador->calle:''}}" required autofocus autocomplete="calle">
    <span class="focus-input100 "></span>
</div>
</div>
    <div class="name ">Número</div>
    <div class="input-group wrap-input100 validate-input ">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="numero_interior" class=" input101 " type="text " name="numero_interior" value="{{isset($entrenador->numero_interior)?$entrenador->numero_interior:''}}" required autofocus autocomplete="numero_interior">
                    <span class="focus-input100 "></span>
                    <label class="label--desc">Número interior</label>
                </div>
                <br>
            </div>
            <div class="col-9 wrap-input100 validate-input ">
                <div class="input-group-desc ">
                    <input id="numero_exterior" class=" input101 " type="text " name="numero_exterior" value="{{isset($entrenador->numero_exterior)?$entrenador->numero_exterior:''}}" required autofocus autocomplete="numero_exterior" >
                    <span class="focus-input100 "></span>
                    <label class="label--desc">Número exterior</label>
                </div>
                <br>
            </div>
        </div>
    </div>

    <div class="form-row wrap-input100 validate-input">
    <div class="name ">Colonia</div>
        <div class="input-group wrap-input100 validate-input">
            <input id="colonia" class="input101" type="text" name="colonia" value="{{isset($entrenador->colonia)?$entrenador->colonia:''}}" required autofocus autocomplete="colonia">
            <span class="focus-input100 "></span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input">
    <div class="name ">Ciudad</div>
        <div class="input-group wrap-input100 validate-input">
            <input id="ciudad" class="input101" type="text" name="ciudad" value="{{isset($entrenador->ciudad)?$entrenador->ciudad:''}}"required autofocus autocomplete="ciudad" >
            <span class="focus-input100 "></span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input">
    <div class="name ">Estado</div>
        <div class="input-group wrap-input100 validate-input">
            <input id="estado" class="input101" type="text" name="estado" value="{{isset($entrenador->estado)?$entrenador->estado:''}}"  required autofocus autocomplete="estado" >
            <span class="focus-input100 "></span>
        </div>
</div>

<div class=" form-row m-b-55 wrap-input100 validate-input ">
    <div class="name ">Extras</div>
    <div class="input-group wrap-input100 validate-input">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="codigo_postal" class="input101" type="number" name="codigo_postal" value="{{isset($entrenador->codigo_postal)?$entrenador->codigo_postal:''}}"  required autofocus autocomplete="codigo_postal" >
                    <span class="focus-input100 "></span>
                    <label class="label--desc">Código Postal</label>
                </div>
                <br>
            </div>
            <div class="col-9 wrap-input100 validate-input ">
                <div class="input-group-desc ">
                    <input id="curp" class=" input101 " type="text " name="curp" value="{{isset($entrenador->curp)?$entrenador->curp:''}}" required autofocus autocomplete="curp">
                    <span class="focus-input100 "></span>
                    <label class="label--desc">Curp</label>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>



<div class="form-row wrap-input100 validate-input">
    <div class="name ">Correo electrónico</div>
        <div class="input-group wrap-input100 validate-input">
            <input id="email" class="input101" type="email" name="email" value="{{isset($alumno->email)?$alumno->email:''}}" required autofocus autocomplete="email">
            <span class="focus-input100 "></span>
        </div>
</div>




<div class=" form-row m-b-55 wrap-input100 validate-input ">
    <div class="name ">fecha de nacimiento</div>
    <div class="input-group wrap-input100 validate-input ">
        <div class="row row-refine ">
            <div class="col-3 ">
                <div class="input-group-desc ">
                    <input id="fecha_de_nacimiento" class=" input101 " type="date" name="fecha_de_nacimiento"value="{{isset($entrenador->fecha_de_nacimiento)?$entrenador->fecha_de_nacimiento:''}}"required autofocus autocomplete="fecha_de_nacimiento">
                    <span class="focus-input100 "></span>
                </div>
            </div>
            <div class="col-9 wrap-input100 validate-input ">
                <div class="input-group-desc ">
                    <input id="telefono" class=" input100 " type="number" name="telefono" value="{{isset($entrenador->telefono)?$entrenador->telefono:''}}" required autofocus autocomplete="telefono" >
                    <span class="focus-input100 "></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone"></i>
                    </span>
                    <label class="label--desc">teléfono</label>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="form-row wrap-input100 validate-input">
    <div class="name ">Perfil</div>

    <div class="form-row wrap-input100 validate-input">
                                         
    <select class="form-select input100 " type="text " required="" autofocus="" name="users_id" id="users_id" field_signature="2541737874" form_signature="17623335736681668379">
       @foreach ($users as $user)
       
       <option class=" input100 invalid-feedback2" value="{{$user->id}}">

       Usuario: {{$user->name}}  -|-  Correo: {{$user->email}}
    
    </option>
    @endforeach
    </select>
   
    <span class="focus-input100 "></span>
       <span class="symbol-input100">
           <i class="fa fa-arrow-down"></i>
       </span>
   </div>
</div> --}}

<div class="container-login100-form-btn ">
    <input class="btn btn--radius-2 btn--red login100-form-btn validate-form " type="submit" value="{{$modo=='crear'?'agregar':'editar'}} ">
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