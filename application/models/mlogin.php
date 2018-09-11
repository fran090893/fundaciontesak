<?php
class Mlogin extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function ingresar($usuario, $pass)
  {
    $c1 = "SELECT * FROM usuario WHERE usuario = '".$usuario."' AND usuario_password='".$pass."' ";
    $resultados = $this->db->query($c1);
    $row = $resultados ->row_array();

    $usuario_datos = array(
      'id_s' => $row['id_usuario'],
      'usuario' => $row['usuario'],
      'cargo' => $row['id_cargo'],
      'telefono' => $row['usuario_telefono'],
      'correo' => $row['usuario_correo'],
      'departamento' => $row['id_departamento']
    );

    $this->session->set_userdata($usuario_datos);

    return $row;
  }

  public function cambiarClaveConsulta($contra, $id_usuario)
  {
    $c1 = "UPDATE usuario SET usuario_password='".$contra."' WHERE id_usuario='".$id_usuario."'";
    $resultados = $this->db->query($c1);

    return $resultados;
  }
}
?>
