<?php

namespace App\Http\Controllers;

use App\Models\historicos_deportivos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alumnos;


use App\Models\asistencias;
use App\Models\grupo_alumnos;
use App\Models\entrenadores;
use App\Models\Grupos;


use DB;

class HistoricosDeportivosController extends Controller
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

        $historicos_deportivos = historicos_deportivos::all();
        $alumnos = alumnos::all();
        $datos2 = historicos_deportivos::all();
        $datos2 =DB::table('historicos_deportivos')
        ->join('alumnos','alumnos.id', '=','historicos_deportivos.alumnos_id')
        ->select('historicos_deportivos.id','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','alumnos.id as identificadoralumno','historicos_deportivos.observaciones','historicos_deportivos.fecha_creacion','historicos_deportivos.updated_at')
        ->get();


        $historicos_deportivos2 =DB::table('historicos_deportivos')
        ->join('alumnos','alumnos.id', '=','historicos_deportivos.alumnos_id')
        ->where('alumnos.id', '=', $nombrealumno)
        ->where('historicos_deportivos.fecha_creacion', '=', $nombrefecha)
        ->select('historicos_deportivos.*','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->get();



        return view('formhistorico_deportivo.indexhistorico_deportivo')->with('alumnos',$alumnos)
        ->with('historicos_deportivos2',$historicos_deportivos2)
        ->with('datos2',$datos2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupos::all();
        $alumnos = alumnos::all();
        return view('formhistorico_deportivo.createhistorico_deportivo')
        ->with('grupos',$grupos)
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

        $nombrealumno=$request->get('alumnos_id');
        $nombregrupo=$request->get('grupos_id');

        //Recuperar id de grupo_alumnos
        $datosgrupo_alumnos =DB::table('grupo_alumnos')
        ->join('alumnos','alumnos.id', '=','grupo_alumnos.alumnos_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('alumnos.id', '=', $nombrealumno)
        ->where('grupos.id', '=', $nombregrupo)
        ->select('grupo_alumnos.*')
        ->get(array('id'));

        $valorid = '';
   
        foreach ($datosgrupo_alumnos as $a) {
           $valorid = $a->id;
       }

       //Se insertan los datos recuperados(incluyendo el id de grupo_alumnos para la columna: relacion_grupo_alumnos)
       $datosGrupo=[
        'comunicacion'=>request('comunicacion'),
        'liderazgo'=>request('liderazgo'),
        'respeto'=>request('respeto'),
        'responsabilidad'=>request('responsabilidad'),
        'participacion'=>request('participacion'),
        'actitud'=>request('actitud'),
        'constancia'=>request('constancia'),
        'compromiso'=>request('compromiso'),
        'trabajo_en_equipo'=>request('trabajo_en_equipo'),

        'mirada_al_frente'=>request('mirada_al_frente'),
        'coordinacion_manos_balon'=>request('coordinacion_manos_balon'),
        'decision_bajo_presion'=>request('decision_bajo_presion'),
        'acertividad_en_balon'=>request('acertividad_en_balon'),
        'coordinacion_manos_pase'=>request('coordinacion_manos_pase'),
        'rapidez_en_pase'=>request('rapidez_en_pase'),
        'pase_al_poste'=>request('pase_al_poste'),
        'acertividad_en_pase'=>request('acertividad_en_pase'),
        'balance_pies'=>request('balance_pies'),
        'pivote'=>request('pivote'),
        
        'balance_objetivo'=>request('balance_objetivo'),
        'agarre_balon'=>request('agarre_balon'),
        'alineacion_al_aro'=>request('alineacion_al_aro'),
        'entradas_manos'=>request('entradas_manos'),
        'posicion_cuerpo'=>request('posicion_cuerpo'),
        'presion_balon'=>request('presion_balon'),
        'bloqueo_oponente'=>request('bloqueo_oponente'),
        'contesta_lanzamiento'=>request('contesta_lanzamiento'),
        'observaciones'=>request('observaciones'),
        'alumnos_id'=>request('alumnos_id'),
        'relacion_grupo_alumnos'=>$valorid,
   
    ];

       historicos_deportivos::insert($datosGrupo);

//Se encuentran los ids de los alumnos pertenecientes a X grupo
       $datosalumnos =DB::table('grupo_alumnos')
       ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
       ->select('grupo_alumnos.id as idalumnos')
       ->get(array('idalumnos'));


//Declaramos un contador, para que lleve la cuenta de trabajos, y otra para el id de la relacion_grupo_alumno
$valormaximo = 0;
$valorb = '';


//Se recorren los alumnos pertenecientes al grupo, se encuentra quien tiene mas trabajos evaluados
// y el maximo se actualiza en la columna de grupos correspondiente
 foreach ($datosalumnos as $datoalumno) {
    $valorb = $datoalumno->idalumnos;

    $contador_trabajos = DB::table('historicos_deportivos')
    ->where('historicos_deportivos.relacion_grupo_alumnos', '=', $valorb)
    ->count();

    if ($contador_trabajos >=$valormaximo) {
        $valormaximo = $contador_trabajos;
        $datosGrupo=[
            'evaluaciones_maximo'=>$valormaximo,
        ];
         Grupos::where('id','=',$nombregrupo)->update($datosGrupo);

    }

 }

         return redirect('dashboard')->with('Mensaje','Histórico Deportivo agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historicos_deportivos  $historicos_deportivos
     * @return \Illuminate\Http\Response
     */
    public function show(historicos_deportivos $historicos_deportivos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historicos_deportivos  $historicos_deportivos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $alumnos = alumnos::all();
        $historicos_deportivo=historicos_deportivos::findOrFail($id);
        $datos =DB::table('historicos_deportivos')
        ->join('alumnos','alumnos.id', '=','historicos_deportivos.alumnos_id')
        ->where('historicos_deportivos.id', '=', $id)
        ->select('alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno','alumnos.id as identificadoralumno' )
        ->get();

        return view('formhistorico_deportivo.edithistorico_deportivo',compact('historicos_deportivo'))->with('datos',$datos)
        ->with('alumnos',$alumnos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historicos_deportivos  $historicos_deportivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $campos=[
            'comunicacion'=>'required|string|max:10',
            'liderazgo'=>'required|string|max:10',
            'respeto'=>'required|string|max:10',
            'responsabilidad'=>'required|string|max:10',
            'participacion'=>'required|string|max:10',
            'actitud'=>'required|string|max:10',
            'constancia'=>'required|string|max:10',
            'compromiso'=>'required|string|max:10',
            'trabajo_en_equipo'=>'required|string|max:10',

            'mirada_al_frente'=>'required|string|max:10',
            'coordinacion_manos_balon'=>'required|string|max:10',
            'decision_bajo_presion'=>'required|string|max:10',
            'acertividad_en_balon'=>'required|string|max:10',
            'coordinacion_manos_pase'=>'required|string|max:10',
            'rapidez_en_pase'=>'required|string|max:10',
            'pase_al_poste'=>'required|string|max:10',
            'acertividad_en_pase'=>'required|string|max:10',
            'balance_pies'=>'required|string|max:10',
            'pivote'=>'required|string|max:10',
            
            'balance_objetivo'=>'required|string|max:10',
            'agarre_balon'=>'required|string|max:10',
            'alineacion_al_aro'=>'required|string|max:10',
            'entradas_manos'=>'required|string|max:10',
            'posicion_cuerpo'=>'required|string|max:10',
            'presion_balon'=>'required|string|max:10',
            'bloqueo_oponente'=>'required|string|max:10',
            'contesta_lanzamiento'=>'required|string|max:10',
            'observaciones'=>'required|string|max:100',
            'alumnos_id'=>'required|integer',
           
       
        ];
        
        $Mensaje=["required"=>'El campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);




        $datosGrupo=request()->except(['_token','_method']);
        historicos_deportivos::where('id', '=', $id)->update($datosGrupo);


        //SE UTILIZARAN LAS SIGUIENTES DOS LINEAS DE CODIGO TEMPORALMENTE
        //COMENTADA $grupo=grupos::findOrFail($id);

        //Return, puede llamar a la vista por el "name" que posee
        //en caso de que no funcione..... hay que mandar llamar
        //la ruta directa de la vista edit.grupo.blade.php
        //         (nombrecarpeta.nombrevista)
        // COMENTADA return view('asistencia.editgrupo',compact('grupo'));

        return redirect('formhistorico_deportivo')->with('Mensaje','Histórico Deportivo modificado con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historicos_deportivos  $historicos_deportivos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        historicos_deportivos::destroy($id);

       //return y entre parentesis la 
       // direccion url a donde se dirige
       //la direccion se encuentra en con el comando
       //  php artisan route:list 
       return redirect('formhistorico_deportivo')->with('Mensaje','Registro Historico eliminado');
    }
}
