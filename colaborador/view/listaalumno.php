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
                  <a href="vergrupo.php " class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
                  <br>
                  <br>
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
        <?php
        require('../../DB/conexion.php');

        $id_grupo=$_GET['id'];

        $_SESSION['id_grupo1'] = $id_grupo;

        $query = "SELECT grupo_nombre, CONCAT(grupo_direccion, ', ', grupo_municipio) AS direccion, grupo_descripcion FROM grupo WHERE id_grupo='".$id_grupo."' ";
        $valores =  $conexion ->prepare($query);
        $valores ->execute();
        $datos1=$valores ->fetch();

echo'
              <div class="card card-register mx-auto">
                <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-group"></i> '.$datos1['grupo_nombre'].'</h3></div>
                <div class="card-body">
                  <br>
                  <div class="form-group" style="text-align:center;">
                          <p>Descripción: '.$datos1['grupo_descripcion'].'</p>
                          <p>Dirección: '.$datos1['direccion'].' </p>
                  </div>
                </div>
              </div>
              ';
        ?>
        <br/>
        <br/>
          <input type="text" name="busqueda_alumnos" id="busqueda_alumnos" class="form-control" placeholder="Buscar alumno"/>
       <br/>
       <div id="datos_alumnos"></div>


     </div>
    </div>
  </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../../style/js/jquery.min.js"></script>
    <script src="../../style/js/main_c.js"></script>
    <script src="../../style/vendor/jquery/jquery.min.js"></script>
    <script src="../../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../style/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../style/js/sb-admin.min.js"></script>
  </div>
</body>

</html>
