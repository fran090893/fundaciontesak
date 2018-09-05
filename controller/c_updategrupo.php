<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');
$id_grupo=$_GET['id'];
$nombre_grupo = $_POST['nombre_grupo'];
$descripcion_grupo = $_POST['descripcion_grupo'];
$direccion_grupo = $_POST['direccion_grupo'];
$dept_grupo = $_POST['dept'];
$municipio_grupo = $_POST['municipio_grupo'];
$encargado_grupo = $_POST['encargado_grupo'];
$telefono_grupo = $_POST['telefono_grupo'];
$cel_grupo = $_POST['celular_grupo'];

$sql="UPDATE grupo SET grupo_nombre='$nombre_grupo',grupo_direccion='$direccion_grupo',grupo_encargado='$encargado_grupo',grupo_tel='$telefono_grupo',grupo_descripcion='$descripcion_grupo',grupo_municipio='$municipio_grupo',id_departamento='$dept_grupo',grupo_celular='$cel_grupo' WHERE id_grupo=$id_grupo";

$consulta = $conexion->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();
if ($cuenta > 0) {
		echo '<script>location.href = "../view/vergrupo.php?Exito=1"</script>';

	
}
else
{
    echo '<script>location.href = "../view/vergrupo.php?Error=1"</script>';
          


}

?>
