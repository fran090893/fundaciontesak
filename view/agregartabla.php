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
  <title>Agregar tabla | Fundación Tesak</title>
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
      <a href="vergrupo.php " class="btn btn-info btn-md" ><i class="fa fa-angle-left" style="float:left;"></i>&nbsp;  Regresar</a>
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-file"></i> Agregar tabla (doc. excel CSV)</h3></div>
        <div class="card-body">
          <br>
          <form name="frmcargararchivo" method="post" enctype="multipart/form-data">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="excel" name="excel" type="file" lang="es" required="true">
              <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
            <br>
            <br>
            <input type="button" value="Agregar tabla" onclick="cargarHojaExcel();" name="subir" class="btn btn-primary btn-block">
        </form>
        </div>
      </div>
    </div>
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
