<?php

if (isset($_SESSION['usuario'])) {
    header("location: admin/view/menu.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Iniciar sesión | Fundación Tesak</title>
  <!-- Bootstrap core CSS-->
  <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="style/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center">Fundación Tesak </div>
      <div class="card-body">
        <form method="POST" action="clogin.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre de usuario:</label>
            <input class="form-control" id="usuario" name="usuario" type="text" aria-describedby="emailHelp" placeholder="Usuario" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña:</label>
            <input class="form-control" id="pass" name="pass" type="password" placeholder="Contraseña" required>
          </div>
          <br/>
          <button class="btn btn-primary btn-block" type="submit">Iniciar sesión</button>
        </form>
        <div class="row">
            <div class="col-md-12">
                <?php

                if (!isset( $_GET['$Error'])) {

                 }
                 else{
echo'
                <br>
                <div class="alert alert-danger"  id="error">
                    <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                   <strong>¡Alerta! </strong> Usuario y/o contraseña incorrectos. Intentelo nuevamente.
                </div>';
                 }
                ?>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="style/vendor/jquery/jquery.min.js"></script>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="style/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
