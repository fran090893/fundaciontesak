<?php
require('../../DB/conexion.php');

                                      $id = $_GET['id'];
                                      $datos = "SELECT * FROM alumno WHERE id_alumno ='".$id."'";
                                      $obtener = $conexion ->prepare($datos);
                                      $obtener ->execute();
                                      $resultado = $obtener ->fetch();



  ?>

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
  <title>Modificar alumno | Fundación Tesak</title>
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
                        <br>
          <a href="../view/listaalumno.php?id=<?php echo $resultado['id_grupo'];?> " class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
          <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-user"></i> Modificar un alumno</h3></div>
            <div class="card-body">
              <form method="POST" action="../controller/c_updatealumno.php?id=<?php echo $resultado['id_alumno']; ?>">
                <div class="form-group">
                  <label for="nombre_alumno">Nombres del alumno</label>
                  <input class="form-control" id="nombre_alumno" name="nombre_alumno" type="text" aria-describedby="nameHelp" value="<?php echo $resultado['alumno_nombre'];?>" required="true">
                </div>
                <div class="form-group">
                  <label for="apellido_alumno">Apellidos del alumno</label>
                  <input class="form-control" id="apellido_alumno" name="apellido_alumno" type="text" aria-describedby="nameHelp" value="<?php echo $resultado['alumno_apellido'];?>" required="true">
                </div>
                <div class="form-group">
                  <label for="grupo">Sexo</label>
                  <select class="form-control"  id="grupo" name="grupo" required="true" value="<?php echo $resultado['alumno_sexo'];?>">
                    <option value="nada">Seleccionar</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                 </select>
                </div>
                <div class="form-group">
                  <label for="fecha">Fecha de nacimiento</label>
                  <input class="form-control" id="fecha" name="fecha" type="date" aria-describedby="nameHelp"  required="true" value="<?php echo $resultado['alumno_fecha'];?>">
                </div>
                <div class="form-group">
                  <label for="instituto">Institución:</label>
                  <input class="form-control" id="instituto" name="instituto" type="text" aria-describedby="nameHelp" value="<?php echo $resultado['alumno_instituto'];?>" required="true">
                </div>
                <input type=hidden id="grupo_id" name="grupo_id" value="<?php echo $resultado['id_grupo'];?>">
                <br>
                <input class="btn btn-primary btn-block" type="submit" value="Guardar cambios">
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
