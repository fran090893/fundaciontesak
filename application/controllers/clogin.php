<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clogin extends CI_controller 
{
	function __construct(){
 
        parent::__construct();
        $this->load->model('mlogin');
 
}


	public function index()
	{
		$this->load->view('principal/vlogin');
		
	}
	public function ingresar()
	{
		
	$usu=$this->input->post('user');
	$pass=$this->input->post('passw');
 
   $res=$this->mlogin->ingresar($usu,$pass);
if($res == 1) {
		$this->load->view('layout/administradores/header');
		$this->load->view('layout/administradores/menu');
		$this->load->view('principal/vperfil');
		$this->load->view('layout/administradores/footer');
	}else{
		$this->load->view('principal/vlogin');

	}
	}
}