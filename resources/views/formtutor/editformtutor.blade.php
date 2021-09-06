<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('Gestión de formulario de tutor')}}
        </h2>
    </x-slot>
    
<form action="{{url('/formtutores/'. $tutor->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('PATCH')}}
    @include('formtutor.formtutores',['modo'=>'editar'])
   
</form>
</x-app-layout>