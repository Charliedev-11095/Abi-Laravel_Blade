<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\alumnos;
use App\Models\tutores;
use App\Models\entrenadores;
use App\Models\registros_medicos;
use App\Models\historicos_deportivos;
use App\Models\asistencias;
use App\Models\grupo_alumnos;
use App\Models\Grupos;
use Illuminate\Support\Facades\Auth;
use DB;


class PDFcontroller extends Controller
{
   
    public function alumnosPDF(){
      $id = Auth::id();
      $formalumno = alumnos::all();
      $formalumno=DB::table('alumnos')
        ->where('alumnos.alta_usuario', '=', $id)
        ->select('alumnos.*')
        ->get();
        $pdf = PDF::loadView('formalumno.alumnosPDF',compact('formalumno'));
        return $pdf->setPAper('a4','portrait')->stream('Reporte-Alumno.pdf');
     }

     public function tutoresPDF(){
      $id = Auth::id();
      $formtutor = tutores::all();
      $formtutor=DB::table('tutores')
        ->where('tutores.alta_usuario', '=', $id)
        ->select('tutores.*')
        ->get();
        $pdf = PDF::loadView('formtutor.tutoresPDF',compact('formtutor'));
        return $pdf->setPAper('a4','portrait')->stream('Reporte-tutor.pdf');
     }

     public function entrenadoresPDF(){
      $formentrenador=entrenadores::all();
      $pdf = PDF::loadView('formentrenador.entrenadoresPDF',compact('formentrenador'));
      return $pdf->setPAper('a4','portrait')->stream('Reporte-entrenador.pdf');

   }
   public function reg_medPDF(){
      $id = Auth::id();
      $formreg_med=DB::table('registros_medicos')
      ->join('alumnos','alumnos.id', '=','registros_medicos.alumnos_id')
      ->where('registros_medicos.alta_usuario', '=', $id)
      ->select('registros_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
      ->get();
      $pdf = PDF::loadView('formreg_med.reg_medPDF',compact('formreg_med'));
      return $pdf->setPAper('a4','portrait')->stream('Reporte-entrenador.pdf');

   }
   public function historial_DeportivoPDF(){
      $id = Auth::id();
      $datos2 =DB::table('historicos_deportivos')
      ->join('alumnos','alumnos.id', '=','historicos_deportivos.alumnos_id')
      ->where('historicos_deportivos.alta_usuario', '=', $id)
      ->select('historicos_deportivos.id','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','alumnos.id as identificadoralumno','historicos_deportivos.observaciones','historicos_deportivos.fecha_creacion','historicos_deportivos.updated_at')
      ->get();
      $pdf = PDF::loadView('formhistorico_deportivo.historial_DeportivoPDF',compact('datos2'));
      return $pdf->setPAper('a4','landscape')->stream('Reporte-deportivo.pdf');
   }
   public function historial_MedicoPDF(){
      $id = Auth::id();
      $historicos_medicos =DB::table('historicos_medicos')
      ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
      ->where('historicos_medicos.alta_usuario', '=', $id)
      ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
      ->get();
      $pdf = PDF::loadView('formhistorico_medico.historial_MedicoPDF',compact('historicos_medicos'));
      return $pdf->setPAper('a4','landscape')->stream('Reporte-Médico.pdf');
   }
   public function listaGrupoPDF(){
      $id = Auth::id();
      $grupos = grupos::all();
      $grupos=DB::table('grupos')
        ->where('grupos.alta_usuario', '=', $id)
        ->select('grupos.*')
        ->get();
      $pdf = PDF::loadView('asistencia.listaGrupoPDF',compact('grupos'));
      return $pdf->setPAper('a4','landscape')->stream('Reporte-Registro_listaGrupoAlumnos.pdf');
   }
   public function GruposAsignadosPDF(){
      $datos =DB::table('grupo_alumnos')
      ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
      ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
      ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
      ->where('grupo_alumnos.alta_usuario', '=', $id)
      ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.nivel','grupos.grado','grupos.seccion','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.estado')
      ->get();
   $pdf = PDF::loadView('asistencia.GruposAsignadosPDF',compact('datos'));
   return $pdf->setPAper('a4','landscape')->stream('Reporte-Registro_GrupoAlumnos.pdf');
}
public function listaGrupoAlumnosPDF(){

$datos =DB::table('grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->where('grupo_alumnos.alta_usuario', '=', $id)
        ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.nivel','grupos.grado','grupos.seccion','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.estado')
        ->get();
        $pdf = PDF::loadView('asistencia.listaGrupoAlumnosPDF',compact('datos'));
   return $pdf->setPAper('a4','landscape')->stream('Reporte-Registro_GrupoAlumnos.pdf');
}
}