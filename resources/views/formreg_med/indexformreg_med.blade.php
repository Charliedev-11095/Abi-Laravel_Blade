<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('GESTIÓN DE REGISTROS MÉDICOS')}}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    <a class="btn btn-danger" href="{{url('/MenuPDF')}}" target="blank">Regresar</a>
    <a class="btn btn-success" href="{{url('/formreg_med/create')}}">Agregar nuevo registro</a>
    <a class="btn btn-primary" href="{{url('reg_medPDF')}}"target="_blank">Descargar PDF</a>
{{-- <a class="btn btn-secondary" href="{{route('PDFReg_Med')}}" target="blank">abrir Tabla</a>  --}}
    {{-- <a class="btn btn-info" href="{{route('pdfReg_med')}}" target="blank">Descargar PDF Tabla</a> --}}

@if (Session::has('Mensaje'))
    {{Session::get('Mensaje')}}
@endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        <div class="table-responsive">
<table class="table table-bordered">    
    <thead class="thead-dark">
        <tr>
            <th>Acciones</th>
            <th>ID</th>
            <th>Alumno</th>
            <th>Estatura</th>
            <th>Peso</th>
            <th>Presion arterial</th>
            <th>Tipo de sangre</th>
            <th>Edad</th>
            <th>Padecimiento</th>
            <th>Tratamiento</th>
            <th>Alergia</th>
            <th>Conducta</th>
            <th>Impedimento físico</th>
            <th>Condición fisica</th>
        </tr>
    </thead>
    <tbody>
     
        @foreach ($formreg_med as $regmed)
        <tr>
            <td>
                <a class="btn btn-warning" href="{{url('/formreg_med/'.$regmed->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/formreg_med/'.$regmed->id)}}" >
                    {{@csrf_field() }}
                    {{@method_field('DELETE')}}
                    
                </form>
                
            </td>
            <td>{{$loop->iteration}}</td>
            <td>{{$regmed->nombres}} {{$regmed->apellido_paterno}} {{$regmed->apellido_materno}}</td>
            <td>{{$regmed->estatura}}</td>
            <td>{{$regmed->peso}}</td>
            <td>{{$regmed->presion_arterial}}</td>
            <td>{{$regmed->tipo_sanguineo}}</td>
            <td>{{$regmed->edad}}</td>
            <td>{{$regmed->padecimiento}}</td>
            <td>{{$regmed->tratamiento}}</td>
            <td>{{$regmed->alergia}}</td>
            <td>{{$regmed->conducta}}</td>
            <td>{{$regmed->impedimento_fisico}}</td>
            <td>{{$regmed->condicion_fisica}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>
        <div class="pagination">
            {{ $formreg_med->links() }}
        </div>
    </div>
</div>
</x-app-layout>