<?php

class Cgrupocl extends  CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_colaborador/Mgrupocl');
  }

  public function v_buscarGrupo()//Vista buscar grupo
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['error'] = '';
      $datos['title'] = 'Grupos disponibles | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('colaborador/ver_grupo',$datos);
      $this->load->view('layout/scripting');

    }
  }

 public function buscarGrupo() //Buscar grupo en la BDD
 {
   if(!$this->session->userdata('usuario'))
   {
     $datos['error'] = '';
     $this->load->view('login',$datos);
   }
   else
   {
     $salida="";
     $busqueda = $this->input->post('consulta');
     $resultados = $this->Mgrupocl->buscarGrupo($busqueda);
     $lk = base_url('c_colaborador/calumnocl/v_lista_alumnos?id=');
     $lk1 = base_url('c_colaborador/calumnocl/v_agregarAlumno?id=');
     $lk2 = base_url('c_colaborador/calumnocl/v_agregarTabla?id=');

     if($this->session->userdata('n') > 0)
     {
       foreach($resultados as $filas)
       {
             $salida .='
             <tr>
                     <td>'.$filas->grupo_nombre.'</td>
                     <td>'.$filas->grupo_encargado.'</td>
                     <td>'.$filas->telefonos.'</td>
                     <td>'.$filas->departamento_nombre.'</td>
                     <td>
                       <a href="'.$lk.''.$filas->id_grupo.'" class="btn btn-primary btn-md" title="Listado de alumnos"><i class="fas fa-list-ul"></i></a>
                     </td>
                     <td>
                       <a href="'.$lk2.''.$filas->id_grupo.'" class="btn btn-success btn-md" title="Agregar tabla de alumnos"><i class="far fa-file-excel"></i></a>
                       <a href="'.$lk1.''.$filas->id_grupo.'" class="btn btn-primary btn-md" title="Agregar un alumno al grupo"><i class="fas fa-user-plus"></i></a>
                     </td>
            </tr>
             ';
        }

     }
     else
     {
       $salida .= '<tr>
       <td colspan="6">No hay resultados en su búsqueda.</td>
      </tr>';
     }

     echo $salida;
   }

 }

}



?>
