<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos y Grupos</title>
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
        <p><strong><h1>GRUPOS Y ALUMNOS</h1></strong></p>
    </header>
    <table class="table table-light table-bordered table-hover"  >
        <thead class="thead-dark" style="background-color:#000000;color:white;border:1px solid #BDB76B;">
            <tr>
                
                <th class="card-title">ID</th>
                <th class="card-title">ALUMNOS</th>
                <th class="card-title">NIVEL</th>
                <th class="card-title">ENTRENADOR</th>
             
            </tr>
        </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr>
                    <td>{{$dato->idregistro}}</td>
                    <td>{{$dato -> nombres}} {{$dato -> apellido_paterno}} {{$dato -> apellido_materno}}</td>
                    <td>{{$dato -> nivel}}{{ ' '.$dato->grado}}{{$dato -> seccion}}</td>
                    <td>{{$dato -> nombresentrenador}} {{$dato -> paternoentrenador}} {{$dato -> maternoentrenador}}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
    <footer>DOCUMENTO PDF</footer>
</body>
</html>