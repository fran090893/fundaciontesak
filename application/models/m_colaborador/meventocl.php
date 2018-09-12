<?php
class Meventocl extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function buscarEventoProximo($busqueda1)
  {
    $id_dept = $this->session->userdata('departamento');
    $c = "SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo  WHERE evento.estado=0 AND (grupo.id_departamento = '".$id_dept."')";

    if(isset($busqueda1))
    {
      $c = "SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo WHERE evento.estado=0 AND (grupo.id_departamento = '".$id_dept."') AND(evento.evento_nombre LIKE '".$busqueda1."%' OR grupo.grupo_nombre LIKE '".$busqueda1."%' OR evento.fecha LIKE '".$busqueda1."%')";
    }

    $resultados = $this->db->query($c);
    $n['eventos_p_id'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }

  public function buscarAsistencia($busqueda1)
  {
    $id_grupo = $this->session->userdata('id_grupo3');
    $id_evento = $this->session->userdata('id_evento1');

    $c = "SELECT id_alumno, alumno_nombre, alumno_apellido, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS departamento FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE NOT EXISTS (SELECT * FROM asistencia WHERE asistencia.id_alumno=alumno.id_alumno AND asistencia.id_evento= '".$id_evento."') AND alumno.id_grupo = '".$id_grupo."'";

    if(isset($busqueda1))
    {
      $s1 ="SELECT id_alumno, alumno_nombre, alumno_apellido, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS departamento FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento ";
      $c = $s1."WHERE NOT EXISTS (SELECT * FROM asistencia WHERE asistencia.id_alumno=alumno.id_alumno AND asistencia.id_evento= '".$id_evento."') AND alumno.id_grupo = '".$id_grupo."' AND (alumno_nombre LIKE '".$busqueda1."%' OR alumno_apellido LIKE '".$busqueda1."%')  ";

    }

    $resultados = $this->db->query($c);
    $n['asistencia_id'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }

  public function asistenciaConsulta($arreglo)
  {
    $c="INSERT INTO asistencia (id_asistencia, id_alumno, id_evento, asistencia) VALUES(null, '".$arreglo['alumno_id1']."','".$arreglo['evento_id1']."','".$arreglo['asistencia1']."') ";
    $resultados = $this->db->query($c);

    return $resultados;
  }

  public function eventoRealizadoConsulta($id_evento)
  {
    $c = "UPDATE evento SET estado = '1' WHERE evento.id_evento = '".$id_evento."' ";
    $resultados = $this->db->query($c);

    return $resultados;
  }

  public function reporteGeneralConsulta1($id_grupo)
  {
    $c ="SELECT alumno.alumno_nombre, alumno.id_grupo,alumno.alumno_apellido, GROUP_CONCAT(asistencia) as asistencia, GROUP_CONCAT(evento.evento_nombre SEPARATOR ' | ') AS evento, GROUP_CONCAT(evento.fecha SEPARATOR ' | ') AS fecha FROM asistencia INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno INNER JOIN evento ON asistencia.id_evento = evento.id_evento WHERE evento.estado = 1 AND alumno.id_grupo= '".$id_grupo."' GROUP BY alumno.id_alumno";
    $resultados1 = $this->db->query($c);
    $row1 = $resultados1->result();
    return $row1;
  }

  public function reporteGeneralConsulta2($id_grupo)
  {
    $c ="SELECT evento.evento_nombre  AS evento, fecha FROM evento WHERE evento.estado = 1 AND evento.id_grupo = '".$id_grupo."'";
    $resultados2 = $this->db->query($c);
    $row2 = $resultados2->result();
    return $row2;
  }

  public function buscarAsistenciaGrupal($busqueda1)
  {
    $c ="SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento";

    if(isset($busqueda1))
    {
      $c ="SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE grupo_nombre LIKE '".$busqueda1."%' OR departamento_nombre LIKE '".$busqueda1."%' OR grupo_encargado LIKE '".$busqueda1."%' ";
    }

    $resultados = $this->db->query($c);
    $n['grupal_id'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }

  public function buscarEventoRealizadoConsulta($busqueda1)
  {
    $c ="SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo WHERE  evento.estado=1 ";

    if(isset($busqueda1))
    {
      $c ="SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo WHERE  evento.estado=1 AND (evento.evento_nombre LIKE '".$busqueda1."%' OR grupo.grupo_nombre LIKE '".$busqueda1."%')";
    }

    $resultados = $this->db->query($c);
    $n['realizado_id'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }

  public function borrarAsistencia($id_evento)
  {
    $c ="DELETE FROM asistencia WHERE id_evento = '".$id_evento."'";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function updateEstadoEvento($id_evento)
  {
    $c ="UPDATE evento SET estado = 0 Where id_evento = '".$id_evento."'";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function consultarEventoRealizado($id_evento)
  {
    $c ="SELECT * FROM evento WHERE id_evento = '".$id_evento."'";
    $resultados1 = $this->db->query($c);
    $row1 = $resultados1->result();
    return $row1;
  }

  public function buscarReporteAsistencia($busqueda1, $id_evento)
  {

    $c ="SELECT alumno.id_alumno, alumno.alumno_nombre, alumno.alumno_apellido, grupo.grupo_nombre AS grupo, asistencia.asistencia,departamento.departamento_nombre AS dept_alumno FROM grupo INNER JOIN alumno on grupo.id_grupo=alumno.id_grupo INNER JOIN departamento on departamento.id_departamento = grupo.id_departamento INNER JOIN asistencia on alumno.id_alumno = asistencia.id_alumno INNER JOIN evento on asistencia.id_evento=evento.id_evento WHERE evento.id_evento = '".$id_evento."' ";

    if(isset($busqueda1))
    {
      $c ="SELECT alumno.id_alumno, alumno.alumno_nombre, alumno.alumno_apellido, grupo.grupo_nombre AS grupo, asistencia.asistencia,departamento.departamento_nombre AS dept_alumno FROM grupo INNER JOIN alumno on grupo.id_grupo=alumno.id_grupo INNER JOIN departamento on departamento.id_departamento = grupo.id_departamento INNER JOIN asistencia on alumno.id_alumno = asistencia.id_alumno INNER JOIN evento on asistencia.id_evento=evento.id_evento WHERE evento.id_evento = '".$id_evento."' AND (alumno.alumno_nombre LIKE '".$busqueda1."%' OR alumno.alumno_apellido LIKE '".$busqueda1."%') ";
    }

    $resultados = $this->db->query($c);
    $n['reporte_asistencia1_id'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }

  public function imprimirListaConsulta1($id_grupo, $id_evento)
  {
    $c ="SELECT evento.fecha, evento.evento_nombre, grupo.grupo_nombre, grupo.grupo_encargado, departamento.departamento_nombre FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE evento.id_evento='".$id_evento."' AND grupo.id_grupo='".$id_grupo."'";
    $resultados1 = $this->db->query($c);
    $row1 = $resultados1->result();
    return $row1;
  }

  public function imprimirListaConsulta2($id_grupo, $id_evento)
  {
    $c ="SELECT id_alumno, alumno_nombre,alumno_sexo, alumno_apellido , grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS departamento FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE NOT EXISTS (SELECT * FROM asistencia WHERE asistencia.id_alumno=alumno.id_alumno AND asistencia.id_evento= '".$id_evento."') AND alumno.id_grupo = '".$id_grupo."'";
    $resultados1 = $this->db->query($c);
    $row1 = $resultados1->result();
    return $row1;
  }

  public function imprimirListaConsulta3($id_evento)
  {
    $c ="SELECT grupo.grupo_encargado as encargado,evento.fecha as fecha,alumno.id_alumno,alumno.alumno_nombre, alumno.alumno_apellido , grupo.grupo_nombre AS grupo, asistencia.asistencia,departamento.departamento_nombre AS dept_alumno, evento.evento_nombre FROM asistencia INNER JOIN alumno ON alumno.id_alumno = asistencia.id_alumno INNER JOIN grupo on grupo.id_grupo = alumno.id_grupo INNER JOIN evento on evento.id_grupo = grupo.id_grupo INNER JOIN departamento on departamento.id_departamento = grupo.id_departamento WHERE evento.id_evento ='".$id_evento."' ";
    $resultados1 = $this->db->query($c);
    $row1 = $resultados1->result();
    return $row1;
  }

}



?>
