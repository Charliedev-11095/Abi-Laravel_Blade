<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            GESTIÓN DE GRUPOS
        </h2>
    </x-slot>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">    

@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissable"> 
            <li>{{$error}}</li>
        </div>
    @endforeach
</ul>
</div>
@endif
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
            <a href="{{url('/asistencia/grupo_alumnos')}}"><img src="{{asset('images/icons/back-icon.png')}}"></a>
            <H2 class="title">CREAR GRUPO</H2>
        </div>

<form action="{{url('/asistencia/grupos')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

{{-- Se incluye el create.blade.php con 'include' --}}
@include('asistencia.formgrupo',['Modo'=>'crear'])


</form> 
    </div>
</div>


</div>
</x-app-layout>