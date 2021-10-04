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
                    <H2 class="title">Historial de asistencia General/H2>
                </div>
                <div class="card-body">

<table class="table table-light table-bordered table-hover"  >
    <thead class="thead-dark">
    
        <tr>
            <th class="card-title">Id de registro</th>
            <th class="card-title">Fecha de creacion</th>
            <th class="card-title">Estatura (centimetros)</th>
            <th class="card-title">Peso (kilogramos)</th>
            <th class="card-title">Presion Arterial (mm HG)</th>
            <th class="card-title">Comentarios</th>
            
        
        </tr>
    
    </thead>
        <tbody>
            @foreach ($tablasmedicas as $tabla)
                
            <tr>    
                <td>{{$tabla->id}}</td>
                <td>{{$tabla->fecha_creacion}}</td>
                <td>{{$tabla->estatura}}</td>
                <td>{{$tabla->peso}}</td>
                <td>{{$tabla->presion_arterial}}</td>
                <td>{{$tabla->comentarios}}</td>
                
    
                
            </tr>
            @endforeach
    
        </tbody>
    
    </table>
</div>
</div>
</div>







    </div>
</x-app-layout>