<?php
class Cevento extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin/mevento');
    $this->load->model('m_admin/mgrupo');
  }

  public function v_agregarEvento()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['grupos'] = $this->mgrupo->consultarGrupo();
      $datos['error'] = '';
      $datos['title'] = 'Agregar evento | Fundación Tesak';
      $this->load->view('layout/header', $datos);
      $this->load->view('admin/agregar_evento',$datos);
      $this->load->view('layout/scripting');
    }

  }

  public function v_buscarEventosProximos()//Vista buscar grupo
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['error'] = '';
      $datos['title'] = 'Eventos proximos | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('admin/eventos_proximos',$datos);
      $this->load->view('layout/scripting');

    }
  }

  public function v_buscarAsistencia()//Vista buscar grupo
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id', TRUE);
      $id_evento = $this->input->get('e', TRUE);
      $n['id_evento1'] = $id_evento;
      $n['id_grupo3'] = $id_grupo;

      $this->session->set_userdata($n);
      $datos['e1'] = $id_evento;
      $datos['g11'] = $id_grupo
      $datos['error'] = '';
      $titulo['title'] = 'Lista de asistencia | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('admin/lista_asistencia',$datos);
      $this->load->view('layout/scripting');

    }
  }

  public function buscarAsistencia()
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
      $resultados = $this->mevento->buscarAsistencia($busqueda);

      if($this->session->userdata('asistencia_id') > 0)
      {
        foreach($resultados as $filas)
        {
              $salida .='
              <tr>
                      <td>'.$filas->alumno_nombre.' '.$filas->alumno_apellido.'</td>
                      <td>'.$filas->grupo.'</td>
                      <td>'.$filas->departamento.'</td>
                      <td>
                        <a  href="#" class="insertaa btn btn-success btn-md"  data-id="'.$filas->id_alumno.'" data-evento="'.$this->session->userdata('id_evento1').'" ><i class="fas fa-check"></i></a>
                        <a  href="#" class="insertab btn btn-danger btn-md" data-id="'.$filas->id_alumno.'"  data-evento="'.$this->session->userdata('id_evento1').'"><i class="fas fa-times"></i></a>
                      </td>
             </tr>
              ';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="4">No hay resultados en su busqueda.</td>
       </tr>';
      }

      echo $salida;
    }
  }

  public function buscarEventoProximo()
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
      $resultados = $this->mevento->buscarEventoProximo($busqueda);

      if($this->session->userdata('eventos_p_id') > 0)
      {
        foreach($resultados as $filas)
        {
              $salida .='
              <tr>
                      <td>'.$filas->evento_nombre.'</td>
                      <td>'.date("d/m/Y",strtotime($filas->fecha)).'</td>
                      <td>'.$filas->grupo.'</td>
                      <td>
                        <a href="v_buscarAsistencia?id='.$filas->id_grupo.'&e='.$filas->id_evento.'" class="btn btn-info btn-md"><i class="fas fa-list-ul"></i></a>
                      </td>
             </tr>
              ';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="4">No hay resultados en su busqueda.</td>
       </tr>';
      }

      echo $salida;
    }
  }

  public function agregarEvento()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
        $arreglo['nombre_evento'] = $this->input->post('nombre_evento');
        $arreglo['descripcion_evento'] = $this->input->post('descripcion_evento');
        $arreglo['fecha'] = $this->input->post('fecha');
        $arreglo['grupo'] = $this->input->post('grupo');
        $arreglo['estado'] = '0';

        $bandera = $this->mevento->agregarEvento($arreglo);

        if($bandera = true)
        {
          $datos['grupos'] = $this->mgrupo->consultarGrupo();
          $datos['error'] = 'n';
          $datos['title'] = 'Agregar evento | Fundación Tesak';
          $this->load->view('layout/header', $datos);
          $this->load->view('admin/agregar_evento',$datos);
          $this->load->view('layout/scripting');
        }
        else
        {
          $datos['grupos'] = $this->mgrupo->consultarGrupo();
          $datos['error'] = 's';
          $datos['title'] = 'Agregar evento | Fundación Tesak';
          $this->load->view('layout/header', $datos);
          $this->load->view('admin/agregar_evento',$datos);
          $this->load->view('layout/scripting');
        }
    }
  }
}
 ?>
