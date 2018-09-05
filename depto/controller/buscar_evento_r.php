<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];
}

$mysqli = new mysqli("localhost", "root","","fundaciontesak");

$salida = "";

 $consulta1="SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo
 WHERE  evento.estado=1 ";
if(isset($_POST['consulta']))
{
  $c = $mysqli->real_escape_string($_POST['consulta']);
  $consulta1="SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo
  WHERE  EXISTS (SELECT *
                      FROM asistencia
                     WHERE  asistencia.id_evento= evento.id_evento) AND (evento.evento_nombre LIKE '".$c."%' OR grupo.grupo_nombre LIKE '".$c."%' ) ";
}

$resultado = $mysqli->query($consulta1);

  if($resultado->num_rows>0)
  {
    $salida.='
    <div class="table-responsive">
      <table class="table table-striped table-bordered" style="text-align:center;">
        <thead>
          <tr>
            <th>Nombre del evento</th>
            <th>Fecha del evento</th>
            <th>Grupo asignado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
    ';
    while($fila = $resultado->fetch_assoc())
    {
        $salida.='
              <tr>
                <td>'.$fila['evento_nombre'].'</td>
                <td>'.date("d/m/Y",strtotime($fila['fecha'])).'</td>
                <td>'.$fila['grupo'].'</td>
                <td>
                <a href="reiniciar_asistencia.php?id='.$fila['id_evento'].'" class="btn btn-danger btn-md"><i class="fa fa-refresh"></i></a>
                  <a href="actualizarevento.php?id='.$fila['id_evento'].'" class="btn btn-success btn-md"><i class="fa fa-edit"></i></a>
                  <a href="reporte_asistencia.php?id='.$fila["id_grupo"].'&evento='.$fila["id_evento"].'" class="btn btn-info btn-md"><i class="fa fa-list-ul"></i></a>
                  </td>
              </tr>

              ';
    }

        $salida.="
        </tbody>
      </table>
    </div>";
  }
  else {
    $salida="No hay resultados en la busqueda.";
  }

  echo $salida;

  $mysqli->close();
?>
