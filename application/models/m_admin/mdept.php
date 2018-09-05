<?php
class Mdept extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function agregarDept($arreglo)
  {
    $c ="INSERT INTO departamento VALUES(null,'".$arreglo['nombre_dept']."','".$arreglo['descripcion_dept']."')";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function actualizarDept($arreglo)
  {
    $id_dept = $this->session->userdata('id_dept1');
    $c ="UPDATE departamento SET departamento_nombre = '".$arreglo['nombre_dept']."', departamento_descripcion='".$arreglo['descripcion_dept']."' WHERE id_departamento = '".$id_dept."'";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function filaDept()
  {
    $id_dept = $this->session->userdata('id_dept1');
    $c ="SELECT id_departamento, departamento_nombre, departamento_descripcion FROM departamento WHERE id_departamento='".$id_dept."'";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }

  public function consultarDept()
  {
    $c ="SELECT id_departamento, departamento_nombre, departamento_descripcion FROM departamento";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }
}
 ?>
