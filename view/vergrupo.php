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
  <title>Lista de grupos | Fundación Tesak</title>
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
          <h2 style="text-align:center;"><i class="fa fa-group"></i> Grupos disponibles</h2>
          <br/>
          <div class="formulario">
            <input type="text" name="caja_busqueda" id="caja_busqueda" class="form-control" placeholder="Buscar grupos"/>
         </div>
         <br/>
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Encargado</th>
                  <th>Teléfono</th>
                  <th>Descripción</th>
                  <th>Municipio</th>
                  <th>Departamento</th>
                  <th>Celular</th>
                  <th>Acciones</th>
                  <th>Agregar alumnos</th>
                </tr>
              </thead>
              <tbody>
              <?php

              require('../DB/conexion.php');

              $query ="SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, grupo_tel, grupo_descripcion, grupo_municipio, grupo_celular, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento";
              $valores =  $conexion ->prepare($query);
              $valores ->execute();

              while($resultado = $valores ->fetch())
              {
echo'           <tr>
                  <td>'.$resultado['grupo_nombre'].'</td>
                  <td>'.$resultado['grupo_direccion'].'</td>
                  <td>'.$resultado['grupo_encargado'].'</td>
                  <td>'.$resultado['grupo_tel'].'</td>
                  <td>'.$resultado['grupo_descripcion'].'</td>
                  <td>'.$resultado['grupo_municipio'].'</td>
                  <td>'.$resultado['departamento_nombre'].'</td>
                  <td>'.$resultado['grupo_celular'].'</td>
                  <td>
                    <a href="../controller/c_actualizargrupo.php?id='.$resultado["id_grupo"].'" class="btn btn-success btn-md" ><i class="fa fa-edit"></i></a>
                    <a href="../controller/borrargrupo.php?id='.$resultado["id_grupo"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
                    <a href="listaalumnos.php?id='.$resultado["id_grupo"].'" class="btn btn-info btn-md"><i class="fa fa-list-ul"></i></a>
                  </td>
                  <td>
                    <a href="agregartabla.php" class="btn btn-success btn-md" ><i class="fa fa-file"></i></a>
                    <a href="agregaralumno.php" class="btn btn-info btn-md"><i class="fa fa-user-plus"></i></a>
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
