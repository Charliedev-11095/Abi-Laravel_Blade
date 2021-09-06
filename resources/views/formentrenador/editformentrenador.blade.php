<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('Gestión de formulario de entrenadores')}}
        </h2>
    </x-slot>

<form action="{{url('/formentrenadores/'. $entrenador->id)}}" method="post">
    {{ csrf_field() }}
    {{method_field('PATCH')}}
    @include('formentrenador.formentrenadores',['modo'=>'editar'])
</form>

</x-app-layout>