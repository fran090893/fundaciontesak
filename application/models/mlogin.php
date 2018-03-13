<?php
class mlogin extends CI_model
{
    public function ingresar($usu,$pass){


        try { 
            $this->db->select('u.US_id, u.US_nombres, u.US_apellidos, u.US_telefono, u.US_usuario, u.US_password, u.US_cargo, d.DE_nombre');
        $this->db->from('pt_us_usuarios u');
        $this->db->join('pt_de_departamentos d','u.US_departamento=d.DE_id');
        $this->db->where('u.US_usuario',$usu);
        $this->db->where('u.US_password',$pass);
        $resultado = $this->db->get();
         } catch (mysqli_sql_exception $e) { 
            throw $e; 
         } 
       
       
        if($resultado->num_rows() == 1){
            $r = $resultado->row();
            $s_usuario = array(
                's_idusuario' => $r->US_id,                
                's_nombre' => $r->US_nombres,
                's_apellido' => $r->US_apellidos,                 
                's_telefono' => $r->US_telefono, 
                's_usuario' => $r->US_usuario,
                's_cargo' => $r->US_cargo,
                's_departamento' => $r->DE_nombre

            );
            

            $this->session->set_userdata($s_usuario);
            return 1;
        }else{
            return 0;
        }
        
    
    }
}