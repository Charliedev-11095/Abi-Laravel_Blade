<?php

namespace App\Http\Controllers;



use App\Models\historicos_deportivos;
use App\Models\asistencias;
use App\Http\Controllers\Controller;
use App\Models\grupo_alumnos;
use App\Models\alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;
use Illuminate\Http\Request;
use App\Models\historicos_medicos;
use App\Models\registros_medicos;
use App\Models\AlumnosPivoteController;
use Illuminate\Support\Facades\Auth;


use DB;


class PanelAlumnoController extends Controller
{



    public function __construct()
    {
        $this->middleware('alumn');
    }


    public function index(Request $request){
        return view('panelalumno');
    }



    public function consultamedica_alumno(Request $request){
        //Obtener el id actual de usuario en curso
        $id = Auth::id();

        //Obtener el id del alumno y guardarlo, de usuario actual
        $alumnos =DB::table('alumnos_pivotes')
        ->where('alumnos_pivotes.users_id', '=', $id)
        ->get(array('alumnos_id'));

        $valoralumno = '';

        foreach ($alumnos as $a) {
            $valoralumno = $a->alumnos_id;
        }

       // return  $valoralumno;

        $tablasmedicas =DB::table('historicos_medicos')
        ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
        ->where('alumnos.id', '=', $valoralumno)
        ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get(); 

//Obtener los datos de el registro medico del alumno
$formreg_med=DB::table('registros_medicos')
        ->join('alumnos','alumnos.id', '=','registros_medicos.alumnos_id')
        ->where('alumnos.id', '=', $valoralumno)
        ->select('registros_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();


        return view('consulta_alumnos.consulta_medica')
        ->with('formreg_med',$formreg_med)
        ->with('tablasmedicas',$tablasmedicas);
        
    }




    public function consulta_asistencia(Request $request){
        //Obtener el id actual de usuario en curso
        $id = Auth::id();

        //Obtener el id del alumno y guardarlo, de usuario actual
        $alumnos =DB::table('alumnos_pivotes')
        ->where('alumnos_pivotes.users_id', '=', $id)
        ->get(array('alumnos_id'));

        $valoralumno = '';

        foreach ($alumnos as $a) {
            $valoralumno = $a->alumnos_id;
        }

//////////////////////////////////////////////////////////////////////////////////

        //Obtener el id de grupo
        $id_grupos =DB::table('grupo_alumnos')
        ->where('grupo_alumnos.alumnos_id', '=', $valoralumno)
        ->select('grupo_alumnos.grupos_id')
        ->get(array('grupos_id'));

        $nombregrupo = 0;
              foreach ($id_grupos as $id_grupo) {
              $nombregrupo = $id_grupo->grupos_id;
              }

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

           if ($valormaximo==0) {
            $resultado=0;
           } else {
            $resultado=(100/$valormaximo)*$contador_asistencias;
           }
           
           $datosGrupoAlumno=[
              'asistencias'=>$contador_asistencias,
              'calificacion_asistencias'=>$resultado,
          ];
           grupo_alumnos::where('id','=',$valorb)->update($datosGrupoAlumno);

       }


//////////////////////////////////////////////////////////////////////////////////
       //Obtenemos los datos del alumno, como sus asistencias y calificacion
        $datosGrupo_alumnos =DB::table('grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.alumnos_id', '=', $valoralumno)
        ->select('grupo_alumnos.*','grupos.*')
        ->get(); 

//Obtenemos todas las asistencias del alumno
        $datos =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.alumnos_id', '=', $valoralumno)
        ->where('grupos.estado', '=', 'Activo')
        ->select('asistencias.*')
        ->get();


        return view('consulta_alumnos.consulta_asistencia')
        ->with('datos',$datos)
        ->with('datosGrupo_alumnos',$datosGrupo_alumnos);
        
    }




    public function consulta_deportiva(Request $request){

        //Obtener el id actual de usuario en curso
        $id = Auth::id();

        //Obtener el id del alumno y guardarlo, de usuario actual
        $alumnos =DB::table('alumnos_pivotes')
        ->where('alumnos_pivotes.users_id', '=', $id)
        ->get(array('alumnos_id'));

        $nombrealumno = '';

        foreach ($alumnos as $a) {
            $nombrealumno = $a->alumnos_id;
        }



        $historicos_deportivos = historicos_deportivos::all();
        $alumnos = alumnos::all();
        
        $historicos_deportivos2 =DB::table('historicos_deportivos')
        ->join('alumnos','alumnos.id', '=','historicos_deportivos.alumnos_id')
        ->where('alumnos.id', '=', $nombrealumno)
        ->select('historicos_deportivos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();

        $nombrecompleto =DB::table('alumnos')
        ->where('alumnos.id', '=', $nombrealumno)
        ->select('alumnos.*')
        ->get();

////////////////////////////////////////////////////
//Se obtiene el id del alumno, para posteriormente sumar las evaluaciones de sus secciones y mostrarlos

//Se obtiene el id del grupo, atraves del id del alumno
$datosgrupo_alumnos =DB::table('grupo_alumnos')
->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
->where('alumnos.id', '=', $nombrealumno)
->select('grupo_alumnos.*')
->get(array('grupos_id'));

$nombregrupo = 0;
      foreach ($datosgrupo_alumnos as $datogrupo_alumno) {
      $nombregrupo = $datogrupo_alumno->grupos_id;
      }


//Se recolecta el id de la asgnacion unica de grupo_alumno

$idgrupo_alumnos =DB::table('grupo_alumnos')
->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
->where('alumnos.id', '=', $nombrealumno)
->select('grupo_alumnos.*')
->get(array('id'));

$nombregrupo_alumnos = 0;
      foreach ($idgrupo_alumnos as $datogrupo_alumno) {
      $nombregrupo_alumnos = $datogrupo_alumno->id;
      }


 //Obtener el valor maximo de los entrenamientos, en la tabla de grupo
 $datosgrupos =DB::table('grupos')
 ->where('grupos.id', '=', $nombregrupo)
 ->select('grupos.evaluaciones_maximo')
 ->get(array('evaluaciones_maximo'));

 $valormaximo = 0;
       foreach ($datosgrupos as $valor) {
       $valormaximo = $valor->evaluaciones_maximo;
       }

//Se realiza el conteo y suma de secciones

$datosalumnos =DB::table('grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->select('grupo_alumnos.id as idalumnos')
        ->get(array('idalumnos'));

        $valorb = '';
        
        foreach ($datosalumnos as $a) {
            $valorb = $a->idalumnos;

            $total_liderazgo=0;
            $total_manejobalon=0;
            $total_pases=0;
            $total_pies=0;
            $total_lanzamiento=0;
            $total_defensa=0;

            $contador_evaluaciones = DB::table('historicos_deportivos')
           ->join('grupo_alumnos','grupo_alumnos.id', '=','historicos_deportivos.relacion_grupo_alumnos')
           ->where('historicos_deportivos.relacion_grupo_alumnos', '=', $valorb)
           ->get(array('seccionliderazgo','seccionmanejobalon','seccionpases','seccionpies','seccionlanzamiento','secciondefensa'));

           foreach($contador_evaluaciones as $contador) {
                $total_liderazgo=$total_liderazgo+$contador->seccionliderazgo;
                $total_manejobalon=$total_manejobalon+$contador->seccionmanejobalon;
                $total_pases=$total_pases+$contador->seccionpases;
                $total_pies=$total_pies+$contador->seccionpies;
                $total_lanzamiento=$total_lanzamiento+$contador->seccionlanzamiento;
                $total_defensa=$total_defensa+$contador->secciondefensa;
            }

            if ($valormaximo==0) {
                $resultado=0;
                $resultadobalon=0;
                $resultadopases=0;
                $resultadopies=0;
                $resultadolanzamiento=0;
                $resultadodefensa=0;
            } else {
                $resultado=(100/($valormaximo*36))*$total_liderazgo;
                $resultadobalon=(100/($valormaximo*16))*$total_manejobalon;
                $resultadopases=(100/($valormaximo*16))*$total_pases;
                $resultadopies=(100/($valormaximo*8))*$total_pies;
                $resultadolanzamiento=(100/($valormaximo*16))*$total_lanzamiento;
                $resultadodefensa=(100/($valormaximo*16))*$total_defensa;
            }
            

            $datosGrupoAlumno=[
               'total_liderazgo'=>round($resultado),
               'total_manejobalon'=>round($resultadobalon),
               'total_pases'=>round($resultadopases),
               'total_pies'=>round($resultadopies),
               'total_lanzamiento'=>round($resultadolanzamiento),
               'total_defensa'=>round($resultadodefensa),
           ];
            grupo_alumnos::where('id','=',$valorb)->update($datosGrupoAlumno);
        }

















//Obtener los ids de los alumnos en el grupo
$recorrido_alumnos =DB::table('grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->select('grupo_alumnos.id as idalumnos')
        ->get(array('idalumnos'));

        $identificador_grupo_alumnos = '';
        

        foreach ($recorrido_alumnos as $item_alumno) {
           $identificador_grupo_alumnos = $item_alumno->idalumnos;
           $totalvalorporcentajes=0;

           $contador_evaluaciones = DB::table('historicos_deportivos')
           ->join('grupo_alumnos','grupo_alumnos.id', '=','historicos_deportivos.relacion_grupo_alumnos')
           ->where('historicos_deportivos.relacion_grupo_alumnos', '=', $identificador_grupo_alumnos)
           ->get(array('total_historico'));

           foreach($contador_evaluaciones as $contador) {
            $totalvalorporcentajes=$totalvalorporcentajes+$contador->total_historico;

            }

          
           if ($valormaximo==0) {
            $resultado=0;
           } else {
            $resultado=(100/($valormaximo*100))*$totalvalorporcentajes;
           }
           
           $datosGrupoAlumno=[
            
              'calificacion_entrenamiento'=>round($resultado),
          ];
           grupo_alumnos::where('id','=',$identificador_grupo_alumnos)->update($datosGrupoAlumno);

        }












     
//Se envia a la vista los datos para su visualizacion

$alumnoestadisticas =DB::table('grupo_alumnos')
->where('grupo_alumnos.id', '=', $nombregrupo_alumnos)
->select('grupo_alumnos.*')
->get();


////////////////////////////////////////////////////


        return view('consulta_alumnos.consulta_deportiva')->with('alumnos',$alumnos)
        ->with('alumnoestadisticas',$alumnoestadisticas)
        ->with('nombrecompleto',$nombrecompleto)
        ->with('historicos_deportivos2',$historicos_deportivos2);
  
        
    }


    
}
