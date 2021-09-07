<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{_('Gestión de Usuarios')}}
            </h2>
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
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">CREAR USUARIO</H2>
                </div>
                <div class="card-body">
                    <form action="{{url('/formusuario')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        {{-- Se incluye el create.blade.php con 'include' --}}
                        @include('formusuarios.formusuario',['Modo'=>'crear'])
                    </form> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>