<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');
$id_us=$_GET['id'];
$nombre_us = $_POST['nombre_usuario'];
$apellido_us = $_POST['apellido_usuario'];
$correo = $_POST['correo'];
$us = $_POST['nombre_us'];
$pass = $_POST['contra_us'];
$departamento = $_POST['dept'];
$cargo = $_POST['cargo'];


$sql="UPDATE usuario SET usuario_nombre='$nombre_us',usuario_apellido='$apellido_us',usuario_correo='$correo',usuario='$us',id_departamento='$departamento',id_cargo='$cargo' WHERE id_usuario=$id_us";

$consulta = $conexion->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();
if ($cuenta > 0) {
		echo '<script>location.href = "../view/verusuarios.php?Exito=1"</script>';

	
}
else
{
    echo '<script>location.href = "../view/verusuarios.php?Error=1"</script>';
          


}

?>
