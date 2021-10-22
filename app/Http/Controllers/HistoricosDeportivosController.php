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
        $nombregrupo=$request->get('buscarporgrupo');
        $nombrealumno=$request->get('buscarpor');
        $nombrefecha=$request->get('buscarporfecha');

        $historicos_deportivos = historicos_deportivos::all();
        $grupos = Grupos::all();
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


//Se obtiene los ids de los integrantes del grupo, para posteriormente sumar sus evaluaciones y mostrarlos
//$calificacion_entrenamiento

     //Obtener el valor maximo de los entrenamientos, en la tabla de grupo
     $datosgrupos =DB::table('grupos')
     ->where('grupos.id', '=', $nombregrupo)
     ->select('grupos.evaluaciones_maximo')
     ->get(array('evaluaciones_maximo'));

     $valormaximo = 0;
           foreach ($datosgrupos as $valor) {
           $valormaximo = $valor->evaluaciones_maximo;
           }



//Obtener las id de los alumnos en el grupo
$datosalumnos =DB::table('grupo_alumnos')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->select('grupo_alumnos.id as idalumnos')
        ->get(array('idalumnos'));

        $valorb = '';
        

        foreach ($datosalumnos as $a) {
           $valorb = $a->idalumnos;
           $totalvalorporcentajes=0;

           $contador_evaluaciones = DB::table('historicos_deportivos')
           ->join('grupo_alumnos','grupo_alumnos.id', '=','historicos_deportivos.relacion_grupo_alumnos')
           ->where('historicos_deportivos.relacion_grupo_alumnos', '=', $valorb)
           ->get(array('total_historico'));

           foreach($contador_evaluaciones as $contador) {
            $totalvalorporcentajes=$totalvalorporcentajes+$contador->total_historico;

            }

           $resultado=(100/($valormaximo*100))*$totalvalorporcentajes;
           $datosGrupoAlumno=[
            
              'calificacion_entrenamiento'=>round($resultado),
          ];
           grupo_alumnos::where('id','=',$valorb)->update($datosGrupoAlumno);

       }

      




        //Se buscan los integrantesa del grupo para la vista
       
        $datos =DB::table('alumnos')
        ->join('grupo_alumnos','grupo_alumnos.alumnos_id', '=','alumnos.id')
        ->join('entrenadores','entrenadores.id', '=','grupo_alumnos.entrenadores_id')
        ->join('grupos','grupos.id', '=','grupo_alumnos.grupos_id')
        ->where('grupo_alumnos.grupos_id', '=', $nombregrupo)
        ->select('grupos.*','grupo_alumnos.id as idregistro','alumnos.nombres','alumnos.apellido_paterno','alumnos.apellido_materno', 'entrenadores.nombres as nombresentrenador' ,'entrenadores.apellido_paterno as paternoentrenador' ,'entrenadores.apellido_materno as maternoentrenador','grupo_alumnos.calificacion_entrenamiento')
        ->get();

        return view('formhistorico_deportivo.indexhistorico_deportivo')->with('alumnos',$alumnos)
        ->with('historicos_deportivos2',$historicos_deportivos2)
        ->with('grupos',$grupos)
        ->with('datos',$datos)
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


//Establecemos la seccion de liderazgo   
$liderazgo_valores_actitudes = array("comunicacion", "liderazgo", "respeto", "responsabilidad", "participacion", "actitud", "constancia","compromiso", "trabajo_en_equipo");

//Establecemos la seccion manejo de balon    
$manejo_de_balon = array("mirada_al_frente", "coordinacion_manos_balon", "decision_bajo_presion", "acertividad_en_balon");


//Establecemos la seccion pases    
$pases = array("coordinacion_manos_pase", "rapidez_en_pase", "pase_al_poste", "acertividad_en_pase");

//Establecemos la seccion trabajo de pies   
$trabajo_de_pies = array("balance_pies", "pivote");


//Establecemos la seccion lanzamiento   
$lanzamiento = array("balance_objetivo", "agarre_balon","alineacion_al_aro", "entradas_manos");

//Establecemos la seccion defensa  
$defensa = array("posicion_cuerpo", "presion_balon","bloqueo_oponente", "contesta_lanzamiento");

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

      

    $seccionliderazgo=0;
    for ($i=0; $i < count($liderazgo_valores_actitudes) ; $i++) { 
       
           
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Excelente') {
                $seccionliderazgo=$seccionliderazgo+4;
            }
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Bueno') {
                $seccionliderazgo=$seccionliderazgo+3;
            }
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Regular') {
                $seccionliderazgo=$seccionliderazgo+2;
            }
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Bajo') {
                $seccionliderazgo=$seccionliderazgo+1;
            }
     }
     
     $seccionmanejobalon=0;
     for ($i=0; $i < count($manejo_de_balon) ; $i++) { 
        
            
             if ($request[$manejo_de_balon[$i]]== 'Excelente') {
                 $seccionmanejobalon=$seccionmanejobalon+4;
             }
             if ($request[$manejo_de_balon[$i]]== 'Bueno') {
                 $seccionmanejobalon=$seccionmanejobalon+3;
             }
             if ($request[$manejo_de_balon[$i]]== 'Regular') {
                 $seccionmanejobalon=$seccionmanejobalon+2;
             }
             if ($request[$manejo_de_balon[$i]]== 'Bajo') {
                 $seccionmanejobalon=$seccionmanejobalon+1;
             }
      }

      $seccionpases=0;
      for ($i=0; $i < count($pases) ; $i++) { 
         
             
              if ($request[$pases[$i]]== 'Excelente') {
                  $seccionpases=$seccionpases+4;
              }
              if ($request[$pases[$i]]== 'Bueno') {
                  $seccionpases=$seccionpases+3;
              }
              if ($request[$pases[$i]]== 'Regular') {
                  $seccionpases=$seccionpases+2;
              }
              if ($request[$pases[$i]]== 'Bajo') {
                  $seccionpases=$seccionpases+1;
              }
       }

       $seccionpies=0;
       for ($i=0; $i < count($trabajo_de_pies) ; $i++) { 
          
              
               if ($request[$trabajo_de_pies[$i]]== 'Excelente') {
                   $seccionpies=$seccionpies+4;
               }
               if ($request[$trabajo_de_pies[$i]]== 'Bueno') {
                   $seccionpies=$seccionpies+3;
               }
               if ($request[$trabajo_de_pies[$i]]== 'Regular') {
                   $seccionpies=$seccionpies+2;
               }
               if ($request[$trabajo_de_pies[$i]]== 'Bajo') {
                   $seccionpies=$seccionpies+1;
               }
        }

        $seccionlanzamiento=0;
        for ($i=0; $i < count($lanzamiento) ; $i++) { 
           
               
                if ($request[$lanzamiento[$i]]== 'Excelente') {
                    $seccionlanzamiento=$seccionlanzamiento+4;
                }
                if ($request[$lanzamiento[$i]]== 'Bueno') {
                    $seccionlanzamiento=$seccionlanzamiento+3;
                }
                if ($request[$lanzamiento[$i]]== 'Regular') {
                    $seccionlanzamiento=$seccionlanzamiento+2;
                }
                if ($request[$lanzamiento[$i]]== 'Bajo') {
                    $seccionlanzamiento=$seccionlanzamiento+1;
                }
         }


         $secciondefensa=0;
         for ($i=0; $i < count($defensa) ; $i++) { 
            
                
                 if ($request[$defensa[$i]]== 'Excelente') {
                     $secciondefensa=$secciondefensa+4;
                 }
                 if ($request[$defensa[$i]]== 'Bueno') {
                     $secciondefensa=$secciondefensa+3;
                 }
                 if ($request[$defensa[$i]]== 'Regular') {
                     $secciondefensa=$secciondefensa+2;
                 }
                 if ($request[$defensa[$i]]== 'Bajo') {
                     $secciondefensa=$secciondefensa+1;
                 }
          }


        

          //Cada seccion equivale a un porcentaje (16.6666666667 %), sumando cada seccion, se debe obtener el 100% 
          //que es el total de el historico deportivo

          $porcentajeliderazgo=(16.6666666667/36)*$seccionliderazgo;
          $porcentajemanejobalon=(16.6666666667/16)*$seccionmanejobalon;
          $porcentajepases=(16.6666666667/16)*$seccionpases;
          $porcentajepies=(16.6666666667/8)*$seccionpies;
          $porcentajelanzamiento=(16.6666666667/16)*$seccionlanzamiento;
          $porcentajedefensa=(16.6666666667/16)*$secciondefensa;
         

          $total= $porcentajeliderazgo+$porcentajemanejobalon+$porcentajepases+$porcentajepies+$porcentajelanzamiento+$porcentajedefensa;
          $redondeartotal= round($total);

//Se calcula el porcentaje de aprovechamiento individual de cada seccion 

$evaluacion_liderazgo=(100/36)*$seccionliderazgo;
$evaluacion_manejobalon=(100/16)*$seccionmanejobalon;
$evaluacion_pases=(100/16)*$seccionpases;
$evaluacion_pies=(100/8)*$seccionpies;
$evaluacion_lanzamiento=(100/16)*$seccionlanzamiento;
$evaluacion_defensa=(100/16)*$secciondefensa;


//return $datosGrupo['comunicacion'];

 //Se insertan los datos recuperados(incluyendo el id de grupo_alumnos para la columna: relacion_grupo_alumnos)
 $datosGrupo=[
    'fecha_creacion'=>request('fecha_creacion'),

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

    'seccionliderazgo'=>$seccionliderazgo,
    'seccionmanejobalon'=>$seccionmanejobalon,
    'seccionpases'=>$seccionpases,
    'seccionpies'=>$seccionpies,
    'seccionlanzamiento'=>$seccionlanzamiento,
    'secciondefensa'=>$secciondefensa,
    'total_historico'=>$redondeartotal,


    'evaluacion_liderazgo'=>$evaluacion_liderazgo,
    'evaluacion_manejobalon'=>$evaluacion_manejobalon,
    'evaluacion_pases'=>$evaluacion_pases,
    'evaluacion_pies'=>$evaluacion_pies,
    'evaluacion_lanzamiento'=>$evaluacion_lanzamiento,
    'evaluacion_defensa'=>$evaluacion_defensa,

    'alta_usuario'=>$request('alta_usuario'),

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
        

//Establecemos la seccion de liderazgo   
$liderazgo_valores_actitudes = array("comunicacion", "liderazgo", "respeto", "responsabilidad", "participacion", "actitud", "constancia","compromiso", "trabajo_en_equipo");

//Establecemos la seccion manejo de balon    
$manejo_de_balon = array("mirada_al_frente", "coordinacion_manos_balon", "decision_bajo_presion", "acertividad_en_balon");


//Establecemos la seccion pases    
$pases = array("coordinacion_manos_pase", "rapidez_en_pase", "pase_al_poste", "acertividad_en_pase");

//Establecemos la seccion trabajo de pies   
$trabajo_de_pies = array("balance_pies", "pivote");


//Establecemos la seccion lanzamiento   
$lanzamiento = array("balance_objetivo", "agarre_balon","alineacion_al_aro", "entradas_manos");

//Establecemos la seccion defensa  
$defensa = array("posicion_cuerpo", "presion_balon","bloqueo_oponente", "contesta_lanzamiento");



        //Se reevaluan los datos si se cambiaron y se reacomodan los valores de los porcentajes
        //para no presentar fallas
        
      
    $seccionliderazgo=0;
    for ($i=0; $i < count($liderazgo_valores_actitudes) ; $i++) { 
       
           
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Excelente') {
                $seccionliderazgo=$seccionliderazgo+4;
            }
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Bueno') {
                $seccionliderazgo=$seccionliderazgo+3;
            }
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Regular') {
                $seccionliderazgo=$seccionliderazgo+2;
            }
            if ($request[$liderazgo_valores_actitudes[$i]]== 'Bajo') {
                $seccionliderazgo=$seccionliderazgo+1;
            }
     }
     
     $seccionmanejobalon=0;
     for ($i=0; $i < count($manejo_de_balon) ; $i++) { 
        
            
             if ($request[$manejo_de_balon[$i]]== 'Excelente') {
                 $seccionmanejobalon=$seccionmanejobalon+4;
             }
             if ($request[$manejo_de_balon[$i]]== 'Bueno') {
                 $seccionmanejobalon=$seccionmanejobalon+3;
             }
             if ($request[$manejo_de_balon[$i]]== 'Regular') {
                 $seccionmanejobalon=$seccionmanejobalon+2;
             }
             if ($request[$manejo_de_balon[$i]]== 'Bajo') {
                 $seccionmanejobalon=$seccionmanejobalon+1;
             }
      }

      $seccionpases=0;
      for ($i=0; $i < count($pases) ; $i++) { 
         
             
              if ($request[$pases[$i]]== 'Excelente') {
                  $seccionpases=$seccionpases+4;
              }
              if ($request[$pases[$i]]== 'Bueno') {
                  $seccionpases=$seccionpases+3;
              }
              if ($request[$pases[$i]]== 'Regular') {
                  $seccionpases=$seccionpases+2;
              }
              if ($request[$pases[$i]]== 'Bajo') {
                  $seccionpases=$seccionpases+1;
              }
       }

       $seccionpies=0;
       for ($i=0; $i < count($trabajo_de_pies) ; $i++) { 
          
              
               if ($request[$trabajo_de_pies[$i]]== 'Excelente') {
                   $seccionpies=$seccionpies+4;
               }
               if ($request[$trabajo_de_pies[$i]]== 'Bueno') {
                   $seccionpies=$seccionpies+3;
               }
               if ($request[$trabajo_de_pies[$i]]== 'Regular') {
                   $seccionpies=$seccionpies+2;
               }
               if ($request[$trabajo_de_pies[$i]]== 'Bajo') {
                   $seccionpies=$seccionpies+1;
               }
        }

        $seccionlanzamiento=0;
        for ($i=0; $i < count($lanzamiento) ; $i++) { 
           
               
                if ($request[$lanzamiento[$i]]== 'Excelente') {
                    $seccionlanzamiento=$seccionlanzamiento+4;
                }
                if ($request[$lanzamiento[$i]]== 'Bueno') {
                    $seccionlanzamiento=$seccionlanzamiento+3;
                }
                if ($request[$lanzamiento[$i]]== 'Regular') {
                    $seccionlanzamiento=$seccionlanzamiento+2;
                }
                if ($request[$lanzamiento[$i]]== 'Bajo') {
                    $seccionlanzamiento=$seccionlanzamiento+1;
                }
         }


         $secciondefensa=0;
         for ($i=0; $i < count($defensa) ; $i++) { 
            
                
                 if ($request[$defensa[$i]]== 'Excelente') {
                     $secciondefensa=$secciondefensa+4;
                 }
                 if ($request[$defensa[$i]]== 'Bueno') {
                     $secciondefensa=$secciondefensa+3;
                 }
                 if ($request[$defensa[$i]]== 'Regular') {
                     $secciondefensa=$secciondefensa+2;
                 }
                 if ($request[$defensa[$i]]== 'Bajo') {
                     $secciondefensa=$secciondefensa+1;
                 }
          }


        

          //Cada seccion equivale a un porcentaje (16.6666666667 %), sumando cada seccion, se debe obtener el 100% 
          //que es el total de el historico deportivo

          $porcentajeliderazgo=(16.6666666667/36)*$seccionliderazgo;
          $porcentajemanejobalon=(16.6666666667/16)*$seccionmanejobalon;
          $porcentajepases=(16.6666666667/16)*$seccionpases;
          $porcentajepies=(16.6666666667/8)*$seccionpies;
          $porcentajelanzamiento=(16.6666666667/16)*$seccionlanzamiento;
          $porcentajedefensa=(16.6666666667/16)*$secciondefensa;
         

          $total= $porcentajeliderazgo+$porcentajemanejobalon+$porcentajepases+$porcentajepies+$porcentajelanzamiento+$porcentajedefensa;
          $redondeartotal= round($total);

//Se calcula el porcentaje de aprovechamiento individual de cada seccion 

$evaluacion_liderazgo=(100/36)*$seccionliderazgo;
$evaluacion_manejobalon=(100/16)*$seccionmanejobalon;
$evaluacion_pases=(100/16)*$seccionpases;
$evaluacion_pies=(100/8)*$seccionpies;
$evaluacion_lanzamiento=(100/16)*$seccionlanzamiento;
$evaluacion_defensa=(100/16)*$secciondefensa;

//Se recuperan los datos a actualizar del request y de otros procesos
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
        
        
            'seccionliderazgo'=>$seccionliderazgo,
            'seccionmanejobalon'=>$seccionmanejobalon,
            'seccionpases'=>$seccionpases,
            'seccionpies'=>$seccionpies,
            'seccionlanzamiento'=>$seccionlanzamiento,
            'secciondefensa'=>$secciondefensa,
            'total_historico'=>$redondeartotal,
        
        
            'evaluacion_liderazgo'=>$evaluacion_liderazgo,
            'evaluacion_manejobalon'=>$evaluacion_manejobalon,
            'evaluacion_pases'=>$evaluacion_pases,
            'evaluacion_pies'=>$evaluacion_pies,
            'evaluacion_lanzamiento'=>$evaluacion_lanzamiento,
            'evaluacion_defensa'=>$evaluacion_defensa,
        
        ];
      
        historicos_deportivos::where('id', '=', $id)->update($datosGrupo);

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
