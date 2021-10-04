<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use DatePeriod;
use DateInterval;
use App\Models\asistencias;
use App\Http\Controllers\Controller;
use App\Models\grupo_alumnos;
use App\Models\alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;
use DB;


class PruebaFechaController extends Controller
{
    //

    public function index(Request $request)
    {

        $grupos =DB::table('grupos')
        ->where('grupos.estado', '=', 'Activo')
        ->select('grupos.*')
        ->get();

        //Se obtiene el id del grupo
        $listalumno=$request->get('buscarpor');
        $nombregrupo=$request->get('buscarpor');
        //$grupos = grupos::all();
        $datos =DB::table('alumnos')
        ->join('grupo_alumnos','grupo_alumnos.alumnos_id', '=','alumnos.id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->select('grupos.*','grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno', 'entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.calificacion_asistencias')
        ->get();



        //Obtener el valor maximo de las asistencias, en la tabla de grupo
        $datosgrupos =DB::table('grupos')
        ->where('grupos.id', '=', $nombregrupo)
        ->select('grupos.dias_entrenamiento')
        ->get(array('dias_entrenamiento'));

        $valormaximo = 0;
              foreach ($datosgrupos as $valor) {
              $valormaximo = $valor->dias_entrenamiento;
              }
       
       

//Obtener las id de los alumnos en el grupo
$datosalumnos =DB::table('alumnos')
        ->join('grupo_alumnos','grupo_alumnos.alumnos_id', '=','alumnos.id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->select('grupo_alumnos.id as idalumnos')
        ->get(array('idalumnos'));

        $valorb = '';

        foreach ($datosalumnos as $a) {
           $valorb = $a->idalumnos;

           $contador_asistencias = DB::table('asistencias')
           ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
           ->where('asistencias.relacion_grupo_alumnos', '=', $valorb)
           ->where('asistencias.asistencia', '=', 'Marcada')
           ->count();

           $resultado=(100/$valormaximo)*$contador_asistencias;
           $datosGrupoAlumno=[
              'asistencias'=>$contador_asistencias,
              'calificacion_asistencias'=>$resultado,
          ];
           grupo_alumnos::where('id','=',$valorb)->update($datosGrupoAlumno);

       }

       return view('asistencia.indexasistencia')->with('datos',$datos)
       ->with('grupos',$grupos)
       ->with('listalumno',$listalumno);


    }

    public function storefechaprueba(Request $request){


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
