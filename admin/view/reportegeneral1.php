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
  <title>Eventos proximos | Fundación Tesak</title>
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
            <h2 style="text-align:center;"><i class="fa fa-calendar-o"></i>Reporte General</h2>
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                 
                </thead>
                <tbody>
                  <?php

$mysqli = new mysqli("localhost", "root","","fundaciontesak");
                  $id_grupo = $_GET['id'];

                  $query ="SELECT alumno.alumno_nombre as nombre, alumno.id_grupo,alumno.alumno_apellido, GROUP_CONCAT(asistencia) as asistencia, GROUP_CONCAT(evento.evento_nombre SEPARATOR ' | ') as evento, GROUP_CONCAT(evento.fecha SEPARATOR ' | ') as fecha from asistencia INNER JOIN alumno on asistencia.id_alumno = alumno.id_alumno INNER JOIN evento on asistencia.id_evento = evento.id_evento where evento.estado = 1 AND alumno.id_grupo= '".$id_grupo."' GROUP BY alumno.id_alumno";
                  $resultado = $mysqli->query($query);
                 
                  

                  $query1 =" SELECT evento.evento_nombre  as evento, fecha from evento where evento.estado = 1 AND evento.id_grupo = '".$id_grupo."'";
                  $resultado1 = $mysqli->query($query1);

                  $query2 =" SELECT asistencia from asistencia INNER JOIN alumno on alumno.id_alumno = asistencia.id_alumno where evento.estado = 1 AND alumno.id_grupo = '".$id_grupo."'";
                  $resultado2 = $mysqli->query($query2);
                  
                 /* while($resultado1 = $valores1 ->fetch())
                  {
                    echo' <th>'.$resultado1['nombre'].'</th> ';
                  }
                  while($resultado2 = $valores2 ->fetch())
                  {
                    echo' <th>'.$resultado2['fecha'].'</th> ';
                  }
                    echo'</tr>';*/
                    echo'<tr><th>Nombres</th>';
                    while ($fila = $resultado1 ->fetch_assoc()){
                        echo' <td>  '.$fila['evento'].'</br>'; 
  
                      }
                    
                      
                      while($fila2 = $resultado ->fetch_assoc()){
                        echo'<tr><td>'.$fila2['nombre'].'</td>';
                        
                        $as = str_split($fila2['asistencia']);
                        print_r($as);

                        foreach($as as $valor)
                        {
                            echo '<td>'.$valor.'</td>';
                        }



                        
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
