<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                GESTIÓN DE HISTÓRICOS MÉDICOS
            </h2>
            <div class="row">
                <div>
               <a href="{{url('/formhistorico_medico/create')}}" class="btn btn-success">Generar historial médico</a>
               
                </div>
            </div>

            <div class="row">
                <div>
                <a href="{{url('/tablamedica')}}" class="btn btn-success">Historial General de alumno</a>
                         
                 </div>
            </div>
            


        </x-slot>



    
    
@if (Session::has('Mensaje'))
<div class="alert alert-warning alert-dismissable">
    {{ Session::get('Mensaje') }}
</div>
@endif

<div class="wrapper wrapper--w790">
<div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
            
    <form class="form-inline">
        <div>
            
            <h4 style="color:#f9fbfc;">Consultar Histórico Médico específico</h4>
            <label for="" style="color:#f9fbfc;">Seleccionar alumno</label>
            <select name="buscarpor"  class="input101">
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">
                        {{ $alumno->nombres }} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}
                    </option>
                @endforeach
            </select>
            <br>

            <label for="" style="color:#f9fbfc;">Seleccionar fecha deseada</label>
            <input class=" input101 " type="date" name="buscarporfecha" >

            </select>


            <button type="submit" class="btn btn-danger ">CONSULTAR</button>
            
            <label for=""> </label>
            <br>
        </div>
    </form>
</div>
</div>



{{-- -------------------------------------------------------------- --}}

@foreach ($historicos_medicos2 as $historicos)
<div class="wrapper wrapper--w790">
    <div class="card card-5" >
        <div class="card-heading">
            <h1 class="title">{{$historicos->nombres}} {{$historicos->apellido_paterno}} {{$historicos->apellido_materno}}
            </h1>
            <h2 class="title">ID DE REGISTRO: {{$historicos->id}}</h2>
             
            
        </div>
        <div class="card-body">
            <label for="">Fecha de creación: {{$historicos->fecha_creacion}}</label>
            <br>
            <label for="">Fecha de edición: {{$historicos->updated_at}}</label>
            <td></td>
            <div class="table-responsive">
            <table class="table table-light table-hover table-bordered"  >
                <thead class="thead-dark">
                    <h4>MEDICIONES</h4>
                    <tr>
                        <th class="card-title">TOMA DE MEDIDAS</th>
                        <th class="card-title">VALORES</th>
                        
                    </tr>
                </thead>
                    <tbody>   
                        <tr>    
                            <td>ESTATURA</td>
                            <td>{{$historicos->estatura}} centímetros</td>
                           
                        </tr>
                        <tr>    
                            <td>PESO</td>
                            <td>{{$historicos->peso}} kilogramos</td>
                           
                        </tr>
                        <tr>    
                            <td>PRESIÓN ARTERIAL</td>
                            <td>{{$historicos->presion_arterial}} mm Hg</td>
                          
                        </tr>
                        
                    </tbody>            
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-light table-hover table-bordered"  >
                    <thead class="thead-dark">
                        <tr>
                            <th class="card-title">Comentarios</th>
                            
                        </tr>
                    </thead>
                        <tbody>
                            <td>{{$historicos->comentarios}}</td>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endforeach
{{-- ------------------------------------------------------------- --}}
<br>
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="table-responsive">
<table class="table table-light table-bordered table-hover"  >
<thead class="thead-dark">
    <div class="card-heading">
        <a class="btn btn-info" href="{{route('historial_MedicoPDF')}}" target="blank">Descargar PDF</a>
        <H2 class="title">Regístros históricos médicos existentes</H2>
    </div>
    <tr>
        <th class="card-title">Acciones</th>
        <th class="card-title">Id de registro</th>
        <th class="card-title">Alumno</th>
        <th class="card-title">Comentarios</th>
        <th class="card-title">Fecha de creación</th>
        <th class="card-title">Fecha de actualización</th>
    </tr>

</thead>
    <tbody>
        @foreach ($historicos_medicos as $historicos_medico)
            
        <tr>
            <td>
                <a class="btn btn-warning" href="{{url('/formhistorico_medico/'.$historicos_medico->id.'/edit')}}">
                    Editar
                </a>
            </td>    
            <td>{{$historicos_medico->id}}</td>
            <td>{{$historicos_medico->nombres}} {{$historicos_medico->apellido_paterno}} {{$historicos_medico->apellido_materno}}</td>
            <td>{{$historicos_medico->comentarios}}</td>
            <td>{{$historicos_medico->fecha_creacion}}</td>
            <td>{{$historicos_medico->updated_at}}</td>
        </tr>
        @endforeach

    </tbody>

</table>
        </div>
        <div class="pagination">
            {{ $historicos_medicos->links() }}
        </div>


</div>
</div>
    </div>
</x-app-layout>


