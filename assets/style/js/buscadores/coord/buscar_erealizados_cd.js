$(buscar_eventos_r());

function buscar_eventos_r(consulta){
	$.ajax({
		url:BASE_URL+'c_coord/ceventocd/buscarEventoRealizado' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_eventos_r").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_eventos_r', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_eventos_r(valor);
	}else{
		buscar_eventos_r();
	}
});
