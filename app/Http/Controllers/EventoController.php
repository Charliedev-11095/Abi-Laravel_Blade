<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('eventos/IndexCalendario');
    }

 
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
       
        if ($request->ajax()){
            $data_evento = $request->except('_token','_method');
            Evento::insert($data_evento);
            return response()->json("Evento ingresado con exito");
        }
      
    }


    public function show(evento $evento)
    {

        $id = Auth::id(); 
    //   $data['eventos']=evento::all();
      $data['eventos']=DB::table('eventos')
        ->where('eventos.alta_usuario', '=', $id)
        ->select('eventos.*')
        ->get();
       return response()->json($data['eventos']);
    }

    public function edit($id)
    {
        //
    }

 
    public function update(Request $request,$id )
    {
        if ($request->ajax()){
        $datosEvento=request()->except(['_token','_method']);
         Evento::where('id','=',$id)->update($datosEvento);
         return response()->json("Evento actualizado con exito");
        } 
    }

 
    public function destroy( $id)
    {
        Evento::findOrFail($id)->destroy($id);
//        Evento::destroy($id);
        return response()->json("Evento eliminado con exito");
    }
}
