<?php
class Mevento extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function agregarEvento($arreglo)
  {
    $c ="INSERT INTO evento VALUES(null,'".$arreglo['nombre_evento']."','".$arreglo['descripcion_evento']."','".$arreglo['grupo']."','".$arreglo['fecha']."','".$arreglo['estado']."')";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function buscarEventoProximo($busqueda1)
  {
    $c = "SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo  WHERE evento.estado=0";

    if(isset($busqueda1))
    {
      $c = "SELECT evento.id_evento,grupo.id_grupo, evento.evento_nombre,evento.fecha, grupo.grupo_nombre AS grupo FROM evento INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo WHERE evento.estado=0 AND(evento.evento_nombre LIKE '".$busqueda1."%' OR grupo.grupo_nombre LIKE '".$busqueda1."%')";
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
      $c = "SELECT id_alumno, alumno_nombre, alumno_apellido, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS departamento FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE NOT EXISTS (SELECT * FROM asistencia WHERE asistencia.id_alumno=alumno.id_alumno AND asistencia.id_evento= '".$id_evento."') AND alumno.id_grupo = '".$id_grupo."'
      AND (alumno_nombre LIKE '".$busqueda1."%' OR grupo.grupo_nombre LIKE '".$busqueda1."%')  ";

    }

    $resultados = $this->db->query($c);
    $n['asistencia_id'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }
}

?>
