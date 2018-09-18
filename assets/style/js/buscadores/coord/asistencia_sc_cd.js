$(document).ready(function(){

  $(document).on("click",".insertaa", function(){
   var idvalue = $(this).attr("data-id");
   var eventovalue = $(this).attr("data-evento");
   var asistentevalue = 1;
	$.ajax({
	url: BASE_URL+'c_coord/ceventocd/asistencia',
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



  $(document).on("click",".evento_realizado", function(){
   var idvalue = $(this).attr("data-id");
   var idcont = CNT;
	$.ajax({
	url: BASE_URL+'c_coord/ceventocd/eventoRealizado',
  method: 'POST',
	data: { id: idvalue, id2: idcont},
	success: function(data){
	//result es lo que envias desde tu metodo en el controlador yo le enviaria un tru o false
  if(data == "success")
  {
   alert('Asistencia completada.');
  }
  else
  {
   alert('Debe completar el listado de asistencia para continuar.');
  }
	}
});
});


  $(document).on("click",".insertab", function(){
   var idvalue = $(this).attr("data-id");
   var eventovalue = $(this).attr("data-evento");
   var asistentevalue = 0;
	$.ajax({
	url: BASE_URL+'c_coord/ceventocd/asistencia',
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
