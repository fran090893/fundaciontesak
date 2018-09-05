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
  <title>Lista de usuarios | Fundación Tesak</title>
  <!-- Bootstrap core CSS-->
  <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="style/css/sb-admin.css" rel="stylesheet">
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
                    <th>Usuario</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  require('../DB/conexion.php');

                  $query ="SELECT id_usuario, CONCAT(usuario_nombre, usuario_apellido) AS nombre_completo,usuario,usuario_correo,usuario_telefono, cargo.cargo AS cargo, departamento.departamento_nombre AS departamento FROM usuario INNER JOIN cargo ON usuario.id_cargo=cargo.id_cargo INNER JOIN departamento ON usuario.id_departamento=departamento.id_departamento";
                  $valores =  $conexion ->prepare($query);
                  $valores ->execute();

                  while($resultado = $valores ->fetch())
                  {
echo'                             <tr>
                      <td>'.$resultado['nombre_completo'].'</td>
                      <td>'.$resultado['usuario'].'</td>
                      <td>'.$resultado['departamento'].'</td>
                      <td>'.$resultado['cargo'].'</td>
                      <td>'.$resultado['usuario_correo'].'</td>
                      <td>'.$resultado['usuario_telefono'].'</td>
                      <td>
                        <a href="../controller/c_actualizarusuario.php?id='.$resultado["id_usuario"].'" class="btn btn-success btn-md" ><i class="fa fa-edit"></i></a>
                        <a href="../controller/borrarusuario.php?id='.$resultado["id_usuario"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
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
    <script src="style/vendor/jquery/jquery.min.js"></script>
    <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="style/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="style/js/sb-admin.min.js"></script>
  </div>
</body>

</html>
