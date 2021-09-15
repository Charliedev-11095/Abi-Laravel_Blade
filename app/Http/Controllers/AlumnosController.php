<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use App\Models\tutores;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\AlumnosPivote;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AlumnosController extends Controller
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
        $datos['formalumno']=alumnos::paginate();
        return view('formalumno.indexformalumnos',$datos);
    }


    public function create()
    {

        $tutores = tutores::all();

        return view('formalumno.createformalumnos')->with('tutores',$tutores);
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
        alumnos::insert($datosformalumnos);
///////////////////////////////////////////
        $datosUsuario=[
            'name'=>request('nombres'),
            'email'=>request('email'),
            'role'=>"Alumno",
            'password'=>Hash::make($request->curp),
        ];
         User::insert($datosUsuario);

         $nombrecorreo=$request->get('email');

         $alumnos =DB::table('alumnos')
         ->where('alumnos.email', '=', $nombrecorreo)
        
         ->get(array('id'));

         $users =DB::table('users')
         ->where('users.email', '=', $nombrecorreo)
        
         ->get(array('id'));

         foreach ($alumnos as $a) {
             $a->id;
        }

        foreach ($users as $b) {
            $b->id;
        }

          $datosUsuarioPivote=[
            //->get('alumnos_id'),
            'alumnos_id'=>$a,
            'users_id'=>$b,
        ];
     
        AlumnosPivote::insert($datosUsuarioPivote); 
        print $alumnos;
        print $users;
        print_r($datosUsuarioPivote);
////////////////////////////

        return redirect('formreg_med/create');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show(alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutores = tutores::all();
        $alumno=alumnos::findOrFail($id);
        return view('formalumno.editformalumnos',compact('alumno'))->with('tutores',$tutores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosformalumnos=request()->except(['_token','_method']);
        alumnos::where('id','=',$id)->update($datosformalumnos);
        //$alumno=alumnos::findOrFail($id);
        //return view('formalumno.editformalumnos',compact('alumno'));
        return redirect('formalumnos')->with('Mensaje','alumno modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        alumnos::destroy($id);
        return redirect('formalumnos')->with('Mensaje','alumno elminado con exito');
        }
    }
