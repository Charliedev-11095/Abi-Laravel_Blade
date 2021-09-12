<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    
            {{_('GESTIÓN DE TUTORES')}}
        </h2>
    </x-slot>
    {{-- <a class="btn btn-danger" href="{{url('/MenuPDF')}}" target="blank">Regresar</a> --}}
    <a class="btn btn-success" href="{{url('/formtutores/create')}}">Agregar nuevo registro</a>
    <a class="btn btn-primary" href="{{url('tutoresPDF')}}"target="_blank">Descargar PDF</a>

    @if (Session::has('Mensaje'))
        {{Session::get('Mensaje')}}
    @endif


<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
        <tr>
            <th>Acciones</th>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>calle</th>
            <th>numero interior</th>
            <th>numero exterior</th>
            <th>colonia</th>
            <th>ciudad</th>
            <th>estado</th>
            <th>codigo postal</th>
            <th>curp</th>
            <th>fecha de nacimiento</th>
            <th>telefono</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($formtutor as $tutor)
        <tr>
            <td>
                <p>
                <a class="btn btn-warning" href="{{url('/formtutores/'.$tutor->id.'/edit')}}">
                    Editar
                </a>
                </p>
                <form method="post" action="{{url('/formtutores/'.$tutor->id)}}" style="display:inline" >
                    {{@csrf_field() }}
                    {{@method_field('DELETE')}}
                    </form>
            </td>
            <td>{{$loop->iteration}}</td>
            <td>{{$tutor->nombres}}</td>
            <td>{{$tutor->apellido_paterno}}</td>
            <td>{{$tutor->apellido_materno}}</td>
            <td>{{$tutor->calle}}</td>
            <td>{{$tutor->numero_interior}}</td>
            <td>{{$tutor->numero_exterior}}</td>
            <td>{{$tutor->colonia}}</td>
            <td>{{$tutor->ciudad}}</td>
            <td>{{$tutor->estado}}</td>
            <td>{{$tutor->codigo_postal}}</td>
            <td>{{$tutor->curp}}</td>
            <td>{{$tutor->fecha_de_nacimiento}}</td>
            <td>{{$tutor->telefono}}</td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>
    </div>
        </div> 
    </x-app-layout>