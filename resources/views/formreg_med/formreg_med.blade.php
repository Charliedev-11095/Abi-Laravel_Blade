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
                    <a href="{{url('formreg_med')}}"><img src="{{asset('images/icons/back-icon.png')}}"></a>
                    <h2 class="title">Regístro médico </h2>
                </div>
                <div class="card-body">
                         <center><h1>Ingresa los siguientes datos:</h1></center><br>
                         <div class="form-row wrap-input100 validate-input" >
                             <div class="input-group wrap-input100 validate-input ">
                                 <div class="row row-refine ">
                                    <div class="name ">Alumno</div>
                                    <div class="form-row wrap-input100 validate-input">         
                                    <select class="form-select input100 " type="text " required="" autofocus="" name="alumnos_id" id="alumnos_id" field_signature="2541737874" form_signature="17623335736681668379">
                                        @foreach ($alumnos as $alumno)
                                       
                                       <option class=" input100 invalid-feedback2" value="{{$alumno->id}}">
                                
                                       {{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}
                                    
                                    </option>
                                    @endforeach
                                    </select>
                                   
                                    <span class="focus-input100 "></span>
                                       <span class="symbol-input100">
                                           <i class="fa fa-arrow-down"></i>
                                       </span>
                                   </div>
                                     <div class="col-3 ">
                                         <div class="input-group-desc ">
                                             <input id="estatura" class=" input101 " name="estatura" value="{{isset($regmed->estatura)?$regmed->estatura:''}}" required autofocus autocomplete="estatura">
                                             <span class="focus-input100 "></span>
                                             <label class="label--desc">estatura</label>
                                            </div>
                                            <br>
                                     </div>
                                     <div class="col-9 wrap-input100 validate-input">
                                     <div class="input-group-desc ">
                                         <input id="peso" class=" input101 " type="text" name="peso" name="peso" value="{{isset($regmed->peso)?$regmed->peso:''}}" required autofocus autocomplete="peso">
                                         <span class="focus-input100 "></span>
                                         <label class="label--desc">peso</label>
                                        </div>
                                        <br>
                                 </div>
                             </div>
                         </div>
 
                         <div class="form-row wrap-input100 validate-input" >
                            <div class="name ">presión arterial</div>
                                 <div class="input-group wrap-input100 validate-input">
                                     <input id="presion_arterial" class="input101" type="text" name="presion_arterial" value="{{isset($regmed->presion_arterial)?$regmed->presion_arterial:''}}"required autofocus autocomplete="presion_arterial">
                                     <span class="focus-input100 "></span>
                                 </div>
                         </div>
 
                         <div class="input-group wrap-input100 validate-input ">
                             <div class="row row-refine ">
                                 <div class="col-3 ">
                                     <div class="input-group-desc ">
                                         {{-- <input id="tipo_sanguineo" class=" input101 " type="text " name="tipo_sanguineo" value="{{isset($regmed->tipo_sanguineo)?$regmed->tipo_sanguineo:''}}" required autofocus autocomplete="tipo_sanguineo"> --}}
                                         <select class="form-select input100 {{$errors->has('tipo_sanguineo')?'waiting-form':old('tipo_sanguineo')}}" type="text " value="{{isset($regmed->tipo_sanguineo)?$regmed->tipo_sanguineo:''}}" required autofocus autocomplete="tipo_sanguineo" name="tipo_sanguineo" id="tipo_sanguineo" required>
                                            <option class=" input100 invalid-feedback2" value="{{isset($regmed->tipo_sanguineo)?$regmed->tipo_sanguineo:''}}">{{isset($regmed->tipo_sanguineo)?$regmed->tipo_sanguineo:'selecciona una opcion'}}</option>
                                            <option >A+</option>
                                            <option >O+</option>
                                            <option >B+</option>
                                            <option>AB+</option>
                                            <option>A-</option>
                                            <option>O-</option>
                                            <option>B-</option>
                                            <option>AB-</option>
                                        </select>
                                        {!! $errors->first('grado','<div class="invalid-feedback">:message</div>') !!}
                                         <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-arrow-down"></i>
                                            </span>
                                         <label class="label--desc">tipo de sangre</label>
                                        </div>
                                        <br>
                                 </div>
                                 <div class="col-9 wrap-input100 validate-input ">
                                     <div class="input-group-desc ">
                                         <input id="edad" class=" input101 " type="number" name="edad" value="{{isset($regmed->edad)?$regmed->edad:''}}"required autofocus autocomplete="edad">
                                         <span class="focus-input100 "></span>
                                         <label class="label--desc">edad</label></label>
                                        </div>
                                        <br>
                                 </div>
                             </div>
                         </div>
 
                         <div class="form-row wrap-input100 validate-input" >
                            <div class="name ">padecimiento</div>
                                 <div class="input-group wrap-input100 validate-input">
                                     <input id="padecimiento" class="input101" type="text" name="padecimiento" value="{{isset($regmed->padecimiento)?$regmed->padecimiento:''}}" required autofocus autocomplete="padecimiento">
                                     <span class="focus-input100 "></span>
                                 </div>
                         </div>
 
                         <div class="input-group wrap-input100 validate-input ">
                             <div class="row row-refine ">
                                 <div class="col-3 ">
                                     <div class="input-group-desc ">
                                         <input id="tratamiento" class=" input101 " type="text " name="tratamiento" value="{{isset($regmed->tratamiento)?$regmed->tratamiento:''}}" required autofocus autocomplete="tratamiento">
                                         <span class="focus-input100 "></span>
                                         <label class="label--desc">tratamiento</label></label>
                                        </div>
                                        <br>
                                 </div>
                                 <div class="col-9 wrap-input100 validate-input ">
                                     <div class="input-group-desc ">
                                         <input id="alergia" class=" input101 " type="text " name="alergia" value="{{isset($regmed->alergia)?$regmed->alergia:''}}" required autofocus autocomplete="alergia">
                                         <span class="focus-input100 "></span>
                                         <label class="label--desc">alergia</label></label>
                                        </div>
                                        <br>
                                 </div>
                             </div>
                         </div>
                             
                         <div class="form-row wrap-input100 validate-input">
                            <div class="name ">conducta</div>
                                 <div class="input-group wrap-input100 validate-input">
                                     <input id="conducta" class="input101" type="text" name="conducta" value="{{isset($regmed->conducta)?$regmed->conducta:''}}" required autofocus autocomplete="conducta">
                                     <span class="focus-input100 "></span>
                                 </div>
                         </div>
 
                         <div class="input-group wrap-input100 validate-input ">
                             <div class="row row-refine ">
                                 <div class="col-3 ">
                                     <div class="input-group-desc ">
                                         <input id="impedimento_fisico" class=" input101 " type="text " name="impedimento_fisico" value="{{isset($regmed->impedimento_fisico)?$regmed->impedimento_fisico:''}}" required autofocus autocomplete="impedimento_fisico">
                                         <span class="focus-input100 "></span>
                                         <label class="label--desc">impedimento físico</label></label>
                                        </div>
                                        <br>
                                 </div>
                                 <div class="col-9 wrap-input100 validate-input ">
                                     <div class="input-group-desc ">
                                         <input id="condicion_fisica" class=" input101 " type="text " name="condicion_fisica" value="{{isset($regmed->condicion_fisica)?$regmed->condicion_fisica:''}}" required autofocus autocomplete="condicion_fisica">
                                         <span class="focus-input100 "></span>
                                         <label class="label--desc">condición física</label></label>
                                        </div>
                                        <br>
                                 </div>
                             </div>
                         </div>


            <div class="hide">
                <div class="input-group wrap-input100 validate-input">
                    <input id="alta_usuario" class="input101" type="text" name="alta_usuario" value="{{Auth::user()->id}}"/>
                    <span class="focus-input100 "></span>
                </div>
            </div>

                         
                         </div>
 
                         <div class="container-login100-form-btn ">
                             <input class="btn btn--radius-2 btn--red login100-form-btn validate-form " type="submit" value="{{$modo=='crear'?'agregar':'editar'}} ">
                         </div>
                 </div>