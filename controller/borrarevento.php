<?php
require('../DB/conexion.php');

                                      $id = $_GET['id'];
                                      $borrar = "DELETE FROM evento where id_evento ='".$id."'  ";
                                      $accion_borrar = $conexion ->prepare($borrar);
                                      $accion_borrar ->execute();

	    echo '<script>location.href = "../view/verevento.php?$exito=1"</script>';
                                   
?>