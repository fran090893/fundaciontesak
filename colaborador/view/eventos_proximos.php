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
  <title>Eventos proximos | Fundación Tesak</title>
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
            <h2 style="text-align:center;"><i class="fa fa-calendar-o"></i> Eventos proximos</h2>
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombre del evento</th>
                    <th>Fecha</th>
                    <th>Grupo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  require('../../DB/conexion.php');

                  $query ="SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo
                  WHERE evento.estado=0";
                  $valores =  $conexion ->prepare($query);
                  $valores ->execute();

                  while($resultado = $valores ->fetch())
                  {
echo'                             <tr>
                      <td>'.$resultado['evento_nombre'].'</td>
                      <td>'.date("d/m/Y",strtotime($resultado['fecha'])).'</td>
                      <td>'.$resultado['grupo'].'</td>
                      <td>
                        <a href="asistencia.php?id='.$resultado["id_grupo"].'&evento='.$resultado["id_evento"].'" class="btn btn-info btn-md"><i class="fa fa-list-ul"></i></a>
                        </td>
                    </tr>

                    ';
                  }

                    ?>
                  </tbody>
                </table>
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
  </div>
</body>

</html>