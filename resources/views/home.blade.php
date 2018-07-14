@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @guest
                       <!--  <a type="button" class="btn btn-primary" href="{{ route('login') }}">Agregar Comentario</a> -->
                        <button onclick="logear()" type="button" class="btn btn-success">Ruta</button>
                    @else
                    <button type="button" class="btn btn-primary" onclick="alert('puedes agregar comentario')">Agregar Comentario</button>
                     @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
