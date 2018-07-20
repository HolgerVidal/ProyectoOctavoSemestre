
<br>
<div class="form-group num-comentario">
	<h4><p id="numero-comentarios" class="n-comentarios"><i class="fa fa-comments-o"></i>
     @if(isset($comentario)) 
        @foreach($comentario as $n )                                           
        @endforeach 
       {{$n->idcomentario}} 
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
    	<label for="commentario"> Añadir Comentario</label>
    	<textarea class="form-control" id="add-comentario" rows="5" placeholder="Escriba aquí su comentario..."></textarea>
        <input type="" id="id" value="{{ Auth::user()->id }}" hidden>
        <input type="" id="user" value="{{ Auth::user()->name }}" hidden>
    	<button type="button" class="btn-comentar btn btn-success" id="btn-enviar-com">Enviar</button>
    </div>
@endguest
<div class="comments-area">
    <ol class="comment-list" id="comments-actuales">
        @if(isset($comentario))
             @foreach($comentario as $n )   
        <li class="comment even thread-even depth-1" id="comment-5">
                                                    
                    
            <article class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <img class="avatar" src="eder/images/news/avatar/2.png" alt="">                        
                        <b class="fn"><a class="url" href="#">{{$n->idcomentario}}</a></b>                   
                    </div><!-- .comment-author -->
                    <div class="comment-metadata">
                        <a href="#">
                            <time>
                               {{$n->fecha}}
                            </time>
                        </a>                                                        
                    </div><!-- .comment-metadata -->
                </footer><!-- .comment-meta -->

                <div class="comment-content">
                    <p>{{$n->detalle}}</p>
                </div><!-- .comment-content -->
      
                <div class="reply">
                    <a  class="comment-reply-link btn" rel="nofollow" onclick="respuestaComentario({{$n->idcomentario}})"> Responder</a>
                </div> 
                <textarea class="form-control" id="add-comentario" rows="0" placeholder="Escriba aquí su comentario..." cols="0"  ></textarea>      
            </article><!-- .comment-body -->
             @endforeach
            @endif

            <ol class="children">
                <li class="comment even thread-even depth-1" id="comment-5">
                    <article class="comment-body">
                        <footer class="comment-meta">
                            <div class="comment-author vcard">
                                <img class="avatar" src="eder/images/news/avatar/3.png" alt="">                        
                                <b class="fn"><a class="url" href="#">Marta Loor</a></b>                  
                            </div><!-- .comment-author -->
                            <div class="comment-metadata">
                                <a href="#">
                                    <time>
                                        09/03/2016 at 10:18 am  
                                    </time>
                                </a>                                                        
                            </div><!-- .comment-metadata -->
                        </footer><!-- .comment-meta -->

                        <div class="comment-content">
                            <p>Esta es una simple respuesta a un comentario xd xd xd xd xd xd xd xdxd xd 
                            </p>
                        </div><!-- .comment-content -->      
                    </article><!-- .comment-body -->
                </li>
            </ol>
        </li>
      <!--
        <li class="comment even thread-even depth-1" id="comment-5">
            <article class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <img class="avatar" src="eder/images/news/avatar/2.png" alt="">                        
                        <b class="fn"><a class="url" href="#">Holger Vidal</a></b>                    
                    </div><!-- .comment-author --><!--
                    <div class="comment-metadata">
                        <a href="#">
                            <time>
                                09/03/2016
                            </time>
                        </a>                                                        
                    </div><!-- .comment-metadata --><!--
                </footer><!-- .comment-meta --><!--

                <div class="comment-content">
                    <p>Esta pagina esta bien pero bien fea no me gusta el diseño y la metodologia esta fea ajajjajaja
					   les recomiendo que mejoren el contenido del sitio y suban los documentos de la metodologia.
                    </p>
                </div><!-- .comment-content --><!--

                <div class="reply">
                    <a href="#" class="comment-reply-link" rel="nofollow">Responder</a>
                </div>         
            </article><!-- .comment-body --><!--
        </li>
      -->
    </ol>                 
</div>