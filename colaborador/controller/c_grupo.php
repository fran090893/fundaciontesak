<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../../DB/conexion.php');

$nombre_grupo = $_POST['nombre_grupo'];
$descripcion_grupo = $_POST['descripcion_grupo'];
$direccion_grupo = $_POST['direccion_grupo'];
$dept_grupo = $_POST['dept'];
$municipio_grupo = $_POST['municipio_grupo'];
$encargado_grupo = $_POST['encargado_grupo'];
$telefono_grupo = $_POST['telefono_grupo'];
$cel_grupo = $_POST['celular_grupo'];

$sql="INSERT INTO grupo VALUES(null,'$nombre_grupo','$direccion_grupo','$encargado_grupo','$telefono_grupo','$descripcion_grupo','$municipio_grupo','$dept_grupo','$cel_grupo') ";

$consulta = $conexion ->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();
if ($cuenta > 0) {
		echo '<script>location.href = "../view/agregargrupo.php?Exito=1"</script>';


}
else
{
			echo '<script>location.href = "../view/agregargrupo.php?Error=1"</script>';

}

?>
