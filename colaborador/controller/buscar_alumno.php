<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}

else{
    $usuario = $_SESSION['usuario'];
}

$mysqli = new mysqli("localhost", "root","","fundaciontesak");

$id_grupo = $_SESSION['id_grupo1'];

$salida = "";

$consulta1 = "SELECT id_alumno, alumno_nombre, alumno_apellido, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS nombre_dept FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE alumno.id_grupo ='".$id_grupo."' ";

if (isset($_POST['consulta'])) {
	$c = $mysqli->real_escape_string($_POST['consulta']);
  $consulta1 = "SELECT id_alumno, alumno_nombre, alumno_apellido, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS nombre_dept FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE alumno.id_grupo = '".$id_grupo."' AND ( alumno_nombre LIKE '".$c."%' OR alumno_apellido LIKE'".$c."%') ";

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
              <th>Grupo</th>
              <th>Departamento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

        ';

      while($fila = $resultado ->fetch_assoc())
      {
          $salida.='
            <tr>
              <td>'.$fila['alumno_nombre'].' '.$fila['alumno_apellido'].'</td>
              <td>'.$fila['grupo'].'</td>
              <td>'.$fila['nombre_dept'].'</td>

              <td>
                <a href="../view/actualizaralumno.php?id='.$fila["id_alumno"].'" class="btn btn-success btn-md" ><i class="fa fa-edit"></i></a>
                <a href="../controller/borraralumno.php?id='.$fila["id_alumno"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
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
