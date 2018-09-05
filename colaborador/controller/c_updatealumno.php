<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

$id_grupo = $_SESSION['id_grupo1'];

require('../../DB/conexion.php');

$id_alumno=$_GET['id'];
$id_grupo = $_POST['grupo_id'];
$nombre_alumno = $_POST['nombre_alumno'];
$apellido_alumno = $_POST['apellido_alumno'];
$fecha_alumno = $_POST['fecha'];
$sexo_alumno = $_POST['grupo'];
$instituto = $_POST['instituto'];



$sql="UPDATE alumno SET alumno_nombre='$nombre_alumno',alumno_apellido='$apellido_alumno',alumno_fecha='$fecha_alumno', alumno_sexo='$sexo_alumno', alumno_instituto='$instituto' WHERE id_alumno=$id_alumno";

$consulta = $conexion->prepare($sql);

$consulta ->execute();
$cuenta = $consulta->rowCount();

if ($cuenta > 0) {
		echo '<script>location.href = "../view/listaalumno.php?id='.$id_grupo.'&Exito=1"</script>';


}
else
{
    echo '<script>location.href = "../view/listaalumno.php?id='.$id_grupo.'&Error=1"</script>';



}

?>
