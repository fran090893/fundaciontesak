<?php
class Musuariocd extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function agregarUsuario($arreglo)
  {
    $c ="INSERT INTO usuario VALUES(null,'".$arreglo['nombre_usuario']."','".$arreglo['apellido_usuario']."','".$arreglo['telefono']."','".$arreglo['nombre_us']."','".$arreglo['contra_us']."','".$arreglo['dept']."','".$arreglo['cargo']."','".$arreglo['correo']."')";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function actualizarUsuario($arreglo)
  {
    $id_usuario = $this->session->userdata('id_usuario1');
    $c ="UPDATE usuario SET usuario_nombre='".$arreglo['nombre_usuario1']."', usuario_apellido='".$arreglo['apellido_usuario1']."', usuario_telefono='".$arreglo['telefono1']."', usuario='".$arreglo['nombre_us1']."', usuario_password='".$arreglo['contra_us1']."', id_departamento='".$arreglo['dept1']."', id_cargo='".$arreglo['cargo1']."', usuario_correo='".$arreglo['correo1']."' WHERE id_usuario='".$id_usuario."'";
    $resultados = $this->db->query($c);
    return $resultados;
  }

  public function consultarCargos()
  {
    $c ="SELECT cargo FROM cargo WHERE id_cargo = '2' OR id_cargo = '3'";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }

  public function buscarUsuario($busqueda1)
  {
    $id_dept = $this->session->userdata('departamento');
    $c = "SELECT id_usuario, usuario_nombre, usuario_apellido, usuario,usuario_correo,usuario_telefono, cargo.cargo AS cargo, departamento.departamento_nombre AS departamento FROM usuario INNER JOIN cargo ON usuario.id_cargo=cargo.id_cargo INNER JOIN departamento ON usuario.id_departamento=departamento.id_departamento WHERE usuario.id_departamento = '".$id_dept."' ";

    if(isset($busqueda1))
    {
      $c = "SELECT id_usuario, usuario_nombre, usuario_apellido,usuario,usuario_correo,usuario_telefono, cargo.cargo AS cargo, departamento.departamento_nombre AS departamento FROM usuario INNER JOIN cargo ON usuario.id_cargo=cargo.id_cargo INNER JOIN departamento ON usuario.id_departamento=departamento.id_departamento WHERE usuario.id_departamento = '".$id_cept."' AND (usuario LIKE '".$busqueda1."%' OR usuario_nombre LIKE '".$busqueda1."%' OR usuario_apellido LIKE '".$busqueda1."%')";
    }

    $resultados = $this->db->query($c);
    $n['usu'] = $resultados->num_rows();
    $this->session->set_userdata($n);
    $row = $resultados->result();

    return $row;
  }

  public function eliminarUsuario($id_usuario)
  {
    $c = "SELECT usuario_nombre FROM usuario WHERE id_usuario = '".$id_usuario."'";
    $resultados = $this->db->query($c);
    $row = $resultados->result_array();

    if($row['usuario_nombre'] == $this->session->userdata('usuario'))
    {
      $resultados = false;
    }
    else
    {
      $c ="DELETE FROM usuario WHERE id_usuario = '".$id_usuario."'";
      $resultados = $this->db->query($c);
    }

    return $resultados;
  }

  public function consultarUsuario($id_usuario)
  {
    $c ="SELECT * FROM usuario WHERE id_usuario='".$id_usuario."'";
    $resultados = $this->db->query($c);
    $row = $resultados->result();
    return $row;
  }


}
  ?>
