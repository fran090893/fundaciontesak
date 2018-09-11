$(buscar_asistencia_r());

function buscar_asistencia_r(consulta){
	$.ajax({
		url:BASE_URL+'c_colaborador/ceventocl/buscarReporteAsistencia' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_asistencia_r").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_asistencia_r', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_asistencia_r(valor);
	}else{
		buscar_asistencia_r();
	}
});
