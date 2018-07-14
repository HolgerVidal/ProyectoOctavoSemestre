@extends('layouts.ederApp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2><CENTER>EDITOR DE CONTENIDO PRINCIPAL</CENTER></h2></div>

	                <div class="card-body">
	                	<div class="row">
	                		<div class="col-md-8">
	                			<div class="container">
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group">
												<textarea id="txt-content" name="txt-content"></textarea>
											</div>
										</div>
									</div>
								</div>

	                		</div>	           
	                		<div class="col-md-4">
	                			
	                		</div>
	                	</div>	
					</div>
			</div>
		</div>
	</div>
</div>

@endsection