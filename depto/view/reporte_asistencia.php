<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: ../../login.php");
}

else{
    $usuario = $_SESSION['usuario'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Reporte de asistencia | Fundación Tesak</title>
  <!-- Bootstrap core CSS-->
  <link href="../../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../style/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav>
    <?php
    include("navbar.php");
    ?>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <br>
          <a href="eventos_realizados.php" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
            <h2 style="text-align:center;"><i class="fa fa-user"></i> Listado de alumnos</h2>
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Grupo</th>
                    <th>Departamento</th>
                    <th>Asistencia</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  require('../../DB/conexion.php');
                  $id_grupo=$_GET['id'];
                  $id_evento=$_GET['evento'];


                  $query ="SELECT alumno.id_alumno, CONCAT(alumno_nombre, ' ', alumno_apellido ) AS nombre_completo, grupo.grupo_nombre AS grupo, asistencia.asistencia,departamento.departamento_nombre AS dept_alumno FROM grupo
                  INNER JOIN alumno on grupo.id_grupo=alumno.id_grupo
                  INNER JOIN departamento on departamento.id_departamento = grupo.id_departamento
                  INNER JOIN asistencia on alumno.id_alumno = asistencia.id_alumno
                  INNER JOIN evento on asistencia.id_evento=evento.id_evento WHERE evento.id_evento = $id_evento";
                  $valores =  $conexion ->prepare($query);
                  $valores ->execute();

                  while($resultado = $valores ->fetch())
                  {
echo'             <tr id="tr-'.$resultado["id_alumno"].'">
                      <td>'.$resultado['nombre_completo'].'</td>
                      <td>'.$resultado['grupo'].'</td>
                      <td>'.$resultado['dept_alumno'].'</td>

                      <td>
                        ';  if( $resultado['asistencia'] == 1 )
                        {
                          echo '<a   class="btn btn-success btn-md" ><i class="fa fa-check"></i></a>';

                        }else
                        {
                           echo '<a   class="btn btn-danger btn-md" ><i class="fa fa-close"></i></a>';

                        };


                        echo'

                      </td>
                    </tr>

                    ';
                  }

                    ?>
                  </tbody>

                </table>
<!-- prueba-->


<a href="../reportes/reporte_eventorealizado.php?id=<?php echo $id_grupo ?>&evento=<?php echo $id_evento ?>" class="btn btn-info btn-md" ><i class="fa fa-print"></i>&nbsp; Imprimir</a>


          </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../../style/vendor/jquery/jquery.min.js"></script>
    <script src="../../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../style/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../style/js/sb-admin.min.js"></script>
<!--script para insertar-->
<script>

$(document).ready(function(){

 /* $(".hide-row").click(function(){
    var idvalue = $(this).attr("data-id");
  $("#tr-"+idvalue).remove();
});*/


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


</script>
<!--funcion ocultar fila-->
<script>


</script>
  </div>
</body>

</html>
