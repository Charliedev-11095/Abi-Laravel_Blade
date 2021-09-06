<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('Gestión de formulario de registro médico')}}
        </h2>
    </x-slot>

<form action="{{url('/formreg_med/'. $regmed->id)}}" method="post">
    {{ csrf_field() }}
    {{method_field('PATCH')}}
    @include('formreg_med.formreg_med',['modo'=>'editar'])
</form>
</x-app-layout>