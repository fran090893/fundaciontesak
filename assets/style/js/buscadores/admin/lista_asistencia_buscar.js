$(lista_asistencia_buscar());

function lista_asistencia_buscar(consulta){
	$.ajax({
		url: BASE_URL+'c_admin/cevento/buscarAsistencia' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_asistencia").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_asistencia', function(){
	var valor = $(this).val();
	if (valor != "") {
		lista_asistencia_buscar(valor);
	}else{
		lista_asistencia_buscar();
	}
});
