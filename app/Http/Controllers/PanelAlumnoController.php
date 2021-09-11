<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelAlumnoController extends Controller
{



    public function __construct()
    {
        $this->middleware('alumn');
    }


    public function index(Request $request){

        return view('panelalumno');

    }


    
}
