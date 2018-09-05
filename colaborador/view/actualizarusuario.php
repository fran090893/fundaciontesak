<?php
require('../../DB/conexion.php');

                                      $id = $_GET['id'];
                                      $datos = "SELECT * FROM usuario where id_usuario ='".$id."'";
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
  <title>Modificar usuario | Fundación Tesak</title>
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
                           <strong>¡Alerta! </strong> No se pudo modificar registro.
                        </div>';
                         }                                              }

                         else{
echo'
                        <br>
                        <div class="alert alert-success"  id="error">
                            <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                           <strong>¡Exito! </strong> Registro modificado correctamente.
                        </div>';
                         }
                        ?>
                        <br>
                        <a href="../view/verusuarios.php" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
          <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-group"></i> Modificar usuario</h3></div>
            <div class="card-body">
            <form method="POST" action="../controller/c_updateusuario.php?id=<?php echo $resultado['id_usuario']; ?>">
                <div class="form-group">
                  <label for="nombre_usuario">Nombres</label>
                  <input class="form-control" value="<?php echo $resultado['usuario_nombre']; ?>" id="nombre_usuario" name="nombre_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo nombre" required="true">
                </div>

                <div class="form-group">
                  <label for="apellido_usuario">Apellidos</label>
                  <input class="form-control" value="<?php echo $resultado['usuario_apellido']; ?>"id="apellido_usuario" name="apellido_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo apellido" required="true">
                </div>

                <div class="form-group">
                  <label for="correo">Correo eletrónico</label>
                  <input class="form-control"value="<?php echo $resultado['usuario_correo']; ?>" id="correo" name="correo" type="text" aria-describedby="nameHelp" placeholder="Digitar correo electrónico" required="true">
                </div>

                <div class="form-group">
                  <label for="nombre_us">Nombre de usuario</label>
                  <input class="form-control" value="<?php echo $resultado['usuario']; ?>"id="nombre_us" name="nombre_us" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre de usuario" required="true">
                </div>

                <div class="form-group">
                  <label for="contra_us">Contraseña</label>
                  <input class="form-control" value="<?php echo $resultado['usuario_password']; ?>" id="contra_us" name="contra_us" type="password" aria-describedby="nameHelp" placeholder="Contraseña" required="true">
                </div>

                <div class="form-group">
                  <label for="contra_us1">Confirmar contraseña</label>
                  <input class="form-control" value="<?php echo $resultado['usuario_password']; ?>" id="contra_us1" name="contra_usq" type="password" aria-describedby="nameHelp" placeholder="Confirmar contraseña" required="true">
                </div>

                <div class="form-group">
                  <label for="dept">Departamento</label>
                  <select class="form-control"  id="dept" name="dept" required="true">
                    <option value="nada">Seleccionar</option>
                    <?php
                     require('../../DB/conexion.php');

                     $query ="SELECT id_departamento, departamento_nombre FROM departamento";
                     $valores =  $conexion ->prepare($query);
                     $valores ->execute();

                     while ($resultado = $valores->fetch()) {
                       echo "<option value='".$resultado['id_departamento']."'>".$resultado['departamento_nombre']."</option>";
                     }

                   ?>
                 </select>
                </div>

                <div class="form-group">
                  <label for="cargo">Cargo</label>
                  <select class="form-control"  id="cargo" name="cargo" required="true">
                    <option value="nada">Seleccionar</option>
                    <?php
                      require('../../DB/conexion.php');

                      $query ="SELECT id_cargo, cargo FROM cargo";
                      $valores =  $conexion ->prepare($query);
                      $valores ->execute();

                      while ($resultado = $valores->fetch()) {
                        echo "<option value='".$resultado['id_cargo']."'>".$resultado['cargo']."</option>";
                      }

                    ?>
                 </select>
                </div>

                <br>
                <input class="btn btn-primary btn-block" type="submit" value="Agregar usuario">
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
