<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{_('PRUEBA')}}
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
                    <H2 class="title">Prueba de fecha</H2>
                </div>
                <div class="card-body">
                    <form action="{{url('/fechaprueba')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-row wrap-input100 validate-input ">
    <div class="name">Fecha de Inicio</div>
    <div class="input-group wrap-input100 validate-input">
    <input id="inicio" class="input101 " type="date" name="inicio" />
    </div>
</div>

<div class="form-row wrap-input100 validate-input ">
    <div class="name">Fecha de final</div>
    <div class="input-group wrap-input100 validate-input">
    <input id="fin" class="input101 " type="date" name="fin" />
    </div>
</div>

<input type="submit" class="btn btn-success" value="Enviar">

                    </form> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>