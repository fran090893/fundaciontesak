<?php

class Cinicio extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function menu()
  {
    if(!$this->session->userdata('usuario'))
    {
      $data['error'] = '';
      $this->load->view('login',$data);
    }
    else
    {
      $data['title'] = 'Inicio | Fundación Tesak';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/scripting');
    }

  }
}
 ?>
