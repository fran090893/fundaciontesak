

<?php
$mysqli = new mysqli("localhost", "root","","fundaciontesak");

$salida = "";

    $query ="SELECT id_alumno, CONCAT(alumno_nombre, ' ', alumno_apellido ) AS nombre_completo, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo";

if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
    $query ="SELECT id_alumno, CONCAT(alumno_nombre, ' ', alumno_apellido ) AS nombre_completo, grupo.grupo_nombre AS grupo,grupo.id_departamento AS dept_alumno FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo WHERE alumno_nombre  LIKE '%".$q."%' OR grupo.grupo_nombre LIKE '%".$q."%'OR alumno_apellido LIKE '%".$q."%'";

}
$resultado = $mysqli->query($query);

    if ($resultado->num_rows>0) {

$salida.="
<br>
<table class='table table-striped table-bordered' style='text-align:center;'>

  <thead>
                                <tr>
                                  <th>Nombres</th>
                                  <th>Grupo</th>
                                  <th>Departamento</th>
                                  <th>Acciones</th>
                                  <th>Asistencia</th>
                                  <th>Estado</th>
                                </tr>
                              </thead>
                              <tbody>";
while ($fila=$resultado->fetch_assoc()) {
	$salida.='<tr>
			<td>'.$fila['nombre_completo'].'</td>
			<td>'.$fila['grupo'].'</td>
			<td>'.$fila['dept_alumno'].'</td>
      <td>
        <a href="#" class="btn btn-success btn-md" ><i class="fa fa-edit"></i></a>
        <a href="#" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
      </td>
      <td>
        <a href="#" class="btn btn-success btn-md"><i class="fa fa-check-circle"></i></a>
        <a href="#" class="btn btn-danger btn-md"><i class="fa fa-times-circle"></i></a>
      </td>
      <td></td>

			</tr>
	';
}
$salida.="<tdoby></table>";
}
else{
$salida="<br><p>No se han encontrado resultados.</p>";
}

echo $salida;

$mysqli->close();
?>
