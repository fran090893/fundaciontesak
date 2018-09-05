
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];

}

require('../../DB/conexion.php');

                                      $id = $_GET['id'];
                                      $borrar = "DELETE FROM usuario where id_usuario ='".$id."'";
                                      $accion_borrar = $conexion ->prepare($borrar);
                                      $accion_borrar ->execute();

	    echo '<script>location.href = "../view/verusuarios.php?Exito=1"</script>';

?>
