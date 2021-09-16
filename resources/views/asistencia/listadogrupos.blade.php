<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">


        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{_('GESTIÓN DE GRUPOS')}} 
                </h2>
            </div>
            <a href="{{ url('/asistencia/grupos/create') }}" class="btn btn-success">Crear Grupo</a>
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
                            <H2 class="title">Grupos existentes</H2>
                        </div>
                        <tr>

                            <th class="card-title">Acciones</th>
                            <th class="card-title">ID</th>
                            <th class="card-title">Nivel</th>
                            <th class="card-title">Grado</th>
                            <th class="card-title">Sección</th>                        
                            <th class="card-title">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupos as $grupo)

                            <tr class="table-bordered">
                                <td>
                                    <a class="btn btn-warning" href="{{ url('/asistencia/grupos/' . $grupo->id . '/edit') }}">
                                        Editar
                                    </a>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $grupo->nivel }}</td>
                                <td>{{ $grupo->grado }}</td>
                                <td>{{ $grupo->seccion }}</td>
                                <td>{{ $grupo->estado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
