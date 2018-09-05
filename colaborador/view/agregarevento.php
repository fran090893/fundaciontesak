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
  <title>Agregar evento | Fundación Tesak</title>
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
      <?php

                        if (!isset( $_GET['Exito'])) {
                          if (isset($_GET['Error'])) {
echo'
                        <br>
                        <div class="alert alert-danger"  id="error">
                            <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                           <strong>¡Alerta! </strong> No se pudo agregar registro.
                        </div>';
                         }                                              }

                         else{
echo'
                        <br>
                        <div class="alert alert-success"  id="error">
                            <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                           <strong>¡Exito! </strong> Registro agregado correctamente.
                        </div>';
                         }
                        ?>
          <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-calendar-o"></i> Agregar un evento</h3></div>
            <div class="card-body">
              <form method="POST" action="../controller/c_evento.php">
                <div class="form-group">
                  <label for="nombre_evento">Nombre del evento</label>
                  <input class="form-control" id="nombre_evento" name="nombre_evento" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del evento" required="true">
                </div>
                <div class="form-group">
                  <label for="descripcion_evento">Descipción</label>
                  <input class="form-control" id="descripcion_evento" name="descripcion_evento" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)" required="true">
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de evento</label>
                  <input class="form-control" id="fecha" name="fecha" type="date" aria-describedby="nameHelp"  required="true">
                </div>

                <div class="form-group">
                  <label for="grupo">Grupo</label>
                  <select class="form-control"  id="grupo" name="grupo" required="true">
                    <option value="nada">Seleccionar</option>
                    <?php
                     require('../../DB/conexion.php');

                     $query ="SELECT id_grupo, grupo_nombre FROM grupo";
                     $valores =  $conexion ->prepare($query);
                     $valores ->execute();

                     while ($resultado = $valores->fetch()) {
                       echo "<option value='".$resultado['id_grupo']."'>".$resultado['grupo_nombre']."</option>";
                     }

                   ?>
                 </select>
                </div>
                <br>
                <input class="btn btn-primary btn-block" type="submit" value="Agregar evento">
              </form>

        </div>
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
</body>

</html>
