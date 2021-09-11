<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('GESTIÓN DE ALUMNOS')}}
        </h2>
    </x-slot>
    {{-- <a class="btn btn-danger" href="{{url('/MenuPDF')}}" target="blank">Regresar</a> --}}
    <a class="btn btn-success" href="{{url('/formalumnos/create')}}">Agregar nuevo registro</a>
    <a class="btn btn-primary" href="{{url('/alumnosPDF')}}"target="_blank">Descargar PDF</a>
    {{-- <a class="btn btn-secondary" href="{{route('PDFalumnos')}}" target="blank">abrir Tabla</a>  --}}
    <button>
 {{--    <a class="btn btn-info" href="{{route('PdfAlumnos')}}" target="blank">Descargar PDF Tabla</a> --}}
</button>
    @if (Session::has('Mensaje'))
        {{Session::get('Mensaje')}}
    @endif
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 

        <div class="table-responsive">       
<table class="table table-bordered table-hover card-heading">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombres</th>
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
    </thead>
    <tbody>
        @foreach ($formalumno as $alumno)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$alumno->nombres}}</td>
            <td>{{$alumno->apellido_paterno}}</td>
            <td>{{$alumno->apellido_materno}}</td>
            <td>{{$alumno->calle}}</td>
            <td>{{$alumno->numero_interior}}</td>
            <td>{{$alumno->numero_exterior}}</td>
            <td>{{$alumno->colonia}}</td>
            <td>{{$alumno->ciudad}}</td>
            <td>{{$alumno->estado}}</td>
            <td>{{$alumno->codigo_postal}}</td>
            <td>{{$alumno->curp}}</td>
            <td>{{$alumno->fecha_de_nacimiento}}</td>
            <td>{{$alumno->telefono}}</td>
            <td>
                <p>
                <a class="btn btn-warning" href="{{url('/formalumnos/'.$alumno->id.'/edit')}}">
                    Editar
                </a>
            </p>
                <form method="post" action="{{url('/formalumnos/'.$alumno->id)}}" style="">
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