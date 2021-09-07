<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registros deportivos</title>
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
        <p><strong><h1> REGISTROS DEPORTIVOS EXISTENTES</h1></strong></p>
    </header>
<table class="table table-light table-bordered table-hover" >
    <thead class="thead-dark" style="background-color:#000000;color:white;border:1px solid #BDB76B;">
    <tr>
        <th class="card-title">ID DE REGISTRO</th>
        <th class="card-title">ALUMNO</th>
        <th class="card-title">OBSERVACIONES</th>
        <th class="card-title">FECHA DE CREACIÓN</th>
        <th class="card-title">ACTUALIZADO EN</th>
    </tr>
</thead>
    <tbody>
        @foreach ($datos2 as $dato2)       
        <tr>    
            <td>{{$dato2->id}}</td>
            <td>{{$dato2->identificadoralumno}} {{$dato2->nombres}} {{$dato2->apellido_paterno}} {{$dato2->apellido_materno}} </td>
            <td>{{$dato2->observaciones}}</td>
            <td>{{$dato2->fecha_creacion}}</td>
            <td>{{$dato2->updated_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    <footer>DOCUMENTO PDF</footer>
</body>
</html>