<?php

class Cgrupocd extends  CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_coord/mgrupocd');
  }

  public function v_agregarGrupo()//Vista agregar grupo
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['error'] = '';
      $datos['title'] = 'Agregar grupo | Fundación Tesak';
      $this->load->view('layout/header', $datos);
      $this->load->view('coord/agregar_grupo',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_actualizarGrupo()//Vista actualizar grupo
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id',TRUE);
      $g['id'] = $id_grupo;
      $this->session->set_userdata($g);
      $datos['actualizar'] = $this->mgrupocd->idGrupo($id_grupo);
      $titulo['title'] = 'Actualizar grupo | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('coord/actualizar_grupo',$datos);
      $this->load->view('layout/scripting');
    }
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
      $this->load->view('coord/ver_grupo',$datos);
      $this->load->view('layout/scripting');

    }
  }

  public function actualizarGrupo()//Actualizr grupo a la BDD
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $arreglo['nombre_grupo'] = $this->input->post('nombre_grupo');
      $arreglo['descripcion_grupo'] = $this->input->post('descripcion_grupo');
      $arreglo['direccion_grupo'] = $this->input->post('direccion_grupo');
      $arreglo['municipio_grupo'] = $this->input->post('municipio_grupo');
      $arreglo['telefono_grupo'] = $this->input->post('telefono_grupo');
      $arreglo['encargado_grupo'] = $this->input->post('encargado_grupo');
      $arreglo['celular_grupo'] = $this->input->post('celular_grupo');
      $arreglo['dept'] = $this->session->userdata('departamento');

      $bandera = $this->mgrupocd->actualizarGrupo($arreglo);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Grupos disponibles | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/ver_grupo',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Grupos disponibles | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/ver_grupo',$datos);
        $this->load->view('layout/scripting');
      }
    }
  }


  public function agregarGrupo()//Agregar grupo a la BDD
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $arreglo['nombre_grupo'] = $this->input->post('nombre_grupo');
      $arreglo['descripcion_grupo'] = $this->input->post('descripcion_grupo');
      $arreglo['direccion_grupo'] = $this->input->post('direccion_grupo');
      $arreglo['municipio_grupo'] = $this->input->post('municipio_grupo');
      $arreglo['telefono_grupo'] = $this->input->post('telefono_grupo');
      $arreglo['encargado_grupo'] = $this->input->post('encargado_grupo');
      $arreglo['celular_grupo'] = $this->input->post('celular_grupo');
      $arreglo['dept'] = $this->session->userdata('departamento');

      $bandera = $this->mgrupocd->agregarGrupo($arreglo);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Agregar grupo | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('coord/agregar_grupo',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Agregar grupo | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('coord/agregar_grupo',$datos);
        $this->load->view('layout/scripting');
      }
    }
  }

  public function eliminarGrupo()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id', TRUE);
      $bandera = $this->mgrupocd->eliminarGrupom($id_grupo);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Grupos disponibles | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/ver_grupo',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Grupos disponibles | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/ver_grupo',$datos);
        $this->load->view('layout/scripting');
      }

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
     $resultados = $this->mgrupocd->buscarGrupo($busqueda);
     $lk = base_url('c_coord/calumnocd/v_lista_alumnos?id=');
     $lk1 = base_url('c_coord/calumnocd/v_agregarAlumno?id=');
     $lk2 = base_url('c_coord/calumnocd/v_agregarTabla?id=');

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
                       <a href="v_actualizarGrupo?id='.$filas->id_grupo.'" class="btn btn-success btn-md" title="Editar datos de un grupo"><i class="far fa-edit"></i></a>
                       <a href="eliminarGrupo?id='.$filas->id_grupo.'" class="confirmation btn btn-danger btn-md" title="Eliminar grupo"><i class="far fa-trash-alt"></i></a>
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
