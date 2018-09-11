<?php
class Mestadisticacd extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function grupalAsistenciaReal($id_grupo)
  {
    $c_enero = "SELECT COUNT(*) AS cantidad1 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/01/01')";
    $enero = $this->db->query($c_enero)->row();
    $resultado1 = $enero->cantidad1;

    $c_febrero = "SELECT COUNT(*) AS cantidad2 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/02/01') AND Month(fecha) = Month('2018/02/01')";
    $febrero = $this->db->query($c_febrero)->row();
    $resultado2 = $febrero->cantidad2;

    $c_marzo = "SELECT COUNT(*) AS cantidad3 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/03/01')";
    $marzo = $this->db->query($c_marzo)->row();
    $resultado3 = $marzo->cantidad3;

    $c_abril = "SELECT COUNT(*) AS cantidad4 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/04/12')";
    $abril = $this->db->query($c_abril)->row();
    $resultado4 = $abril->cantidad4;

    $c_mayo = "SELECT COUNT(*) AS cantidad5 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/05/04')";
    $mayo = $this->db->query($c_mayo)->row();
    $resultado5 = $mayo->cantidad5;

    $c_junio = "SELECT COUNT(*) AS cantidad6 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/06/05')";
    $junio = $this->db->query($c_junio)->row();
    $resultado6 = $junio->cantidad6;

    $c_julio = "SELECT COUNT(*) AS cantidad7 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/07/06')";
    $julio = $this->db->query($c_julio)->row();
    $resultado7 = $julio->cantidad7;

    $c_agosto = "SELECT COUNT(*) AS cantidad8 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/08/07')";
    $agosto = $this->db->query($c_agosto)->row();
    $resultado8 = $agosto->cantidad8;

    $c_sept = "SELECT COUNT(*) AS cantidad9 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/09/08')";
    $sept = $this->db->query($c_sept)->row();
    $resultado9 = $sept->cantidad9;

    $c_oct = "SELECT COUNT(*) AS cantidad10 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/10/09')";
    $oct = $this->db->query($c_oct)->row();
    $resultado10 = $oct->cantidad10;

    $c_nov = "SELECT COUNT(*) AS cantidad11 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/11/10')";
    $nov = $this->db->query($c_nov)->row();
    $resultado11 = $nov->cantidad11;

    $c_dic = "SELECT COUNT(*) AS cantidad12 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE alumno.id_grupo = '".$id_grupo."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/12/11')";
    $dic = $this->db->query($c_dic)->row();
    $resultado12 = $dic->cantidad12;

    $c_nombre = "SELECT grupo_nombre AS nombre FROM grupo WHERE id_grupo='".$id_grupo."'";
    $nombre = $this->db->query($c_nombre)->row();
    $resultado13 = $nombre->nombre;

    $arreglo = array(
      'enero_r' => $resultado1,
      'febrero_r' => $resultado2,
      'marzo_r' => $resultado3,
      'abril_r' => $resultado4,
      'mayo_r' => $resultado5,
      'junio_r' => $resultado6,
      'julio_r' => $resultado7,
      'agosto_r' => $resultado8,
      'septiembre_r' => $resultado9,
      'octubre_r' => $resultado10,
      'noviembre_r' => $resultado11,
      'diciembre_r' => $resultado12,
      'nombre_grupo' => $resultado13

    );

    return $arreglo;
  }

  public function deptAsistenciaReal($id_departamento)
  {
    $c_enero = "SELECT COUNT(*) AS cantidad1 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/01/01')";
    $enero = $this->db->query($c_enero)->row();
    $resultado1 = $enero->cantidad1;

    $c_febrero = "SELECT COUNT(*) AS cantidad2 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/02/01') AND Month(fecha) = Month('2018/02/01')";
    $febrero = $this->db->query($c_febrero)->row();
    $resultado2 = $febrero->cantidad2;

    $c_marzo = "SELECT COUNT(*) AS cantidad3 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/03/01')";
    $marzo = $this->db->query($c_marzo)->row();
    $resultado3 = $marzo->cantidad3;

    $c_abril = "SELECT COUNT(*) AS cantidad4 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/04/12')";
    $abril = $this->db->query($c_abril)->row();
    $resultado4 = $abril->cantidad4;

    $c_mayo = "SELECT COUNT(*) AS cantidad5 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/05/04')";
    $mayo = $this->db->query($c_mayo)->row();
    $resultado5 = $mayo->cantidad5;

    $c_junio = "SELECT COUNT(*) AS cantidad6 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/06/05')";
    $junio = $this->db->query($c_junio)->row();
    $resultado6 = $junio->cantidad6;

    $c_julio = "SELECT COUNT(*) AS cantidad7 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/07/06')";
    $julio = $this->db->query($c_julio)->row();
    $resultado7 = $julio->cantidad7;

    $c_agosto = "SELECT COUNT(*) AS cantidad8 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/08/07')";
    $agosto = $this->db->query($c_agosto)->row();
    $resultado8 = $agosto->cantidad8;

    $c_sept = "SELECT COUNT(*) AS cantidad9 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/09/08')";
    $sept = $this->db->query($c_sept)->row();
    $resultado9 = $sept->cantidad9;

    $c_oct = "SELECT COUNT(*) AS cantidad10 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/10/09')";
    $oct = $this->db->query($c_oct)->row();
    $resultado10 = $oct->cantidad10;

    $c_nov = "SELECT COUNT(*) AS cantidad11 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/11/10')";
    $nov = $this->db->query($c_nov)->row();
    $resultado11 = $nov->cantidad11;

    $c_dic = "SELECT COUNT(*) AS cantidad12 FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento INNER JOIN grupo ON alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE departamento.id_departamento= '".$id_departamento."' and asistencia = 1 AND year(fecha) = year('2018/01/01') AND Month(fecha) = Month('2018/12/11')";
    $dic = $this->db->query($c_dic)->row();
    $resultado12 = $dic->cantidad12;

    $c_nombre = "SELECT  departamento_nombre AS nombre FROM departamento WHERE id_departamento='".$id_departamento."'";
    $nombre = $this->db->query($c_nombre)->row();
    $resultado13 = $nombre->nombre;

    $arreglo = array(
      'enero_r' => $resultado1,
      'febrero_r' => $resultado2,
      'marzo_r' => $resultado3,
      'abril_r' => $resultado4,
      'mayo_r' => $resultado5,
      'junio_r' => $resultado6,
      'julio_r' => $resultado7,
      'agosto_r' => $resultado8,
      'septiembre_r' => $resultado9,
      'octubre_r' => $resultado10,
      'noviembre_r' => $resultado11,
      'diciembre_r' => $resultado12,
      'nombre_dept' => $resultado13

    );

    return $arreglo;
  }

  public function buscarEstadisticaGrupal($busqueda1)
  {
    $id_dept = $this->session->userdata('departamento');
    $c ="SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE grupo.id_departamento = '".$id_dept."'";

    if(isset($busqueda1))
    {
      $c ="SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE grupo.id_departamento = '".$id_dept."' AND (grupo_nombre LIKE '".$busqueda1."%' OR departamento_nombre LIKE '".$busqueda1."%' OR grupo_encargado LIKE '".$busqueda1."%') ";
    }

    $resultados = $this->db->query($c);
    $n['estadistica_id'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }
}

?>
