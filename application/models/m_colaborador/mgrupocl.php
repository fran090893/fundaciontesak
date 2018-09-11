<?php
class Mgrupocl extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  public function buscarGrupo($busqueda1)
  {
    $id_dept = $this->session->userdata('departamento');
    $c = "SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE grupo.id_departamento = '".$id_dept."'";

    if(isset($busqueda1))
    {
      $c = "SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE grupo.id_departamento = '".$id_dept."' AND (grupo_nombre LIKE '".$busqueda1."%' OR departamento_nombre LIKE '".$busqueda1."%')";
    }

    $resultados = $this->db->query($c);
    $n['n'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;

  }

  public function idGrupo($id_grupo)
  {
    $c ="SELECT grupo_nombre, grupo_direccion, grupo_encargado, grupo_tel,grupo_descripcion, grupo_municipio, id_departamento, grupo_celular FROM grupo WHERE id_grupo = ".$id_grupo." ";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }

  public function consultarGrupo()
  {
    $c ="SELECT id_grupo, grupo_nombre FROM grupo";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }
}
?>
