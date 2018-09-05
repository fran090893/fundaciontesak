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
  <title>Lista de alumnos | Fundación Tesak</title>
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
          <br>
          <a href="eventos_proximos.php" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
            <h2 style="text-align:center;"><i class="fa fa-user"></i> Listado de alumnos</h2>
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Grupo</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  require('../../DB/conexion.php');
                  $id_grupo=$_GET['id'];
                  $id_evento=$_GET['evento'];


                  $query ="SELECT id_alumno, CONCAT(alumno_nombre, ' ', alumno_apellido ) AS nombre_completo, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS departamento FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE NOT EXISTS (SELECT * FROM asistencia WHERE asistencia.id_alumno=alumno.id_alumno AND asistencia.id_evento= $id_evento) AND alumno.id_grupo = $id_grupo";
                  $valores =  $conexion ->prepare($query);
                  $valores ->execute();

                  while($resultado = $valores ->fetch())
                  {
echo'                 <tr id="tr-'.$resultado["id_alumno"].'">
                      <td>'.$resultado['nombre_completo'].'</td>
                      <td>'.$resultado['grupo'].'</td>
                      <td>'.$resultado['dept_alumno'].'</td>

                      <td>
                        <a   class="insertaa btn btn-success btn-md"  data-id="'.$resultado["id_alumno"].'" data-evento="'.$_GET["evento"].'" ><i class="fa fa-check"></i></a>
                        <a   class="insertab btn btn-danger btn-md" data-id="'.$resultado["id_alumno"].'"  data-evento="'.$_GET["evento"].'"><i class="fa fa-close"></i></a>
                      </td>
                    </tr>

                    ';
                  }

                    ?>
                  </tbody>
                </table>
<!-- prueba-->
<a href="../reportes/reporte_grupo.php?id=<?php echo $id_grupo ?>&evento=<?php echo $id_evento ?>" class="btn btn-info btn-md" ><i class="fa fa-print"></i>&nbsp; Imprimir</a>
<a  class="evento_realizado btn btn-info btn-md" data-id="<?php echo $_GET['evento']; ?>"><i class="fa fa-print"></i>&nbsp; Confirmar</a>
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
		 alert('asistencia completada');
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


</script>
<!--funcion ocultar fila-->
<script>


</script>
  </div>
</body>

</html>
