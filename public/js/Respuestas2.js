
    var ruta='/PROYECTO_8vo-master/public/';



        $('#btn-nueva-respuesta').click(function(){

                    //alert("hola");
                    $.ajaxSetup({
                        headers: {
                            //esta se pone porque si no, no funciona
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            
                    var FrmData = {
                        //se asigna clave, valor 
                        idforo:$('#idforo').val(),
                        detalle: $('#add-respuesta').val(),
                    }
                    console.log(FrmData); 
                    $.ajax({
                        url: '/forosrespuestas', // Url que se envia para la solicitud
                        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
                        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
                        success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
                        {
                            
                            //$('#ejemplo').html();
                            console.log(requestData);
                            
                            
                            var f = new Date();
                
                            var respuestas = $('#respuestas-actuales').html();

                            var nuevas_respuestas= 
                            '<li class="comment even thread-even depth-1" id="'+ requestData.idrespuesta +'">'+
                                '<article class="comment-body">'+
                                    '<footer class="comment-meta">'+
                                        '<div class="comment-author vcard">'+
                                            '<img class="avatar" src="/eder/images/news/avatar/2.png" alt="">'+                        
                                            '<b class="fn"><a class="url" href="#">'+'@'+$('#name').val()+' </a></b>'+                    
                                        '</div>'+
                                        '<div class="comment-metadata">'+
                                            '<a href="#">'+
                                                '<time>'+
                                                f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()+
                                                '</time>'+  
                                            '</a>'+                                                        
                                        '</div>'+
                                    '</footer>'+
                                    '<div class="comment-content">'+
                                        '<p>'+
                                        $('#add-respuesta').val()+
                                        '</p>'+
                                    '</div>'+
                            
                                '<div class="reply" id=btnEliminar>'+
                                '<button class="comment-reply-link" rel="nofollow" onclick="eliminarRespuestaForo('+requestData.idrespuesta+')">Eliminar</button>'+
                                '</div>'+  

                                '</article>'+
                                
                            '</li>'+
                            respuestas
                            ;

                            $('#respuestas-actuales').html(nuevas_respuestas);//append
                            $('#add-respuesta').val("");        
                        }
                    });    

        });
        
        function eliminarRespuestaForo(id){

            $.ajaxSetup({
                headers: {
                    //esta se pone porque si no, no funciona
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var FrmData = {
                idrespuesta: id,
            }
            console.log(FrmData); 
            $.ajax({
                url: '/forosrespuestas/elininar', // Url que se envia para la solicitud
                method: "POST",             // Tipo de solicitud que se enviará, llamado como método
                data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
                success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
                {
                    $('#'+id).remove();
                }
            });

            
        }



