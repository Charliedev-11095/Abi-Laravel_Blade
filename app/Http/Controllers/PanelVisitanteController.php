<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelVisitanteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('visit');
    }


    public function index(Request $request){

        return view('panelvisitante');

    }


}
