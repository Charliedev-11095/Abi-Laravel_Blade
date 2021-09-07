<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                GESTION DE HISTÓRICOS MÉDICOS
            </h2>
            <div class="row">
                <div class="">
                    <a href="{{url('/formhistorico_medico')}}" class="btn btn-danger">Regresar</a>
                </div>
            </div>
        </x-slot>

        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">Editar historico medico</H2>
                </div>
                <div class="card-body">


                    <div class="form-group">
                        @foreach ($datos as $dato)
                        <h2>Alumno<br>
                            <label for="">{{ $dato->nombres }} {{ $dato->apellido_paterno }}
                            {{ $dato->apellido_materno }}</label> 
                        </h2>

                        <div class="form-group">
                            <label class="control-label" for="fecha_creacion">Fecha de creacion: {{ $dato->fecha_creacion }}</label>
                        </div>

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
                                        <td>{{$dato->estatura}} centimetros</td>
                               
                                    </tr>
                                    <tr>    
                                        <td>PESO</td>
                                        <td>{{$dato->peso}} kilogramos</td>
                                
                                    </tr>
                                    <tr>    
                                        <td>PRESION ARTERIAL</td>
                                        <td>{{$dato->presion_arterial}} mm Hg</td>
                                
                                    </tr>
                                </tbody>            
                            </table>
                    @endforeach
                    </div>


                    <form action="{{ url('/formhistorico_medico/' . $historicos_medico->id) }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}


                        <div class="form-group">
                            <label class="control-label" for="presion_arterial">Comentarios</label>
                            <textarea id="comentarios" class="input100" name="comentarios" rows="10" cols="50">...</textarea>

                            </textarea>
                           
                            <label class="control-label" for="presion_arterial">Solo se pueden modificar los comentarios del registro*</label>
                            
                        </div>
                        <input type="submit" class="btn btn-success" value="Modificar">

                    </form>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
