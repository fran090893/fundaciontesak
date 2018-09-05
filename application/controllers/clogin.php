<?php

class Clogin extends  CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('mlogin');
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

    $resultado = $this->mlogin->ingresar($usuario, $pass);

    if($resultado != false) //Verifica si hay informacion en la consulta realizada en mlogin
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
}



?>
