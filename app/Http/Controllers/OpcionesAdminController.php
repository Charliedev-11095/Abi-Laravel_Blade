<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpcionesAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request){

        return view('administrador.administrador_control');

    }
}
