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



  $(document).on("click",".evento_realizado", function(){
   var idvalue = $(this).attr("data-id");
   var idcont = CNT;
	$.ajax({
	url: BASE_URL+'c_admin/cevento/eventoRealizado',
  method: 'POST',
	data: { id: idvalue, id1: idcont},
	success: function(data){
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
