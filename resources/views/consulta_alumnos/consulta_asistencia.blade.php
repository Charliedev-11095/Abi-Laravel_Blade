<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">


        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    CONSULTA DE ASISTENCIAS
                </h2>
            </div>
            <a class="btn btn-danger" href="{{url('/panelalumno')}}" >Regresar</a>
            
        </x-slot>






        <div class="wrapper wrapper--w790">
            <div class="card card-5" >
                <div class="card-heading">
                    <H2 class="title">Historial de asistencia General</H2>
                </div>
                <div class="card-body">

<table class="table table-light table-bordered table-hover"  >
    <thead class="thead-dark">
    
        <tr>
            <th class="card-title">Grupo</th>
            <th class="card-title">Asistencias totales</th>
            <th class="card-title">Asistencias marcadas</th>
            <th class="card-title">Porcentaje asistido</th>
       
            
        
        </tr>
    
    </thead>
        <tbody>
            @foreach ($datosGrupo_alumnos as $dato)
                
            <tr>    
                <td>{{$dato->nivel.' '}}{{$dato->grado}}{{$dato->seccion}}</td>
                <td>{{$dato->dias_entrenamiento}}</td>
                <td>{{$dato->asistencias}}</td>
                <td>{{$dato->calificacion_asistencias}}</td>
                
            </tr>
            @endforeach
    
        </tbody>
    
    </table>
</div>
</div>
</div>

<br>

<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <table class="table table-light table-bordered table-hover">
            <thead class="thead-dark">
                <div class="card-heading">
                    <H2 class="title">Asistencias globales</H2>
           
                </div>
                <tr>

                    <th class="card-title">FECHA</th>
                    <th class="card-title">ASISTENCIA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                    <tr>                   
                        <td>{{ $dato->fecha_asistencia }}</td>
                        <td>{{ $dato->asistencia }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>





    </div>
</x-app-layout>