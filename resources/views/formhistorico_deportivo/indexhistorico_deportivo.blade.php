<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            PROGRESO DEPORTIVO
        </h2>
        <div class="row">
            <div>
           <a href="{{url('/tabladeportiva')}}" class="btn btn-success">Historial General de alumno</a>
                     
             </div>
        </div>
        <div class="row">
            <a href="{{url('/formhistorico_deportivo/create')}}" class="btn btn-success">Generar evaluación deportiva</a>
            
        </div>
       
    </x-slot>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">



    
@if (Session::has('Mensaje'))
<div class="alert alert-warning alert-dismissable"> 
    {{Session::get('Mensaje')}}
</div>
@endif



<div class="wrapper wrapper--w790">


    <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
        <div class="row">
            <label for=""> <h4 style="color:#f9fbfc;">Consultar lista de Grupo</h4></label>
        </div>
    <div class="row" >
        <form class="form-inline">
            <div>
                <label for="" style="color:#f9fbfc;">Seleccione un grupo, para consultar las asistencias</label>
                <select name="buscarporgrupo">
                    
                    @foreach ($grupos as $grupo)

                        <option value="{{ $grupo->idgrup }}">

                            {{ $grupo->nivel }} {{ ' '.$grupo->grado }} {{ $grupo->seccion }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-danger ">BUSCAR</button>
            </div>
        </form>
       
    </div>
    <br>
    <label  class="form-inline" for="" style="color:#d1e70d;">Actualice la página, si no concuerdan los datos</label>
    </div>
<br>





<div class="card card-5">
    <div class="table-responsive"> 
    <table class="table table-light table-bordered table-hover">

        <thead class="thead-dark" style="background-color:#000000;color:white;border:1px solid #BDB76B;">
            <div class="card-heading">
                <H2 class="title">LISTA DE GRUPO</H2>
            </div>
            <tr>

                <th class="card-title">ID</th>
                <th class="card-title">ALUMNOS</th>
                <th class="card-title">GRUPO</th>
                <th class="card-title">ENTRENADOR</th>
                <th class="card-title">EVALUACIÓN</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($datos as $dato)
            <tr>
                <td>{{ $dato->idregistro }}</td>
                <td>{{ $dato->nombres }} {{ $dato->apellido_paterno }}
                    {{ $dato->apellido_materno }}</td>
                <td>
                    {{ $dato->nivel }} {{ ' '.$dato->grado }} {{ $dato->seccion }}
                </td>
                <td>
                    {{$dato->nombresentrenador}} {{$dato->paternoentrenador }}
                    {{ $dato->maternoentrenador }}
                </td>
                <td>  {{$dato->calificacion_entrenamiento.'% de aprovechamiento '}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>








<br>

    <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">

<form class="form-inline">
                <div>
                    
                    <h4 style="color:#f9fbfc;">Consultar evaluación deportiva especifica</h4>
                    <label for="" style="color:#f9fbfc;">Seleccionar alumno</label>
                    <select name="buscarpor" id="grupos_id" class="input101">
                        @foreach ($alumnos as $alumno)
                            <option value="{{ $alumno->id }}">
                                {{ $alumno->nombres }} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    <label for="" style="color:#f9fbfc;">Seleccionar fecha deseada</label>
                    <input id="fecha_asistencia" class=" input101 " type="date" name="buscarporfecha" >

                    </select>


                    <button type="submit" class="btn btn-danger ">CONSULTAR</button>
                    
                    <label for=""> </label>
                    <br>
                </div>
            </form>


    </div> 
</div>
<br>


@foreach ($historicos_deportivos2 as $historicos_deportivo)
<div class="wrapper wrapper--w790">
<div class="card card-5" >
    <div class="card-heading">
        <h2 class="title">REGISTRO HISTÓRICO CONSULTADO: 
             </h2>
            <h1 class="title">{{$historicos_deportivo->nombres}} {{$historicos_deportivo->apellido_paterno}} {{$historicos_deportivo->apellido_materno}}</h1>
    </div>
    <div class="card-body">

<label for="">{{$historicos_deportivo->fecha_creacion}}</label>
<p><h3>AREAS EVALUADAS</h3></p>
<div class="table-responsive">
<table class="table table-light table-hover table-bordered"  >
<thead class="thead-dark">
<p><h4>LIDERAZGO, VALORES Y ACTITUDES</h4></p>
<tr>
<th class="card-title">AREAS</th>
<th class="card-title">EVALUACIÓN</th>
</tr>
</thead>
<tbody>
<tr>
    <td>Comunicación</td>
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
    <td>ParticipaciÓn</td>
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
<p><h4>MANEJO DE BALÓN</h4></p>
<tr>
    <th class="card-title">ÁREAS</th>
    <th class="card-title">EVALUACIÓN</th>
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
        <td>Toma de desiciones bajo presión</td>
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
    <th class="card-title">ÁREAS</th>
    <th class="card-title">EVALUACIÓN</th>
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
    <th class="card-title">ÁREAS</th>
    <th class="card-title">EVALUACIÓN</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>Postura atlética, balance, control</td>
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
    <th class="card-title">ÁREAS</th>
    <th class="card-title">EVALUACIÓN</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>Pies en linea con el objetivo</td>
        <td> <p>{{$historicos_deportivo->balance_objetivo}}</p> </td>
    </tr>
    <tr>
        <td>Manos correctas en el balón</td>
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
    <th class="card-title">ÁREAS</th>
    <th class="card-title">EVALUACIÓN</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>PocisiÓn del cuerpo</td>
        <td>  <p> {{$historicos_deportivo->posicion_cuerpo}}</p></td>
    </tr>
    <tr>
        <td>Presiona el balón</td>
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
<p><h4>OBSERVACIONES</h4></p>
<tr>
    <th class="card-title">ÁREAS</th>
    <th class="card-title">EVALUACIÁN</th>
</tr>
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



<br>
<br>

<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="table-responsive">
<table class="table table-light table-bordered table-hover" >
<thead class="thead-dark">
    <div class="card-heading">
    <a class="btn btn-info" href="{{route('historial_DeportivoPDF')}}" target="blank">Descargar tabla en PDF</a>
        <H2 class="title">Regístros Históricos Deportivos</H2>
    </div>
    <tr>
        <th class="card-title">ACCIONES</th>
      
        <th class="card-title">ALUMNO</th>
        <th class="card-title">OBSERVACIONES</th>
        <th class="card-title">FECHA DE CREACIÓN</th>
        <th class="card-title">ACTUALIZADO EN</th>
    </tr>
</thead>
    <tbody>
        @foreach ($datos2 as $dato2)       
        <tr> 
            <td>
                <a class="btn btn-warning" href="{{url('/formhistorico_deportivo/'.$dato2->id.'/edit')}}">
                    Editar
                </a>
            </td>   
            
            <td>{{$dato2->nombres}} {{$dato2->apellido_paterno}} {{$dato2->apellido_materno}} </td>
            <td>{{$dato2->observaciones}}</td>
            <td>{{$dato2->fecha_creacion}}</td>
            <td>{{$dato2->updated_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>
    </div>
</div>



    </div>
</x-app-layout>