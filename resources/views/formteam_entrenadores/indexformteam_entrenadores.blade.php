<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            GESTIÓN DE ASIGNACIÓN DE EQUIPOS DE TRABAJO
        </h2>

        <div class="row">
            <div class="">
                <a href="{{ url('/team_entrenadoresespecifico') }}" class="btn btn-warning">Modificar Equipo de trabajo especifico</a>
            </div>
        </div>
        <div class="row">
            <div class="">
                <a href="{{url('/team_entrenadores/create')}}" class="btn btn-success">Asignar entrenador a un Equipo de trabajo</a>
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
            <label for="" style="color:#f9fbfc;">Crear nuevo usuario Entrenador</label>
            <a href="{{ url('/formentrenadores/create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
     
    <div class="row">
        <div class="">
            <label for="" style="color:#f9fbfc;">Crear nuevo Equipo de trabajo</label>
            <a href="{{ url('/teams/create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
    
    </div>
    <br>
    <div class="card card-5">
        <div class="table-responsive">   
    <table class="table table-light table-bordered table-hover"  >
        <thead class="thead-dark">
            <div class="card-heading">
             
                <H2 class="title">ENTRENADORES ASIGNADOS A EQUIPO DE TRABAJO</H2>
            </div>
            <tr>
                <th class="card-title">ACCIONES</th>
                <th class="card-title">ID DE REGISTRO</th>
                <th class="card-title">EQUIPO DE TRABAJO</th>
                <th class="card-title">ENTRENADOR</th>
                <th class="card-title">ESTATUS</th>
                
             
            </tr>
        
        </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr> <td>
                    <a class="btn btn-warning" href="{{ url('/team_entrenadores/' . $dato->idregistro . '/edit') }}">
                        Editar
                    </a>
                    </td>
                    <td>{{$dato->idregistro}}</td>
                   
                    <td>{{$dato->nombre}}</td>
                    <td>{{$dato->nombresentrenador}} {{$dato->paternoentrenador}} {{$dato->maternoentrenador}}</td>
                    <td>{{$dato->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>     
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
                    <H2 class="title">ENTRENADORES REGISTRADOS</H2>
                </div>
                <tr>
                    <th  class="card-title">ID de Entrenador</th>
                    <th class="card-title">Entrenador</th>
                </tr>
            
            </thead>
                <tbody>     
                    @foreach ($entrenadores as $entrenador)                            
                    <tr>    
                        <td> {{$entrenador->id}}  </td>                     
                        <td>
                            {{$entrenador->nombres}} {{$entrenador->apellido_paterno}} {{$entrenador->apellido_materno}}
                        </td>                                              
                    </tr> 
                    @endforeach                               
                </tbody>       
            </table>        
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
                    <H2 class="title">EQUIPOS DE TRABAJO CREADOS Y ESTATUS</H2>
                </div>
                <tr>
                    
                    <th class="card-title">ID</th>
                    <th class="card-title">NOMBRE</th>
                    <th class="card-title">DESCRIPCION</th>
                    <th class="card-title">ESTATUS</th>
                 
                </tr>
            
            </thead>
                <tbody>
                    @foreach ($teams as $team)                        
                    <tr>    
                        <td>{{$team->id}}</td>
                        <td>{{$team->nombre}}</td>
                        <td>{{$team->descripcion}}</td>
                        <td>{{$team->status}}</td>
                        
                    </tr>
                    @endforeach            
                </tbody>            
            </table> 
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
</x-app-layout>
  