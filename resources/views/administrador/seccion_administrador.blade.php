
@extends('dashboard')
@section('seccion_administrador')

<div class="card card-5">
    <div class="card-heading">
                        
    <H2 class="title">ACCESO RÁPIDO</H2>
    </div>
    <div class="card-body">
        <center><p><a href="{{ url('/teams/create') }}" class="btn btn-primary btn-lg with-arrow" >REGISTRAR ALUMNO</a></p></center>
        <br>
<center><p><a href="{{ url('/formentrenadores/create') }}" class="btn btn-primary btn-lg with-arrow" >TOMAR ASISTENCIA</a></p></center>
<br>

<center><p><a href="{{ url('/formhistorico_medico/create') }}" class="btn btn-primary btn-lg with-arrow" >CREAR REGISTRO DE SALUD</a></p></center>

    </div>
</div>
    
@endsection