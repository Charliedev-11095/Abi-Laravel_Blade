<?php

namespace App\Http\Controllers;

use App\Models\registros_medicos;
use App\Models\alumnos;
use App\Models\historicos_medicos;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RegistrosMedicosController extends Controller
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
        // $datos['formreg_med']=registros_medicos::paginate(5);

        $formreg_med=DB::table('registros_medicos')
        ->join('alumnos','alumnos.id', '=','registros_medicos.alumnos_id')
        ->select('registros_medicos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();
        return view('formreg_med.indexformreg_med')->with('formreg_med',$formreg_med);
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

