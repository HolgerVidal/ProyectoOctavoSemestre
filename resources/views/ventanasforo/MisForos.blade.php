@extends('layouts.ederApp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header"> <strong> <center> Listado de Foros </center> </strong>  </div>
                </div>
                 
                <div class="card-body">
                   
                  <div class="box box-primary">
                  
                  </div>

                  <div class="box">
                    <div class="box-header">
                      <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                      <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tbody><tr>
                          <!--
                          <th>IDFORO</th>
                          <th>IDUSUARIO</th>
                          -->
                          <th>TEMA</th>
                          <th>FECHA</th>
                           
                          <th><center>Acciones</center></th>
                        </tr>
                        
                        @foreach($foros as $foro)
                        <tr>
                          <!--
                          <td>{{$foro->idforo}}</td>
                          <td>{{$foro->users_id}}</td>
                          -->
                          <td>{{$foro->tema}}</td>
                          <td>{{$foro->fecha}}</td>
                           
                          <td>
                            <!--<spam class = "fa fa-edit"></spam>
                            <spam class = "fa fa-trash"></spam>-->
                            <center><div class="row">
                                
                                <div class="col-md-6">
                                  
                                    <form action="{{url('/foros/mostrarforo')}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <input type="hidden" name="idforo" value="{{$foro->idforo}}">
                                        <button type="submit">Ingresar</button>
                                    </form>
                                
                                </div>

                                <div class="col-md-6">
                                  
                                    <form  method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <input type="hidden" name="idforo" value="{{$foro->idforo}}">
                                        <button type="submit">Elimanar</button>
                                    </form>
                                    
                                </div>
                          </div></center>
                          </td>
                          
                          <!--<td><span class="label label-danger">Denied</span></td>-->
                          
                          
                        </tr>
                        @endforeach
                      </tbody></table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

        
            
                </div>
        </div>
    </div>
</div>
@endsection