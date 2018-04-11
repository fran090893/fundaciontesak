<?php

Class cperfil extends CI_Controller {

public function __construct() {
parent::__construct();
// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
// Load database
$this->load->model('mperfil');

}

public function update_perfil(){

 $param['US_nombres']=$this->input->post('nombre');
 $param['US_apellidos']=$this->input->post('apellido');
 $param['US_telefono']=$this->input->post('telefono');


$this->mperfil->update_perfil($param);

redirect('clogin/user_login_process');
}

}