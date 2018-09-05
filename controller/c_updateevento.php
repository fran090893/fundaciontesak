<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');
$id_evento=$_GET['id'];
$nombre_evento = $_POST['nombre_evento'];
$descripcion_evento = $_POST['descripcion_evento'];
$depto = $_POST['dept'];



$sql="UPDATE evento SET evento_nombre='$nombre_evento',evento_descripcion='$descripcion_evento',id_departamento='$depto' WHERE id_evento=$id_evento";

$consulta = $conexion->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();
if ($cuenta > 0) {
		echo '<script>location.href = "../view/vereventos.php?Exito=1"</script>';

	
}
else
{
    echo '<script>location.href = "../view/vereventos.php?Error=1"</script>';
          


}

?>