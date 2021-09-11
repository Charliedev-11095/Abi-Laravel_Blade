<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check() && Auth::user()->role=='Administrador' || Auth::user()->role=='Entrenador' ){
            return $next($request);
        }

        if(Auth::check() && Auth::user()->role=='Alumno'){
            return redirect('/panelalumno');
        }

        if(Auth::check() && Auth::user()->role=='Visitante'){
            return redirect('/panelvisitante');
        }





    }
}
