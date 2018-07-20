<?php

namespace App\Http\Controllers;

use App\Foros;
use App\Respuestas;
use App\User;
use Illuminate\Http\Request;

class ForosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //creacion de foros
        $foro= new Foros();
        $foro->idforo = $request->idforo;//
        $foro->users_id = $request->users_id;
        $foro->tema = $request->tema;
        $foro->fecha = $request->fecha;
        $tipoP->estado_del = 1;

        $tipoP->save();

        return redirect('ListaForos');;//redirect('/persona/persona/nuevo'); 
 
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
     * @param  \App\Foros  $foros
     * @return \Illuminate\Http\Response
     */
    public function show(Foros $foros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foros  $foros
     * @return \Illuminate\Http\Response
     */
    public function edit(Foros $foros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foros  $foros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foros $foros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foros  $foros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $foro=Foros::find($request->id);
        $foro->update(['estado_del'=>0]);
        return redirect('/foros/Listado');
    }

    //MOSTRAR LOS FOROS EXISTENTES
    public function showForos(){
        $foros=Foros::where('estado_del','1')->paginate(5);
        //$foros=Foros::all();
        return view('ventanasforo.ListaForos',compact('foros'));
        //return(view('prueva',compact('pruevas')));
    } 
    public function mostrarforo(Request $request)
    {
        $users=User::all();
        $foros=Foros::where('idforo',$request->idforo)->where('estado_del','1')->paginate(5);
        
        $idforo;
        foreach ($foros as $item) {
            # code...
            $idforo = $item->idforo;
        }
        //$idforo=$foros->idforo;

        $respuestas=Respuestas::where('idforo',$idforo)->where('estado_del','1')->paginate(5);

        return view('ventanasforo.Foro',compact('foros','respuestas','users')); 
        
    }

}
