@guest
    <a class="btn-comentar btn btn-success" href="{{ route('login') }}">Añadir Respuesta</a>
    <br>
    <br>
@else
    <div class="form-group">
        
    	<label for="commentario"> Añadir Respuesta</label>
    	<textarea class="form-control" id="add-comentario" rows="5" placeholder="Escriba aquí su respuesta..."></textarea>
    	<button type="button" class="btn-comentar btn btn-success" id="btn-enviar-com">Publicar</button>
    </div>
@endguest
<div class="comments-area">

    <!-- Inincia el foreach -->
    @foreach($respuestas as $respuesta )

            <ol class="comment-list" id="comments-actuales">
            <li class="comment even thread-even depth-1" id="comment-5">
                <article class="comment-body">
                    <footer class="comment-meta">
                        <div class="comment-author vcard">
                            <img class="avatar" src="eder/images/news/avatar/1.png" alt="">                        
                            {{-- este bucle obtiene el nombre del usuario --}}
                            <b class="fn"><a class="url" href="#">
                            @foreach($users as $user)
                                @if($user->id==$respuesta->users_id)
                                {{'@'.$user->name}}
                                @endif
                            @endforeach
                            </a></b>        

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
                        <p>
                            {{$respuesta->detalle}}
                        </p>
                    </div><!-- .comment-content -->       
                </article><!-- .comment-body -->    
            </li>
        </ol>  

    @endforeach
                   
</div>