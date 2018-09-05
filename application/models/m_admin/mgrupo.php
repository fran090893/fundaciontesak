<?php
class Mgrupo extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function agregarGrupo($arreglo)
  {
    $c ="INSERT INTO grupo VALUES(null,'".$arreglo['nombre_grupo']."','".$arreglo['direccion_grupo']."','".$arreglo['encargado_grupo']."','".$arreglo['telefono_grupo']."','".$arreglo['descripcion_grupo']."','".$arreglo['municipio_grupo']."','".$arreglo['dept']."','".$arreglo['celular_grupo']."')";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function actualizarGrupo($arreglo)
  {
    $id_grupo = $this->session->userdata('id');
    $c ="UPDATE grupo SET grupo_nombre='".$arreglo['nombre_grupo']."', grupo_direccion='".$arreglo['direccion_grupo']."', grupo_encargado='".$arreglo['encargado_grupo']."', grupo_tel='".$arreglo['telefono_grupo']."', grupo_descripcion='".$arreglo['descripcion_grupo']."', grupo_municipio='".$arreglo['municipio_grupo']."', id_departamento='".$arreglo['dept']."', grupo_celular='".$arreglo['celular_grupo']."' WHERE id_grupo='".$id_grupo."'  ";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function eliminarGrupom($id_grupo)
  {
    $c="DELETE FROM grupo WHERE id_grupo = '".$id_grupo."'";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function buscarGrupo($busqueda1)
  {
    $c = "SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento ";

    if(isset($busqueda1))
    {
      $c = "SELECT id_grupo, grupo_nombre, grupo_direccion, grupo_encargado, CONCAT(grupo_tel,' / ',grupo_celular) AS telefonos ,grupo_descripcion, grupo_municipio, departamento_nombre FROM grupo INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento WHERE grupo_nombre LIKE '".$busqueda1."%' OR departamento_nombre LIKE '".$busqueda1."%'";
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
