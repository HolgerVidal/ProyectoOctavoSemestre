<?php

namespace App\Http\Controllers;

use App\Foros;
use App\Respuestas;
use App\User;
use App\Configuracion;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO:creacion de foros
        $foro= new Foros();
        //$foro->idforo = $request->idforo;//
        $foro->users_id = User::find(Auth::user()->id);
        $foro->tema = $request->tema;
        $foro->fecha = Carbon::now()->toDateTimeString();
        $foro->estado_del = '1';
        
        $foro->save();

        return redirect('crearforo');
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
        $foro=Foros::find($request->idforo);
        $foro->update(['estado_del'=>0]);
        return redirect('/foroslista');
    }

    //MOSTRAR LOS FOROS EXISTENTES
    public function showForos(){
       
        $foros=Foros::where('estado_del','1')->paginate(5);
        return view('ventanasforo.ListaForos',compact('foros'));
    } 
    public function showForosAdmin(){

        $usuario_actual= User::find(Auth::user()->id);        
        $foros=Foros::where('estado_del','1')->paginate(5);
        return view('ventanasforo.ListaForosAdmin',compact('foros','usuario_actual'));
    }
    public function mostrarforo(Request $request)
    {
        $opciones = Configuracion::first();
        $users=User::all(); 
        $foro=Foros::where('idforo',$request->idforo)->where('estado_del','1')
                                                      ->firstOrFail();
        $respuestas=Respuestas::where('idforo',$foro->idforo)->where('estado_del','1')->paginate(100);

        //return view('ventanasforo.GestionForo',compact('foro','respuestas','users')); 
        $respuestas=Respuestas::where('idforo',$foro->idforo)->paginate(5);
        
        return view('ventanasforo.GestionForo',compact('foro','respuestas','users','opciones'));
        
    }
    public function mostrarMisForos(){
        $usuario_actual= User::find(Auth::user()->id);
        //where('users_id',User::find(Auth::user()->id))
        $foros=Foros::where('users_id',$usuario_actual->id)
                        ->where('estado_del','1')
                        ->paginate(5);

        return view('ventanasforo.MisForos',compact('foros','usuario_actual'));
    }

    public function destroyForo(Request $request)
    {
        //
       
        $foro=Foros::find($request->idforo);
        $foro->update(['estado_del'=>0]);
        
        $usuario_actual= User::find(Auth::user()->id);
        //where('users_id',User::find(Auth::user()->id))
        $foros=Foros::where('estado_del','1')
                     ->paginate(10);


        return view('ventanasforo.ListaForosAdmin',compact('foros','usuario_actual'));

    }
    public function destroyMisforos(Request $request)
    {
        //
       
        $foro=Foros::find($request->idforo);
        $foro->update(['estado_del'=>0]);
        
        $usuario_actual= User::find(Auth::user()->id);
        //where('users_id',User::find(Auth::user()->id))
        $foros=Foros::where('estado_del','1')
                     ->paginate(10);


        return view('ventanasforo.MisForos',compact('foros','usuario_actual'));

    }

    public function crear(Request $request)
    {
        //TODO:creacion de foros
        $foro= new Foros();
        //$foro->idforo = $request->idforo;//
        
        $usuario_actual= User::find(Auth::user()->id);
        $foro->users_id = $usuario_actual->id;
        $foro->tema = $request->tema;
        $foro->fecha = Carbon::now()->toDateTimeString();
        $foro->estado_del = '1';
        
        $foro->save();

       
        //where('users_id',User::find(Auth::user()->id))
        $foros=Foros::where('users_id',$usuario_actual->id)
                        ->where('estado_del','1')
                        ->paginate(10);

        return view('ventanasforo.MisForos',compact('foros','usuario_actual'));
        //
    }
}
