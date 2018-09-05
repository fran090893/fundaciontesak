<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../DB/conexion.php');

$nombre_usuario = $_POST['nombre_usuario'];
$apellido_usuario = $_POST['apellido_usuario'];
$telefono_usuario = $_POST['telefono_usuario'];
$usuario = $_POST['nombre_us'];
$pass = $_POST['contra_us'];
$cargo = $_POST['cargo'];
$correo = $_POST['correo'];
$dept = $_POST['dept'];


$sql="INSERT INTO usuario VALUES(null,'$nombre_usuario','$apellido_usuario','$telefono_usuario','$usuario','$pass','$dept','$cargo','$correo') ";

$consulta = $conexion ->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();

if ($cuenta > 0) {
		echo '<script>location.href = "../view/agregarusuario.php?Exito=1"</script>';
}
else
{
			echo '<script>location.href = "../view/agregarusuario.php?Error=1"</script>';

}

?>
