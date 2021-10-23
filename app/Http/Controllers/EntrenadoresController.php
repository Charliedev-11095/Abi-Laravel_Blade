<?php

namespace App\Http\Controllers;

use App\Models\entrenadores;
use App\Models\User;
use App\Models\EntrenadoresPivote;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntrenadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
         $datos['formentrenador']=entrenadores::paginate(30);
        return view('formentrenador.indexformentrenador',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('formentrenador.createformentrenador')->with('users',$users); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosformentrenadores=request()->all();
        $datosformentrenadores=request()->except('_token');
        entrenadores::insert($datosformentrenadores);
     /////////////////////////////////////////////////////////////
     $datosUsuario=[
        'name'=>request('nombres').' '.request('apellido_paterno').' '.request('apellido_materno'),
        'email'=>request('email'),
        'role'=>"Entrenador",
        'password'=>Hash::make($request->curp),
    ];
     User::insert($datosUsuario);

     $nombrecorreo=$request->get('email');

     $entrenadores =DB::table('entrenadores')
     ->where('entrenadores.email', '=', $nombrecorreo)
     ->get(array('id'));

     $users =DB::table('users')
     ->where('users.email', '=', $nombrecorreo)   
     ->get(array('id'));


     $valora = '';
     $valorb = '';

     foreach ($entrenadores as $a) {
        $valora = $a->id;
    }

    foreach ($users as $b) {
        $valorb = $b->id;
    }

      $datosUsuarioPivote=[
        //->get('alumnos_id'),
        'entrenadores_id'=>$valora,
        'users_id'=>$valorb,
    ];
 
    EntrenadoresPivote::insert($datosUsuarioPivote); 
//////////////////////////////////////////////////////////////////////////
        return redirect('team_entrenadores/create')->with('Mensaje','Entrenador agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entrenadores  $entrenadores
     * @return \Illuminate\Http\Response
     */
    public function show(entrenadores $entrenadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\entrenadores  $entrenadores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $entrenador=entrenadores::findOrFail($id);
        return view('formentrenador.editformentrenador',compact('entrenador'))->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\entrenadores  $entrenadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosformentrenadores=request()->except(['_token','_method']);
        entrenadores::where('id','=',$id)->update($datosformentrenadores);
/////////////////////////////////////////////////////////////////////////////
   //Obtener el id del entrenador por medio de su correo
$nombrecorreo=$request->get('email');

        $entrenadores =DB::table('entrenadores')
        ->where('entrenadores.email', '=', $nombrecorreo)
        ->get(array('id'));

        $valorid = '';
   
        foreach ($entrenadores as $a) {
           $valorid = $a->id;
       }
   
       //Obtener el id del usuario por medio de id del entrenador
       $usersid =DB::table('entrenadores_pivotes')
       ->join('users','users.id', '=','entrenadores_pivotes.users_id')
       ->where('entrenadores_pivotes.entrenadores_id', '=', $valorid)
       ->select('users.id as userid')
       ->get(array('userid'));

       $idusuario = '';
   
       foreach ($usersid as $item) {
          $idusuario = $item->userid;
      }

      //Obtener el emails de usuario y entrenador, por medio de sus ids
       $entrenadorescorreo =DB::table('entrenadores')
       ->where('entrenadores.id', '=', $valorid)
       ->get(array('email'));

       $userscorreo =DB::table('users')
       ->where('users.id', '=', $idusuario)
       ->get(array('email'));

       $valoremail = '';
       $valorbmail = '';
   
       foreach ($entrenadorescorreo as $e) {
          $valoremail = $e->email;
      }

      foreach ($userscorreo as $u) {
        $valorbmail = $u->email;
        }
  

        //Compara los emails de entrenador y usuario, si son distintos, se actualiza el correo de usuario
      if ($valorbmail != $valoremail) {
        $datosUsuario=[
            'email'=>$valoremail,
        ];
        User::where('id',$idusuario)->update($datosUsuario);
      }


/////////////////////////////////////////////////////////////////////////////
        //$entrenador=entrenadores::findOrFail($id);
        //return view('formentrenador.editformentrenador',compact('entrenador'));
        return redirect('formentrenadores')->with('Mensaje','Entrenador modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entrenadores  $entrenadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        entrenadores::destroy($id);
        return redirect('formentrenadores')->with('Mensaje','entrenador eliminado con exito');
        }
    }
