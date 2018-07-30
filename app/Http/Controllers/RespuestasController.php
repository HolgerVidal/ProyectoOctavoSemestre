<?php

namespace App\Http\Controllers;

use App\Respuestas;
use App\Foros;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::all();
        $foros= Foros::with('respuestas')->get();
        $respuestas=Respuestas::with('foros')->get();
        return view('ventanasforo.Aportes')->with(['foros'=>$foros, 'respuestas'=>$respuestas,'users'=>$users]);
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
        $respuestas=new Respuestas();

        $usuario_actual= User::find(Auth::user()->id);
        $respuestas->users_id=$usuario_actual->id;        
        $respuestas->idforo = $request->idforo;       
        $respuestas->detalle=$request->detalle;
        $respuestas->fecha=Carbon::now()->toDateTimeString();
        $respuestas->estado_del='1';
        if ($respuestas->save()) {
            return response()->json($respuestas);
        } else {
            return 0;
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
 
    public function mostrar(){
        $users=User::all();
        $respuestas=Respuestas::with('foros')->get();
        return view('ventanasforo.Foro')->with(['respuestas'=>$respuestas]);
        
        //return view('ventanasforo.Aportes');
    }    

    public function eliminar(Request $request){
        $respuesta=Respuestas::find($request->idrespuesta);
        //$respuesta->update(['estado_del'=>0]);
        
        if ( $respuesta->update(['estado_del'=>0])) {
            return 1;
        } else {
            return 0;
        }
        
    }

}
