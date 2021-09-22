<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class AlumnoMiddleware
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

        if(Auth::check() && Auth::user()->role=='Administrador' || Auth::user()->role=='Entrenador'){
            return redirect('/dashboard');
        }

        if(Auth::check() && Auth::user()->role=='Alumno'){
                                
   $id = Auth::id();
   $alumnos =DB::table('alumnos_pivotes')
             ->join('alumnos','alumnos.id', '=','alumnos_pivotes.alumnos_id')
             ->where('alumnos_pivotes.users_id', '=', $id)
             ->select('alumnos_pivotes.*')
             ->get(array('alumnos_id'));
 
             $idalumno = '';
 
             foreach ($alumnos as $alumno) {
                 $idalumno = $alumno->alumnos_id;
            }
             
             $datos =DB::table('grupo_alumnos')
             ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
             ->where('grupo_alumnos.alumnos_id', '=', $idalumno)
             ->select('grupo_alumnos.*')
             ->get(array('estado'));
     
             $status = '';
 
             foreach ($datos as $dato) {
                 $status = $dato->estado;
            }
 
            if ($status=='Activo') {
                 return $next($request);
             } 
             Auth::logout();
             // redirect to homepage
             return redirect('/')->with('msg', 'El usuario se encuentra dado de baja, contacte al Administrador!.');
             
        }

        return redirect('/panelvisitante');
    }
}
