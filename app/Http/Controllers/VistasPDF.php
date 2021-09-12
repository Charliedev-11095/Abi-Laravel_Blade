<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\alumnos;
use App\Models\tutores;
use App\Models\entrenadores;
use App\Models\registros_medicos;
use App\Models\historicos_deportivos;
use App\Models\historicos_medicos;
use App\Models\asistencias;
use App\Models\grupos;
use App\Models\grupo_alumnos;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class VistasPDF extends Controller
{
     
     public function alumnosPDf(){
        $formalumno=alumnos::paginate(5);
  return view('formalumno.alumnosPDF',compact('formalumno'));
     }
  
     public function TutoresPDF(){
        $formtutor=tutores::paginate(5);
  return view('formtutor.TutoresPDF',compact('formtutor'));
     }
  
     public function EntrenadoresPDF(){
        $formentrenador=entrenadores::paginate(5);
  return view('formentrenador.EntrenadoresPDF',compact('formentrenador'));
     }
  
     public function Reg_MedPDF(){
        $formreg_med=registros_medicos::paginate(5);
  return view('formreg_med.reg_medPDF',compact('formreg_med'));
     }
     public function Reghisto_depPDF(){
  
        $datos2 =DB::table('historicos_deportivos')
          ->join('alumnos','alumnos.id', '=','historicos_deportivos.alumnos_id')
          ->select('historicos_deportivos.id','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','alumnos.id as identificadoralumno','historicos_deportivos.observaciones','historicos_deportivos.fecha_creacion','historicos_deportivos.updated_at')
          ->get();
  return view('formhistorico_deportivo.Reghisto_depPDF',compact('datos2'));
     }
     public function Reg_HistMedPDF(){
        $historicos_medicos =DB::table('historicos_medicos')
        ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
        ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();
  return view('formhistorico_medico.Reghisto_medPDF',compact('historicos_medicos'));
     }
     public function GruposAsignadosPDF(){
        $datos =DB::table('grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.grado','grupos.seccion','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador' )
        ->get();
  return view('asistencia.AlumnosYGruposPDF',compact('datos'));
     }
     public function listaGrupoPDF(){
        $datos =DB::table('grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.grado','grupos.seccion','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador' )
        ->get();
  return view('asistencia.listaGrupoPDF',compact('datos'));
     }
}