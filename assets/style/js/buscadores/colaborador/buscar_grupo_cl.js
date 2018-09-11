$(buscar_grupos());

function buscar_grupos(consulta){
	$.ajax({
		url: BASE_URL+'c_colaborador/cgrupocl/buscarGrupo' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_grupos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_grupos', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_grupos(valor);
	}else{
		buscar_grupos();
	}
});
