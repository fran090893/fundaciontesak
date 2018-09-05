<?php
require('../../DB/conexion.php');
$evento=$_POST['id'];

    $sql="UPDATE evento SET estado = 1 WHERE evento.id_evento = $evento";

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