<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../../DB/conexion.php');
$id_alumno=$_POST['id'];
$id_evento= $_POST['evento'];
$asistencia=$_POST['asistente'];



$sql="INSERT INTO `asistencia` (`id_asistencia`, `id_alumno`, `id_evento`,`asistencia`) VALUES (NULL, '$id_alumno', '$id_evento','$asistencia');";

$consulta = $conexion->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();
if ($cuenta > 0) {
		echo 'true';


}
else
{
    echo 'false';



}

?>
