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
use DB;


class PDFcontroller extends Controller
{
    public function alumnosPDF(){
        $formalumno = alumnos::all();
        $pdf = PDF::loadView('formalumno.alumnosPDF',compact('formalumno'));
        return $pdf->setPAper('a4','portrait')->stream('Reporte-Alumno.pdf');
     }

     public function tutoresPDF(){
        $formtutor = tutores::all();
        $pdf = PDF::loadView('formtutor.tutoresPDF',compact('formtutor'));
        return $pdf->setPAper('a4','portrait')->stream('Reporte-tutor.pdf');
     }

     public function entrenadoresPDF(){
      $formentrenador=entrenadores::all();
      $pdf = PDF::loadView('formentrenador.entrenadoresPDF',compact('formentrenador'));
      return $pdf->setPAper('a4','portrait')->stream('Reporte-entrenador.pdf');

   }
   public function reg_medPDF(){
      $formreg_med=DB::table('registros_medicos')
      ->join('alumnos','alumnos.id', '=','registros_medicos.alumnos_id')
      ->select('registros_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
      ->get();
      $pdf = PDF::loadView('formreg_med.reg_medPDF',compact('formreg_med'));
      return $pdf->setPAper('a4','portrait')->stream('Reporte-entrenador.pdf');

   }
   public function historial_DeportivoPDF(){
      $datos2 =DB::table('historicos_deportivos')
      ->join('alumnos','alumnos.id', '=','historicos_deportivos.alumnos_id')
      ->select('historicos_deportivos.id','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','alumnos.id as identificadoralumno','historicos_deportivos.observaciones','historicos_deportivos.fecha_creacion','historicos_deportivos.updated_at')
      ->get();
      $pdf = PDF::loadView('formhistorico_deportivo.historial_DeportivoPDF',compact('datos2'));
      return $pdf->setPAper('a4','landscape')->stream('Reporte-deportivo.pdf');
   }
   public function historial_MedicoPDF(){
      $historicos_medicos =DB::table('historicos_medicos')
      ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
      ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
      ->get();
      $pdf = PDF::loadView('formhistorico_medico.historial_MedicoPDF',compact('historicos_medicos'));
      return $pdf->setPAper('a4','landscape')->stream('Reporte-Médico.pdf');
}
}
