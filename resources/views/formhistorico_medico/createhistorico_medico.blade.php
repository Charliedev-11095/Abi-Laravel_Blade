<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                GESTIÓN DE HISTÓRICOS MÉDICOS
            </h2>
        </x-slot>

        @if (count($errors) > 0)
            <div class="alert alert-warning alert-dismissable" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="wrapper wrapper--w790">

            <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
                <div class="row" >
                
                    <form class="form-inline">
                        <div>
                            
                            <h4 style="color:#f9fbfc;">Buscar Alumno</h4>
                            <label for="" style="color:#f9fbfc;">Selecciona alumno para añadirlo en el regístro</label>
                            <select name="buscarpor"  class="input101">
                                @foreach ($alumnos as $alumno)
                                    <option value="{{ $alumno->id }}">
                                        {{ $alumno->nombres }} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}
                                    </option>
                                @endforeach
                            </select>
                            <br>   
                            <button type="submit" class="btn btn-danger ">CONSULTAR</button>        
                        </div>
                    </form>
                </div>
            </div>
            <br>

            <div class="card card-5">
                <div class="card-heading">
                    <a href="{{url('formhistorico_medico')}}"><img src="{{asset('images/icons/back-icon.png')}}"></a>
                    <H2 class="title">Crear histórico médico</H2>
                </div>
                <div class="card-body">

                    <form action="{{ url('/formhistorico_medico') }}" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label" for="fecha_creacion">Fecha de creación</label>
                            <input readonly class="input101 {{$errors->has('fecha_creacion')?'is-invalid':old('fecha_creacion')}}" type="date" name="fecha_creacion" id="fecha_creacion" value="{{ date('Y-m-d') }}">
                        
                            {!! $errors->first('fecha_creacion','<div class="invalid-feedback">:message</div>') !!}
                        
                        </div>


                        @foreach ($historicos_medicos as $historicos_medico)
                        <div class="card-body" style="border: 2px solid black">

                        <div class="form-group">
                            <label class="control-label" for="alumnos_id"><h3>{{ $historicos_medico->nombres  }} {{ $historicos_medico->apellido_paterno  }} {{ $historicos_medico->apellido_materno  }}</h3></label>
                            <input type="hidden"  name="alumnos_id"  class="input101" value="{{ $historicos_medico->alumnos_id  }}">
                            {!! $errors->first('alumnos_id','<div class="invalid-feedback">:message</div>') !!}
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="estatura">última estatura registrada: {{ $historicos_medico->estatura  }} centimetros</label>
                           
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="peso">último peso registrado: {{ $historicos_medico->peso  }} kilos</label>
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="presion_arterial">última presión arterial registrada: {{ $historicos_medico->presion_arterial  }} mm Hg</label>
                        </div>


                    </div>
                        @endforeach
{{-- --------------------------------------------------------------------------- --}}
<br>


<div class="form-group">
    <label class="control-label" for="estatura">Nuevo regístro de estatura</label>
    <input type="text"  name="estatura"  class="input101" >
    {!! $errors->first('estatura','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label class="control-label" for="peso">Nuevo regístro de peso</label>
    <input type="text"  name="peso"  class="input101">
    {!! $errors->first('peso','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label class="control-label" for="presion_arterial">Nuevo regístro de presión</label>
    <input type="text"  name="presion_arterial" class="input101">
    {!! $errors->first('presion_arterial','<div class="invalid-feedback">:message</div>') !!}
</div>
<br>

<div class="form-group">
    <label class="control-label" for="comentarios">Comentarios sobre alumno</label>
    <textarea id="comentarios" class="input101 {{$errors->has('comentarios')?'waiting-form':old('comentarios')}}" name="comentarios" rows="10" cols="50" value="{{ isset($historicos_deportivo->comentarios)?$historicos_deportivo->comentarios:'' }}">...</textarea>
    {!! $errors->first('comentarios','<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="">

<input type="submit" class="btn btn-success" value="Crear">

{{-- Se agrega para para dirigirse a listadogrupos o principal de grupos --}}

</div>
</div>

                    </form>
                </div>
            </div>
        </div>




    </div>
</x-app-layout>
