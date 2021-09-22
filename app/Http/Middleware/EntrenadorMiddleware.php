<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class EntrenadorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        if(Auth::check() && Auth::user()->role=='Administrador'){
            return $next($request);
        }
        if( Auth::user()->role=='Entrenador' ){
            
                      
   $id = Auth::id();
  $entrenadores =DB::table('entrenadores_pivotes')
            ->join('entrenadores','entrenadores.id', '=','entrenadores_pivotes.entrenadores_id')
            ->where('entrenadores_pivotes.users_id', '=', $id)
            ->select('entrenadores_pivotes.*')
            ->get(array('entrenadores_id'));

            $identrenador = '';

            foreach ($entrenadores as $entrenador) {
                $identrenador = $entrenador->entrenadores_id;
           }
            
            $datos =DB::table('team_entrenadores')
            ->join('entrenadores','entrenadores.id', '=','team_entrenadores.entrenadores_id')
            ->where('team_entrenadores.entrenadores_id', '=', $identrenador)
            ->select('team_entrenadores.*')
            ->get(array('status'));
    
            $status = '';

            foreach ($datos as $dato) {
                $status = $dato->status;
           }

           if ($status=='Activo') {
                return $next($request);
            } 
            Auth::logout();
            // redirect to homepage
            return redirect('/')->with('msg', 'El usuario se encuentra dado de baja, contacte al Administrador!.');
            
        }

        if(Auth::check() && Auth::user()->role=='Alumno'){
            return redirect('/panelalumno');
        }

        if(Auth::check() && Auth::user()->role=='Visitante'){
            return redirect('/panelvisitante');
        }





    }
}
