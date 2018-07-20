@extends('layouts.ederApp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header"  > <strong> <center>
                        
                        @foreach($foros as $foro)
                        TEMA: {{$foro->tema}} 
                        @endforeach
                    </center></strong>  </div>
                </div>
                 
                <div class="card-body">
                   
                  <div class="box box-primary">
                  
                  </div>

                  <div class="box">
                    
                    <div class="box-header">
                    </div>
                    
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tbody><tr>
                          <!--
                          <th>IDFORO</th>
                          <th>IDUSUARIO</th>
                          
                                <th>TEMA</th>
                                <th>FECHA</th>
                           
                                <th><center>Acciones</center></th>
                                </tr>
                              -->
                                <div class="comments-area" id="comments">
                                    @include('ventanasforo.Aportes')
                                </div>
                               
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

        
            
                </div>
        </div>
    </div>
</div>
@endsection