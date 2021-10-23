
<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                PROGRESO DEPORTIVO
            </h2>
            <a class="btn btn-danger" href="{{url('/formhistorico_deportivo')}}" >Regresar</a>
        </x-slot>

        @if (count($errors)>0)
            <div class="alert alert-warning alert-dismissable" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif  


        <div class="wrapper wrapper--w790">

            <div style="background-color:#555055bf;border: 1px solid rgb(0, 0, 0);width:100%;text-align:center;padding:20px;">
                <div class="row">
                    <label for=""> <h4 style="color:#f9fbfc;"></h4></label>
                </div>
            <div class="row" >
                <form class="form-inline">
                    <div>
                        <label for="" style="color:#f9fbfc;">Seleccione el grupo, donde se encuentra el alumno a elegir</label>
                        <select name="buscarporgrupo">
                            
                            @foreach ($grupos as $grupo)
        
                                <option value="{{ $grupo->id }}">
        
                                    {{ $grupo->nivel }} {{ ' '.$grupo->grado }} {{ $grupo->seccion }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger ">BUSCAR</button>
                    </div>
                </form>
            </div>
        
            </div>
            <br>



            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">EVALUACION DEPORTIVA DE ALUMNO</H2>
                </div>
                <div class="card-body">

                    <form action="{{url('/formhistorico_deportivo')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{-- Se incluye el create.blade.php con 'include' --}}
                        <input type="hidden"  name="alta_usuario"  class="input101" value="{{Auth::user()->id}}">


                        <div>
                            <label class="control-label" for="grado">Fecha de creación: {{ date('Y-m-d') }} </label>
                            <input id="fecha_creacion" class=" input101 " type="date" name="fecha_creacion"
                                value="{{ date('Y-m-d') }}">
                        </div>

                        <br>
             
                        <div class="form-group" >
                            @foreach ($asignaciongrupo as $asignacion)
                            <label for="" ><h4>GRUPO:{{ $asignacion->nivel }} {{ $asignacion->grado }} {{ $asignacion->seccion }}</h4></label>
                            <input name="grupos_id" id="grupos_id" type="hidden" value="{{ $asignacion->id }}">
                            @endforeach
                       
                        </div>
                        
                        <br>


                        @include('formhistorico_deportivo.formhistorico_deportivo',['Modo'=>'crear'])
                    </form> 

                </div>
            </div>
        </div>



    </div>
</x-app-layout>