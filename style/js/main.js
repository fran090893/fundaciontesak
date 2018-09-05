//Busqueda de grupos (buscador)

$(buscar_grupos());

function buscar_grupos(consulta){
	$.ajax({
		url: '/fundaciontesak-final/admin/controller/buscar_grupo.php' ,
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

//Busqueda eventos realizados (buscador)
$(buscar_eventos_r());

function buscar_eventos_r(consulta){
	$.ajax({
		url: '/fundaciontesak-final/admin/controller/buscar_evento_r.php' ,
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

//Busqueda alumnos (buscador)
$(buscar_alumnos());

function buscar_alumnos(consulta){
	$.ajax({
		url: '/fundaciontesak-final/admin/controller/buscar_alumno.php' ,
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

//Busqueda usuario (buscador)

$(buscar_usuarios());

function buscar_usuarios(consulta){
	$.ajax({
		url: '/fundaciontesak-final/admin/controller/buscar_usuario.php' ,
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
