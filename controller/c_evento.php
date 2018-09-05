<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');

$nombre_evento = $_POST['nombre_evento'];
$descripcion_evento = $_POST['descripcion_evento'];
$dept = $_POST['dept'];


$sql="INSERT INTO evento VALUES(null,'$nombre_evento','$descripcion_evento','$dept') ";

$consulta = $conexion ->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();

if ($cuenta>0) {
		echo '<script>location.href = "../view/agregarevento.php?Exito=1"</script>';
}
else
{
			echo '<script>location.href = "../view/agregarevento.php?Error=1"</script>';

}

?>
