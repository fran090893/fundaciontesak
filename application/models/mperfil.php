<?php

Class mperfil extends CI_Model {
  
function __construct(){
    parent::__construct();
    
}

public function update_perfil($param){


  echo $this->session->userdata['logged_in']['s_telefono'];

   $campos = array(
       'US_nombres' => $param['US_nombres'],
       'US_apellidos' => $param['US_apellidos'],
       'US_telefono' => $param['US_telefono']  
       ) ;
       $this->db->where('US_usuario',$this->session->userdata['logged_in']['s_usuario']);
       $this->db->update('pt_us_usuarios',$campos);
       
       

       return 1;
}

}

?>