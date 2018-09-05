$(buscar_eventos_proximos());

function buscar_eventos_proximos(consulta){
	$.ajax({
		url: BASE_URL+'c_admin/cevento/buscarEventoProximo' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_proximos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_proximos', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_eventos_proximos(valor);
	}else{
		buscar_eventos_proximos();
	}
});
