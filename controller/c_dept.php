<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');

$nombre_dept = $_POST['nombre_dept'];
$descripcion_dept = $_POST['descripcion_dept'];


$sql="INSERT INTO departamento VALUES(null,'$nombre_dept','$descripcion_dept') ";

$consulta = $conexion ->prepare($sql);

$consulta ->execute();

$cuenta = $consulta->rowCount();


if ($cuenta>0) {
		echo '<script>location.href = "../view/agregardept.php?Exito=1"</script>';
}
else
{
			echo '<script>location.href = "../view/agregardept.php?Error=1"</script>';

}

?>
