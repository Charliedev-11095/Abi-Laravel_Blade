<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">



        <x-slot name="header">

            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    GESTIÓN DE ASISTENCIA
                </h2>
            </div>
            <div class="row">
                <div class="float-right">
                  
                    <a href="{{ url('/formasistencia/create') }}" class="btn btn-success">Generar lista de asistencia</a>
                </div>
            </div>
            <div class="row">
                <div class="float-right">
                  
                    <a href="{{ url('/formasistencia_dia') }}" class="btn btn-success">Consultas avanzadas de asistencia</a>
                </div>
            </div>
            
        </x-slot>

        <div class="wrapper wrapper--w790">
            <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
                <div class="row">
                    <label for=""> <h4 style="color:#f9fbfc;">Consultar lista de Grupo</h4></label>
                </div>
            <div class="row" >
                <form class="form-inline">
                    <div>
                        <label for="" style="color:#f9fbfc;">Seleccione un grupo, solo para consultar los alumnos que lo integran</label>
                        <select name="buscarpor">
                            @foreach ($grupos as $grupo)

                                <option value="{{ $grupo->id }}">

                                    {{ $grupo->nivel }} {{ ' '.$grupo->grado }} {{ $grupo->seccion }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger ">BUSCAR</button>
                    </div>
                </form>
            </div>
   
            </div>
            <br>
            <div class="card card-5">
                <table class="table table-light table-bordered table-hover">

                    <thead class="thead-dark" style="background-color:#000000;color:white;border:1px solid #BDB76B;">
                        <div class="card-heading">
                            <a class="btn btn-info" href="{{route('listaGrupoPDF')}}" target="blank">Descargar PDF Tabla</a>
                            <H2 class="title">LISTA DE GRUPO</H2>
                        </div>
                        <tr>

                            <th class="card-title">ID DE REGISTRO</th>
                            <th class="card-title">ALUMNOS</th>
                            <th class="card-title">GRUPO</th>
                            <th class="card-title">ENTRENADOR</th>

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
                                    {{ $dato->nombresentrenador }} {{ $dato->paternoentrenador }}
                                    {{ $dato->maternoentrenador }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>
</x-app-layout>
