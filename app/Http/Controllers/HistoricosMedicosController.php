<?php

namespace App\Http\Controllers;

use App\Models\historicos_medicos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\historicos_deportivos;
use App\Models\alumnos;


use App\Models\asistencias;
use App\Models\grupo_alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;
use App\Models\registros_medicos;

use DB;




class HistoricosMedicosController extends Controller
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
    public function index(Request $request)
    {
        $nombrealumno=$request->get('buscarpor');
        $nombrefecha=$request->get('buscarporfecha');

        $alumnos=alumnos::all();

        $historicos_medicos =DB::table('historicos_medicos')
        ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
        ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();


        $historicos_medicos2 =DB::table('historicos_medicos')
        ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
        ->where('alumnos.id', '=', $nombrealumno)
        ->where('historicos_medicos.fecha_creacion', '=', $nombrefecha)
        ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();



        return view('formhistorico_medico.indexhistorico_medico')->with('alumnos',$alumnos)
        ->with('historicos_medicos2',$historicos_medicos2)
        ->with('historicos_medicos',$historicos_medicos);
    }



    public function create(Request $request)
    {


        $nombrealumno=$request->get('buscarpor');


        $historicos_medicos =DB::table('alumnos')
        ->join('registros_medicos','registros_medicos.alumnos_id', '=','alumnos.id')
        ->where('alumnos.id', '=', $nombrealumno)
        ->select('registros_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();

        $alumnos=alumnos::all();
        return view('formhistorico_medico.createhistorico_medico')->with('alumnos',$alumnos)
        ->with('historicos_medicos',$historicos_medicos);
    }


    public function store(Request $request)
    {
        

        // recuperar dato de input input_id_alumno
        $nombrealumno=$request->get('alumnos_id');
        $datosHistorico_alumno=request()->except(['_token','_method','alumnos_id','comentarios','fecha_creacion']);
        registros_medicos::where('alumnos_id', '=', $nombrealumno)->update($datosHistorico_alumno);




        $campos=[
            'estatura'=>'required|numeric',
            'peso'=>'required|numeric',
            'presion_arterial'=>'required|numeric',
            'alumnos_id'=>'required|integer',
            'comentarios'=>'required|string|max:100',
        ];

        $Mensaje=["required"=>'El campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
       
        //$datosGrupo=request()->all();
        $datosHistorico_alumno=request()->except('_token');

        historicos_medicos::insert($datosHistorico_alumno);
        return redirect('dashboard')->with('Mensaje','Registro Historico Medico agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historicos_medicos  $historicos_medicos
     * @return \Illuminate\Http\Response
     */
    public function show(historicos_medicos $historicos_medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historicos_medicos  $historicos_medicos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $historicos_medico=historicos_medicos::findOrFail($id);

        $datos =DB::table('historicos_medicos')
        ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
        ->where('historicos_medicos.id', '=', $id)
        ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno' )
        ->get();
        

        return view('formhistorico_medico.edithistorico_medico',compact('historicos_medico'))->with('datos',$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historicos_medicos  $historicos_medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $campos=[
            'comentarios'=>'required|string|max:100',
        ];
        
        $Mensaje=["required"=>'El campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosHistorico_alumno=request()->except(['_token','_method']);
        historicos_medicos::where('id', '=', $id)->update($datosHistorico_alumno);

        return redirect('formhistorico_medico')->with('Mensaje','Registro Historico Medico modificado con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historicos_medicos  $historicos_medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        historicos_medicos::destroy($id);

        //return y entre parentesis la 
        // direccion url a donde se dirige en este caso el ..index
        
        return redirect('formhistorico_medico')->with('Mensaje','Registro eliminado');  
    }
}
