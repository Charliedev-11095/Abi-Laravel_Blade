<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
            {{_('Gestión de formulario de tutor')}}
        </h2>
    </x-slot>

<!DOCTYPE html>
<html lang="es">
<body>          
                    <form action="{{url('/formtutores')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                      

                


                        @include('formtutor.formtutores',['modo'=>'crear'])
                    
                        <input type="hidden"  name="alta_usuario"  class="input101" value="{{Auth::user()->id}}">
                  
                        

                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

</x-app-layout>
