<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            GESTIÓN DE EQUIPOS DE TRABAJO
        </h2>
        <a class="btn btn-danger" href="{{url('/teams')}}" >Regresar</a>
    </x-slot>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">    




        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">EDITAR EQUIPO DE TRABAJO</H2>
                </div>
<form action="{{url('/teams/'.$team->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    @include('formteam.formteam',['Modo'=>'editar'])

</form>
        </div></div>


    </div>
</x-app-layout>