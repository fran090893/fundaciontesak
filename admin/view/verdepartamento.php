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
  <title>Lista de departamentos | Fundación Tesak</title>
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
            <h2 style="text-align:center;"><i class="fa fa-building"></i> Departamentos disponibles</h2>
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Departamento</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  require('../../DB/conexion.php');

                  $query ="SELECT * FROM departamento";
                  $valores =  $conexion ->prepare($query);
                  $valores ->execute();


                  while($resultado = $valores ->fetch())
                  {
echo'               <tr>
                      <td>'.$resultado['departamento_nombre'].'</td>
                      <td>'.$resultado['departamento_descripcion'].'</td>
                      <td>


                      <a href="actualizardepartamento.php?id='.$resultado['id_departamento'].' " class="btn btn-success btn-md"><i class="fa fa-edit"></i></a>&nbsp;
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
