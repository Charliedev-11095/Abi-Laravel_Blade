<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>regitro historico_med</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
</head>
<style>
    @page {
           margin: 0cm 0cm;
           font-size: 1em;
       }

       body {
           margin: 3cm 2cm 2cm;
       }

       header {
           position: fixed;
           top: 0cm;
           left: 0cm;
           right: 0cm;
           height: 2cm;
           background-color: #090909;
           color: white;
           text-align: center;
           line-height: 30px;
       }

       footer {
           position: fixed;
           bottom: 0cm;
           left: 0cm;
           right: 0cm;
           height: 2cm;
           background-color: #000000;
           color: white;
           text-align: center;
           line-height: 35px;
       }
</style>
<body>
    <header>
        <p><strong><h1> REGISTROS MEDICOS EXISTENTES</h1></strong></p>
    </header>
    <table class="table table-light table-bordered table-hover" >
        <thead class="thead-dark" style="background-color:#000000;color:white;border:1px solid #BDB76B;">
            <tr>
                <th class="card-title">Id de registro</th>
                <th class="card-title">Alumno</th>
                <th class="card-title">Comentarios</th>
                <th class="card-title">Fecha de creación</th>
                <th class="card-title">Fecha de actualización</th>
            </tr>
        
        </thead>
        <tbody>
            @foreach ($historicos_medicos as $historicos_medico)
                
            <tr>    
                <td>{{$historicos_medico->id}}</td>
                <td>{{$historicos_medico->nombres}} {{$historicos_medico->apellido_paterno}} {{$historicos_medico->apellido_materno}}</td>
                <td>{{$historicos_medico->comentarios}}</td>
                <td>{{$historicos_medico->fecha_creacion}}</td>
                <td>{{$historicos_medico->updated_at}}</td>
            </tr>
            @endforeach
    
        </tbody>
    </table>
    <footer>DOCUMENTO PDF</footer>
</body>
</html>