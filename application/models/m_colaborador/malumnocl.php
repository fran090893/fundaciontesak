<?php
class Malumnocl extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function buscarAlumno($busqueda1)
  {
    $id_grupo = $this->session->userdata('id_g');
    $c = "SELECT id_alumno, alumno_nombre, alumno_apellido, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS nombre_dept FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE alumno.id_grupo = '".$id_grupo."' ";

    if(isset($busqueda1))
    {
      $c = "SELECT id_alumno, alumno_nombre, alumno_apellido, grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS nombre_dept FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE alumno.id_grupo = '".$id_grupo."' AND ( alumno_nombre LIKE '".$busqueda1."%' OR alumno_apellido LIKE'".$busqueda1."%')";
    }

    $resultados = $this->db->query($c);
    $n['na'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;

  }

  public function agregarAlumno($arreglo)
  {
    $id_grupo = $this->session->userdata('id_g1');
    $c ="INSERT INTO alumno VALUES(null,'".$arreglo['nombre_alumno']."','".$arreglo['apellido_alumno']."','".$arreglo['fecha']."','".$arreglo['sexo']."','".$arreglo['instituto']."','".$id_grupo."')";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function eliminarAlumno($id_alumno)
  {
    $c="DELETE FROM alumno WHERE id_alumno = '".$id_alumno."'";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function actualizarAlumno($arreglo)
  {
    $id_alumno = $this->session->userdata('id_alumno');
    $c ="UPDATE alumno SET alumno_nombre='".$arreglo['nombre_alumno']."', alumno_apellido='".$arreglo['apellido_alumno']."', alumno_fecha='".$arreglo['fecha']."', alumno_sexo='".$arreglo['sexo']."', alumno_instituto='".$arreglo['instituo']."' WHERE id_alumno='".$id_alumno."'  ";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function consultarAlumno()
  {
    $c ="SELECT * FROM alumno";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }

  public function consultarAlumnoID($id_alumno)
  {
    $c ="SELECT * FROM alumno WHERE id_alumno='".$id_alumno."'";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }

  public function agregarTablaConsulta($arreglo, $id_grupo)
  {
    $c ="INSERT INTO alumno(alumno_nombre, alumno_apellido,alumno_fecha,alumno_sexo, alumno_instituto, id_grupo) VALUES('".$arreglo['nombre']."','".$arreglo['apellido']."','".$arreglo['fecha']."','".$arreglo['sexo']."','".$arreglo['instituto']."','".$id_grupo."')";
    $resultados = $this->db->query($c);

    return $resultados;
  }
}
 ?>
