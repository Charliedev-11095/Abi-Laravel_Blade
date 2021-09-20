<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">


        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                PROGRESO DEPORTIVO
            </h2>
            <a class="btn btn-danger" href="{{url('/formhistorico_deportivo')}}" >Regresar</a>
        </x-slot>


        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">EDITAR HISTÓRICO DEPORTIVO</H2>
                </div>
                <div class="card-body">
                    <form action="{{url('/formhistorico_deportivo/'.$historicos_deportivo->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}


                        <div class="form-group">
                            @foreach ($datos as $dato)
                            <h2>Alumno<br>
                            <label for="">{{ $dato->nombres }} {{ $dato->apellido_paterno }}
                                {{ $dato->apellido_materno }}</label> 
                            <input type="hidden" value="{{ $dato->identificadoralumno }}" name="alumnos_id"></h2>
                        @endforeach

                        </div>

                        @include('formhistorico_deportivo.formhistorico_deportivo',['Modo'=>'editar'])
                      

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>


