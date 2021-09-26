<?php

namespace App\Http\Controllers;

use App\Models\asistencias;
use App\Models\grupo_alumnos;
use App\Models\entrenadores;
use App\Models\Teams;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class PanelTeamController extends Controller
{


    public function __construct()
    {
        $this->middleware('entrena');
    }

    public function index()
    {

        //Obtener el id actual de usuario en curso
        $id = Auth::id();

        //Obtener el id del entrenador y guardarlo
        $entrenadores =DB::table('entrenadores_pivotes') 
        ->where('entrenadores_pivotes.users_id', '=', $id)
        ->get(array('entrenadores_id'));

        $valorentrenador = '';

        foreach ($entrenadores as $a) {
            $valorentrenador = $a->entrenadores_id;
        }

       //return  $valorentrenador;

        $teams =DB::table('team_entrenadores')
        ->join('entrenadores','entrenadores.id', '=','team_entrenadores.entrenadores_id')
        ->join('teams','teams.id', '=','team_entrenadores.teams_id')
        ->where('entrenadores.id', '=', $valorentrenador)
        ->select('teams.*')
        ->get(); 

//Obtener el id del team
$teamsid =DB::table('team_entrenadores')
->join('entrenadores','entrenadores.id', '=','team_entrenadores.entrenadores_id')
->join('teams','teams.id', '=','team_entrenadores.teams_id')
->where('entrenadores.id', '=', $valorentrenador)
->select('teams.id as teamid')
->get(array('teamid'));

$idteam = '';
   
       foreach ($teamsid as $item) {
          $idteam = $item->teamid;
      }


      //Obtener el nombre e integrantes del team 
      $formentrenador =DB::table('team_entrenadores')
      ->join('entrenadores','entrenadores.id', '=','team_entrenadores.entrenadores_id')
      ->join('teams','teams.id', '=','team_entrenadores.teams_id')
      ->where('teams.id', '=', $idteam)
      ->select('entrenadores.*','team_entrenadores.status')
      ->get(); 




        return view('panelteam')->with('teams',$teams)
        ->with('formentrenador',$formentrenador);
    }



}
