
$('.selec_avatar').click(function(){
    imagen=$(this).children('img').attr('src');
    $('#pf_imagen_perfil').prop('src', imagen);
});


// formulario para guardar los dato perosnales que se modifican del usuar

$('#pf_formulario_reistro_datos').on('submit',function(e){
    e.preventDefault();
    $('#pf_guardarDatos').attr('disabled', true);// desabilitamos el boton de guarsdado
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData = {
        nombres: $('#pf_nombres').val(),
        apellidos: $('#pf_apellidos').val(),
        cedula: $('#pf_cedula').val(),
        sexo: $('#pf_sexo').val(),
        pais: $('#pf_pais').val(),
        fecha_nacimiento: $('#pf_fecha_nacimiento').val(),
        institucion: $('#pf_institucion').val(),
        img: $('#pf_imagen_perfil').attr('src')
    }
    $.ajax({
        url: 'actualizarDatosUsuario', // Url que se envia para la solicitud
        method: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        dataType: 'json',
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            $('#pf_guardarDatos').attr('disabled', false);// abilitamos el boton de guarsdado
            mensaje = "Los cambios se realizaron correctamente!";
            mensaje_error("#pf_error_perfil", "INFORMACIÓN", mensaje, 2000, "info");
        },
        error: function () {
            $('#pf_guardarDatos').attr('disabled', false);// abilitamos el boton de guarsdado
            mensaje = "Error al actualizar los datos";
            mensaje_error("#pf_error_perfil", "ADVERTENCIA", mensaje, 2000, "danger");
        }
    });
});