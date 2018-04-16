<?php

Class cgrupos extends CI_Controller {

public function __construct() {
parent::__construct();
// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
// Load database
$this->load->model('mgrupos');

}

public function mostrar_grupos(){


}

}
?>