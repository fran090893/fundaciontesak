<?php

class Clogin extends  CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Mlogin');
  }

  public function index()
  {
    $data['error'] = '';
    $this->load->view('login',$data);
  }

  public function sesion()
  {
    $usuario = $this->input->post('usuario');
    $pass = $this->input->post('pass');

    $resultado = $this->Mlogin->ingresar($usuario, $pass);

    if($this->session->userdata('usuario')) //Verifica si hay informacion en la consulta realizada en Mlogin
    {
      $datos['title'] = 'Inicio | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('layout/menu');
      $this->load->view('layout/scripting');
    }
    else
    {
      $data['error'] = 's';
      $this->load->view('login', $data);
    }

  }

  public function v_cambiarClave()
  {
    if(!$this->session->userdata('usuario'))
    {
      $data['error'] = '';
      $this->load->view('login',$data);
    }
    else
    {
      $datos['error'] = '';
      $datos['title'] = 'Cambiar contraseña | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('cambiar_clave');
      $this->load->view('layout/scripting');
    }
  }

  public function cambiarClave()
  {
    $id_usuario = $this->session->userdata('id_s');

    $clave = $this->input->post('contra_nueva');

    $bandera = $this->Mlogin->cambiarClaveConsulta($clave, $id_usuario);

    if($bandera = true)
    {
      $datos['error'] = 'n';
      $datos['title'] = 'Cambiar contraseña | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('cambiar_clave');
      $this->load->view('layout/scripting');
    }
    else
    {
      $datos['error'] = 's';
      $datos['title'] = 'Cambiar contraseña | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('cambiar_clave');
      $this->load->view('layout/scripting');
    }


  }
}



?>
