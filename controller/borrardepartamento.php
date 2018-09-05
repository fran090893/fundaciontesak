<?php
require('../DB/conexion.php');

                                      $id = $_GET['id'];

                                      $borraralumnos = "DELETE FROM alumno where id_grupo =".$id."";
                                      $accion_borrar_alumnos = $conexion->prepare($borraralumnos);
                                      $accion_borrar_alumnos->execute();

                                      $borrargrupo = "DELETE FROM grupo where id_grupo =".$id."";
                                      $accion_borrar = $conexion->prepare($borrargrupo);
                                      $accion_borrar->execute();

	    echo '<script>location.href = "../view/vergrupo.php?$exito=1"</script>';
                                   
?>