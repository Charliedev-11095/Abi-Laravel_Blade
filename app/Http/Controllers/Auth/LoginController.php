<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Auth;

use DB;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectPath(){
       

        if(Auth::user()->role=='Administrador'){ 
            
            return '/dashboard';
        }
        if(Auth::user()->role=='Entrenador'){ 
            
 
            return '/dashboard';

        }
        if(Auth::user()->role=='Alumno'){ 
            
            return '/panelalumno';
        }
        return '/panelvisitante';
    
    }


}
