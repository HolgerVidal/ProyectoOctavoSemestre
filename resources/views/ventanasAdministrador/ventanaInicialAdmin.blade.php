@extends('layouts.ederApp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2><CENTER>EDITOR DE CONTENIDO PRINCIPAL</CENTER></h2></div>

	                <div class="card-body">
						<div class="adm_subtitulos">
							<i class="fa fa-adn"></i>
							Titulos de la pagina
							<hr class="adm_hr">
						</div>
						<div class="row">													
	                		<div class="col-md-12" id="">
								<div id="adm_error_contenido_titulos" class="adm_mensaje_error"></div>
								<div class="adm_area_titulos adm_listado adm_contenedor">
									<form action="" id="adm_guardar_titulos_form">
										<div class="row">
											<div class="col-md-6">
												@if(isset($opciones))
												@foreach ($opciones as $n)
												@if($n->nombre =="titulo1")
													<label for="adm_titulo1" class="col-md-4 col-form-label">TITULO 1</label>
													<input value="{{$n->valor}}" id="adm_titulo1" type="text" class="form-control" name="titulo1" required>
												@endif
												@endforeach
												@endif
											</div>
											<div class="col-md-6">
												@if(isset($opciones))
												@foreach ($opciones as $n)
												@if($n->nombre =="titulo2")
													<label for="adm_titulo1" class="col-md-4 col-form-label">TITULO 2</label>
													<input value="{{$n->valor}}" id="adm_titulo2" type="text" class="form-control" name="titulo1" required>
												@endif
												@endforeach
												@endif
											</div>
											<div class="col-md-12">
												@if(isset($opciones))
												@foreach ($opciones as $n)
												@if($n->nombre =="somos")
												<label for="adm_somos" class="col-md-4 col-form-label">¿QUIENES SOMOS?</label>
												<textarea value="" id="adm_somos" class="form-control" name="amd_quienes" id="" cols="30" rows="4" required>{{$n->valor}}</textarea>
												@endif
												@endforeach
												@endif
											</div>
											<div class="col-md-12">
												<button type="submit" id="adm_guardar_titulos" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="adm_subtitulos">
							<i class="fa fa-adn"></i>
							Información del Marco Teorico
							<hr class="adm_hr">
						</div>

						<div id="adm_error_contenido" class="adm_mensaje_error">
							
						</div>
						
						<form action="" id="adm_formulario_guardar_actualizar">
	                	<div class="row">
													
	                		<div class="col-md-8" id="adm_agregar_marco_teorico" hidden>
	                			<div class="container">
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group adm_contenedor">
												<input id="adm_idusuario" name="adm_idusuario" type="text" hidden value= {{ Auth::user()->id }}>
												<div class="row adm_txt">
													<input type="text" id="adm_tituloMT" name="adm_tituloMT" maxlength="80" class="form-control form-control-sm" style="margin-bottom: 0;"  placeholder="Ingrese el nombre del nuevo contenido " >
												</div>
												<textarea class="adm_contenedor" id="txt-content" name="txt-content"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>

	                		<div class="col-md-12" style="height: auto;" id="adm_lista_marco_teorico">
								<div class="row adm_boton_add">
									<button type="submit" class="btn btn-success" id="agregar_marco_teorico" value="0"><i class="fa fa-plus"></i> Nuevo</button>
									<button type="button" class="btn btn-danger" id="cancelar_marco_teorico" hidden style="margin-left:5px;"><i class="fa fa-undo"></i>Cancelar</button>
								</div>
								<div class="adm_listado pre-scrollable" id="adm_marco_teorico_contenido">
									@if(isset($listaContenido))
										@foreach($listaContenido as $item)
										<div id="{{$item->idinformacion_eder}}" class="adm_guardado_1 alert alert-success alert-dismissible fade show">
											<strong>FECHA: {{$item->fecha}}</strong>	
											<br>
											<strong>NOMBRE: {{$item->titulo}}</strong>
											<hr>
											<button type="button" class="btn_adm adm_btn_eliminar" onclick="eliminarContenido({{$item->idinformacion_eder}})"><i class="fa fa-trash"></i> Eliminar</button>					
											<button type="button" class="btn_adm adm_btn_editar" onclick="hacereditableContenido({{$item->idinformacion_eder}})"><i class="fa fa-edit"></i> Editar</button>
										</div>
										@endforeach
									@endif							
								</div>						
	                		</div>
	                	</div>
						</form>	
					</div>
			</div>
		</div>
	</div>
</div>

@endsection