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
$id_depto=$_SESSION['depto'];
$consulta1 = "SELECT id_usuario, usuario_nombre, usuario_apellido, usuario,usuario_correo,usuario_telefono, cargo.cargo AS cargo, departamento.departamento_nombre AS departamento FROM usuario INNER JOIN cargo ON usuario.id_cargo=cargo.id_cargo INNER JOIN departamento ON usuario.id_departamento=departamento.id_departamento WHERE usuario.id_departamento = $id_depto";

if (isset($_POST['consulta'])) {
	$c = $mysqli->real_escape_string($_POST['consulta']);
  $consulta1 = "SELECT id_usuario, usuario_nombre, usuario_apellido,usuario,usuario_correo,usuario_telefono, cargo.cargo AS cargo, departamento.departamento_nombre AS departamento FROM usuario INNER JOIN cargo ON usuario.id_cargo=cargo.id_cargo INNER JOIN departamento ON usuario.id_departamento=departamento.id_departamento WHERE usuario LIKE '".$c."%' OR usuario_nombre LIKE '".$c."%' OR usuario_apellido LIKE '".$c."%'";

}

$resultado = $mysqli->query($consulta1);

    if ($resultado->num_rows>0)
    {
        $salida.='
        <div class="table-responsive">
          <table class="table table-striped table-bordered" style="text-align:center;">
            <thead>
              <tr>
                <th>Nombre completo</th>
                <th>Usuario</th>
                <th>Departamento</th>
                <th>Cargo</th>
                <th>Correo electrónico</th>
                <th>Teléfono</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

        ';

      while($fila = $resultado ->fetch_assoc())
      {
            $salida.='
            <tr>
              <td>'.$fila['usuario_nombre'].' '.$fila['usuario_apellido'].'</td>
              <td>'.$fila['usuario'].'</td>
              <td>'.$fila['departamento'].'</td>
              <td>'.$fila['cargo'].'</td>
              <td>'.$fila['usuario_correo'].'</td>
              <td>'.$fila['usuario_telefono'].'</td>
              <td>
                <a href="../view/actualizarusuario.php?id='.$fila["id_usuario"].'" class="btn btn-success btn-md" ><i class="fa fa-edit"></i></a>
                <a href="../controller/borrarusuario.php?id='.$fila["id_usuario"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
              </td>
           </tr>
                    ';
        }

        $salida.="
              </tbody>
            </table>
          </div>
        ";
    }
    else
    {
      $salida="No hay resultados en su búsqueda.";
    }

    echo $salida;

    $mysqli->close();

?>
