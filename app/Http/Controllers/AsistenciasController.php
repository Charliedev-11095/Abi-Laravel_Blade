<?php

namespace App\Http\Controllers;

use App\Models\asistencias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\grupo_alumnos;
use App\Models\alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;
use DB;

class AsistenciasController extends Controller
{

    public function __construct()
    {
        $this->middleware('entrena');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $now = date('Y-m-d');
        $nombregrupo=$request->get('buscarpor');
        $alumnos = alumnos::all();
        $entrenadores = entrenadores::all();
        $grupos = grupos::all();
        $grupoalumnos = grupo_alumnos::all();

        $datos =DB::table('alumnos')
        ->join('grupo_alumnos','grupo_alumnos.alumnos_id', '=','alumnos.id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('grupo_alumnos.estado', '=', 'Activo')
        ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno', 'entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.grupos_id  as grupo_asignado','grupos.grado as grados','grupos.seccion as secciones','grupos.nivel')
        ->get();

//////////////////////////////////////////////////////////////////////////







        $insertaralumnos =DB::table('grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo) 
        ->select('grupo_alumnos.alumnos_id')
        ->get(array('alumnos_id'));


         $valoral = '';
         
       
        foreach ($insertaralumnos as $al) {
            $valoral = $al->alumnos_id;



            $existenciasfalsas = DB::table('asistencias')
            ->where('asistencias.relacion_grupo_alumnos', '=', $valoral)
            ->where('asistencias.fecha_asistencia', '=', $now)
            ->where('asistencias.asistencia', '=', 'Ninguna')
            ->count();

            $existencias = DB::table('asistencias')
            ->where('asistencias.relacion_grupo_alumnos', '=', $valoral)
            ->where('asistencias.fecha_asistencia', '=', $now)
            ->where('asistencias.asistencia', '=', 'Marcada')
            ->count();


            if ( $existencias==0 && $existenciasfalsas==0) {
                $datosUsuario=[
                    'fecha_asistencia'=>$now,
                    'asistencia'=>'Ninguna',
                    'relacion_grupo_alumnos'=>$valoral,
                ];
                asistencias::insert($datosUsuario);
            }
           
        }


////////////////////////////////////////////////////////////////////////

        //Crear una variable para comparar los alumnos que SI asistieron y deshabilitar boton de marcar asistencia
        $datosasistencia =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('asistencias.fecha_asistencia', '=', $now)
        ->select('asistencias.*')
        ->get();
        //

        $datos2 =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('asistencias.fecha_asistencia', '=', $now)
        ->where('asistencias.asistencia', '=', 'Marcada')
        ->select('alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','asistencias.fecha_asistencia','asistencias.asistencia','grupos.grado as grados','grupos.seccion as secciones','grupos.nivel')
        ->get();

        return view('asistencia.createasistencia')->with('datos',$datos)
        ->with('datos2',$datos2)
        ->with('datosasistencia',$datosasistencia)
        ->with('grupos',$grupos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $now = date('Y-m-d');
        $nombregrupo=$request->post('buscarpor');
        $alumnos = alumnos::all();
        $entrenadores = entrenadores::all();
        $grupos = grupos::all();
        $grupoalumnos = grupo_alumnos::all();
      
//////////////////////////////////////////////////////////////////////7 

$insertaralumnos =DB::table('asistencias')
->where('asistencias.relacion_grupo_alumnos', '=', $request->relacion_grupo_alumnos) 
->where('asistencias.fecha_asistencia', '=', $now) 
->select('asistencias.id')
->get(array('id'));

 $valoral = '';
 
 foreach ($insertaralumnos as $al) {
    $valoral = $al->id;
}


//////////////
        $datosUsuario=[
            'asistencia'=>'Marcada',
        ];
        asistencias::where('id','=',$valoral)->update($datosUsuario);


//////////////////////////////////////////////////////////////////////////////77




        
        $datos =DB::table('alumnos')
        ->join('grupo_alumnos','grupo_alumnos.alumnos_id', '=','alumnos.id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('grupo_alumnos.estado', '=', 'Activo')
        ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno', 'entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.grupos_id  as grupo_asignado','grupos.grado as grados','grupos.seccion as secciones','grupos.nivel')
        ->get();

        //Crear una variable para comparar los alumnos que SI asistieron y deshabilitar boton de marcar asistencia
        $datosasistencia =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('asistencias.fecha_asistencia', '=', $now)
        ->select('asistencias.*')
        ->get();
        //


        $datos2 =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('asistencias.fecha_asistencia', '=', $now)
        ->where('asistencias.asistencia', '=', 'Marcada')
        ->select('alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','asistencias.fecha_asistencia','asistencias.asistencia','grupos.grado as grados','grupos.seccion as secciones','grupos.nivel')
        ->get();

    
        return view('asistencia.createasistencia')->with('datos',$datos)
        ->with('datos2',$datos2)
        ->with('datosasistencia',$datosasistencia)
        ->with('grupos',$grupos);
        
    }




    public function dia(Request $request)
    {
        

        $nombregrupo=$request->post('buscarpor');
        $now=$request->post('buscarporfecha');
        $nombrealumno=$request->post('buscarporalumno');
   

        $alumnos = alumnos::all();
        $grupos = grupos::all();

        $datos2 =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('asistencias.fecha_asistencia', '=', $now)
        ->select('alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','asistencias.fecha_asistencia','asistencias.asistencia','grupos.grado as grados','grupos.seccion as secciones','grupos.nivel')
        ->get();

        $datosalumnos =DB::table('alumnos')
        ->where('alumnos.id', '=', $nombrealumno)
        ->select('alumnos.*')
        ->get();

        $datos =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->where('grupo_alumnos.alumnos_id', '=', $nombrealumno)
        ->select('asistencias.*')
        ->get();


        return view('asistencia.dia_asistencia')
        ->with('datos',$datos)
        ->with('datosalumnos',$datosalumnos)
        ->with('alumnos',$alumnos)
        ->with('datos2',$datos2)
        ->with('grupos',$grupos);

    }



 
}
