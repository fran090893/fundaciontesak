//Busqueda de grupos (buscador)kkkkk

$(buscar_grupos());

function buscar_grupos(consulta){
	$.ajax({
		url: '/fundaciontesak-final/colaborador/controller/buscar_grupo.php' ,
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

//Busqueda de asistencia grupal (buscador)



$(buscar_grupos1());

function buscar_grupos1(consulta){
	$.ajax({
		url: '/fundaciontesak-final/admin/controller/buscar_grupo1.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_grupos1").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#busqueda_grupos1', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_grupos1(valor);
	}else{
		buscar_grupos1();
	}
});


$(asistencia_grupal());

function asistencia_grupal(consulta){
	$.ajax({
		url: 'fundaciontesak-final/admin/controller/casistencia_grupal.php' ,
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
		asistencia_grupal(valor);
	}else{
		asistencia_grupal();
	}
});

//Busqueda eventos realizados (buscador)
$(buscar_eventos_r());

function buscar_eventos_r(consulta){
	$.ajax({
		url: '/fundaciontesak-final/colaborador/controller/buscar_evento_r.php' ,
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
		url: '/fundaciontesak-final/colaborador/controller/buscar_alumno.php' ,
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
