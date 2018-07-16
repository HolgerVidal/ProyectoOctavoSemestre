<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\InformacionEder;
use App\Configuracion;
/* use Illuminate\Support\Facades\DB; */

class InformacionEderController extends Controller
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

    public function index()
    {
        $contenido=InformacionEder::All();
        $opciones = Configuracion::All();
        if(Auth::user()->idtipo_usuario ==1){ // para poder usar esto es necesario importar la Auth
            return view('ventanasAdministrador.ventanaInicialAdmin')->with(["opciones"=>$opciones, 'listaContenido'=>$contenido]);
        }else{
            return view('ventanasInicio.ventanaInicial');
        }			 
    }

    public function actualizartitulos(Request $request){
        // buscamos y modificamos  cada unoa de la opciones de titulo
        // Para titulo1
        $t1 = Configuracion::where("nombre","=","titulo1")->first();
        $t1->valor=$request->titulo1;
        $t1->save();

        // Para titulo2
        $t2 = Configuracion::where("nombre","=","titulo2")->first();
        $t2->valor=$request->titulo2;
        $t2->save();

        // Para ¿Quienes somos?
        $somos = Configuracion::where("nombre","=","somos")->first();
        $somos->valor=$request->somos;
        if($somos->save()){
            return 0;
        }

        
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
         $obj_info = new InformacionEder();
         $obj_info->users_id=$request->idusuario;
         $obj_info->titulo=$request->titulo;
         $obj_info->detalle=$request->detalle;
         $obj_info->orden=0;
         $obj_info->fecha=date("Y-m-d");
         $obj_info->estado_del='A'; // le mandamos una 'A' de activo

         if($obj_info->save()){
            return json_encode($obj_info);
         }
        
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
        $obj_contenido = InformacionEder::find($id);
        return response()->json($obj_contenido);
    }

    public function actualizar(Request $request){
        $obj_contenido = InformacionEder::find($request->idcontenido);
        $obj_contenido->users_id=$request->idusuario;
        $obj_contenido->titulo=$request->titulo;
        $obj_contenido->detalle=$request->detalle;
        $obj_contenido->fecha=date("Y-m-d");
        if ($obj_contenido->save()){
            return json_encode($obj_contenido);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_contenido = InformacionEder::find($id);
        $obj_contenido->delete();
    }
}
