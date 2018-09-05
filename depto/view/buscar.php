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
  <title>Lista de usuarios | Fundación Tesak</title>
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
            <h2 style="text-align:center;"><i class="fa fa-user"></i> Usuarios disponibles</h2>
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Grupo</th>
                    <th>Departamento</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php

                  require('../../DB/conexion.php');
                  $id_grupo=$_GET['id']; 

                  $query ="SELECT id_alumno, CONCAT(alumno_nombre, ' ', alumno_apellido ) AS nombre_completo, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo WHERE alumno.id_grupo = $id_grupo";
                  $valores =  $conexion ->prepare($query);
                  $valores ->execute();

                  while($resultado = $valores ->fetch())
                  {
echo'                             <tr>
                      <td>'.$resultado['nombre_completo'].'</td>
                      <td>'.$resultado['grupo'].'</td>
                      <td>'.$resultado['dept_alumno'].'</td>
                  
                      <td>
                        <a href="../controller/c_actualizarusuario.php?id='.$resultado["id_alumno"].'" class="btn btn-success btn-md" ><i class="fa fa-check"></i></a>
                        <a href="../controller/borrarusuario.php?id='.$resultado["id_alumno"].'" class="btn btn-danger btn-md"><i class="fa fa-close"></i></a>
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
