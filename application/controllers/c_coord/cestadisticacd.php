<?php
class Cestadisticacd extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_coord/Mestadisticacd');
    $this->load->model('m_admin/Mdept');
  }

  public function v_EstadisticaGrupal()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id', TRUE);
      $datos['stats_r'] = $this->Mestadisticacd->grupalAsistenciaReal($id_grupo);
      $titulo['title'] = "Estadística Grupal | Fundación Tesak";
      $this->load->view('layout/header', $titulo);
      $this->load->view('coord/estadistica_grupal',$datos);
      $this->load->view('layout/scripting');

    }
  }

  public function v_buscarEstadisticaGrupal()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $titulo['title'] = 'Estadistíca grupal | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('coord/v_grupal');
      $this->load->view('layout/scripting');
    }

  }

  public function v_EstadisticaDept()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_dept = $this->session->userdata('departamento');
      $datos['lista_dept1'] = $this->Mdept->consultarDeptID($id_dept);
      $titulo['title'] = 'Estadística por departamento | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('coord/v_dept_stats',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_statsDept()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_dept = $this->input->get('id', TRUE);
      $datos['stats_r'] = $this->Mestadisticacd->deptAsistenciaReal($id_dept);
      $titulo['title'] = "Estadística por departamento | Fundación Tesak";
      $this->load->view('layout/header', $titulo);
      $this->load->view('coord/estadistica_dept',$datos);
      $this->load->view('layout/scripting');

    }
  }

  public function buscarEstadisticaGrupal()
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
      $resultados = $this->Mestadisticacd->buscarEstadisticaGrupal($busqueda);

      if($this->session->userdata('estadistica_id') > 0)
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
                        <a href="v_EstadisticaGrupal?id='.$filas->id_grupo.' " class="btn btn-info btn-md" title="Estadistica de asistencia del grupo"><i class="fas fa-chart-area"></i></a>
                      </td>
             </tr>


              ';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="5">No hay resultados en su búsqueda.</td>
       </tr>';
      }

      echo $salida;
    }
  }

}
?>
