<?php
require('../DB/conexion.php');

                                      $id = $_GET['id'];
                                      $borrar = "DELETE FROM alumno where id_alumno ='".$id."'  ";
                                      $accion_borrar = $conexion ->prepare($borrar);
                                      $accion_borrar ->execute();

	    echo '<script>location.href = "../view/buscaralumno.php?$exito=1"</script>';
                                   
?>