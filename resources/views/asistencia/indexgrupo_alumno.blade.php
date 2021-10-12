<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            GESTIÓN DE ASIGNACIÓN DE GRUPOS
        </h2>

        <div class="row">
            <div class="">
                <a href="{{ url('/asistencia/grupo_alumnosgeneral') }}" class="btn btn-warning">Modificar grupo especifico</a>
            </div>
        </div>
        <div class="row">
            <div class="">
                <a href="{{url('/asistencia/grupo_alumnos/create')}}" class="btn btn-success">Asignar alumno a un grupo</a>
            </div>
        </div>
       
    </x-slot>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    
@if (Session::has('Mensaje'))
<div class="alert alert-warning alert-dismissable"> 
    {{Session::get('Mensaje')}}
</div>
@endif
{{-- xd --}}

<div class="wrapper wrapper--w790">
    <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
            
        <div class="row">
            
            <label for="" > <br><h4 style="color:#f9fbfc;">Acceso rápido a creaciones</h4></label>
        </div>
        
    <div class="row">
        <div class="">
            <label for="" style="color:#f9fbfc;">Crear nuevo Alumno</label>
            <a href="{{ url('/formtutores/create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
     
    <div class="row">
        <div class="">
            <label for="" style="color:#f9fbfc;">Crear nuevo Grupo</label>
            <a href="{{ url('/asistencia/grupos/create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
    
    </div>
    <br>
    <div class="card card-5">
        <div class="table-responsive">   
    <table class="table table-light table-bordered table-hover"  >
        <thead class="thead-dark">
            <div class="card-heading">
                <a class="btn btn-info" href="{{route('GruposAsignadosPDF')}}" target="blank">DESCARGAR TABLA PDF</a>
                <H2 class="title">ASIGNACIONES DE ALUMNOS A GRUPOS</H2>
            </div>
            <tr>
                <th class="card-title">ACCIONES</th>
                <th class="card-title">ID DE REGISTRO</th>
                <th class="card-title">ALUMNOS</th>
                <th class="card-title">GRUPO</th>
                <th class="card-title">ENTRENADOR</th>
                <th class="card-title">ESTADO</th>
                
             
            </tr>
        
        </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr> <td>
         
                    <a class="btn btn-warning" href="{{ url('/asistencia/grupo_alumnos/' . $dato->idregistro . '/edit') }}">
                        Editar
                    </a>
                    </td>
                    <td>{{$dato->idregistro}}</td>
                    <td>{{$dato->nombres}} {{$dato->apellido_paterno}} {{$dato->apellido_materno}}</td>
                    <td>{{$dato->nivel}} {{$dato->grado}} {{$dato ->seccion}}</td>
                    <td>{{$dato->nombresentrenador}} {{$dato->paternoentrenador}} {{$dato->maternoentrenador}}</td>
                    <td>{{$dato->estado}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>     
    </div>
    <div class="pagination">
        {{ $datos->links() }}
    </div>
</div>


<br>
<br>
   

  
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="table-responsive">   
        <table class="table table-light table-bordered table-hover"  >
            <thead class="thead-dark">
                <div class="card-heading">
                    <H2 class="title">ALUMNOS REGISTRADOS</H2>
                </div>
                <tr>
                    <th class="card-title">ID del Alumno</th>
                    <th class="card-title">Alumno</th>
                </tr>
            
            </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        
                    <tr>    
                        
                        <td>{{$alumno->id}}</td>
                        <td>{{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
        <div class="pagination">
            {{ $alumnos->links() }}
        </div>      
        </div>
    </div>
    

    <br>
    <br>


    
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="table-responsive">   
        <table class="table table-light table-bordered table-hover"  >
            <thead class="thead-dark">
                <div class="card-heading">
                    <H2 class="title">GRUPOS CREADOS Y ESTATUS</H2>
                </div>
                <tr>
                    
                    <th class="card-title">ID</th>
                    <th class="card-title">NIVEL</th>
                    <th class="card-title">GRADO</th>
                    <th class="card-title">SECCIÓN</th>
                    <th class="card-title">ESTATUS</th>
                 
                </tr>
            
            </thead>
                <tbody>
                    @foreach ($grupos as $grupo)                        
                    <tr>    
                        <td>{{$grupo->id}}</td>
                        <td>{{$grupo->nivel}}</td>
                        <td>{{$grupo->grado}}</td>
                        <td>{{$grupo->seccion}}</td>
                        <td>{{$grupo->estado}}</td>
                        
                    </tr>
                    @endforeach            
                </tbody>            
            </table> 
            </div>
            <div class="pagination">
                {{ $grupos->links() }}
            </div>
        </div>
    </div>
    
    
    <br>
    <br>


</div>
</x-app-layout>
  







   













