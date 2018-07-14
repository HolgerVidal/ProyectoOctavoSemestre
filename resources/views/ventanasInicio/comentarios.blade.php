
<br>
<div class="form-group num-comentario">
	<h4><p id="numero-comentarios" class="n-comentarios"><i class="fa fa-comments-o"></i> X</p> <p> COMENTARIOS </p></h4>
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
    	<button type="button" class="btn-comentar btn btn-success" id="btn-enviar-com">Enviar</button>
    </div>
@endguest
<div class="comments-area">
    <ol class="comment-list" id="comments-actuales">
        <li class="comment even thread-even depth-1" id="comment-5">

            <article class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <img class="avatar" src="eder/images/news/avatar/1.png" alt="">                        
                        <b class="fn"><a class="url" href="#">Maria José</a></b>                   
                    </div><!-- .comment-author -->
                    <div class="comment-metadata">
                        <a href="#">
                            <time>
                                09/03/2016
                            </time>
                        </a>                                                        
                    </div><!-- .comment-metadata -->
                </footer><!-- .comment-meta -->

                <div class="comment-content">
                    <p>Esto es un simple comentario el primero de la lista xd xd xd xd xd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xd</p>
                </div><!-- .comment-content -->

                <div class="reply">
                    <a href="#" class="comment-reply-link" rel="nofollow">Responder</a>
                </div>         
            </article><!-- .comment-body -->

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
                            <p>Esta es una simple respuesta a un comentario xd xd xd xd xd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xdxd xd xd xd
                            </p>
                        </div><!-- .comment-content -->      
                    </article><!-- .comment-body -->
                </li>
            </ol>
        </li>

        <li class="comment even thread-even depth-1" id="comment-5">
            <article class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <img class="avatar" src="eder/images/news/avatar/2.png" alt="">                        
                        <b class="fn"><a class="url" href="#">Holger Vidal</a></b>                    
                    </div><!-- .comment-author -->
                    <div class="comment-metadata">
                        <a href="#">
                            <time>
                                09/03/2016
                            </time>
                        </a>                                                        
                    </div><!-- .comment-metadata -->
                </footer><!-- .comment-meta -->

                <div class="comment-content">
                    <p>Esta pagina esta bien pero bien fea no me gusta el diseño y la metodologia esta fea ajajjajaja
					   les recomiendo que mejoren el contenido del sitio y suban los documentos de la metodologia.
                    </p>
                </div><!-- .comment-content -->

                <div class="reply">
                    <a href="#" class="comment-reply-link" rel="nofollow">Responder</a>
                </div>         
            </article><!-- .comment-body -->
        </li>

    </ol>                 
</div>