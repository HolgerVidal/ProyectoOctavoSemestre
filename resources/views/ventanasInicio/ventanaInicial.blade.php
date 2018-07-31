<!-- ESTA ES LA ESTRUCTURA PRINCIPAL DE LA VETANA INCIAL -->
<!-- LLAMAMOS LOS DIFERENTES BLOQUES DE LA PAGINA -->

@extends('layouts.ederApp')
@section('content')
	<section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(isset($opciones))    
                        <h1>{{$opciones->titulo1}}</h1>
                    @endif
                    <ul class="breadcrumbs">
                        <li><a href="#">Inicio</a></li> 
                        <b>/</b> 
                        <li class="active">Información</li>
                    </ul>            
                </div>
            </div>
        </div>
    </section>
    
    <div id="content">
        <div class="container">
            <div class="row"> 
                <div class="col-md-9">
                    @include('ventanasInicio.informacion')
                    <div class="comments-area" id="comments">
                     @include('ventanasInicio.comentarios')  
                      @include('ventanasInicio.ventanaModalComentario')  
                    </div>
                </div>
                <div class="col-md-3">
                    @include('ventanasInicio.seccionDerecha')

                </div>
            </div>
         </div> 
    </div>


    <footer class="footer-1 bg-color-1">
    </footer>

@endsection