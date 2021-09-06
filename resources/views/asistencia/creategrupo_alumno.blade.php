<x-app-layout>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                GESTIÓN DE ASIGNACIÓN DE GRUPOS
            </h2>
        </x-slot>

        @if (count($errors) > 0)
            <div class="alert alert-warning alert-dismissable" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <a href="{{url('/asistencia/grupo_alumnos')}}"><img src="{{asset('images/icons/back-icon.png')}}"></a>
                    <H2 class="title">ASIGNACIÓN A GRUPO</H2>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('grupo_alumnos.store') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="Grupo">Nivel</label>
                            <select name="grupos_id" id="grupos_id" class=" input101 ">
                                @foreach ($grupos as $grupo)

                                    <option value="{{ $grupo->id }}">
                                        <p>{{ $grupo->nivel }}{{ ' '.$grupo->grado }}{{ $grupo->seccion }} </p>
                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Alumnos">Alumnos</label>
                            <select name="alumnos_id" id="alumnos_id" class=" input101 ">
                                @foreach ($alumnos as $alumno)


                                    <option value="{{ $alumno->id }}">
                                        {{ $alumno->nombres }} {{ $alumno->apellido_paterno }}
                                        {{ $alumno->apellido_materno }}

                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Entrenadores</label>
                            <select name="entrenadores_id" id="entrenadores_id" class=" input101 ">
                                @foreach ($entrenadores as $entrenador)
                                    <option value="{{ $entrenador->id }}">
                                        {{ $entrenador->nombres }} {{ $entrenador->apellido_paterno }}
                                        {{ $entrenador->apellido_materno }}

                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <select name="estado" id="estado" class=" input101 ">
                            
                                    <option >Activo</option>
                                    <option >Inactivo</option>
                            </select>
                        </div>

                        <br>

                        <div>
                            <button class="btn btn--radius-2 btn--red login100-form-btn validate-form" type="submit">Crear registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
