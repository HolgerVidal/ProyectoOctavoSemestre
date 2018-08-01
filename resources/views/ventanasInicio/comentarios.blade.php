
<br>
<div class="form-group num-comentario">
	<h4><p id="numero-comentarios" class="n-comentarios"><i class="fa fa-comments-o"></i>
     @if(isset($numeroDeComentario)) 
       
       {{$numeroDeComentario}}
     @endif
 </p> <p> COMENTARIOS </p></h4>
</div>
<br>
<hr>
@guest
    <a class="btn-comentar btn btn-success" href="{{ route('login') }}">Añadir Comentario</a>
    <br>
    <br>
@else
    <div class="form-group">
      <form>
    	<label for="commentario"> Añadir Comentario</label>
    	<textarea class="form-control" id="add-comentario" rows="5" placeholder="Escriba aquí su comentario..." required></textarea>
        <input type="" id="id" value="{{ Auth::user()->id }}" hidden>
        <input type="" id="user" value="{{ Auth::user()->name }}" hidden>
        <input type="" id="img" value="{{ Auth::user()->img }}" hidden>
    	<button type="button" class="btn-comentar btn btn-success btn-ms" id="btn-enviar-com">Enviar</button> 
       
      </form>
    </div>
@endguest

<div class="comments-area" id="refresh">
@guest @else
  <div class="panel form-control ">

   Ordenar:<a   href="#refresh">
  <i class="fa-sm fa fa-eye " style="margin-left: 2%;"onclick="ordenarDesc()" >
    Desc
  </i></a>
  <a href="#refresh">
  <i class="fa-sm fa fa-eye " onclick="ordenarAsc()" > Asc</i>
  </a>
  </div>
  @endguest
    <ol class="comment-list" id="comments-actuales">

      @if(isset($comentario))
        @foreach($comentario as $n )   
        <li class="comment even thread-even depth-1" id="eli{{$n->idcomentario}}">    
            <article class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <img class="avatar" src="{{$n->user->img}}" alt="">                        
                        <b class="fn"><a class="url"  data-toggle="tab">{{$n->user->name}} </a></b> 
                       @guest

                       @else

                        @if(Auth::user()->id == $n->users_id)
                          <button class="fa panel url form-group alert-sm "  style="margin-bottom: -25px;margin-left: 5px;background: #DCDCDC" data-toggle="modal" data-target="#myModal" onclick="editarComentario({{$n->idcomentario}});" ><a data-toggle="modal" data-target="#myModal" style="color: blue">Edit</a>
                        </button>

                        @else
                        
                        @endif
                        @endguest 
                    </div><!-- .comment-author -->
                    <div class="comment-metadata">
                        <a > 
                            <time><i class="fa fa-clock-o"></i>
                                {{$n->fecha}}
                            </time> 
                        </a>   
                       
                                                                           
                    </div><!-- .comment-metadata -->
                </footer><!-- .comment-meta -->
                <div class="comment-content">
                    <p id="v{{$n->idcomentario}}">{{$n->detalle}}</p>
                </div><!-- .comment-content -->
                <div class="reply">
                    @guest
                     <a href="{{ route('login') }}" class="comment-reply-link "> Responder</a>
                     @else
                     <a class="comment-reply-link btn" onclick="respuestaComentario({{$n->idcomentario}})">Respondesr</a> 
                    @endguest
                </div>   
            </article><!-- .comment-body --><br>
           
          <ol class="children" id="x{{$n->idcomentario}}">
            <!--esta es la parte para las respuesta de los comentarios-->
              @foreach($n->respuesta_comentario as $nn)  
               
               <li class="comment even thread-even depth-1" >
                    <article class="comment-body" id="eli{{$nn->idrespuesta_comentario}}"> 
                        <footer class="comment-meta">
                            <div class="comment-author vcard">
                               <img class="avatar" src="{{$nn->user->img}}" alt="">  
                               <b class="fn"><a class="url" href="#">{{$nn->user->name}}</a></b>
                               @guest

                               @else
                                @if(Auth::user()->id == $nn->users_id)
                                   <button class="fa panel url form-group alert-sm "  style="margin-bottom: -25px;margin-left: 5px;background: #DCDCDC" data-toggle="modal" data-target="#myModal" onclick="editarRespuesta({{$nn->idrespuesta_comentario}});"><a data-toggle="modal" data-target="#myModal" style="color:blue">Edit</a>
                                  </button>
                                @else
                                  
                                @endif
                                 @endguest      
                            </div><!-- .comment-author -->
                            <div class="comment-metadata">
                                <a href="#">
                                    <time>
                                      {{$nn->fecha}} 
                                    </time>
                               </a>                                                    
                            </div><!-- .comment-metadata -->
                       </footer><!-- .comment-meta -->
                       <div class="comment-content">
                           <p id="rc{{$nn->idrespuesta_comentario}}">{{$nn->detalle}} 
                            </p>
                       </div>
                    </article>

               </li>             
            
             @endforeach
          </ol>
          <!--esta es la parte del cuadrito de la respuesta -->
          <div class="form-row hidden  modal-header form-group "  id="a{{$n->idcomentario}}" >
                  <div class="alert alert-sm form-group alert-dismissible fade show col-md-12" style="border-top:1px solid #D3D3D3; margin-top: -3px;">
                      <br>
                      <div class="form-group col-md-10" style="margin-left: -10px;" >
                            <textarea class="form-control " id="r{{$n->idcomentario}}" rows="1" placeholder="Escriba aquí su comentario..."  style="height: 40px;" required>
                            </textarea> 
                      </div>
                      <div class="col-md-1" style="margin-left: -12px;" >
                          @guest 
                          @else                      
                            <button class="btn btn-secondary"onclick="respuestas({{$n->idcomentario}},{{ Auth::user()->id}})" ><i class="fa fa-send" style="margin-left:-1px;"></i>
                           @endguest   
                      </div>
                      <div class="col-md-1"></div>
                        <button type="button" class="close" onclick="havilitarcomentario({{$n->idcomentario}})">
                            <span aria-hidden="false">&times;</span>
                        </button>
                  </div>   
          </div>

        </li> 
        @endforeach
      @endif
    </ol>                 
</div>
