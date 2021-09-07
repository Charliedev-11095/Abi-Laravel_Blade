<x-app-layout>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                GESTION DE HISTORIAL MEDICO
            </h2>
 
            <a class="btn btn-success" href="{{url('/formhistorico_medico')}}" >Ir a consulta única</a>
       
        </x-slot>



        <div class="wrapper wrapper--w790">
            <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
        

                <form class="form-inline">
                    <div>
                        
                        <h4 style="color:#f9fbfc;">Consultar Historial Medico General</h4>
                        <label for="" style="color:#f9fbfc;">Seleccionar alumno</label>
                        <select name="buscarpor"  class="input101">
                            @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->id }}">
                                    {{ $alumno->nombres }} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}
                                </option>
                            @endforeach
                        </select>
                       

    
                        <button type="submit" class="btn btn-danger ">CONSULTAR</button>
                        
                        <label for=""> </label>
                        <br>
                    </div>
                </form>


            </div> 
        </div>
        <br>


        <div class="wrapper wrapper--w790">
            <div class="card card-5" >
                <div class="card-heading">
                    <H2 class="title">Historial Medico General</H2>
                    @foreach ($nombrecompleto as $nom)
                    <h2 class="title"> ALUMNO:{{' '.$nom->nombres}} {{$nom->apellido_paterno}} {{$nom->apellido_materno}}</h2>
                    @endforeach
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