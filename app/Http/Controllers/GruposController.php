<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use DatePeriod;
use DateInterval;

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

        
         //$datosGrupo=request()->except('_token');


         //Obtenemos el valor activo/inactivo de los dias de entrenamiento
         $do=$request->get('domingo');
         $lu=$request->get('lunes');
         $ma=$request->get('martes');
         $mi=$request->get('miercoles');
         $ju=$request->get('jueves');
         $vi=$request->get('viernes');
         $sa=$request->get('sabado');

//Establecemos los dias de la semana
         $nombresDias = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" );

        //Obtenemos los valores de fechas de inicio y fin de curso
         $fecha1=$request->get('fecha_inicio');
         $fecha2=$request->get('fecha_fin');

// establecemos la fecha de inicio
$inicio =  DateTime::createFromFormat('Y-m-d',  $fecha1);
// establecemos la fecha final (fecha de inicio + dias que queramos)
$fin =  DateTime::createFromFormat('Y-m-d', $fecha2);
$fin->modify( '+1 day' );

// creamos el periodo de fechas
$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);

//Declaramos un contador, para que lleve la cuenta
$cuenta = 0;

foreach($periodo as $date){
    // definimos la variables para verlo mejor
    $nombreDia = $nombresDias[$date->format("w")];
   
if ($nombreDia == 'Sunday' && $do=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Monday' && $lu=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Tuesday' && $ma=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Wednesday' && $mi=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Thursday' && $ju=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Friday' && $vi=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Saturday' && $sa=='Activo') {
    $cuenta += 1;
    
}

}
//echo $cuenta.'<br>';

//Se obtienen los datos recibidos del request
//y se almacenan el en un array para enviarlos a el insert


$datosGrupo=[
    'grado'=>$request->get('grado'),
    'seccion'=>request('seccion'),
    'nivel'=>request('nivel'),
    'descripcion'=>request('descripcion'),
    'fecha_inicio'=>request('fecha_inicio'),
    'fecha_fin'=>request('fecha_fin'),
    'lunes'=>request('lunes'),
    'martes'=>request('martes'),
    'miercoles'=>request('miercoles'),
    'jueves'=>request('jueves'),
    'viernes'=>request('viernes'),
    'sabado'=>request('sabado'),
    'domingo'=>request('domingo'),
    'dias_entrenamiento'=>$cuenta,
    'estado'=>request('estado'),

];

         grupos::insert($datosGrupo);     
         return redirect('asistencia/grupos')->with('Mensaje','Grupo agregado con éxito');

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
         //Obtenemos el valor activo/inactivo de los dias de entrenamiento
         $do=$request->get('domingo');
         $lu=$request->get('lunes');
         $ma=$request->get('martes');
         $mi=$request->get('miercoles');
         $ju=$request->get('jueves');
         $vi=$request->get('viernes');
         $sa=$request->get('sabado');

//Establecemos los dias de la semana
         $nombresDias = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" );

        //Obtenemos los valores de fechas de inicio y fin de curso
         $fecha1=$request->get('fecha_inicio');
         $fecha2=$request->get('fecha_fin');

// establecemos la fecha de inicio
$inicio =  DateTime::createFromFormat('Y-m-d',  $fecha1);
// establecemos la fecha final (fecha de inicio + dias que queramos)
$fin =  DateTime::createFromFormat('Y-m-d', $fecha2);
$fin->modify( '+1 day' );

// creamos el periodo de fechas
$periodo = new DatePeriod($inicio, new DateInterval('P1D') ,$fin);

//Declaramos un contador, para que lleve la cuenta
$cuenta = 0;

foreach($periodo as $date){
    // definimos la variables para verlo mejor
    $nombreDia = $nombresDias[$date->format("w")];
   
if ($nombreDia == 'Sunday' && $do=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Monday' && $lu=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Tuesday' && $ma=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Wednesday' && $mi=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Thursday' && $ju=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Friday' && $vi=='Activo') {
    $cuenta += 1;
}
if ($nombreDia == 'Saturday' && $sa=='Activo') {
    $cuenta += 1;
    
}

}
//echo $cuenta.'<br>';

//Se obtienen los datos recibidos del request
//y se almacenan el en un array para enviarlos a el insert


$datosGrupo=[
    'grado'=>$request->get('grado'),
    'seccion'=>request('seccion'),
    'nivel'=>request('nivel'),
    'descripcion'=>request('descripcion'),
    'fecha_inicio'=>request('fecha_inicio'),
    'fecha_fin'=>request('fecha_fin'),
    'lunes'=>request('lunes'),
    'martes'=>request('martes'),
    'miercoles'=>request('miercoles'),
    'jueves'=>request('jueves'),
    'viernes'=>request('viernes'),
    'sabado'=>request('sabado'),
    'domingo'=>request('domingo'),
    'dias_entrenamiento'=>$cuenta,
    'estado'=>request('estado'),

];

       // $datosGrupo=request()->except(['_token','_method']);
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
