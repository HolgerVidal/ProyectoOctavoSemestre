var ruta='/PROYECTO_8vo-master/public/';
$('#btn-enviar-com').click(function(){

	var comentarios = $('#comments-actuales').html();
	guardarComentarios();
	var nuevos_comentarios = 
	    '<li class="comment even thread-even depth-1" id="comment-5">'+
            '<article class="comment-body">'+
                '<footer class="comment-meta">'+
                    '<div class="comment-author vcard">'+
                        '<img class="avatar" src="eder/images/news/avatar/2.png" alt="">'+                        
                        '<b class="fn"><a class="url" href="#">'+$('#user').val()+' </a></b>'+                    
                    '</div>'+
                    '<div class="comment-metadata">'+
                        '<a href="#">'+
                            '<time>'+
                                '09/03/2018'+
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

 //Guardar comentarios
  function guardarComentarios(){
   
        $.ajaxSetup({
            headers: {
                //esta se pone porque si no, no funciona
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var FrmData = {
            //se asigna clave, valor 
            detalle: $('#add-comentario').val(),
            users_id:$('#id').val(),
        }
        console.log(FrmData); 
        $.ajax({
            url: '/PROYECTO_8vo-master/public/addComentario', // Url que se envia para la solicitud
            method: "POST",             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                 $('#add-comentario').val("");
                 $('#id').val("");   
            }
        });    

    }