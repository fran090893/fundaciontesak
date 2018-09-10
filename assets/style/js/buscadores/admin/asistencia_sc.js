$(document).ready(function(){

  $(document).on("click",".insertaa", function(){
   var idvalue = $(this).attr("data-id");
   var eventovalue = $(this).attr("data-evento");
   var asistentevalue = 1;
	$.ajax({
	url: BASE_URL+'c_admin/cevento/asistencia',
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
	url: BASE_URL+'c_admin/cevento/eventoRealizado',
  method: 'POST',
	data: { id: idvalue},
	success: function(result){
	//result es lo que envias desde tu metodo en el controlador yo le enviaria un tru o false
		if(result)
		{
		 alert('Asistencia completada');
     //header 'eventos_realizados.php';
		}
		else
		{
		 alert('No se inserto nada');
		}
	}
});
});


  $(document).on("click",".insertab", function(){
   var idvalue = $(this).attr("data-id");
   var eventovalue = $(this).attr("data-evento");
   var asistentevalue = 0;
	$.ajax({
	url: BASE_URL+'c_admin/cevento/asistencia',
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
