
$(document).ready(function(){
    $.get('listaContenidos', function (data){
        $.each(data,function(i, item){
            $('#informacion_general').append(item.detalle);
        });
    });
});



function editarGuargar(opcion) {
    if(opcion==0){
        $('#adm_agregar_marco_teorico').prop('hidden', false); // mostramos el editor de texto
        $('#cancelar_marco_teorico').prop('hidden', false); // mostramos el boton de cancelar la edicon
        $('#adm_lista_marco_teorico').removeClass('col-md-12');
        $('#adm_lista_marco_teorico').addClass('col-md-4');
        $('#agregar_marco_teorico').html('<i class="fa fa-save"></i> Guardar');
        $('#adm_tituloMT').prop('required',true);
        $('.adm_guardado_1').addClass('adm_guardado_2');
        $('.adm_guardado_2').removeClass('adm_guardado_1');
    }else if(opcion==1){
        $('#adm_agregar_marco_teorico').prop('hidden', true); // mostramos el editor de texto
        $('#cancelar_marco_teorico').prop('hidden', true); // mostramos el boton de cancelar la edicon
        $('#adm_lista_marco_teorico').removeClass('col-md-4');
        $('#adm_lista_marco_teorico').addClass('col-md-12');
        $('#agregar_marco_teorico').html('<i class="fa fa-plus"></i> Nuevo');
        $('#agregar_marco_teorico').val("0");
        $('#adm_tituloMT').prop('required', false);

        $('#txt-content').Editor('setText', '');
        $('#adm_tituloMT').val("");

        $('.adm_guardado_2').addClass('adm_guardado_1');
        $('.adm_guardado_1').removeClass('adm_guardado_2');
    }
}

$("#adm_formulario_guardar_actualizar").on("submit", function (e) {
    e.preventDefault();
    if ($('#agregar_marco_teorico').html() =='<i class="fa fa-save"></i> Guardar'){
        if ($('#agregar_marco_teorico').val() == '0'){
            guardarContenido(); // estamos creando uno nuevo
        }else{
            modificarContenido($('#agregar_marco_teorico').val());    // estamos modificando uno
        }
    }else{
        editarGuargar(0);
    }
});

$('#cancelar_marco_teorico').click(function (){
    editarGuargar(1);
});

function guardarContenido() {

    // validamos que el contenido a ingresar no sea nulo
    if ($('#txt-content').Editor('getText').length <20){
        mensaje_error("#adm_error_contenido", "ADVERTENCIA", "El contenido a ingresar es muy corto", 5000, "danger");
        return;
    }
    // mamos a llamar la ruta para almacenar la informacion que se ingreso
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData = {
        idusuario: $('#adm_idusuario').val(),
        titulo: $('#adm_tituloMT').val(),
        detalle: $('#txt-content').Editor('getText'),
    }
    $.ajax({
        url: 'gestionformacioneder',
        method: 'POST',
        data: FrmData,
        dataType: 'json',
        success:function(data){ // esta funcion se ejecuta si no existen errore
            agregarContenidoGuardado(data);
            mensaje = "Los cambios se guardaron correctamente!";
            mensaje_error("#adm_error_contenido", "INFORMACIÓN", mensaje, 2000, "info");
        },
        error:function () {
            mensaje ="El contenido que desea ingresar es muy grande. Si el contenido tiene gran cantidad de estilos aplicados, es recomendable que los divida en varias partes e ingrese una por una.";
            mensaje_error("#adm_error_contenido", "ADVERTENCIA", mensaje, 15000, "danger");
        }
    }); 
}

function agregarContenidoGuardado(data) {
    $('#adm_marco_teorico_contenido').append(
        '<div id="' + data.idinformacion_eder +'" class="adm_guardado_2 alert alert-success alert-dismissible fade show">'+
            '<strong>FECHA: ' + data.fecha + '</strong>' +
            '<br>'+
            '<strong>NOMBRE: ' + data.titulo + '</strong>' +
            '<hr>'+
        '<button type="button" class="btn_adm adm_btn_eliminar" onclick="eliminarContenido(' + data.idinformacion_eder+')"><i class="fa fa-trash"></i> Eliminar</button>'+
        '<button type="button" class="btn_adm adm_btn_editar" onclick="hacereditableContenido(' + data.idinformacion_eder +')"><i class="fa fa-edit"></i> Editar</button>' +					
		'</div>'
    );
}

function eliminarContenido(ideliminar){
/* $('.adm_btn_eliminar').click(function(){ */
    if(confirm("Esta seguro que desea eliminar este contenido..?")==false){
        return;
    }
    /* ideliminar=$(this).val(); */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'gestionformacioneder/' + ideliminar, // Url que se envia para la solicitud
        type: 'DELETE',             // Tipo de solicitud que se enviará, llamado como método
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            $('#' + ideliminar).remove();
            mensaje = "Los cambios se realizaron correctamente!";
            mensaje_error("#adm_error_contenido", "INFORMACIÓN", mensaje, 2000, "info");
        },
        error: function () {
            mensaje = "Error al eliminar";
            mensaje_error("#adm_error_contenido","ADVERTENCIA", mensaje,2000,"danger" );
        }
    });
}

function hacereditableContenido(idcontenido) {
    editarGuargar(0);
    $('#agregar_marco_teorico').val(idcontenido);
    $.get('gestionformacioneder/' + idcontenido + '/edit', function (data) {
        $('#adm_tituloMT').val(data.titulo);
        $('#txt-content').Editor('setText', data.detalle);
    });
}

function modificarContenido(idcontenido){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    }); 
    var FrmData = {
        idcontenido: idcontenido,
        idusuario: $('#adm_idusuario').val(),
        titulo: $('#adm_tituloMT').val(),
        detalle: $('#txt-content').Editor('getText'),
    }
    $.ajax({
        url: 'gestionformacioneder_actulizar', // Url que se envia para la solicitud
        method: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        dataType: 'json',
        success: function(data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mensaje = "Los cambios se realizaron correctamente!";
            mensaje_error("#adm_error_contenido", "INFORMACIÓN", mensaje, 2000, "info");
        },
        error: function () {
            mensaje = "Error al actualizar";
            mensaje_error("#adm_error_contenido", "ADVERTENCIA", mensaje, 2000, "danger");
        }
    });
}


$('#adm_guardar_titulos_form').on("submit", function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData = {
        titulo1: $('#adm_titulo1').val(),
        titulo2: $('#adm_titulo2').val(),
        somos: $('#adm_somos').val(),
    }
    $.ajax({
        url: 'gestiontitulos', // Url que se envia para la solicitud
        method: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        dataType: 'json',
        success: function ()   // Una función a ser llamada si la solicitud tiene éxito
        {
            mensaje = "Los cambios se realizaron correctamente!";
            mensaje_error("#adm_error_contenido_titulos", "INFORMACIÓN", mensaje, 2000, "info");
        },
        error: function(){
            mensaje = "Error al actualizar los titulos";
            mensaje_error("#adm_error_contenido_titulos", "ADVERTENCIA", mensaje, 2000, "danger");
        }
    });

});


function mensaje_error(poneren,titulo,mesaje,time,color){
    $(poneren).html(
        '<div class="alert alert-'+color+' alert-dismissible fade show">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                '<span aria-hidden="true">&times;</span>'+
            '</button>'+
            '<h4 class="alert-heading">'+titulo+'</h4>'+mesaje+
        '</div>'
    );

    setTimeout(() => {
        $(poneren).html("");
    }, time);
}


