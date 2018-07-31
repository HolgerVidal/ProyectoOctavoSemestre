<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comentario;
use Carbon\Carbon;
use App\Respuesta_comentario;
use App\InformacionEder;
use App\Configuracion;
use Illuminate\Support\Facades\DB;


class ComentarioController extends Controller
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
    
   public function consultaAsc(){
     
        $comentario = Comentario::with('user')->get();
        $respuestac = Comentario::with('respuesta_comentario')->get();
        $rc = Respuesta_comentario::with('user')->get();
        $numComenta = DB::table('comentario')->count();
        $respuesta = Comentario::with('respuesta_comentario')->with('user')->with('respuesta_comentario')->get();
        $fun=$respuesta->sortByDesc('fecha');
        
     return response()->json($fun);
   }

   public function consultaDesc()
   {
       $respuestac = Comentario::with('user')->get();
       $respuesta = Comentario::with('respuesta_comentario')->with('user')->with('respuesta_comentario')->get();
       $fun=$respuestac->sortByDesc('idcomentario');
       return response()->json($fun);
   }
   
   public function llenarRespuesta(){
     
        $comentario = Comentario::with('user')->get();
        $respuestac = Comentario::with('respuesta_comentario')->get();
        $rc = Respuesta_comentario::with('user')->get();
        $numComenta = DB::table('comentario')->count();
        $respuesta = Comentario::with('respuesta_comentario')->with('user')->with('respuesta_comentario')->get();
        $fun=$rc->sortByDesc('fecha');

        //return view('ventanasInicio.comentarios')->with(['comentario'=>$fun,"respuesta"=>$respuesta,"rc"=>$rc,'numeroDeComentario'=>$numComenta]);   
        return response()->json($fun);
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
        $comentario =new Comentario();
        $comentario->detalle=$request->detalle;
        $comentario->users_id=$request->users_id;
        $comentario->fecha=Carbon::now()->toDateTimeString();
         if($comentario->save()){
            return response()->json($comentario);
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
        //
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
          $actualizar= Comentario::find($id);
          $actualizar->detalle=$request->detalle;
          $actualizar->save();
          //return response()->json($actualizar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $actualizar= Comentario::find($id);
         $actualizar->delete();
    }
}
