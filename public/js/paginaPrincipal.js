
$('#btn-enviar-com').click(function(){
	var comentarios = $('#comments-actuales').html();
	var nuevos_comentarios = 
	    '<li class="comment even thread-even depth-1" id="comment-5">'+
            '<article class="comment-body">'+
                '<footer class="comment-meta">'+
                    '<div class="comment-author vcard">'+
                        '<img class="avatar" src="eder/images/news/avatar/2.png" alt="">'+                        
                        '<b class="fn"><a class="url" href="#">Holger Vidal</a></b>'+                    
                    '</div>'+
                    '<div class="comment-metadata">'+
                        '<a href="#">'+
                            '<time>'+
                                '09/03/2016'+
                            '</time>'+
                        '</a>'+                                                        
                    '</div>'+
                '</footer>'+
                '<div class="comment-content">'+
                    '<p>'+
                    $('#add-comentario').val()+
                    '</p>'+
                '</div>'+
                '<div class="reply">'+
                    '<a href="#" class="comment-reply-link" rel="nofollow">Responder</a>'+
                '</div>'+         
            '</article>'+
        '</li>'+
        comentarios
	;
	$('#comments-actuales').html(nuevos_comentarios);
});