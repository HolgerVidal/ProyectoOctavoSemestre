<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformacionEder;
use App\Configuracion;

class InicialConroller extends Controller
{
    public function todo(){
        $contenido=InformacionEder::All();
        return response()->json($contenido);
    }

    public function index(){
        $opciones = Configuracion::All();
        $contenido=InformacionEder::All();
        return view('ventanasInicio.ventanaInicial')->with(["contenidoInicial"=>$contenido, 'opciones'=>$opciones]);
    }
}
