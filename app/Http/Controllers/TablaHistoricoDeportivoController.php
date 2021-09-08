<?php

namespace App\Http\Controllers;

use App\Models\historicos_deportivos;
use App\Models\asistencias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\grupo_alumnos;
use App\Models\alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;
use DB;

class TablaHistoricoDeportivoController extends Controller
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
        $nombrealumno=$request->get('buscarpor');
    

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


        return view('tabladeportiva.indextabladeportiva')->with('alumnos',$alumnos)
        ->with('nombrecompleto',$nombrecompleto)
        ->with('historicos_deportivos2',$historicos_deportivos2);
    }

  
}
