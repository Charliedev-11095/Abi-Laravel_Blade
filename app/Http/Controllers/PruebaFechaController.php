<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use DatePeriod;
use DateInterval;
class PruebaFechaController extends Controller
{
    //

    public function index(Request $request){


        return view('prueba');

    }

    public function store(Request $request){


        $fecha1=$request->get('inicio');
        $fecha2=$request->get('fin');

       // definimos 2 array uno para los nombre de los dias y otro para los nombres de los meses
$nombresDias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado" );
$nombresMeses = array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

// establecemos la fecha de inicio
$inicio =  DateTime::createFromFormat('Y-m-d',  $fecha1);
// establecemos la fecha final (fecha de inicio + dias que queramos)
$fin =  DateTime::createFromFormat('Y-m-d', $fecha2);
$fin->modify( '+1 day' );

// creamos el periodo de fechas
$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);

// recorremos las fechas del periodo
foreach($periodo as $date){
    // definimos la variables para verlo mejor
    $nombreDia = $nombresDias[$date->format("w")];
    $nombreMes = $nombresMeses[$date->format("n")];
    $numeroDia = $date->format("j");
    $anyo = $date->format("Y");
    // mostramos los datos
    echo $nombreDia.' '.$numeroDia.' de '.$nombreMes.' de '.$anyo.'<br>';
}

$day = date("l");
switch ($day) {
    case "Sunday":
           echo "Hoy es domingo";
    break;
    case "Monday":
           echo "Hoy es lunes";
    break;
    case "Tuesday":
           echo "Hoy es martes";
    break;
    case "Wednesday":
           echo "Hoy es miercoles";
    break;
    case "Thursday":
           echo "Hoy es jueves";
    break;
    case "Friday":
           echo "Hoy es viernes";
    break;
    case "Saturday":
           echo "Hoy es sabado";
    break;
}








    }


}
