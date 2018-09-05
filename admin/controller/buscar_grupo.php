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
$consulta1 = "SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento";

if (isset($_POST['consulta'])) {
	$c = $mysqli->real_escape_string($_POST['consulta']);
  $consulta1 = "SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE grupo_nombre LIKE '".$c."%' OR departamento_nombre LIKE '".$c."%' ";

}

$resultado = $mysqli->query($consulta1);

    if ($resultado->num_rows>0)
    {
        $salida.='
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
              <thead>
                <tr>
                  <th>Nombre del grupo</th>
                  <th>Encargado</th>
                  <th>Teléfonos</th>
                  <th>Departamento</th>
                  <th>Acciones</th>
                  <th>Agregar alumnos</th>
                </tr>
              </thead>
              <tbody>

        ';

      while($fila = $resultado ->fetch_assoc())
      {
          $salida.='
                  <tr>
                    <td>'.$fila['grupo_nombre'].'</td>
                    <td>'.$fila['grupo_encargado'].'</td>
                    <td>'.$fila['telefonos'].'</td>
                    <td>'.$fila['departamento_nombre'].'</td>
                    <td>
                      <a href="../view/actualizargrupo.php?id='.$fila["id_grupo"].'" class="btn btn-success btn-md" ><i class="fa fa-edit"></i></a>
                      <a  href="../controller/borrargrupo.php?id='.$fila["id_grupo"].'" class="confirmation btn btn-danger btn-md" onclick="return confirm("Estás seguro que deseas eliminar el registro?");"><i class="fa fa-trash"></i></a>
                      <a href="../view/listaalumno.php?id='.$fila["id_grupo"].'" class="btn btn-info btn-md"><i class="fa fa-list-ul"></i></a>
                    </td>
                    <td>
                    <a href="../view/agregartabla.php?id='.$fila["id_grupo"].'" class="btn btn-success btn-md" ><i class="fa fa-file"></i></a>
                      <a href="../view/agregaralumno.php?id_grupo='.$fila["id_grupo"].'" class="btn btn-info btn-md"><i class="fa fa-user-plus"></i></a>
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
