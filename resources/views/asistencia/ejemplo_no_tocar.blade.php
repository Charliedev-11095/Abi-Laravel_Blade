

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet"/> 
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">







<form>
<div>
    <label for="Grupo">Grupo</label>
    <select name="grupos_id" id="grupos_id">
        @foreach ($grupos as $grupo)
        
         <option value="{{$grupo->id}}">
            
            Grupo:{{$grupo->grado}} {{$grupo->seccion}} Turno:{{$grupo->turno}}

         </option>
           
        @endforeach

    </select>
</div>


<div>
    <label for="Alumnos">Alumnos</label>
   <select name="alumnos_id" id="alumnos_id"> 
        @foreach ($alumnos as $alumno)


            <option value="{{$alumno->id}}">
                {{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}

            </option> 
        @endforeach

    </select> 
</div>


</div>

<div>
    <label for="">Entrenadores</label>
    <select name="entrenadores_id" id="entrenadores_id">
        @foreach ($entrenadores as $entrenador)
         <option value="{{$entrenador->id}}">
                {{$entrenador->nombres}} {{$entrenador->apellido_paterno}} {{$entrenador->apellido_materno}}

            </option>
        @endforeach

    </select>   
</div>



<button onclick="myCreateFunction(e)">AGREGAR REGISTRO</button>


{{-- ZONA DE TABLA --}}


<div class="container">
    <table class="table table-hover" id="myTable">
       
<thead>
        <tr>
          <td>ALUMNO</td>
          <td>GRUPO</td>
          <td>ENTRENADOR</td>
          <td>ACCION</td>
        </tr>

</thead>

<tbody id="tablebody">


</tbody>

        
        
      </table>
      
</div>


<input type="submit" class="btn btn-success" id="guardar_bd" value="Guardar a la BD">
</form>



{{-- ZONA DE SCRIPT --}}

<script>
$.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
    });




/* INICIO DE myCreateFunction */

function myCreateFunction(e) {
    e.preventDefault();
  var table = document.getElementById("tablebody");
  var selectalumno = document.getElementById("alumnos_id");
  var selecgrupo = document.getElementById("grupos_id");
  var selectentrenador = document.getElementById("entrenadores_id");
  var botonborrarfila =  '<input name="btnborrarfila" id="btnborrarfila" type="button" class="borrar" value="Eliminar" />';

  var textalumno= selectalumno.options[selectalumno.selectedIndex].text;
  var textgrupo= selecgrupo.options[selecgrupo.selectedIndex].text;
  var textentrenador= selectentrenador.options[selectentrenador.selectedIndex].text;

var textalumnoid= selectalumno.value;
var textgrupoid= selecgrupo.value;
var textentrenadorid= selectentrenador.value;

   var row = table.insertRow(0);
   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);

   cell1.innerHTML =textalumno+"<input type='hidden' name='inputalumno_id' id='inputalumno_id' value='"+textalumnoid+"'>";
   cell2.innerHTML =textgrupo+"<input type='hidden' name='inputgrupo_id'  id='inputgrupo_id'  value='"+textgrupoid+"'>";
   cell3.innerHTML =textentrenador+"<input type='hidden' name='inputentrenador_id'  id='inputentrenador_id' value='"+textentrenadorid+"'>";
   cell4.innerHTML =botonborrarfila;

console.log(textgrupo);

}
/* FIN DE myCreateFunction */

    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });


    $(document).on('click', '#guardar_bd', function (event) {
        event.preventDefault();
       insertar_campos();
    });
    
function insertar_campos() {
       //array para las filas
        var data_array = [];
        
        //array para recoger los datos de la tabla html
        var data_object =[];
            $('#myTable > tbody  > tr').each(function(index, val) {
                

                var grupo = $(this).find("td").eq(1).children()[0].value;  
                var alumno = $(this).find("td").eq(0).children()[0].value;    
                var entrenador = $(this).find("td").eq(2).children()[0].value; 
                    
                
                console.log(grupo);
                console.log(alumno);
                console.log(entrenador);
               
                data_object = [grupo,
                               alumno,
                               entrenador];
                              
                data_array.push(data_object);
                
            });
            console.log(data_array);

    $.ajax({
    type: "POST",
    url: "{{route('storegrupoalumnos')}}",
    data: {detalles: data_array},
    success: function (data) {
       console.log('EXITOSO');
    },
    error: function (data, textStatus, errorThrown) {
        console.log('FRACASO');

    },
});

        
            
      }  




</script>
{{-- TERMINO ZONA DE SCRIPT --}}

{{-- Se agrega para para dirigirse a listadogrupos o principal de grupos --}}
<a class="btn btn-primary" href="{{url('/asistencia/grupo_alumnos')}}">Regresar</a>












{{-- 
Ejemplos de borrado --}}

<form method="post" action="{{url('/asistencia/grupo_alumnos/'.$dato->idregistro)}}" style="display:inline">
    {{ csrf_field() }}
    {{method_field('DELETE')}}
    
    <button class="btn btn-danger" type="submit" onclick="return confirm('Quiere borrar registro?');">Borrar</button>
{{-- En el redireccionamiento, se agrega la ruta de crear registro --}}

</form>

