<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');
$id_depto=$_GET['id'];
$nombre_depto = $_POST['nombre_dept'];
$descripcion_depto = $_POST['descripcion_dept'];



$sql="UPDATE departamento SET departamento_nombre='$nombre_depto',departamento_descripcion='$descripcion_depto' WHERE id_departamento=$id_depto";

$consulta = $conexion->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();
if ($cuenta > 0) {
		echo '<script>location.href = "../view/verdepartamento.php?Exito=1"</script>';

	
}
else
{
    echo '<script>location.href = "../view/verdepartamento.php?Error=1"</script>';
          


}

?>
