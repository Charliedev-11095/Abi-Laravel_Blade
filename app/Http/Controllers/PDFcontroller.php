<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\alumnos;
use App\Models\tutores;
use App\Models\entrenadores;
use App\Models\registros_medicos;

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
}
