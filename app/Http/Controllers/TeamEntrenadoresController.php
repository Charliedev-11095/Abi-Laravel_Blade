<?php

namespace App\Http\Controllers;

use App\Models\Team_entrenadores;
use App\Models\entrenadores;
use App\Models\Teams;
use App\Models\Grupos;
use Illuminate\Http\Request;
use DB;

class TeamEntrenadoresController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
   

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
 
        $entrenadores = entrenadores::all();
        $teams = Teams::all();
        return view('formteam_entrenadores.createteam_entrenadores')
        ->with('entrenadores',$entrenadores)
        ->with('teams',$teams);
    }

   

    public function store(Request $request)
    {
        $datosteam_entrenador=request()->except('_token');

        Team_entrenadores::insert($datosteam_entrenador);
        return redirect('team_entrenadores')->with('Mensaje','Entrenador asignado con éxito');
    }

 
    
    public function show()
    {

    }

    public function especifico(Request $request)
    {

        $nombreteam=$request->get('buscarpor');


        $idteam=$request->get('idteam');
        $actualizargrupo=request()->except(['_token','_method','idteam','buscarpor']);
         Teams::where('id','=',$idteam)->update($actualizargrupo);

        $datos =DB::table('team_entrenadores')
        ->join('teams','teams.id', '=','team_entrenadores.teams_id')
        ->join('entrenadores','entrenadores.id', '=','team_entrenadores.entrenadores_id')
        ->where('teams.id', '=', $nombreteam)
        ->select('team_entrenadores.id as idregistro','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','team_entrenadores.status')
        ->get();

        $datosteams =DB::table('teams') 
        ->where('teams.id', '=', $nombreteam)
        ->select('teams.*')
        ->get();

        $teams = Teams::all();
        return view('formteam_entrenadores.editformteam_especifico')->with('datos',$datos)
        ->with('datosteams',$datosteams)
        ->with('teams',$teams);




        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team_entrenadores  $team_entrenadores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $teams = Teams::all();
        $team_entrenadores=Team_entrenadores::findOrFail($id);

        $datos =DB::table('team_entrenadores')
        ->join('entrenadores','entrenadores.id', '=','team_entrenadores.entrenadores_id')
        ->join('teams','teams.id', '=','team_entrenadores.teams_id')
        ->where('team_entrenadores.id', '=', $id)
        ->select('entrenadores.nombres','entrenadores.apellido_paterno','entrenadores.apellido_materno','teams.nombre','team_entrenadores.status')
        ->get();

        return view('formteam_entrenadores.editformteam_entrenadores',compact('team_entrenadores'))->with('teams',$teams)
        ->with('datos',$datos);

        
    }



    public function update(Request $request, $id)
    {
        $datosTeamEntrenador=request()->except(['_token','_method']);
        Team_entrenadores::where('id', '=', $id)->update($datosTeamEntrenador);
        return redirect('team_entrenadores')->with('Mensaje','Registro modificado con exito');
    }


}
