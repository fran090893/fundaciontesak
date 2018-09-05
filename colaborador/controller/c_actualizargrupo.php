<?php
require('../../DB/conexion.php');

                                      $id = $_GET['id'];
                                      $datos = "SELECT * FROM grupo where id_grupo ='".$id."'";
                                      $obtener = $conexion ->prepare($datos);
                                      $obtener ->execute();
                                      $resultado = $obtener ->fetch();

                                        
                                                                    
  ?>



<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
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
  <title>Agregar grupo | Fundación Tesak</title>
  <!-- Bootstrap core CSS-->
  <link href="../view/style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../view/style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../view/style/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav>
    <?php
    include("../view/navbar.php");
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
          <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-group"></i> Modificar grupo</h3></div>
            <div class="card-body">
              <form method="POST" action="../controller/c_updategrupo.php?id=<?php echo $resultado['id_grupo']; ?>">
                <div class="form-group">
                  <label for="nombre_evento">Nombre del grupo</label>
                  <input class="form-control" id="nombre_grupo" name="nombre_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del evento" required="true" value="<?php echo $resultado['grupo_nombre']; ?>">
                </div>
                <div class="form-group">
                  <label for="descripcion_grupo">Descipción del grupo</label>
                  <input class="form-control" id="descripcion_grupo" name="descripcion_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)" value="<?php echo $resultado['grupo_descripcion']; ?>">
                </div>
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input class="form-control" id="direccion" name="direccion_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar dirección (centro escolar o institución)" required="true" value="<?php echo $resultado['grupo_direccion']; ?>">
                </div>
                <div class="form-group">
                  <label for="municipio">Municipio</label>
                  <input class="form-control" id="municipio" name="municipio_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar municipio (centro escolar o institución)" required="true" value="<?php echo $resultado['grupo_municipio']; ?>">
                </div>
                <div class="form-group">
                  <label for="telefono_grupo">Teléfono</label>
                  <input class="form-control" value="<?php echo $resultado['grupo_tel']; ?>"id="telefono_grupo" name="telefono_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar teléfono (centro escolar o institución)">
                </div>
                <div class="form-group">
                  <label for="nombre_encargado">Encargado</label>
                  <input class="form-control" value="<?php echo $resultado['grupo_encargado']; ?>" id="nombre_encargado" name="encargado_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del encargado" required="true">
                </div>
                <div class="form-group">
                  <label for="celular_grupo">Teléfono Encargado</label>
                  <input class="form-control" id="celular_grupo" value="<?php echo $resultado['grupo_celular']; ?>" name="celular_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar teléfono del encargado" required="true">
                </div>

                <div class="form-group">
                  <label for="dept">Departamento</label>
                  <select class="form-control"  id="dept" name="dept" required="true">
                    <option value="nada">Seleccionar</option>
                    <?php
                     require('../DB/conexion.php');

                     $query ="SELECT id_departamento, departamento_nombre FROM departamento";
                     $valores =  $conexion ->prepare($query);
                     $valores ->execute();

                     while ($resultado = $valores->fetch()) {
                       echo "<option value='".$resultado['id_departamento']."'>".$resultado['departamento_nombre']."</option>";
                     }

                   ?>
                 </select>
                </div>
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
    <script src="../view/style/vendor/jquery/jquery.min.js"></script>
    <script src="../view/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../view/style/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../view/style/js/sb-admin.min.js"></script>
</body>

</html>
