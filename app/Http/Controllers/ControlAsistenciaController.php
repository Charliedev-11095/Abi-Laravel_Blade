<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlAsistenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('entrena');
    }


    public function index(Request $request){

        return view('asistencia.asistencia_control');

    }
}
