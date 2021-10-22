<?php

namespace App\Http\Controllers;

use App\Models\grupo_alumnos;
use App\Models\alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;
use DB;


use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrupoAlumnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('entrena');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::id();

        if (Auth::user()->role == 'Administrador') {
            $alumnos = alumnos::paginate(30);
        }
        if (Auth::user()->role == 'Entrenador') {
            $alumnos=DB::table('alumnos')
            ->where('alumnos.alta_usuario', '=', $id)
            ->select('alumnos.*')
            ->paginate(30);
        }


        if (Auth::user()->role == 'Administrador') {
            $grupos = grupos::paginate(30);
        }
        if (Auth::user()->role == 'Entrenador') {
            $grupos=DB::table('grupos')
            ->where('grupos.alta_usuario', '=', $id)
            ->select('grupos.*')
            ->paginate(30);
        }


        if (Auth::user()->role == 'Administrador') {
            $datos =DB::table('grupo_alumnos')
            ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
            ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
            ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
            ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.nivel','grupos.grado','grupos.seccion','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.estado')
            ->paginate(30);
        }
        if (Auth::user()->role == 'Entrenador') {
            $datos =DB::table('grupo_alumnos')
            ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
            ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
            ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
            ->where('alumnos.alta_usuario', '=', $id)
            ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.nivel','grupos.grado','grupos.seccion','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.estado')
            ->paginate(30);
        }



        return view('asistencia.indexgrupo_alumno')->with('alumnos',$alumnos)
        ->with('datos',$datos)
        ->with('grupos',$grupos);
     
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
     
        $id = Auth::id();

        if (Auth::user()->role == 'Administrador') {
            $alumnos = alumnos::all();
        }
        if (Auth::user()->role == 'Entrenador') {
            $alumnos=DB::table('alumnos')
            ->where('alumnos.alta_usuario', '=', $id)
            ->select('alumnos.*')
            ->get();
        }


        if (Auth::user()->role == 'Administrador') {
            $entrenadores = entrenadores::all();
        }

        if (Auth::user()->role == 'Entrenador') {
            $entrenadores=DB::table('entrenadores_pivotes')
            ->join('entrenadores','entrenadores.id', '=','entrenadores_pivotes.entrenadores_id')
            ->where('entrenadores_pivotes.users_id', '=', $id)
            ->select('entrenadores.id','entrenadores.nombres','entrenadores.apellido_paterno','entrenadores.apellido_materno')
            ->get();
        }

     

        if (Auth::user()->role == 'Administrador') {
            $grupos = grupos::all();
        }
        if (Auth::user()->role == 'Entrenador') {
            $grupos=DB::table('grupos')
            ->where('grupos.alta_usuario', '=', $id)
            ->select('grupos.*')
            ->get();
        }

        return view('asistencia.creategrupo_alumno',)->with('alumnos',$alumnos)
        ->with('entrenadores',$entrenadores)
        ->with('grupos',$grupos);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//         AQUI EMPIEZA LOS REGISTROS INDIVIDUALES COMENTADOS
         $campos=[
             'grupos_id'=>'required|integer|max:20',
             'alumnos_id'=>'required|integer|max:20',
             'entrenadores_id'=>'required|integer|max:20',     
         ];

        // $Mensaje=["required"=>'El campo :attribute es requerido'];
         //$this->validate($request,$campos,$Mensaje);
         $this->validate($request,$campos);
        
         $datosGrupo_alumno=request()->except('_token');

        grupo_alumnos::insert($datosGrupo_alumno);
        return redirect('dashboard')->with('Mensaje','Alumno asignado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\grupo_alumnos  $grupo_alumnos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    public function general(Request $request)
    {
        $id = Auth::id();
        $nombregrupo=$request->get('buscarpor');


        $idgrupo=$request->get('idgrupo');
        $actualizargrupo=request()->except(['_token','_method','idgrupo','buscarpor']);
         grupos::where('id','=',$idgrupo)->update($actualizargrupo);

        $datos =DB::table('grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->where('grupos.id', '=', $nombregrupo)
        ->select('grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.nivel','grupos.grado','grupos.seccion','entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.estado')
        ->get();

        $datosgrupos =DB::table('grupos')
        ->where('grupos.id', '=', $nombregrupo)
        ->select('grupos.*')
        ->get();

        if (Auth::user()->role == 'Administrador') {
            $grupos = grupos::all();
        }
        if (Auth::user()->role == 'Entrenador') {
            $grupos=DB::table('grupos')
            ->where('grupos.alta_usuario', '=', $id)
            ->select('grupos.*')
            ->get();
        }
        


        return view('asistencia.editgrupo_alumnosgeneral')->with('datos',$datos)
        ->with('datosgrupos',$datosgrupos)
        ->with('grupos',$grupos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grupo_alumnos  $grupo_alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     
        $grupoalumnos=grupo_alumnos::findOrFail($id);

        if (Auth::user()->role == 'Administrador') {
            $grupos = grupos::all();
        }
        if (Auth::user()->role == 'Entrenador') {
            $grupos=DB::table('grupos')
            ->where('grupos.alta_usuario', '=', $id)
            ->select('grupos.*')
            ->get();
        }


        $datos =DB::table('grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.id', '=', $id)
        ->select('alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','grupos.id as idgrupo','grupos.nivel','grupos.grado','grupos.seccion','grupo_alumnos.estado')
        ->get();

        return view('asistencia.editgrupo_alumnos',compact('grupoalumnos'))->with('grupos',$grupos)
        ->with('datos',$datos);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grupo_alumnos  $grupo_alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'grupos_id'=>'required|string|max:2',
        ];
        
        $Mensaje=["required"=>'El campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosGrupo=request()->except(['_token','_method']);
        grupo_alumnos::where('id', '=', $id)->update($datosGrupo);


        return redirect('asistencia/grupo_alumnos')->with('Mensaje','Registro modificado con exito');
    
    }


}
