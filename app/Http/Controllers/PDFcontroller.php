<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\alumnos;
use App\Models\tutores;
use App\Models\entrenadores;
use App\Models\registros_medicos;
use DB;

use Illuminate\Http\Request;


class PDFcontroller extends Controller
{
    // public function alumnosPDF(){
    //     $formalumno = alumnos::all();
    //     $pdf=PDF::loadView('alumnosPDF',compact('formalumno'));
    //     return $pdf ->setPaper('A3', 'portrait')->stream();
    // }

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
      // $formreg_med=registros_medicos::all();
      // $alumnos = alumnos::all();
      $formreg_med=DB::table('registros_medicos')
      ->join('alumnos','alumnos.id', '=','registros_medicos.alumnos_id')
      ->select('registros_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
      ->get();
      $pdf = PDF::loadView('formreg_med.reg_medPDF',compact('formreg_med'));
      return $pdf->setPAper('a4','portrait')->stream('Reporte-entrenador.pdf');

   }
}
