<x-app-layout>
    {{-- Se agrega para para dirigirse a listadogrupos o principal de grupos --}}
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{_('Gestión de Usuarios')}}
            </h2>
        </x-slot>
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <a href="{{url('formusuario')}}"><img src="{{asset('images/icons/back-icon.png')}}"></a>
                    <H2 class="title">EDITAR USUARIO</H2>
                </div>
                <div class="card-body">
                    <form action="{{url('/formusuario/'.$usuario->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        @include('formusuarios.formusuario',['Modo'=>'editar'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


