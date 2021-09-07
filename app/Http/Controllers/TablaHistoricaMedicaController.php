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

class TablaHistoricaMedicaController extends Controller
{

    public function index(Request $request)
    {
      
        $nombrealumno=$request->get('buscarpor');
       

        $alumnos=alumnos::all();

   


        $tablasmedicas =DB::table('historicos_medicos')
        ->join('alumnos','alumnos.id', '=','historicos_medicos.alumnos_id')
        ->where('alumnos.id', '=', $nombrealumno)
        ->select('historicos_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();


        $nombrecompleto =DB::table('alumnos')
        ->where('alumnos.id', '=', $nombrealumno)
        ->select('alumnos.*')
        ->get();


        return view('tablamedica.indextablamedica')->with('alumnos',$alumnos)
        ->with('nombrecompleto',$nombrecompleto)
        ->with('tablasmedicas',$tablasmedicas);
        
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = alumnos::all();

        return view('formreg_med.createformreg_med')
        ->with('alumnos',$alumnos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hoy = date("Ymd");  
        $historico_medico=array(
            'estatura'=>request('estatura'),
            'peso'=>request('peso'),
            'presion_arterial'=>request('presion_arterial'),
            'alumnos_id'=>request('alumnos_id'),
            'fecha_creacion'=>$hoy,
        );
            historicos_medicos::insert($historico_medico);


       $datosformreg_med=request()->except('_token');
       registros_medicos::insert($datosformreg_med);
        return redirect('dashboard')->with('Mensaje','registro medico agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\registros_medicos  $registros_medicos
     * @return \Illuminate\Http\Response
     */
    public function show(registros_medicos $registros_medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\registros_medicos  $registros_medicos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnos = alumnos::all();
        $regmed=registros_medicos::findOrFail($id);
        return view('formreg_med.editformreg_med',compact('regmed'))->with('alumnos',$alumnos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\registros_medicos  $registros_medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $datosformreg_med=request()->except(['_token','_method']);
        registros_medicos::where('id','=',$id)->update($datosformreg_med);

        //$regmed=registros_medicos::findOrFail($id);
        //return view('formreg_med.editformreg_med',compact('regmed'));
        
        return redirect('formreg_med')->with('Mensaje','registro medico modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\registros_medicos  $registros_medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        registros_medicos::destroy($id);
        //return redirect('formreg_med');
        return redirect('formreg_med')->with('Mensaje','registro medico eliminado con exito');
        }
    }

