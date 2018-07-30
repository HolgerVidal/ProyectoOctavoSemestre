
<br>
<div class="form-group num-comentario">
	<h4><p id="numero-comentarios" class="n-comentarios"><i class="fa fa-comments-o"></i> </p> <p> RESPUESTAS </p></h4>
</div>
<br>
<hr>


@guest
    <a class="btn-comentar btn btn-success" href="{{ route('login') }}">Añadir Respuesta</a>
    <br>
    <br>
@else
    <div class="form-group">
    	<label for="commentario"> Añadir Respuesta</label>
    	<textarea class="form-control" id="add-respuesta" rows="5" placeholder="Escriba aquí su respuesta..."></textarea>
        
        <input type="" id="users_id" value="{{ Auth::user()->id }}" hidden>
        <input type="" id="idforo" value="{{ $foro->idforo }}" hidden>
        <input type="" id="name" value="{{ Auth::user()->name }}" hidden>        
                
        <button type="button" class="btn-comentar btn btn-success" id="btn-nueva-respuesta">Enviar</button>
    </div>
@endguest 


<div class="comments-area">
    <ol class="comment-list" id="respuestas-actuales">
    @foreach($respuestas as $respuesta)
        <li class="comment even thread-even depth-1" id="itemR">
            
            <article class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                                         
                        
                        
                        @foreach($users as $user)
                            @if($user->id==$respuesta->users_id)
                            <img class="avatar" src="/{{ $user->img}}" alt="">      
                            <b class="fn">
                            <a class="url"  href="#">{{ '@' . $user->name}}</a> 
                            </b> 
                             @endif
                        @endforeach 
                        
                                          
                    </div><!-- .comment-author -->
                    <div class="comment-metadata">
                        <a href="#">
                            <time>
                                {{$respuesta->fecha}}
                            </time>
                        </a>                                                        
                    </div><!-- .comment-metadata -->
                </footer><!-- .comment-meta -->

                <div class="comment-content">
                    <p> {{$respuesta->detalle}} </p>
                </div><!-- .comment-content -->

                   
            </article><!-- .comment-body -->
          
        </li>
        @endforeach
    </ol>                 
</div>