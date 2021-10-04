
<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">


        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    CONSULTA DE REGISTRO MÉDICO
                </h2>
            </div>
            <a class="btn btn-danger" href="{{url('/panelalumno')}}" >Regresar</a>
            
        </x-slot>


<div class="wrapper wrapper--w790">
    <div class="card card-5" >
        <div class="card-heading">
            <H2 class="title">Datos médicos personales</H2>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
         
                    <tbody>
                     
                        @foreach ($formreg_med as $regmed)
                        <tr >
                            <td style="background:#353940;color:#FFF;">Alumno</td>
                            <td>{{$regmed->nombres}} {{$regmed->apellido_paterno}} {{$regmed->apellido_materno}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Estatura</td><td>{{$regmed->estatura}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Peso</td> <td>{{$regmed->peso}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Presión arterial</td><td>{{$regmed->presion_arterial}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Tipo de sangre</td><td>{{$regmed->tipo_sanguineo}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Edad</td> <td>{{$regmed->edad}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Padecimiento</td><td>{{$regmed->padecimiento}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Tratamiento</td><td>{{$regmed->tratamiento}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Alergia</td><td>{{$regmed->alergia}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Conducta</td><td>{{$regmed->conducta}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Impedimento físico</td><td>{{$regmed->impedimento_fisico}}</td>
                        </tr>
                        <tr>
                            <td style="background:#353940;color:#FFF;">Condición fisica</td><td>{{$regmed->condicion_fisica}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                        </div>

<br>


</div>
</div>
</div>

<br>

<div class="wrapper wrapper--w790">
    <div class="card card-5" >
        <div class="card-heading">
            <H2 class="title">Historial Medico General</H2>
        </div>
        <div class="card-body">

<table class="table table-light table-bordered table-hover"  >
<thead class="thead-dark">

<tr>
    <th class="card-title">Id de registro</th>
    <th class="card-title">Fecha de creacion</th>
    <th class="card-title">Estatura (centimetros)</th>
    <th class="card-title">Peso (kilogramos)</th>
    <th class="card-title">Presion Arterial (mm HG)</th>
    <th class="card-title">Comentarios</th>
    

</tr>

</thead>
<tbody>
    @foreach ($tablasmedicas as $tabla)
        
    <tr>    
        <td>{{$tabla->id}}</td>
        <td>{{$tabla->fecha_creacion}}</td>
        <td>{{$tabla->estatura}}</td>
        <td>{{$tabla->peso}}</td>
        <td>{{$tabla->presion_arterial}}</td>
        <td>{{$tabla->comentarios}}</td>
        

        
    </tr>
    @endforeach

</tbody>

</table>
</div>
</div>
</div>





    </div>
</x-app-layout>