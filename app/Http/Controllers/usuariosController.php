<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usuariosController extends Controller
{



    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios']=User::paginate();


        return view('formusuarios.indexformusuario',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formusuarios.createformusuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datosUsuario=request()->except('_token');

        $datosUsuario=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
           
        ];

         User::insert($datosUsuario);

         return redirect('formentrenadores/create')->with('Mensaje','Usuario agregado con exito');

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



    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        return view('formusuarios.editformusuario',compact('usuario'));
    }


    public function update(Request $request, $id)
    { 
        $datosUsuario=request()->except(['_token','_method']);
        $datosUsuario=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        
        User::where('id', '=', $id)->update($datosUsuario);

        return redirect('formusuario')->with('Mensaje','Usuario modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       User::destroy($id);

       //return y entre parentesis la 
       // direccion url a donde se dirige
       //la direccion se encuentra en con el comando
       //  php artisan route:list 
       return redirect('formusuario')->with('Mensaje','Usuario eliminado');
    }
}
