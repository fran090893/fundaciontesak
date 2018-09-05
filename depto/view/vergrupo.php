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
  <title>Lista de grupos | Fundación Tesak</title>
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
          <?php

                            if (!isset( $_GET['Exito'])) {
                              if (isset($_GET['Error'])) {
    echo'
                            <br>
                            <div class="alert alert-danger"  id="error">
                                <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                               <strong>¡Alerta! </strong> No se pudo realizar acción, error del sistema.
                            </div>';
                             }                                              }

                             else{
    echo'
                            <br>
                            <div class="alert alert-success"  id="error">
                                <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                               <strong>¡Exito! </strong> Acción realizada correctamente.
                            </div>';
                             }
                            ?>
          <br>
          <h2 style="text-align:center;"><i class="fa fa-group"></i> Grupos disponibles</h2>
          <br/>
            <input type="text" name="busqueda_grupos" id="busqueda_grupos" class="form-control" placeholder="Buscar grupo"></input>
         <br/>
          <div id="datos_grupos"></div>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../../style/js/jquery.min.js"></script>
    <script src="style/js/main.js"></script>
    <script src="../../style/vendor/jquery/jquery.min.js"></script>
    <script src="../../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../style/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../style/js/sb-admin.min.js"></script>
  </div>
</body>

</html>
