<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">


        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    GESTIÓN DE EQUIPOS DE TRABAJO
                </h2>   
            </div>
            <a href="{{ url('/teams/create') }}" class="btn btn-success">Crear equipo de trabajo</a>
        </x-slot>

        @if (Session::has('Mensaje'))   
            <div class="alert alert-warning alert-dismissable">
                {{ Session::get('Mensaje') }}
            </div>
        @endif


        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <div class="card-heading">
                
                            <H2 class="title">Equipos de trabajo</H2>
                        </div>
                        <tr>

                            <th class="card-title">Acciones</th>
                        
                            <th class="card-title">Nombre</th>
                            <th class="card-title">Descripcion</th>
                            <th class="card-title">Calle</th>                        
                            <th class="card-title">Numero interior</th>
                            <th class="card-title">Numero exterior</th>
                            <th class="card-title">Colonia</th>
                            <th class="card-title">Ciudad</th> 
                            <th class="card-title">Estado</th>                           
                            <th class="card-title">C.P.</th>
                            <th class="card-title">Correo de contacto</th>
                            <th class="card-title">Telefono</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)

                            <tr class="table-bordered">
                                <td>
                                    <a class="btn btn-warning" href="{{ url('/asistencia/grupos/' . $team->id . '/edit') }}">
                                        Editar
                                    </a>
                                </td>
                             
                                <td>{{ $team->nombre }}</td>
                                <td>{{ $team->descripcion }}</td>                            
                                <td>{{ $team->calle }}</td>
                                <td>{{$team->numero_interior}}</td>
                                <td>{{ $team->numero_exterior }}</td>
                                <td>{{ $team->colonia }}</td>
                                <td>{{ $team->ciudad }}</td>
                                <td>{{$team->estado}}</td>
                                <td>{{ $team->codigo_postal }}</td>
                                <td>{{ $team->email_contacto }}</td>
                                <td>{{$team->telefono}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
