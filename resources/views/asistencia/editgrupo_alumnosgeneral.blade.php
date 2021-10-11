<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                
                GESTIÓN DE ASIGNACIÓN DE GRUPOS
            </h2>
    
            <div class="row">
                <div class="">
                    <a href="{{url('/asistencia/grupo_alumnos')}}" class="btn btn-danger">Regresar</a>
                </div>
            </div>
           
        </x-slot>



        <div class="wrapper wrapper--w790">
            <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
        
        <form class="form-inline">
                        <div>
                            
                            <h4 style="color:#f9fbfc;">Modificar grupo y asignaciones especificas</h4>
                            <label for="" style="color:#f9fbfc;">Selecciona el grupo, para consultar las asignaciones y poder modificar </label>
                            <select name="buscarpor" id="buscarpor" class="input101">
                                <option value=""></option>
                                @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->nivel }}{{ ' '.$grupo->grado }}{{ $grupo->seccion }} {{ '----  Estado: '.$grupo->estado }}</option>
                            @endforeach
                            </select>
                            
                            <button type="submit" class="btn btn-danger ">CONSULTAR</button>
                        
                            <br>
                        </div>
                    </form>
        
        
            </div> 
        </div>
        <br>
<br>





<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
               
            <H2 class="title">MODIFICAR GRUPO</H2>
        </div>
        <div class="card-body">
            
<form class="form-inline">
@foreach ($datosgrupos as $datosgrupo)


<input type="hidden" name="idgrupo" value="{{$datosgrupo->id}}">
<input type="hidden" name="buscarpor" value="{{$datosgrupo->id}}">

<div class="form-group">
    <label class="control-label" for="nivel">Nivel</label>
    <select class="input100" type="text"  name="nivel" id="nivel">
    <option class="invalid-feedback2">{{$datosgrupo->nivel}}</option>
    <option>Inicial</option>
    <option>Básico</option>
    <option>Intermedio</option>
    <option>Avanzado</option>
</select>    
    {!! $errors->first('nivel','<div class="invalid-feedback">:message</div>') !!}
</div>

<br>

<div class="form-group">

    <label class="control-label" for="grado">Grado</label>
    <select class="input100" type="text"  name="grado" id="grado">

        {{-- invalid-feedback2 sirve para marcar que era una opcion anterior --}}
        <option class="invalid-feedback2">{{$datosgrupo->grado}}</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
    </select>    
    {!! $errors->first('grado','<div class="invalid-feedback">:message</div>') !!}
</div>


<br>

<div class="form-group">
    <label class="control-label" for="seccion">Sección</label>
    <select class="input100" type="text" name="seccion" id="seccion">
        <option class="invalid-feedback2">{{$datosgrupo->seccion}}</option>
        <option>A</option>
        <option>B</option>
    </select>    
    {!! $errors->first('seccion','<div class="invalid-feedback">:message</div>') !!}
</div>

<br>

<div class="form-group">
    <label class="control-label" for="estado">Estado</label>
    <select class="input100" type="text" name="estado" id="estado">
    <option class="invalid-feedback2">{{$datosgrupo->estado}}</option>
    <option>Activo</option>
    <option>Inactivo</option>
</select>    

    {!! $errors->first('estado','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="Modificar">
    
@endforeach
</form>

        </div>


    </div>
</div>



<br>
<div class="wrapper wrapper--w790">
<div class="card card-5">
    <div class="table-responsive">   
    <table class="table table-light table-bordered table-hover"  >
        <thead class="thead-dark">
            <div class="card-heading">
               
                <H2 class="title">MODIFICAR ASIGNACIONES DE ALUMNO</H2>
            </div>
            <tr>
                
                <th class="card-title">ID DE REGISTRO</th>
                <th class="card-title">ALUMNOS</th>
                <th class="card-title">GRUPO</th>
                <th class="card-title">ENTRENADOR</th>
                <th class="card-title">ESTADO</th>
                <th class="card-title">ACCIONES</th>
             
            </tr>
        
        </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr>
                    <td>{{$dato->idregistro}}</td>
                    <td>{{$dato -> nombres}} {{$dato -> apellido_paterno}} {{$dato -> apellido_materno}}</td>
                    <td>{{$dato -> nivel}} {{$dato -> grado}} {{$dato -> seccion}}</td>
                    <td>{{$dato -> nombresentrenador}} {{$dato -> paternoentrenador}} {{$dato -> maternoentrenador}}</td>
                    <td>{{$dato -> estado}}</td>
                    <td>
              
                    
                    <a class="btn btn-warning" href="{{ url('/asistencia/grupo_alumnos/' . $dato->idregistro . '/edit') }}">
                        Editar
                    </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>   
        </div>  
    </div>
</div>
</div>


    </div>
</x-app-layout>