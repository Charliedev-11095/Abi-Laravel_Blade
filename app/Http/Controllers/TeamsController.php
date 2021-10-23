<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TeamsController extends Controller
{




    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos['teams']=DB::table('teams')
        ->select('teams.*')
        ->paginate(30);

      
        return view('formteam.indexformteam',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formteam.createformteam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $datosformalumnos=request()->except('_token');
        Teams::insert($datosformalumnos);
        return redirect('teams')->with('Mensaje','Equipo de Trabajo agregado con éxito');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team=Teams::findOrFail($id);
        return view('formteam.editformteam',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosformteams=request()->except(['_token','_method']);
        Teams::where('id','=',$id)->update($datosformteams);
        return redirect('teams')->with('Mensaje','Equipo de Trabajo modificado con éxito');
    }


}
