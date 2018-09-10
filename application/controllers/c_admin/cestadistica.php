<?php
class Cestadistica extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin/mestadistica');
    $this->load->model('m_admin/mdept');
  }



  public function v_EstadisticaAnual()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['stats_r'] = $this->mestadistica->anualAsistenciaReal();
      $datos['stats_e'] = $this->mestadistica->anualAsistenciaEsperada();
      $titulo['title'] = "Estadística Anual | Fundación Tesak";
      $this->load->view('layout/header', $titulo);
      $this->load->view('admin/estadistica_anual',$datos);
      $this->load->view('layout/scripting');
    }
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
      $datos['stats_r'] = $this->mestadistica->grupalAsistenciaReal($id_grupo);
      $titulo['title'] = "Estadística Grupal | Fundación Tesak";
      $this->load->view('layout/header', $titulo);
      $this->load->view('admin/estadistica_grupal',$datos);
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
      $this->load->view('admin/v_grupal');
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
      $datos['lista_dept1'] = $this->mdept->consultarDept();
      $titulo['title'] = 'Estadística por departamento | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('admin/v_dept_stats',$datos);
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
      $datos['stats_r'] = $this->mestadistica->deptAsistenciaReal($id_dept);
      $titulo['title'] = "Estadística por departamento | Fundación Tesak";
      $this->load->view('layout/header', $titulo);
      $this->load->view('admin/estadistica_dept',$datos);
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
      $resultados = $this->mestadistica->buscarEstadisticaGrupal($busqueda);

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
