<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                
                GESTIÓN DE ASIGNACIÓN DE EQUIPOS DE TRABAJO
            </h2>
    
            <div class="row">
                <div class="">
                    <a href="{{url('/team_entrenadores')}}" class="btn btn-danger">Regresar</a>
                </div>
            </div>
           
        </x-slot>



        <div class="wrapper wrapper--w790">
            <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
        
        <form class="form-inline">
                        <div>
                            
                            <h4 style="color:#f9fbfc;">Modificar equipo de trabajo o entrenadores asignados</h4>
                            <label for="" style="color:#f9fbfc;">Selecciona equipo de trabajo, para consultar las asignaciones y poder modificar </label>
                            <select name="buscarpor" id="buscarpor" class="input101" required>
                                <option value="">Seleccione un equipo de trabajo</option>
                                @foreach ($teams as $team)
                                <option value="{{ $team->id }}"> {{ $team->nombre }}{{ '----  Estatus: '.$team->status }}</option>
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
               
            <H2 class="title">MODIFICAR EQUIPO DE TRABAJO</H2>
        </div>
        <div class="card-body">
            
<form >
@foreach ($datosteams as $datosteam)


<input type="hidden" name="idteam" value="{{$datosteam->id}}">
<input type="hidden" name="buscarpor" value="{{$datosteam->id}}">
<div class="form-group"><h3>{{$datosteam->nombre}}</h3></div>
<div class="form-group">
    <label class="control-label" for="nivel">{{$datosteam->descripcion}}</label>
</div>

<br>

<div class="form-group">
    <label class="control-label" for="estado">Estatus</label>
    <select class="input100" type="text" name="status" id="status">
    <option class="invalid-feedback2">{{$datosteam->status}}</option>
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
                <th class="card-title">ACCIONES</th>
                <th class="card-title">ID DE REGISTRO</th>
                <th class="card-title">ENTRENADOR</th>
                <th class="card-title">ESTATUS</th>
             
             
            </tr>
        
        </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr>
                    <td>
              
                    
                        <a class="btn btn-warning" href="{{ url('/asistencia/grupo_alumnos/' . $dato->idregistro . '/edit') }}">
                            Editar
                        </a>
                        </td>
                    <td>{{$dato->idregistro}}</td>
                    <td>{{$dato -> nombresentrenador}} {{$dato -> paternoentrenador}} {{$dato -> maternoentrenador}}</td>
                    <td>{{$dato -> status}}</td>
             
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