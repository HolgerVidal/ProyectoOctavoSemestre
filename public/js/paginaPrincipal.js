

$('#btn-enviar-com').click(function(){

    if ( $('#add-comentario').val()!="") { 
        guardarComentarios();
    }

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
        
        $.ajax({
            url: '/PROYECTO_8vo-master/public/addComentario', // Url que se envia para la solicitud
            method: "POST",             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                 //todo el div del comentario
                    var comentarios = $('#comments-actuales').html();
                    var nuevos_comentarios = 
                        '<li class="comment even thread-even depth-1" id="eli'+requestData.idcomentario+'">'+
                            '<article class="comment-body">'+
                                '<footer class="comment-meta">'+
                                    '<div class="comment-author vcard">'+
                                        '<img class="avatar" src="'+$('#img').val()+'" alt="">'+                        
                                        '<b class="fn"><a class="url" href="#">'+$('#user').val()+' </a></b>'+ 
                                        ' <button class="fa panel url form-group alert-sm "  style="margin-bottom: -25px;margin-left: 5px;background: #DCDCDC" data-toggle="modal" data-target="#myModal" onclick="editarComentario('+requestData.idcomentario+');" >'+
                                           '<a data-toggle="modal" data-target="#myModal" style="color: blue">Edit</a>'+
                                         '</button>'+                 
                                    '</div>'+
                                    '<div class="comment-metadata">'+
                                        '<a href="#">'+
                                            '<time>'+
                                                requestData.fecha+
                                            '</time>'+
                                        '</a>'+                                                        
                                    '</div>'+
                                '</footer>'+
                                '<div class="comment-content">'+
                                    '<p id="v'+requestData.idcomentario+'">'+
                                    $('#add-comentario').val()+
                                    '</p>'+
                                '</div>'+
                                ' <ol class="children" id="x'+requestData.idcomentario+'">'+
                                '<li  class="comment even thread-even depth-1">'+
                                '</li>'+
                                '</ol>'+
                                '<div class="reply">'+
                                    ' <a  class="comment-reply-link btn" rel="nofollow" onclick="respuestaComentario('+requestData.idcomentario+')"> Responder</a>'+
                                '</div>'+ 
                                '<div class="form-row hidden  modal-header form-group "  id="a'+requestData.idcomentario+'" >'+
                                    '<div class="alert alert-sm form-group alert-dismissible fade show col-md-12" style="border-top:1px solid #D3D3D3; margin-top: -3px;">'+
                                        '<br>'+
                                        '<div class="form-group col-md-10" style="margin-left: -10px;">'+ 
                                            '<textarea class="form-control " id="r'+requestData.idcomentario+'" rows="1" placeholder="Escriba aquí su comentario..."  style="height: 40px;">'+
                                            '</textarea>'+
                                        '</div>'+
                                        '<div class="col-md-1" style="margin-left: -12px;">'+
                                            '<button class="btn btn-secundariy" onclick="respuestas('+requestData.idcomentario+','+requestData.users_id+')" ><i class="fa fa-send" style="margin-left:-1px;"></i>'+
                                        '</div>'+
                                        '<div class="col-md-1"></div>'+
                                        '<button type="button" class="close" onclick="havilitarcomentario('+requestData.idcomentario+')">'+
                                            '<span aria-hidden="false">&times;</span>'+
                                        '</button>'+
                                   '</div> '+        
                            '</article>'+
                        '</li>'+
                        comentarios
                    ;

                    $('#comments-actuales').html(nuevos_comentarios);
                  
                  //console(requestData);

                 //todo---------------------

                 $('#add-comentario').val("");
                // $('#id').val("");   
            } 
        });    

 }
  
                 

//Gestion para las respueestas de los comentarios
   function respuestaComentario(id){
     
     $('#a'+id).attr('class','form-row  modal-header form-group');
      $('#a'+id).show(200); 
   }

  function havilitarcomentario(id){
    $('#a'+id).hide(122);  
  }

//funcion para ingresar las respuestas
function respuestas(idires,iduser){
    if ($('#r'+idires).val()!="") {
    $.ajaxSetup({
        headers: {
            //esta se pone porque si no, no funciona
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData = {
        //se asigna clave, valor 
        detalle: $('#r'+idires).val(),
        users_id:iduser,
        idcomentario:idires,
    }
    $.ajax({
        url: 'addRespuesta', // Url que se envia para la solicitud
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
        { 
            $('#r'+idires).val("");
            $('#a'+idires).hide(122);       
              var res='<article class="comment-body" id="eli'+requestData.idrespuesta_comentario+'">'+
                        '<footer class="comment-meta">'+
                            '<div class="comment-author vcard">'+
                              '  <img class="avatar" src="'+$('#img').val()+'" alt=""> '+                       
                            '    <b class="fn"><a class="url" href="#">'+$('#user').val()+'</a></b> '+ 
                             '<button class="fa panel url form-group alert-sm "  style="margin-bottom: -25px;margin-left: 5px;background: #DCDCDC" data-toggle="modal" data-target="#myModal" onclick="editarRespuesta('+requestData.idrespuesta_comentario+');">'+
                             '<a data-toggle="modal" data-target="#myModal" style="color:blue">Edit</a>'+
                           ' </button> ' +              
                            '</div><!-- .comment-author -->'+
                            '<div class="comment-metadata">'+
                                '<a href="#">'+
                                    '<time>'+
                                        requestData.fecha+
                                   ' </time>'+
                             '   </a> '+                                                    
                          '  </div><!-- .comment-metadata -->'+
                       ' </footer><!-- .comment-meta -->'+

                       ' <div class="comment-content">'+
                            '<p id="rc'+requestData.idrespuesta_comentario+'"> '+requestData.detalle+
                          '  </p>'+
                       ' </div>'+
                   '</article>';
                   
                 
        $('#x'+idires).append(res);
        } 
        }); 
    }
     
  }

  //llamada de ventana modal modificar comentario
  function editarComentario(id){
   var come=$('#v'+id).html();
     $('#comentario').val(come);
     $('#idc').val(id);   
      
 }

 //llamada de ventana modal modificar Respuesta
  function editarRespuesta(id){
   var res=$('#rc'+id).html();
     $('#comentario').val(res); 
     $('#idc').val(id);
     $('#saber').val(1);
 }

//editar Respuesta
function actualizar(){
  
    if ( $('#comentario').val()!="") { 
         
        if ($('#saber').val()== 1) {
            modificarRespuesta();
        }else{modificarComentario();}
    }
}

function eliminar(){
  
    if ( $('#comentario').val()!="") { 
         
        if ($('#saber').val()== 1) {
          eliminarRespuesta();
        }else{
          eliminarComentario(); 
        }
    }
}
//modifica las respuesta
function modificarRespuesta(){
    
  var idrespuesta_comentario = $('#idc').val();
 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            detalle: $('#comentario').val(),
        } 
        $.ajax({
            url:'addRespuesta/'+idrespuesta_comentario, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            { 
             var idr=$('#idc').val();
             $("#rc"+idr).html($("#comentario").val());
             //mensaje ="No puedes eliminar debido a que tienes respuesta!!";
                mensaje_error("#errorc", "Estimado usuario", "Su comentario ha sido modificado con éxito.", 9000, "info");
            }
        });
}

//modificar Comentario
function modificarComentario(){
   
    var idcomentario = $('#idc').val();
 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            detalle: $('#comentario').val(),
        } 
        $.ajax({
            url:'addComentario/'+idcomentario, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            { 
             var idc=$('#idc').val();
             $("#v"+idc).html($("#comentario").val());
                mensaje_error("#errorc", "Estimado usuario", "Su comentario ha sido modificado con éxito.", 9000, "info");
            }
        });
}

//elimina las respuesta
function eliminarRespuesta(){
  //alert("eliminar Respuesta");
     var idrespuesta_comentario = $('#idc').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'addRespuesta/' + idrespuesta_comentario,
            success: function (data) {
              
                var idr=$('#idc').val();
                $("#comentario").val("");
                $("#eli"+idr).hide();
                 mensaje_error("#errorc", "Estimado usuario", "Su comentario ha sido eliminado con éxito.", 10000, "info");
          
            },  
            error:function () {
              
                mensaje ="¡¡Por favor actualizar e intente nuevamente!!";
                mensaje_error("#errorc", "ADVERTENCIA", mensaje, 10000, "info");
            }
        });
 }

 //elimina las comentario
function eliminarComentario(){
  //alert("eliminar comentario");
     var idcomentario = $('#idc').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'addComentario/' + idcomentario,
            success: function (data) {
                
             var idc=$('#idc').val();
             $("#comentario").val("");
             $("#eli"+idc).hide();
                mensaje_error("#errorc", "Estimado usuario", "Su comentario ha sido eliminado con éxito.", 9000, "info");
            },  
            error:function () {
              
                mensaje ="No puedes eliminar debido a que tienes respuesta!!";
                mensaje_error("#errorc", "ADVERTENCIA", mensaje, 10000, "danger");
            }

        });
 }


function ordenarDesc(){
     var idu=$('#id').val();
       $('#comments-actuales').html('');
         $.get('consultaComentarioDesc', function (data) { 
             $.each(data, function(i, item) { 
               if (idu==item.users_id){
                $('#comments-actuales').append(
                   '<li class="comment even thread-even depth-1" id="eli'+item.idcomentario+'">'+
                        '<article class="comment-body">'+
                              '<footer class="comment-meta">'+
                                   '<div class="comment-author vcard">'+
                                        '<img class="avatar" src="'+item.img+'" alt="">'+                        
                                        '<b class="fn"><a class="url" href="#">'+item.name+' </a></b>'+
                                        ' <button class="fa panel url form-group alert-sm  " id="btnE'+item.idcomentario+'"  style="margin-bottom: -25px;margin-left: 5px;background: #DCDCDC" data-toggle="modal" data-target="#myModal" onclick="editarComentario('+item.idcomentario+');" >'+
                                            '<a data-toggle="modal" data-target="#myModal" style="color: blue">Edit</a>'+
                                        '</button>'+             
                                   '</div>'+
                                   '<div class="comment-metadata">'+
                                        '<a href="#">'+
                                           '<time>'+
                                              item.fecha+
                                            '</time>'+
                                          '</a>'+                                                        
                                   '</div>'+
                              '</footer>'+
                               '<div class="comment-content">'+
                                     '<p id="v'+item.idcomentario+'">'+
                                          item.detalle+
                                     '</p>'+
                               '</div>'+
                               ' <ol class="children" id="x'+item.idcomentario+'">'+
                                  '<li class="comment even thread-even depth-1">'+
                                  '</li>'+
                               '</ol>'+  
                                    '<div class="reply">'+
                                        ' <a  class="comment-reply-link btn" rel="nofollow" onclick="respuestaComentario('+item.idcomentario+')"> Responder</a>'+
                                    '</div>'+ 
                                    '<div class="form-row hidden  modal-header form-group "  id="a'+item.idcomentario+'" >'+
                                        '<div class="alert alert-sm form-group alert-dismissible fade show col-md-12" style="border-top:1px solid #D3D3D3; margin-top: -3px;">'+
                                            '<br>'+
                                            '<div class="form-group col-md-10" style="margin-left: -10px;">'+ 
                                                '<textarea class="form-control " id="r'+item.idcomentario+'" rows="1" placeholder="Escriba aquí su comentario..."  style="height: 40px;">'+
                                                '</textarea>'+
                                            '</div>'+
                                            '<div class="col-md-1" style="margin-left: -12px;">'+
                                                '<button class="btn btn-secundariy" onclick="respuestas('+item.idcomentario+','+idu+')" ><i class="fa fa-send" style="margin-left:-1px;"></i>'+
                                            '</div>'+
                                            '<div class="col-md-1"></div>'+
                                            '<button type="button" class="close" onclick="havilitarcomentario('+item.idcomentario+')">'+
                                                '<span aria-hidden="false">&times;</span>'+
                                            '</button>'+
                                       '</div> '+      
                        '</article>'+
                   '</li>'
                 );
               }else{
                 $('#comments-actuales').append(
                     '<li class="comment even thread-even depth-1" id="eli'+item.idcomentario+'">'+
                          '<article class="comment-body">'+
                                '<footer class="comment-meta">'+
                                     '<div class="comment-author vcard">'+
                                          '<img class="avatar" src="'+item.img+'" alt="">'+                        
                                          '<b class="fn"><a class="url" href="#">'+item.name+' </a></b>'+
                                                          
                                     '</div>'+
                                     '<div class="comment-metadata">'+
                                          '<a href="#">'+
                                             '<time>'+
                                                item.fecha+
                                              '</time>'+
                                            '</a>'+                                                        
                                     '</div>'+
                                '</footer>'+
                                 '<div class="comment-content">'+
                                       '<p id="v'+item.idcomentario+'">'+
                                            item.detalle+
                                       '</p>'+
                                 '</div>'+
                                 ' <ol class="children" id="x'+item.idcomentario+'">'+
                                    '<li class="comment even thread-even depth-1">'+
                                    '</li>'+
                                 '</ol>'+  
                                      '<div class="reply">'+
                                          ' <a  class="comment-reply-link btn" rel="nofollow" onclick="respuestaComentario('+item.idcomentario+')"> Responder</a>'+
                                      '</div>'+ 
                                      '<div class="form-row hidden  modal-header form-group "  id="a'+item.idcomentario+'" >'+
                                          '<div class="alert alert-sm form-group alert-dismissible fade show col-md-12" style="border-top:1px solid #D3D3D3; margin-top: -3px;">'+
                                              '<br>'+
                                              '<div class="form-group col-md-10" style="margin-left: -10px;">'+ 
                                                  '<textarea class="form-control " id="r'+item.idcomentario+'" rows="1" placeholder="Escriba aquí su comentario..."  style="height: 40px;">'+
                                                  '</textarea>'+
                                              '</div>'+
                                              '<div class="col-md-1" style="margin-left: -12px;">'+
                                                  '<button class="btn btn-secundariy" onclick="respuestas('+item.idcomentario+','+idu+')" ><i class="fa fa-send" style="margin-left:-1px;"></i>'+
                                              '</div>'+
                                              '<div class="col-md-1"></div>'+
                                              '<button type="button" class="close" onclick="havilitarcomentario('+item.idcomentario+')">'+
                                                  '<span aria-hidden="false">&times;</span>'+
                                              '</button>'+
                                         '</div> '+      
                          '</article>'+
                     '</li>'
                   );
               }
                 
                  
             }); 
            $.get('llenarRespuesta', function (data) {
              llenar(data)  
            })
         });   
}

function ordenarAsc(){
     var idu=$('#id').val();
       $('#comments-actuales').html('');
         $.get('consultaComentarioAsc', function (data) { 
             $.each(data, function(i, item) { 
               if (idu==item.users_id){
                $('#comments-actuales').append(
                   '<li class="comment even thread-even depth-1" id="eli'+item.idcomentario+'">'+
                        '<article class="comment-body">'+
                              '<footer class="comment-meta">'+
                                   '<div class="comment-author vcard">'+
                                        '<img class="avatar" src="'+item.img+'" alt="">'+                        
                                        '<b class="fn"><a class="url" href="#">'+item.name+' </a></b>'+
                                        ' <button class="fa panel url form-group alert-sm  " id="btnE'+item.idcomentario+'"  style="margin-bottom: -25px;margin-left: 5px;background: #DCDCDC" data-toggle="modal" data-target="#myModal" onclick="editarComentario('+item.idcomentario+');" >'+
                                            '<a data-toggle="modal" data-target="#myModal" style="color: blue">Edit</a>'+
                                        '</button>'+             
                                   '</div>'+
                                   '<div class="comment-metadata">'+
                                        '<a href="#">'+
                                           '<time>'+
                                              item.fecha+
                                            '</time>'+
                                          '</a>'+                                                        
                                   '</div>'+
                              '</footer>'+
                               '<div class="comment-content">'+
                                     '<p id="v'+item.idcomentario+'">'+
                                          item.detalle+
                                     '</p>'+
                               '</div>'+
                               ' <ol class="children" id="x'+item.idcomentario+'">'+
                                  '<li class="comment even thread-even depth-1">'+
                                  '</li>'+
                               '</ol>'+  
                                    '<div class="reply">'+
                                        ' <a  class="comment-reply-link btn" rel="nofollow" onclick="respuestaComentario('+item.idcomentario+')"> Responder</a>'+
                                    '</div>'+ 
                                    '<div class="form-row hidden  modal-header form-group "  id="a'+item.idcomentario+'" >'+
                                        '<div class="alert alert-sm form-group alert-dismissible fade show col-md-12" style="border-top:1px solid #D3D3D3; margin-top: -3px;">'+
                                            '<br>'+
                                            '<div class="form-group col-md-10" style="margin-left: -10px;">'+ 
                                                '<textarea class="form-control " id="r'+item.idcomentario+'" rows="1" placeholder="Escriba aquí su comentario..."  style="height: 40px;">'+
                                                '</textarea>'+
                                            '</div>'+
                                            '<div class="col-md-1" style="margin-left: -12px;">'+
                                                '<button class="btn btn-secundariy" onclick="respuestas('+item.idcomentario+','+idu+')" ><i class="fa fa-send" style="margin-left:-1px;"></i>'+
                                            '</div>'+
                                            '<div class="col-md-1"></div>'+
                                            '<button type="button" class="close" onclick="havilitarcomentario('+item.idcomentario+')">'+
                                                '<span aria-hidden="false">&times;</span>'+
                                            '</button>'+
                                       '</div> '+      
                        '</article>'+
                   '</li>'
                );
               }else{
                 $('#comments-actuales').append(
                     '<li class="comment even thread-even depth-1" id="eli'+item.idcomentario+'">'+
                          '<article class="comment-body">'+
                                '<footer class="comment-meta">'+
                                     '<div class="comment-author vcard">'+
                                          '<img class="avatar" src="'+item.img+'" alt="">'+                        
                                          '<b class="fn"><a class="url" href="#">'+item.name+' </a></b>'+                   
                                     '</div>'+
                                     '<div class="comment-metadata">'+
                                          '<a href="#">'+
                                             '<time>'+
                                                item.fecha+
                                              '</time>'+
                                            '</a>'+                                                        
                                     '</div>'+
                                '</footer>'+
                                 '<div class="comment-content">'+
                                       '<p id="v'+item.idcomentario+'">'+
                                            item.detalle+
                                       '</p>'+
                                 '</div>'+
                                 ' <ol class="children" id="x'+item.idcomentario+'">'+
                                    '<li class="comment even thread-even depth-1">'+
                                    '</li>'+
                                 '</ol>'+  
                                      '<div class="reply">'+
                                          ' <a  class="comment-reply-link btn" rel="nofollow" onclick="respuestaComentario('+item.idcomentario+')"> Responder</a>'+
                                      '</div>'+ 
                                      '<div class="form-row hidden  modal-header form-group "  id="a'+item.idcomentario+'" >'+
                                          '<div class="alert alert-sm form-group alert-dismissible fade show col-md-12" style="border-top:1px solid #D3D3D3; margin-top: -3px;">'+
                                              '<br>'+
                                              '<div class="form-group col-md-10" style="margin-left: -10px;">'+ 
                                                  '<textarea class="form-control " id="r'+item.idcomentario+'" rows="1" placeholder="Escriba aquí su comentario..."  style="height: 40px;">'+
                                                  '</textarea>'+
                                              '</div>'+
                                              '<div class="col-md-1" style="margin-left: -12px;">'+
                                                  '<button class="btn btn-secundariy" onclick="respuestas('+item.idcomentario+','+idu+')" ><i class="fa fa-send" style="margin-left:-1px;"></i>'+
                                              '</div>'+
                                              '<div class="col-md-1"></div>'+
                                              '<button type="button" class="close" onclick="havilitarcomentario('+item.idcomentario+')">'+
                                                  '<span aria-hidden="false">&times;</span>'+
                                              '</button>'+
                                         '</div> '+      
                          '</article>'+
                     '</li>'
                   );
               }
                 
                  
             }); 
            $.get('llenarRespuesta', function (data) {
              llenar(data)  
            })
         });   
}



$(document).ready(function() { 

    //  alert("hola no tienes errores");
 });

 //para mostrar las respuestas
function llenar(datos){
     $.each(datos, function(i, item) { 
       $('#x'+item.idcomentario).append(
            '<article class="comment-body" id="eli'+item.idrespuesta_comentario+'">'+
                        '<footer class="comment-meta">'+
                            '<div class="comment-author vcard">'+
                                    '<img class="avatar" src="'+item.user.img+'" alt=""> '+                       
                                    '<b class="fn"><a class="url" href="#">'+item.user.name+'</a></b> '+ 
                                    '<button class="fa panel url form-group alert-sm "  style="margin-bottom: -25px;margin-left: 5px;background: #DCDCDC" data-toggle="modal" data-target="#myModal" onclick="editarRespuesta('+item.idrespuesta_comentario+');">'+
                                        '<a data-toggle="modal" data-target="#myModal" style="color:blue">Edit</a>'+
                                    '</button>'+              
                            '</div><!-- .comment-author -->'+
                            '<div class="comment-metadata">'+
                                    '<a href="#">'+
                                        '<time>'+
                                           item.fecha+
                                        '</time>'+
                                    '</a> '+                                                    
                            '</div><!-- .comment-metadata -->'+
                        '</footer><!-- .comment-meta -->'+
                        '<div class="comment-content">'+
                            '<p id="rc'+item.idrespuesta_comentario+'"> '+item.detalle+
                            '</p>'+
                        '</div>'+
            ' </article>'
         ) 
       }); 
} 




    