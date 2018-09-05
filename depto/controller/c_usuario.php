<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../../DB/conexion.php');

$nombre_usuario = $_POST['nombre_usuario'];
$apellido_usuario = $_POST['apellido_usuario'];
$telefono_usuario = $_POST['telefono_usuario'];
$usuario = $_POST['nombre_us'];
$pass = $_POST['contra_us'];
$correo = $_POST['correo'];
$dept = $_SESSION['depto'];

$pattern = " ";
$firstPart = substr(strstr(strtoupper($apellido_usuario), $pattern, true),0,1);
$secondPart = substr(strstr(strtoupper($apellido_usuario), $pattern, false), 0,2);
$num1 = rand(0, 9);
$num2 = rand(0, 9);
$num3 = rand(0, 9);

$userfinal=trim($firstPart).trim($secondPart).trim($num1).trim($num2).trim($num3);

$sql="INSERT INTO usuario VALUES(null,'$nombre_usuario','$apellido_usuario','$telefono_usuario','$userfinal','$pass','$dept','$cargo','$correo') ";

$consulta = $conexion ->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();

if ($cuenta > 0) {
		echo '<script>location.href = "../view/user_agregado.php?user='.$userfinal.'"</script>';
}
else
{
		echo '<script>location.href = "../view/agregarusuario.php?Error=1"</script>';

}

?>
