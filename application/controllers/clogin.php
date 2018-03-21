<?php

//session_start(); //we need to start session in order to access it through CI

Class clogin extends CI_Controller {

public function __construct() {
parent::__construct();
// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
// Load database
$this->load->model('mlogin');

}

// Show login page
	public function index()
	{
		$this->load->view('principal/vlogin');
		
	}


// Check for user login process
public function user_login_process() {
    

$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');

if ($this->form_validation->run() == FALSE) {
    
if(isset($this->session->userdata['logged_in'])){
    
$this->load->view('layout/Administradores/header');
$this->load->view('layout/Administradores/menu');
$this->load->view('Principal/vperfil');
$this->load->view('layout/Administradores/footer');

}else{
    
$this->load->view('principal/vlogin');
}
} else {
    
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->mlogin->login($data);
if ($result == TRUE) {
    
$username = $this->input->post('username');
$result = $this->mlogin->read_user_information($username);
if ($result != false) {
$session_data = array(
				's_idusuario' => $result[0]->US_id,                
                's_nombre' => $result[0]->US_nombres,
                's_apellido' => $result[0]->US_apellidos,                 
                's_telefono' => $result[0]->US_telefono, 
                's_usuario' => $result[0]->US_usuario,
                's_cargo' => $result[0]->US_cargo,
                's_departamento' => $result[0]->DE_nombre
);
/*$datosuser = array ()
         'nombre' =>session_data('s_nombre'),
         'apellido' =>session_data('s_apellido'),
         'telefono' =>session_data('s_telefono'),
         'usuario' =>session_data('s_usuario'),
         'cargo' =>session_data('s_cargo'),
         'departamento' =>session_data('s_departamento'),        
        );*/
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('layout/Administradores/header');
$this->load->view('layout/Administradores/menu');
$this->load->view('Principal/vperfil');
$this->load->view('layout/Administradores/footer');
}
} else {
$data = array(
'error_message' => 'usuario invalido'
);
$this->load->view('principal/vlogin', $data);
//echo 'aqui llego';
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Sesion cerrada';
$this->load->view('principal/vlogin', $data);
}

}

?>