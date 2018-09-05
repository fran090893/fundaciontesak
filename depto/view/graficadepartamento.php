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
  <title>Inicio | Fundación Tesak</title>
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
     

<script src="../../HC/code/highcharts.js"></script>
<script src="../../HC/code/modules/exporting.js"></script>
<script src="../../HC/code/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php
require('../../DB/conexion.php');
/****asistencia real -------------------------------------------------------*/
$id_departamento = $_GET['id'];

$querien = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/01/01')";
$reobtener1 = $conexion ->prepare($querien);
$reobtener1 ->execute();
$enero = $reobtener1 ->fetch();

$querife = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/02/01') AND Month(fecha) = Month('2018/02/01')";
$reobtener2 = $conexion ->prepare($querife);
$reobtener2 ->execute();
$febrero = $reobtener2 ->fetch();

$querimar = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/03/01')";
$reobtener3 = $conexion ->prepare($querimar);
$reobtener3 ->execute();
$marzo = $reobtener3 ->fetch();

$queriab = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/04/12')";
$reobtener4 = $conexion ->prepare($queriab);
$reobtener4 ->execute();
$abril = $reobtener4 ->fetch();

$querimay = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/05/04')";
$reobtener5 = $conexion ->prepare($querimay);
$reobtener5 ->execute();
$mayo = $reobtener5 ->fetch();

$querijun = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/06/05')";
$reobtener6 = $conexion ->prepare($querijun);
$reobtener6 ->execute();
$junio = $reobtener6 ->fetch();

$querijul = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/07/06')";
$reobtener7 = $conexion ->prepare($querijul);
$reobtener7 ->execute();
$julio = $reobtener7 ->fetch();

$queriag = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/08/07')";
$reobtener8 = $conexion ->prepare($queriag);
$reobtener8 ->execute();
$agosto = $reobtener8 ->fetch();

$querise = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/09/08')";
$reobtener9 = $conexion ->prepare($querise);
$reobtener9 ->execute();
$septiembre = $reobtener9 ->fetch();

$querioc = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/10/09')";
$reobtener10 = $conexion ->prepare($querioc);
$reobtener10 ->execute();
$octubre = $reobtener10 ->fetch();

$querino = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/11/10')";
$reobtener11 = $conexion ->prepare($querino);
$reobtener11 ->execute();
$noviembre = $reobtener11 ->fetch();

$queridi = "SELECT COUNT(*) AS cantidad FROM asistencia 
INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno 
INNER JOIN evento ON asistencia.id_evento = evento.id_evento 
INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo 
INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento 
WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/12/11')";
$reobtener12 = $conexion ->prepare($queridi);
$reobtener12 ->execute();
$diciembre = $reobtener12 ->fetch();


$query = "SELECT  departamento_nombre as nombre from departamento where id_departamento='".$id_departamento."' ";
$respuesta = $conexion ->prepare($query);
$respuesta ->execute();
$valor = $respuesta ->fetch();



?>


		<script type="text/javascript">
 var a = "<?php echo $valor['nombre'];?>";
Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Asitencias reales del departamento ' + a
    },
    subtitle: {
        text: 'Asistencia de grupos de la fundacion para la educacion experencial pablo tesak'
    },
    xAxis: [{
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: '',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    series: [{
        name: 'Real',
        type: 'column',
        yAxis: 1,
        data: [<?php echo $enero['cantidad'] ?>,<?php echo $febrero['cantidad'] ?>,<?php echo $marzo['cantidad'] ?>,<?php echo $abril['cantidad'] ?>,<?php echo $mayo['cantidad'] ?>,<?php echo $junio['cantidad'] ?>,<?php echo $julio['cantidad'] ?>,<?php echo $agosto['cantidad'] ?>,<?php echo $septiembre['cantidad'] ?>,<?php echo $octubre['cantidad'] ?>,<?php echo $noviembre['cantidad'] ?>,<?php echo $diciembre['cantidad'] ?>],
        tooltip: {
            valueSuffix: ''
        }

    }]
});
		</script>





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
