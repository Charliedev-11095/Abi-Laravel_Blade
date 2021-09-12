<html>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <head>
        
        <style>
           
 @page {
                margin: 100px 25px;
            }
header {
                position: fixed;
                top: -60px;
                left: 2cm;
                right: 2cm;
                height: 50px;
                font-size: medium;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }
            footer {
                position: fixed;
                bottom: -60px; 
                left: 2cm;
                right: 2cm;
                height: 50px;
                /* position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px;  */

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            body {
           font-family: Arial, Helvetica, sans-serif;
           font-size:medium;
        }

        #header { position: fixed; center: 0px; width:100%; bottom: -150px; right: 0px; height: 150px; background-color: #4b94d9; color:#000; text-align: center; }
	#page-wrap {
            width: 700px;
            margin: 0 auto;
	}
        .center-justified {
            text-align: justify;
            margin: 0 auto;
            width: 30em;
	}
	table.outline-table {
            border: 1px solid black;
            border-spacing: 0;
            
	}
	tr.border-bottom td, td.border-bottom {
            border-bottom: 1px solid black;
	}
	tr.border-top td, td.border-top {
            border-top: 1px solid black;
	}
	tr.border-right td, td.border-right {
            border-right: 1px solid black;
	}
	tr.border-right td:last-child {
            border-right: 0px;
	}
	tr.center td.center {
            text-align: center;
            valign:"middle";
	}
    
	td.pad-center {
            padding-center: 5px;
            line-height: 2.4;
	}
	tr.right-center td, td.right-center {
            text-align: right;
            padding-right: 50px;
	}
	tr.right td, td.right {
            text-align: right;
	}
        .content > div > span{
            display:inline-block;
            width:50%; /* or choose some other value */
        }
        .contentdate > div > span{
            display:inline-block;
            width:35%; /* or choose some other value */
        }
        body {
      margin-top: 5cm;
      margin-left: 2cm;
      margin-right: 2cm;
      margin-bottom: 2cm;
  }

  h1 {
                position: fixed;
                top: 110px;
                left: 2cm;
                right: 2cm;
                height: 50px;
                text-align: center;
  }
        </style>
    </head>
    <body>
        
        <header class="">
            TABLA DE CONTENIDO
        </header>
        <h1>TABLA ENTRENADOR</h1>
        <footer>
            Copyright &copy; <?php echo date("Y");?> 
        </footer>
        

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
         @foreach ($formentrenador as $entrenador)
         
            <table width="100%">
                <tbody> 
                    <tr class="border-bottom border-right border-top" style="background:#353940;color:#FFF;">
                        <td width="2%" class="pad-center"><strong>ID</strong></td>
                        <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$loop->iteration}}</td>
                        
                     </tr>
                <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                   <td width="2%" class="pad-center"><strong>Nombres</strong></td>
                   <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->nombres}}</td>
                   
                </tr>
                <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                   <td class="pad-center"><strong>Apellido Paterno</strong></td>
                   <td style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->apellido_paterno}}</td>
                </tr>
                <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td width="2%" class="pad-center"><strong>Apellido Materno</strong></td>
                    <td width="2%"style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->apellido_materno}}</td>
                    
                 </tr>
                 <tr class="border-bottom border-right">
                    <td class="pad-center" style="background:#353940;color:#FFF;"><strong>Calle<strong></strong></td>
                    <td style="text-align:center;">{{$entrenador->calle}}</td>
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td width="2%" class="pad-center"><strong>Número Interior</strong></td>
                    <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->numero_interior}}</td>
                    
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td class="pad-center"><strong>Número Exterior</strong></td>
                    <td style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->numero_exterior}}</td>
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td width="2%" class="pad-center"><strong>Colonia</strong></td>
                    <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->colonia}}</td>
                    
                 </tr>
                 <tr class="border-bottom border-right">
                    <td class="pad-center"style="background:#353940;color:#FFF;"><strong>Ciudad</strong></td>
                    <td style="text-align:center;">{{$entrenador->ciudad}}</td>
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td width="2%" class="pad-center"><strong>Estado</strong></td>
                    <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->estado}}</td>
                    
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td class="pad-center"><strong>Código Postal</strong></td>
                    <td style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->codigo_postal}}</td>
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td width="2%" class="pad-center"><strong>Curp</strong></td>
                    <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->curp}}</td>
                    
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td class="pad-center"><strong> Fecha de Nacimiento</strong></td>
                    <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->fecha_de_nacimiento}}</td>
                 </tr>
                 <tr class="border-bottom border-right" style="background:#353940;color:#FFF;">
                    <td width="2%" class="pad-center"><strong>Teléfono</strong>
                    <td width="2%" style="text-align:center;background:#ffffff;color:rgb(0, 0, 0);">{{$entrenador->telefono}}</td>
                 </tr>
                
                </tbody>
              
                </table>
                <br><br>
                @endforeach
                
        </main>
      </body>
</html>