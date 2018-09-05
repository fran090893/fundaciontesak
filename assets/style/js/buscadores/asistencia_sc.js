$(document).ready(function(){

  $(".insertaa").on("click", function(){
   var idvalue = $(this).attr("data-id");
   var eventovalue = $(this).attr("data-evento");
   var asistentevalue = 1;
	$.ajax({
	url: 'casistencia.php',
  method: 'POST',
	data: { id: idvalue, evento: eventovalue, asistente: asistentevalue},
	success: function(result){
	//result es lo que envias desde tu metodo en el controlador yo le enviaria un tru o false
		if(result)
		{
		 $("#tr-"+idvalue).remove();
		}
		else
		{
		   // mostrar error que no se inserto
		}
	}
});
});



  $(".evento_realizado").on("click", function(){
   var idvalue = $(this).attr("data-id");

	$.ajax({
	url: 'ceventorealizado.php',
  method: 'POST',
	data: { id: idvalue},
	success: function(result){
	//result es lo que envias desde tu metodo en el controlador yo le enviaria un tru o false
		if(result)
		{
		 alert('Asistencia confirmada.');
     //header 'eventos_realizados.php';
		}
		else
		{
		   // mostrar error que no se inserto
		}
	}
});
});


  $(".insertab").on("click", function(){
   var idvalue = $(this).attr("data-id");
   var eventovalue = $(this).attr("data-evento");
   var asistentevalue = 0;
	$.ajax({
	url: 'casistencia.php',
  method: 'POST',
	data: { id: idvalue, evento: eventovalue, asistente: asistentevalue},
	success: function(result){
	//result es lo que envias desde tu metodo en el controlador yo le enviaria un tru o false
		if(result)
		{
		 $("#tr-"+idvalue).remove();
		}
		else
		{
		   // mostrar error que no se inserto
		}
	}
});
});
});
