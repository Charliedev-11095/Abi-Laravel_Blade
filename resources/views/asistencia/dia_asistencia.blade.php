
<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    GESTIÓN DE ASISTENCIA
                </h2>
            </div>
            <a class="btn btn-danger" href="{{url('/formasistencia')}}" >Regresar</a>

        </x-slot>


        <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
                <H1 class="title">CONSULTAS AVANZADAS</H1>
            </div>
        </div>
        </div>


        <div class="wrapper wrapper--w790">
  
            <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">


               


                <label for=""> </label>
                <form class="form-inline">
                    <div>
                        <div class="row">
                            <label > <br><h3 style="color:#f9fbfc;">Consultar lista de asistencias por grupo y fecha</h3></label>
                        </div>

                        <div class="row">
                        <label for="" style="color:#f9fbfc;">Seleccione un grupo, para generar una lista de consulta</label>
                        <select name="buscarpor" id="grupos_id" class="input101">
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">
                                    {{ $grupo->nivel }} {{ $grupo->grado }} {{ $grupo->seccion }} 
                                </option>
                            @endforeach
                        </select>
                        </div>
                        <br>
                        <div>
                            <label for="" style="color:#f9fbfc;">Seleccione la fecha de las asistencias</label>
                        <input type="date" name="buscarporfecha" id="buscarporfecha" class="input101">
                           
                        </div>
                        <button type="submit" class="btn btn-danger ">GENERAR</button>
                    </div>
                </form>
                <label for=""> </label>


            </div>
    
        </div>



        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="table-responsive">   
                <table class="table table-light table-bordered table-hover">
                    <thead class="thead-dark">
                        <div class="card-heading">
                            <H2 class="title">ALUMNOS CON ASISTENCIA MARCADA</H2>
                        </div>
                        <tr>
                            <th class="card-title">NOMBRE DEL ALUMNO</th>
                            <th class="card-title">GRUPO</th>
                            <th class="card-title">FECHA</th>
                            <th class="card-title">ASISTENCIA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos2 as $dato2)
                            <tr>
                                <td>{{ $dato2->nombres }} {{ $dato2->apellido_paterno }}
                                    {{ $dato2->apellido_materno }}</td>
                                    <td>{{ $dato2->nivel }}{{ ' '.$dato2->grados }} {{ $dato2->secciones }}</td>
                                <td>{{ $dato2->fecha_asistencia }}</td>
                                <td>{{ $dato2->asistencia }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>


        <br><br>
{{-- ---------------------------------------------------------------------------------------- --}}



<div class="wrapper wrapper--w790">
    <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">

        <label for=""> </label>
        <form class="form-inline">
            <div>
                <div class="row">
                    <label > <br><h3 style="color:#f9fbfc;">Consultar lista de asistencias de un alumno especifico</h3></label>
                </div>

                <div class="row">
                <label for="" style="color:#f9fbfc;">Seleccione un alumno, para generar la consulta</label>
                <select name="buscarporalumno" id="buscarporalumno" class="input101">
                    @foreach ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">
                            {{ $alumno->nombres }} {{ $alumno->apellido_paterno }} {{ $alumno->apellido_materno }} 
                        </option>
                    @endforeach
                </select>
                </div>
              
         
                <button type="submit" class="btn btn-danger ">GENERAR</button>
            </div>
        </form>
        
    </div>
</div>




<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="table-responsive">   
        <table class="table table-light table-bordered table-hover">
            <thead class="thead-dark">
                <div class="card-heading">
                    <H2 class="title">Asistencias globales del alumno</H2>
                    @foreach ($datosalumnos as $datosalumno)
                    <H2 class="title">{{ $datosalumno->nombres }} {{ $datosalumno->apellido_paterno }} {{ $datosalumno->apellido_materno }}</H2>
                    @endforeach                
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


    </div>
</x-app-layout>