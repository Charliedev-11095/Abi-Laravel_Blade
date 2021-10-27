<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            GESTIÓN DE ASIGNACIÓN DE EQUIPOS DE TRABAJO
        </h2>

        <div class="row">
            <div class="">
                <a href="{{url('/team_entrenadores')}}" class="btn btn-danger">Regresar</a>
            </div>
        </div>
       
    </x-slot> 

    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
               
                <H2 class="title">Editar asignación de equipo de trabajo</H2>
            </div>
            <div class="card-body">

                @foreach ($datos as $dato)
                <div class="form-group">
                    <label class="control-label" for="grado">Nombre del entrenador: {{$dato->nombres}} {{$dato->apellido_paterno}} {{$dato->apellido_materno}}</label>

                </div>
                <div class="form-group">
                    <label class="control-label" for="grado">Equipo de trabajo: {{$dato->nombre}} </label>
                    
                </div>
                @endforeach

                <form action="{{url('/team_entrenadores/'.$team_entrenadores->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label">Estatus</label>
                        <select class="input100" type="text" name="status" id="status" >
                    
                            {{-- invalid-feedback2 sirve para marcar que era una opcion anterior --}}
                            @foreach ($datos as $dato)
                                <option class="invalid-feedback2">{{ $dato->status }}</option>
                            @endforeach
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>    
                        {!! $errors->first('estado','<div class="invalid-feedback">:message</div>') !!}
                        
                    </div>
                  

                    <div>
                        <button class="btn btn--radius-2 btn--red login100-form-btn validate-form" type="submit">Crear registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</x-app-layout>