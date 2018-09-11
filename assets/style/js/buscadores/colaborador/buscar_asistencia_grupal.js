$(buscar_grupal());

function buscar_grupal(consulta){
	$.ajax({
		url: BASE_URL+'c_colaborador/ceventocl/buscarAsistenciaGrupal' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_grupal").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_grupal', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_grupal(valor);
	}else{
		buscar_grupal();
	}
});
