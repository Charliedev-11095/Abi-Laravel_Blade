<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('Gestión de formulario de alumnos')}}
        </h2>
    </x-slot>

<form action="{{url('/formalumnos/'. $alumno->id)}}" method="post">
    {{ csrf_field() }}
    {{method_field('PATCH')}}
    @include('formalumno.formalumnos',['modo'=>'editar'])
</form>
</x-app-layout>