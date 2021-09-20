<?php

namespace App\Http\Controllers;

use App\Models\Team_entrenadores;
use App\Models\entrenadores;
use App\Models\Teams;
use Illuminate\Http\Request;
use DB;

class TeamEntrenadoresController extends Controller
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
        $entrenadores = entrenadores::all();
        $teams = Teams::all();
       
        $datos =DB::table('team_entrenadores')
        ->join('teams','teams.id', '=','team_entrenadores.teams_id')
        ->join('entrenadores','entrenadores.id', '=','team_entrenadores.entrenadores_id')
        ->select('team_entrenadores.id as idregistro','teams.nombre','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','team_entrenadores.status')
        ->get();

        return view('formteam_entrenadores.indexformteam_entrenadores')
        ->with('entrenadores',$entrenadores)
        ->with('datos',$datos)
        ->with('teams',$teams);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team_entrenadores  $team_entrenadores
     * @return \Illuminate\Http\Response
     */
    public function show(Team_entrenadores $team_entrenadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team_entrenadores  $team_entrenadores
     * @return \Illuminate\Http\Response
     */
    public function edit(Team_entrenadores $team_entrenadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team_entrenadores  $team_entrenadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team_entrenadores $team_entrenadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team_entrenadores  $team_entrenadores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team_entrenadores $team_entrenadores)
    {
        //
    }
}
