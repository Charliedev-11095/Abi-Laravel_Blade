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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        ->select('grupos.*','grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno', 'entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador')
        ->get();

        return view('asistencia.indexasistencia')->with('datos',$datos)
        ->with('grupos',$grupos);

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

        $datos2 =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('asistencias.fecha_asistencia', '=', $now)
        ->select('alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','asistencias.fecha_asistencia','asistencias.asistencia','grupos.grado as grados','grupos.seccion as secciones','grupos.nivel')
        ->get();

        return view('asistencia.createasistencia')->with('datos',$datos)
        ->with('datos2',$datos2)
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
      
         //$datosGrupo=request()->all();
         $datosGrupo=request()->except('_token','buscarpor');

         asistencias::insert($datosGrupo);

         $now = date('Y-m-d');
        $nombregrupo=$request->post('buscarpor');
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



        $datos2 =DB::table('asistencias')
        ->join('grupo_alumnos','grupo_alumnos.id', '=','asistencias.relacion_grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->where('asistencias.fecha_asistencia', '=', $now)
        ->select('alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','asistencias.fecha_asistencia','asistencias.asistencia','grupos.grado as grados','grupos.seccion as secciones','grupos.nivel')
        ->get();

    
        return view('asistencia.createasistencia')->with('datos',$datos)
        ->with('datos2',$datos2)
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
