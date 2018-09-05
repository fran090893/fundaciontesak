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
      'usuario' => $row['usuario'],
      'cargo' => $row['id_cargo'],
      'telefono' => $row['usuario_telefono'],
      'correo' => $row['usuario_correo']
    );

    $this->session->set_userdata($usuario_datos);

    return $row;
  }
}
?>
