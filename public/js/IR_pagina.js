$('.contenido-menu').click(function(){
	if ($(this).find("ul").attr('class')=='') {
		$(this).find("ul").addClass('contenido-menu-hideitem');
		$(this).children("a.titulo-contenido").removeClass('contenido-menu-showitem');
	}else{
		$(this).find("ul").removeClass();
		$(this).children("a.titulo-contenido").addClass('contenido-menu-showitem');
	}
});