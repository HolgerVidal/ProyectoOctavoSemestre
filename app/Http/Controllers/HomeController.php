<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function eder(){
       $come=Comentario::All();
        return view('eder')->with(['comentario'=>$come]);
    }
    public function index() 
    {
        $come=Comentario::All();
        return view('ventanasInicio.informacion')->with(['comentario'=>$come]);
    }
}
