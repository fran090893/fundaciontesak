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

                                      $id = $_GET['id'];
                                      $borrar = "DELETE FROM asistencia WHERE id_evento ='".$id."'  ";
                                      $accion_borrar = $conexion ->prepare($borrar);
                                      $accion_borrar ->execute();

                                      $actualizar = "UPDATE evento SET estado = '0' Where id_evento = '".$id."'";
                                      $accion_actualizar = $conexion ->prepare($actualizar);
                                      $accion_actualizar->execute();

	    echo '<script>location.href = "../view/eventos_realizados.php?Exito=1"</script>';


?>
