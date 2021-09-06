<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            GESTIÓN DE GRUPOS
        </h2>
        <a class="btn btn-danger" href="{{url('/asistencia/grupos')}}" >Regresar</a>
    </x-slot>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">    




        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">EDITAR GRUPO</H2>
                </div>
<form action="{{url('/asistencia/grupos/'.$grupo->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    @include('asistencia.formgrupo',['Modo'=>'editar'])

</form>
        </div></div>


    </div>
</x-app-layout>


