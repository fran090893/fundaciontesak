<?php

Class mlogin extends CI_Model {


// Read data using username and password
public function login($data) {

$this->db->select('u.US_id, u.US_nombres, u.US_apellidos, u.US_telefono, u.US_usuario, u.US_password, u.US_cargo, d.DE_nombre');
        $this->db->from('pt_us_usuarios u');
        $this->db->join('pt_de_departamentos d','u.US_departamento=d.DE_id');
        $this->db->where('u.US_usuario',$data['username']);
        $this->db->where('u.US_password',$data['password']);
        $query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {
        $condition = "u.US_usuario =" . "'" . $username . "'";
$this->db->select('u.US_id, u.US_nombres, u.US_apellidos, u.US_telefono, u.US_usuario, u.US_password, u.US_cargo, d.DE_nombre');
        $this->db->from('pt_us_usuarios u');
        $this->db->join('pt_de_departamentos d','u.US_departamento=d.DE_id');
        $this->db->where($condition);
        
        $query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>