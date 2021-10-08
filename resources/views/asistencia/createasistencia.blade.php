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
            <div class="row" style="border: 2px solid black">
                <label for=""> </label>
                <form class="form-inline">
                    <div>
                        <label for="">Seleccione un grupo deseado, para generar una lista y tomar asistencia</label>
                        <select name="buscarpor" id="grupos_id" class="input101">
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">
                                    {{ $grupo->nivel }} {{ $grupo->grado }} {{ $grupo->seccion }} 
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger ">GENERAR</button>
                    </div>
                </form>
                <label for=""> </label>
            </div>
        </x-slot>
        {{-- ////////////////////////////////////////////////////////////////////////////////// --}}
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
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
        <br>
        {{-- /////////////////////////////////////////////////////////////////////////////////// --}}
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">PASE DE ASISTENCIA</H2>
                </div>
                <div class="card-body">
                    <table class="table table-light table-bordered">
                        <br>

                        @foreach ($datos as $dato)
                            <form action="{{ url('/formasistencia') }}" class="form-horizontal" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="border border-primary" style="border: 2px solid black">

                                    <h2 class="card-title">NOMBRE: {{ $dato->nombres }}
                                        {{ $dato->apellido_paterno }} {{ $dato->apellido_materno }} </h2>

                                    <p class="card-text"> GRUPO:{{ ' '.$dato->nivel }} {{ ' '.$dato->grados }} {{ $dato->secciones }}</p>

                                    <p class="card-text">NÚMERO DE LISTA:{{ $loop->iteration }}</p>

                                    <div>
                                        <label class="control-label" for="grado">Fecha asistencia</label>
                                        <input readonly id="fecha_asistencia" class=" input101 " type="date"
                                            name="fecha_asistencia" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div type="hidden">
                                        <input type="hidden" class=" input101 " type="text" name="buscarpor"
                                            value="{{ $dato->grupo_asignado }}">
                                    </div>
                                    <div type="hidden">
                                        <input type="hidden" value="Marcada" name="asistencia">
                                    </div>
                                    <div type="hidden">
                                        <input  type="hidden" name="relacion_grupo_alumnos" id="relacion_grupo_alumnos"
                                            value="{{ $dato->idregistro }}">
                                    </div>

                                 
                                    
                                    @foreach ($datosasistencia as $item)
                                        @if ( $dato->idregistro == $item->relacion_grupo_alumnos && $item->asistencia=='Marcada')
                                        
                                           
                                            <div class="alert alert-danger" role="alert">
                                                <strong>ALERTA!</strong> Ya se ha tomado asistencia para este alumno
                                            </div>
                                        @endif
                                        @if ($dato->idregistro == $item->relacion_grupo_alumnos && $item->asistencia=='Ninguna')
                                            <div >
                                                <button type="submit" class="btn btn-danger ">MARCAR ASISTENCIA</button>
                                            </div>
                                        @endif
                                         

                                      
 
                                    @endforeach
                                    






                                </div>
                            </form>
                            <br>
                            <br>
                            <br>
                        @endforeach
                </div>
             
                
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
