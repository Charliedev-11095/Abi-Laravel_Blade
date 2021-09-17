<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\historicos_medicos;
use App\Models\alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;
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

        return view('consulta_alumnos.consulta_medica')->with('tablasmedicas',$tablasmedicas);
        
    }







    
}
