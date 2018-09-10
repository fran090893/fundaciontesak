$(buscar_stats_grupal());

function buscar_stats_grupal(consulta){
	$.ajax({
		url:BASE_URL+'c_admin/cestadistica/buscarEstadisticaGrupal' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_estadistica_grupal").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_estadistica_grupal', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_stats_grupal(valor);
	}else{
		buscar_stats_grupal();
	}
});
