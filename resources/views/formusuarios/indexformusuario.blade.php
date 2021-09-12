<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('GESTOR DE USUARIOS')}}
        </h2>
    </x-slot>
    <a href="{{url('/formusuario/create')}}" class="btn btn-success">CREAR USUARIO</a>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    
        @if (Session::has('Mensaje'))
            <div class="alert alert-warning alert-dismissable"> 
                {{Session::get('Mensaje')}}
            </div>
        @endif

        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <div class="card-heading">
                            <H2 class="title">Usuarios existentes</H2>
                        </div>
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="cartextd-">ID de usuario</th>
                            <th class="card-text">Nombre</th>
                            <th class="card-title">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
            
                            <tr>    <td>
                                <a class="btn btn-warning" href="{{url('/formusuario/'.$usuario->id.'/edit')}}">
                                    Editar
                                </a>
                            </td>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>