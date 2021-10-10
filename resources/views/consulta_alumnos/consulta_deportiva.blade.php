<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CONSULTA DE HISTORIAL DEPORTIVO
        </h2>
        <a class="btn btn-danger" href="{{url('/panelalumno')}}" >Regresar</a>

    </x-slot>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">



    
@if (Session::has('Mensaje'))
<div class="alert alert-warning alert-dismissable"> 
    {{Session::get('Mensaje')}}
</div>
@endif


<div class="wrapper wrapper--w790">
    <div class="card card-5" >
        <div class="card-heading">
            <h2 class="title">HISTORIAL DEPORTIVO GENERAL: 
                 </h2>
                 @foreach ($nombrecompleto as $nom)
                 <h2 class="title"> ALUMNO:{{' '.$nom->nombres}} {{$nom->apellido_paterno}} {{$nom->apellido_materno}}</h2>
                 @endforeach
        </div>
        <div class="card-body">

{{-- ///////////////////////////////////////////// --}}
@foreach ($alumnoestadisticas as $estadistica)
<div class="table-responsive">
    <table class="table table-light table-hover table-bordered"  >
    <thead class="thead-dark">
    <p><h4>EVALUACIONES GENERALES</h4></p>
    <tr>
    <th class="card-title">AREAS</th>
    <th class="card-title">EVALUACION</th>
    </tr>
    </thead>
    <tbody>

       
        <tr>
            <td style="background:#353940;color:#FFF;">Liderazgo, valores y actitudes</td>
            <td><p>{{$estadistica->total_liderazgo.'% de aprovechamiento general'}}</p></td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Manejo de balon</td>
            <td><p>{{$estadistica->total_manejobalon.'% de aprovechamiento general'}}</p> </td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Pases</td>
            <td><p>{{$estadistica->total_pases.'% de aprovechamiento general'}}</p> </td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Trabajo de pies</td>
            <td><p>{{$estadistica->total_pies.'% de aprovechamiento general'}}</p> </td>
        </tr>
        
        <tr>
            <td style="background:#353940;color:#FFF;">Lanzamiento</td>
            <td><p>{{$estadistica->total_lanzamiento.'% de aprovechamiento general'}}</p> </td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Defensa</td>
            <td> <p> {{$estadistica->total_defensa.'% de aprovechamiento general'}}</p></td>
        </tr>
       

    </tbody>
    </table>
    </div>




<br>
    <div class="table-responsive">
        <table class="table table-light table-hover table-bordered"  >
        <thead class="thead-dark">
        <p><h4>EVALUACION GENERAL</h4></p>
   
        </thead>
        <tbody>       
            <tr>
                <td style="background:#353940;color:#FFF;">Total</td>
                <td> <p> {{$estadistica->calificacion_entrenamiento.'% de aprovechamiento general'}}</p></td>
            </tr>
   
    
        </tbody>
        </table>
        </div>

        @endforeach
{{-- /////////////////////////////////////////// --}}


        </div>

    </div>
</div>

<br>
@foreach ($historicos_deportivos2 as $historicos_deportivo)
<div class="wrapper wrapper--w790">
<div class="card card-5" >
    <div class="card-heading">
        <h2 class="title">EVALUACION GENERADA
        </h2>
        <h2 class="title">DEL: {{' '.$historicos_deportivo->fecha_creacion}}
             </h2>
            
    </div>
    <div class="card-body">

<p><h3>AREAS EVALUADAS</h3></p>
<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
<p><h4>LIDERAZGO, VALORES Y ACTITUDES</h4></p>
<tr>
<th class="card-title">AREAS</th>
<th class="card-title">EVALUACION</th>
</tr>
</thead>
<tbody>
<tr>
    <td>Comunicacion</td>
    <td><p>{{$historicos_deportivo->comunicacion}}</p></td>
</tr>
<tr>
    <td>Lidera con el ejemplo</td>
    <td><p>{{$historicos_deportivo->liderazgo}}</p> </td>
</tr>
<tr>
    <td>Respeto</td>
    <td><p>{{$historicos_deportivo->respeto}}</p> </td>
</tr>
<tr>
    <td>Responsabilidad</td>
    <td><p>{{$historicos_deportivo->responsabilidad}}</p> </td>
</tr>

<tr>
    <td>Participacion</td>
    <td><p>{{$historicos_deportivo->participacion}}</p> </td>
</tr>
<tr>
    <td>Disponibilidad</td>
    <td> <p> {{$historicos_deportivo->constancia}}</p></td>
</tr>
<tr>
    <td>Actitud</td>
    <td> <p>{{$historicos_deportivo->actitud}}</p></td>
</tr>
<tr>
    <td>Compromiso</td>
    <td><p> {{$historicos_deportivo->compromiso}}</p> </td>
</tr>
<tr>
    <td>Trabajo en equipo</td>
    <td><p>{{$historicos_deportivo->trabajo_en_equipo}}</p> </td>
</tr>

</tbody>
</table>
</div>
<br>
<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
<p><h4>MANEJO DE BALON</h4></p>
<tr>
    <th class="card-title">AREAS</th>
    <th class="card-title">EVALUACION</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>Mirada al frente</td>
        <td>  <p>{{$historicos_deportivo->mirada_al_frente}}</p></td>
    </tr>
    <tr>
        <td>Utiliza ambas manos</td>
        <td> <p>{{$historicos_deportivo->coordinacion_manos_balon}}</p></td>
    </tr>
    <tr>
        <td>Toma de desiciones bajo presion</td>
        <td><p>{{$historicos_deportivo->decision_bajo_presion}}</p> </td>
    </tr>
    <tr>
        <td>Toma buenas decisiones</td>
        <td><p>{{$historicos_deportivo->acertividad_en_balon}}</p> </td>
    </tr>
    
</tbody>
</table>
</div>

<br>

<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
<p><h4>PASES</h4></p>
<tr>
    <th class="card-title">AREAS</th>
    <th class="card-title">EVALUACION</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>Mano derecha / Mano izquierda</td>
        <td> <p>{{$historicos_deportivo->coordinacion_manos_pase}}</p> </td>
    </tr>
    <tr>
        <td>Pases al objetivo / Pases en tiempo</td>
        <td><p>{{$historicos_deportivo->rapidez_en_pase}}</p> </td>
    </tr>
    <tr>
        <td>Pase al poste</td>
        <td> <p> {{$historicos_deportivo->pase_al_poste}}</p></td>
    </tr>
    <tr>
        <td>Toma buenas decisiones</td>
        <td><p>{{$historicos_deportivo->acertividad_en_pase}}</p> </td>
    </tr>
    
</tbody>
</table>
</div>
<br>
<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
<p><h4>TRABAJO DE PIES</h4></p>
<tr>
    <th class="card-title">AREAS</th>
    <th class="card-title">EVALUACION</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>Postura atletica, balance, control</td>
        <td>  <p> {{$historicos_deportivo->balance_pies}}</p></td>
    </tr>
    <tr>
        <td>Pivotea correctamente</td>
        <td> <p> {{$historicos_deportivo->pivote}}</p> </td>
    </tr>

</tbody>
</table>
</div>
<br>
<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
</p> <p><h4>LANZAMIENTO</h4></p>
<tr>
    <th class="card-title">AREAS</th>
    <th class="card-title">EVALUACION</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>Pies en linea con el objetivo</td>
        <td> <p>{{$historicos_deportivo->balance_objetivo}}</p> </td>
    </tr>
    <tr>
        <td>Manos correctas en el balon</td>
        <td> <p>{{$historicos_deportivo->agarre_balon}}</p> </td>
    </tr>
    <tr>
        <td>Codo en linea al aro</td>
        <td><p>{{$historicos_deportivo->alineacion_al_aro}}</p> </td>
    </tr>
    <tr>
        <td>Termina entradas con ambas manos</td>
        <td> <p>{{$historicos_deportivo->entradas_manos}}</p> </td>
    </tr>
    
</tbody>
</table>
</div>
<br>
<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
<p><h4>DEFENSA</h4></p>
<tr>
    <th class="card-title">AREAS</th>
    <th class="card-title">EVALUACION</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>Pocision del cuerpo</td>
        <td>  <p> {{$historicos_deportivo->posicion_cuerpo}}</p></td>
    </tr>
    <tr>
        <td>Presiona el balon</td>
        <td><p> {{$historicos_deportivo->presion_balon}}</p> </td>
    </tr>
    <tr>
        <td>Bloquea a su jugador</td>
        <td> <p>{{$historicos_deportivo->bloqueo_oponente}}</p></td>
    </tr>
    <tr>
        <td>Contesta lanzamiento</td>
        <td> <p> {{$historicos_deportivo->contesta_lanzamiento}}</p></td>
    </tr>
    
</tbody>
</table>
</div>
<br>




<div class="table-responsive">
    <table class="table table-light table-hover table-bordered"  >
    <thead class="thead-dark">
    <p><h4>EVALUACIONES</h4></p>
    <tr>
    <th class="card-title">AREAS</th>
    <th class="card-title">EVALUACION</th>
    </tr>
    </thead>
    <tbody>

       
        <tr>
            <td style="background:#353940;color:#FFF;">Liderazgo, valores y actitudes</td>
            <td><p>{{$historicos_deportivo->evaluacion_liderazgo.'% de aprovechamiento'}}</p></td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Manejo de balon</td>
            <td><p>{{$historicos_deportivo->evaluacion_manejobalon.'% de aprovechamiento'}}</p> </td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Pases</td>
            <td><p>{{$historicos_deportivo->evaluacion_pases.'% de aprovechamiento'}}</p> </td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Trabajo de pies</td>
            <td><p>{{$historicos_deportivo->evaluacion_pies.'% de aprovechamiento'}}</p> </td>
        </tr>
        
        <tr>
            <td style="background:#353940;color:#FFF;">Lanzamiento</td>
            <td><p>{{$historicos_deportivo->evaluacion_lanzamiento.'% de aprovechamiento'}}</p> </td>
        </tr>
        <tr>
            <td style="background:#353940;color:#FFF;">Defensa</td>
            <td> <p> {{$historicos_deportivo->evaluacion_defensa.'% de aprovechamiento'}}</p></td>
        </tr>
       

    </tbody>
    </table>
    </div>



    <br>
    <div class="table-responsive">
        <table class="table table-light table-hover table-bordered"  >
        <thead class="thead-dark">
        <p><h4>EVALUACION TOTAL</h4></p>
   
        </thead>
        <tbody>       
            <tr>
                <td style="background:#353940;color:#FFF;">Total</td>
                <td> <p> {{$historicos_deportivo->total_historico.'% de aprovechamiento'}}</p></td>
            </tr>
   
    
        </tbody>
        </table>
        </div>



<br>
<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
<p><h4>OBSERVACIONES</h4></p>

</thead>
<tbody>
    <tr>
        <td>Observaciones</td>
        <td> <p>{{$historicos_deportivo->observaciones}}</p> </td>
    </tr>
    <tr>
        <td>Actualizado en:</td>
        <td> <p>{{$historicos_deportivo->updated_at}}</p> </td>
    </tr>
</tbody>
</table>
</div>
</div>
    </div>
  </div>   
  <br>
@endforeach

{{-- /////////////////////////////////////////////
 --}}





    </div>
</x-app-layout>