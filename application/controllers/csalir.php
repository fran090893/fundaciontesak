<?php

class Csalir extends  CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['error'] = '';
    $this->session->sess_destroy();
    $this->db->close();
    $this->load->view('login',$data);
  }
}


?>
