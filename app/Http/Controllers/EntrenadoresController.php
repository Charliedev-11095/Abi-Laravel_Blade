<?php

namespace App\Http\Controllers;

use App\Models\entrenadores;
use App\Models\User;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntrenadoresController extends Controller
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
        $datos['formentrenador']=entrenadores::paginate(5);
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
        //return response()->json($datosformentrenadores);
        return redirect('formentrenadores')->with('Mensaje','entrenador agregado con exito');
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

        //$entrenador=entrenadores::findOrFail($id);
        //return view('formentrenador.editformentrenador',compact('entrenador'));
        return redirect('formentrenadores')->with('Mensaje','entrenador modificado con exito');
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
