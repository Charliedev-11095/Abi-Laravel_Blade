<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\alumnos;

use Illuminate\Http\Request;


class PDFcontroller extends Controller
{
    // public function alumnosPDF(){
    //     $formalumno = alumnos::all();
    //     $pdf=PDF::loadView('alumnosPDF',compact('formalumno'));
    //     return $pdf ->setPaper('A3', 'portrait')->stream();
    // }

    public function alumnosPDf(){
        $formalumno = alumnos::all();
        $pdf = PDF::loadView('formalumno.alumnosPDF',compact('formalumno'));
        return $pdf->setPAper('a4','portrait')->stream('Reporte-Alumno.pdf');
     }
}
