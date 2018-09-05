<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');

$nombre_alumno = $_POST['nombre_alumno'];
$apellido_alumno = $_POST['apellido_alumno'];
$fecha = $_POST['fecha'];
$sexo = $_POST['sexo'];
$instituto= $_POST['instituto'];
$grupo= $_POST['grupo'];


$sql="INSERT INTO alumno VALUES(null,'$nombre_alumno','$apellido_alumno','$fecha','$sexo','$instituto','$grupo') ";

$consulta = $conexion ->prepare($sql);

$consulta ->execute();

$cuenta = $consulta->rowCount();


if ($cuenta > 0) {
		echo '<script>location.href = "../view/agregaralumno.php?Exito=1"</script>';
}
else
{
			echo '<script>location.href = "../view/agregaralumno.php?Error=1"</script>';

}

?>
