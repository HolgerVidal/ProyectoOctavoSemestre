<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Persona;

class PerfilUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function datosUsuarioCombos(){
        $persona = Persona::find(Auth::user()->idpersona);
        return response()->json($persona);
    }

    public function index()
    {
        $persona = Persona::find(Auth::user()->idpersona);
        return view('ventanasPerfil.ventanaPerfil')->with(["persona"=>$persona]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request){
        $persona = Persona::find(Auth::user()->idpersona);
        $persona->nombres=$request->nombres;
        $persona->apellidos=$request->apellidos;
        $persona->cedula=$request->cedula;
        $persona->sexo=$request->sexo;
        $persona->institucion=$request->institucion;
        $persona->pais=$request->pais;
        $persona->fecha_nacimiento=$request->fecha_nacimiento;
        
        if($persona->save()){
            $user = Auth::user();
            $user->img = $request->img;
            list($n1) = explode(' ',$persona->nombres);
            list($n2) = explode(' ', $persona->apellidos);
            $user->name=$n1.$n2;
            if($user->save()){
                return 0;
            }
        }
        
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
