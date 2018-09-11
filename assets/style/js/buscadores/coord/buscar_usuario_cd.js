$(buscar_usuarios());

function buscar_usuarios(consulta){
	$.ajax({
		url: BASE_URL+'c_coord/cusuariocd/buscarUsuarios' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_usuarios").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_usuarios', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_usuarios(valor);
	}else{
		buscar_usuarios();
	}
});
