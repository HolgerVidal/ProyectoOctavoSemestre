<?php

namespace App\Http\Controllers;

use App\Prueva;
use Illuminate\Http\Request;

class PruevaController extends Controller
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
     * @param  \App\Prueva  $prueva
     * @return \Illuminate\Http\Response
     */
    public function show(Prueva $prueva)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prueva  $prueva
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueva $prueva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prueva  $prueva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prueva $prueva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prueva  $prueva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prueva $prueva)
    {
        //
    }

    public function showP()
    {
        //
        $pruevas=Prueva::all();
        return(view('prueva',compact('pruevas')));
    }
}
