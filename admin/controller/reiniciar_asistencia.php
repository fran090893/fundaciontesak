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

	    echo '<script>location.href = "../view/eventosrealizados.php?id='.$id_grupo.'&Exito=1"</script>';


?>