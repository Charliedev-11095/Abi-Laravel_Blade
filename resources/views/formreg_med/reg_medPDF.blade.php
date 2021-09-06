<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registros medicos</title>
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
        <p><strong><h1>TABLA REGITROS MÉDICOS</h1></strong></p>
    </header>
    <div class="container">
        <table class="table table-bordered" >
            <thead class="thead-dark" style="background-color:#000000;color:white;border:1px solid #BDB76B;">
            <tr>
                <th>ID</th>
                <th>estatura</th>
                <th>peso</th>
                <th>presion arterial</th>
                <th>tipo de sangre</th>
                <th>edad</th>
                <th>padecimiento</th>
                <th>tratamiento</th>
                <th>alergia</th>
                <th>conducta</th>
                <th>impedimento físico</th>
                <th>condición física</th>
            </tr>
        </thead>
        <tbody>
         
            @foreach ($formreg_med as $regmed)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$regmed->estatura}}</td>
                <td>{{$regmed->peso}}</td>
                <td>{{$regmed->presion_arterial}}</td>
                <td>{{$regmed->tipo_sanguineo}}</td>
                <td>{{$regmed->edad}}</td>
                <td>{{$regmed->padecimiento}}</td>
                <td>{{$regmed->tratamiento}}</td>
                <td>{{$regmed->alergia}}</td>
                <td>{{$regmed->conducta}}</td>
                <td>{{$regmed->impedimento_fisico}}</td>
                <td>{{$regmed->condicion_fisica}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<footer>DOCUMENTO PDF</footer>
</body>
</html>