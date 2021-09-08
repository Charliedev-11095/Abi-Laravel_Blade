<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use App\Models\tutores;
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
        $datos['formalumno']=alumnos::paginate(5);
        return view('formalumno.indexformalumnos',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
