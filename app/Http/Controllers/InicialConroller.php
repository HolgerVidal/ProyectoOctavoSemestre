<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformacionEder;
use App\Configuracion;
use App\Comentario;

class InicialConroller extends Controller
{
    public function todo(){
        $contenido=InformacionEder::All();
        return response()->json($contenido);
    }

    public function index(){
        $opciones = Configuracion::first();
        $contenido=InformacionEder::All();
        $come=Comentario::All();
        return view('ventanasInicio.ventanaInicial')->with(["contenidoInicial"=>$contenido, 'opciones'=>$opciones,'comentario'=>$come]);
    }
}
