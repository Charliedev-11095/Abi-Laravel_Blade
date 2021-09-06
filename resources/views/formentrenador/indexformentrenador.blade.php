<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('GESTIÓN DE ENTRENADORES')}}
        </h2>
    </x-slot>
    <a class="btn btn-danger" href="{{url('/MenuPDF')}}" target="blank">Regresar</a>
    <a class="btn btn-success" href="{{url('/formentrenadores/create')}}">Agregar nuevo registro</a>
    <a class="btn btn-info" href="{{route('pdfEntrenadores')}}" target="blank">Descargar PDF Tabla</a>


            @if (Session::has('Mensaje'))
            {{Session::get('Mensaje')}}
        @endif

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">

        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        
            <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
        <tr>
            <tr>
                <th>ID</th>
                <th>Nombres</>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>calle</th>
                <th>número interior</th>
                <th>número exterior</th>
                <th>colonia</th>
                <th>ciudad</th>
                <th>estado</th>
                <th>código postal</th>
                <th>curp</th>
                <th>fecha de nacimiento</th>
                <th>teléfono</th>
                <th>Acciones</th>
            </tr>
        </tr>
    </thead>
    <tbody>
        @foreach ($formentrenador as $entrenador)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$entrenador->nombres}}</td>
            <td>{{$entrenador->apellido_paterno}}</td>
            <td>{{$entrenador->apellido_materno}}</td>
            <td>{{$entrenador->calle}}</td>
            <td>{{$entrenador->numero_interior}}</td>
            <td>{{$entrenador->numero_exterior}}</td>
            <td>{{$entrenador->colonia}}</td>
            <td>{{$entrenador->ciudad}}</td>
            <td>{{$entrenador->estado}}</td>
            <td>{{$entrenador->codigo_postal}}</td>
            <td>{{$entrenador->curp}}</td>
            <td>{{$entrenador->fecha_de_nacimiento}}</td>
            <td>{{$entrenador->telefono}}</td>
            <td>
                <a class="btn btn-warning" href="{{url('/formentrenadores/'.$entrenador->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/formentrenadores/'.$entrenador->id)}}" >
                    {{@csrf_field() }}
                    {{@method_field('DELETE')}}
                    </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>