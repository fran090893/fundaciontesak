$(buscar_alumnos());

function buscar_alumnos(consulta){
	$.ajax({
		url: 'http://localhost/fundaciontesak/c_admin/calumno/buscarAlumno' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_alumnos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_alumnos', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_alumnos(valor);
	}else{
		buscar_alumnos();
	}
});
