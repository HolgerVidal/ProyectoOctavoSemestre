@guest
    <a class="btn-comentar btn btn-success" href="{{ route('login') }}">Añadir Respuesta</a>
    <br>
    <br>
@else
    <div class="form-group">
        
    	<label for="commentario"> Añadir Comentario</label>
    	<textarea class="form-control" id="add-comentario" rows="5" placeholder="Escriba aquí su comentario..."></textarea>
    	<button type="button" class="btn-comentar btn btn-success" id="btn-enviar-com">Enviar</button>
    </div>
@endguest
<div class="comments-area">
    <!-- Inincia el foreach -->
    @foreach($respuestas as $respuesta )
        @if($respuesta->esRes == '0')
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

                    <div class="reply">
                        <a href="#" class="comment-reply-link" rel="nofollow">Responder</a>
                    </div>         
                </article><!-- .comment-body -->

                @foreach($respuestas as $respuestaRR)
                    @if($respuestaRR->esRes == '1' and $respuestaRR->users_idRes == $respuesta->users_id) {{-- )--}}
                        <ol class="children">
                        <li class="comment even thread-even depth-1" id="comment-5">
                            <article class="comment-body">
                                <footer class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img class="avatar" src="eder/images/news/avatar/3.png" alt="">                        
                                        
                                        <b class="fn"><a class="url" href="#">
                                        {{--$respuestaRR->users_id--}}

                                        @foreach($users as $user)
                                            @if($user->id==$respuestaRR->users_id)
                                            {{'@'.$user->name}}
                                            @endif
                                        @endforeach

                                        </a></b>

                                    </div><!-- .comment-author -->
                                    <div class="comment-metadata">
                                        <a href="#">
                                            <time>
                                                {{$respuestaRR->fecha}}
                                            </time>
                                        </a>                                                        
                                    </div><!-- .comment-metadata -->
                                </footer><!-- .comment-meta -->

                                <div class="comment-content">
                                    <p>
                                    {{$respuestaRR->detalle}}
                                    </p>
                                </div><!-- .comment-content -->      
                            </article><!-- .comment-body -->
                        </li>
                    </ol>
                    @endif
                @endforeach

            </li>
        </ol>  
        @endif
    @endforeach
                   
</div>