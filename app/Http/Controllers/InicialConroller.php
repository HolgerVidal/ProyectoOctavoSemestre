<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformacionEder;
use App\Configuracion;
use App\Comentario;
use App\Respuesta_comentario;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Foros;

class InicialConroller extends Controller
{
    public function todo(){
        $contenido=InformacionEder::All();
        return response()->json($contenido);
    }

    public function index(){
        $opciones = Configuracion::first();
        $contenido=InformacionEder::All();

 
        //gestion de comentarios
        $comentario = Comentario::with('user')->get();
        $respuesta = Comentario::with('respuesta_comentario')->get();
        $rc = Respuesta_comentario::with('user')->get();
        $numComenta = DB::table('comentario')->count();
        $fun=$respuesta->sortByDesc('users_id');
        $_foros=Foros::all();

         return view('ventanasInicio.ventanaInicial')->with(["contenidoInicial"=>$contenido, 'opciones'=>$opciones,'comentario'=>$fun,"respuesta"=>$respuesta,"rc"=>$rc,'numeroDeComentario'=>$numComenta,'_foros'=>$_foros]);
    }
}
