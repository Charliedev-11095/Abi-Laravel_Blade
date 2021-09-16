<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GruposController extends Controller
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
        // $datos['grupos']=grupos::paginate(Numero_elementos_para_mostrar);
        $datos['grupos']=grupos::paginate();
        return view('asistencia.listadogrupos',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asistencia.creategrupo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $campos=[
            'grado'=>'required|string|max:2',
            'seccion'=>'required|string|max:1',
            'nivel'=>'required|string|max:10',
            'estado'=>'required|string|max:8',

        ];


         $Mensaje=["required"=>'El campo :attribute es requerido'];
         $this->validate($request,$campos,$Mensaje);
        
         //$datosGrupo=request()->all();
         $datosGrupo=request()->except('_token');

         grupos::insert($datosGrupo);
 //DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
        // return response()->json($datosGrupo);
         return redirect('asistencia/grupos')->with('Mensaje','Grupo agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function show(Grupos $grupos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $grupo=grupos::findOrFail($id);


        //Return, puede llamar a la vista por el "name" que posee
        //en caso de que no funcione..... hay que mandar llamar
        //la ruta directa de la vista edit.grupo.blade.php
        //         (nombrecarpeta.nombrevista)
        return view('asistencia.editgrupo',compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $campos=[
            'grado'=>'required|string|max:2',
            'seccion'=>'required|string|max:1',
            'nivel'=>'required|string|max:10',
            'estado'=>'required|string|max:8',

        ];
        
        $Mensaje=["required"=>'El campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosGrupo=request()->except(['_token','_method']);
         grupos::where('id', '=', $id)->update($datosGrupo);


        return redirect('asistencia/grupos')->with('Mensaje','Grupo modificado con exito');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       grupos::destroy($id);

       //return y entre parentesis la 
       // direccion url a donde se dirige
       //la direccion se encuentra en con el comando
       //  php artisan route:list 
       return redirect('asistencia/grupos')->with('Mensaje','Grupo eliminado');
    }
}
