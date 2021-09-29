<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{_('BIENVENIDO AL CALENDARIO DE EVENTOS, CREA UNO')}}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-3 lg:px-4">

    <!DOCTYPE html>
    <html lang="es">

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div id='calendar'></div>

    
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Título del evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="hide">
                    <label for="">rol:</label>
                    <input type="text" id="rol_usuario" name="rol_usuario" value="{{Auth::user()->role}}">
                    </div>    
                    <form action="{{url('/eventos')}}" method="POST" enctype="multipart/form-data" id="formalta"name="formalta">
                            {{csrf_field()}}
                            
                         <div class="hide">
                          <label for="">ID EVENTO:</label>
                          <input type="text" id="id" name="id">
                          <label for="">ID USUARIO:</label>
                          <input type="text"  id="alta_usuario" name="alta_usuario" value="{{Auth::user()->id}}">
                         
                          
                          <label for="fecha">fecha</label>
                          <input type="text"  id="fecha" name="fecha" name="fecha" >
                        </div>

                        <div class="form-group col-md-7 ">
                          <label for="title">Título</label>
                          <input type="text" class="form-control" id="title" name="title">
                        </div>

                        

                        <div class="form-group col-md-5">
                              <label for="hora">Hora</label>
                              <input type="time" class="form-control" id="hora" name="hora" >
                        </div>

                        <div class="form-group col-md- col-12">
                          <label for="descripcion">Descripción</label>
                          <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
                        </div>

                        <div class="form-group col-md- col-12">
                          <label for="color">Color de linea</label>
                          <input type="color" class="form-control" id="color" name="color" >
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                  
                    <button type="button" class="btn btn-warning " id="btnModificar">Modificar</button>
                 
                    <button type="button" class="btn btn-danger" id="btnEliminar">Borrar</button>
                 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
  
</body>

</html>
    </div>
</div>
</x-app-layout>

