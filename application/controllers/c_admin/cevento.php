<?php
class Cevento extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin/mevento');
    $this->load->model('m_admin/mgrupo');
    $this->load->model('m_admin/mdept');
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

  public function v_buscarEventosRealizados()//Vista buscar grupo
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['error'] = '';
      $datos['title'] = 'Eventos realizados | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('admin/eventos_realizados',$datos);
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
      $n['id_evento3'] = $id_evento;
      $n['id_grupo3'] = $id_grupo;

      $this->session->set_userdata($n);
      $datos['e1'] = $id_evento;
      $datos['g11'] = $id_grupo;
      $datos['error'] = '';
      $titulo['title'] = 'Lista de asistencia | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('admin/lista_asistencia',$datos);
    }
  }

  public function v_reporteGeneral()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id', TRUE);
      $datos['resultados1'] = $this->mevento->reporteGeneralConsulta1($id_grupo);
      $datos['resultados2'] = $this->mevento->reporteGeneralConsulta2($id_grupo);
      $titulo['title'] = 'Reporte general | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('admin/reporte_general',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_asistenciaGrupal()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $titulo['title'] = 'Asistencia grupal | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('admin/asistencia_grupal');
      $this->load->view('layout/scripting');
    }
  }

  public function v_actualizarEventoRealizado()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_evento = $this->input->get('id',TRUE);
      $g['e_realizado_id'] = $id_evento;
      $this->session->set_userdata($g);
      $datos['actualizar'] = $this->mevento->consultarEventoRealizado($id_evento);
      $datos['g_consulta1'] = $this->mgrupo->consultarGrupo();
      $titulo['title'] = 'Actualizar evento realizado | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('admin/actualizar_evento',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_buscarAsistenciaReporte()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $n['id_g_asistencia'] = $this->input->get('id', TRUE);
      $n['id_e_asistencia'] = $this->input->get('e', TRUE);
      $this->session->set_userdata($n);
      $datos['title'] = 'Listado de asistencia | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('admin/reporte_asistencia',$datos);
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
      $id_evento = $this->session->userdata('id_evento3');


      if($this->session->userdata('asistencia_id') > 0)
      {
        foreach($resultados as $filas)
        {
              $salida .='
              <tr id="tr-'.$filas->id_alumno.'">
                      <td>'.$filas->alumno_nombre.' '.$filas->alumno_apellido.'</td>
                      <td>'.$filas->grupo.'</td>
                      <td>'.$filas->departamento.'</td>
                      <td>
                        <button class="insertaa btn btn-success btn-md"  data-id="'.$filas->id_alumno.'" data-evento="'.$id_evento.'" ><i class="fas fa-check"></i></button>
                        <button class="insertab btn btn-danger btn-md" data-id="'.$filas->id_alumno.'"  data-evento="'.$id_evento.'"><i class="fas fa-times"></i></button>
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

  public function asistencia()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $arreglo['alumno_id1'] = $this->input->post('id');
      $arreglo['evento_id1'] = $this->input->post('evento');
      $arreglo['asistencia1'] = $this->input->post('asistente');

      $this->mevento->asistenciaConsulta($arreglo);

      $cuenta = $this->session->userdata('casistencia_id');

      if($cuenta > 0)
      {
        echo 'true';
      }
      else
      {
        echo 'false';
      }
    }

  }

  public function eventoRealizado()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_evento = $this->input->post('id');

      $this->mevento->eventoRealizadoConsulta($id_evento);

      $cuenta = $this->session->userdata('casistencia_id');

      if($cuenta > 0)
      {
        echo 'true';
      }
      else
      {
        echo 'false';
      }
    }

  }

  public function buscarAsistenciaGrupal()
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
      $resultados = $this->mevento->buscarAsistenciaGrupal($busqueda);

      if($this->session->userdata('grupal_id') > 0)
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
                        <a href="v_reporteGeneral?id='.$filas->id_grupo.' " class="btn btn-primary btn-md"><i class="fas fa-list-ul"></i></a>
                      </td>
             </tr>


              ';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="5">No hay resultados en su busqueda.</td>
       </tr>';
      }

      echo $salida;
    }

  }

  public function buscarEventoRealizado()
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
      $resultados = $this->mevento->buscarEventoRealizadoConsulta($busqueda);

      if($this->session->userdata('realizado_id') > 0)
      {
        foreach($resultados as $filas)
        {
              $salida .='
              <tr>
                      <td>'.$filas->evento_nombre.'</td>
                      <td>'.date("d/m/Y",strtotime($filas->fecha)).'</td>
                      <td>'.$filas->grupo.'</td>
                      <td>
                        <a href="reiniciarAsistencia?id='.$filas->id_evento.'" class="btn btn-danger btn-md"><i class="fas fa-undo"></i></a>
                        <a href="v_actualizarEventoRealizado?id='.$filas->id_evento.'" class="btn btn-success btn-md"><i class="far fa-edit"></i></a>
                        <a href="v_buscarAsistenciaReporte?id='.$filas->id_grupo.'&e='.$filas->id_evento.'" class="btn btn-primary btn-md"><i class="fas fa-list-ul"></i></a>
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

  public function reiniciarAsistencia()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_evento = $this->input->get('id', TRUE);

      $bandera1 = $this->mevento->borrarAsistencia($id_evento);

      $bandera2 = $this->mevento->updateEstadoEvento($id_evento);

      if($bandera1 = true & $bandera2 = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('admin/eventos_realizados',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('admin/eventos_realizados',$datos);
        $this->load->view('layout/scripting');
      }
    }

  }

  public function actualizarEventoRealizado()
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
      $arreglo['grupo'] = $this->input->post('grupo');

      $bandera = $this->mevento->actualizarEventoRealizado($arreglo);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('admin/eventos_realizados',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('admin/eventos_realizados',$datos);
        $this->load->view('layout/scripting');
      }
    }
  }

  public function buscarReporteAsistencia()
  {
    $salida="";
    $busqueda = $this->input->post('consulta');
    $id_evento = $this->session->userdata('id_e_asistencia');
    $resultados = $this->mevento->buscarReporteAsistencia($busqueda, $id_evento);
    $boton="";
    if($this->session->userdata('reporte_asistencia1_id') > 0)
    {
      foreach($resultados as $filas)
      {
        if($filas->asistencia == 1 )
        {
          $boton ='<button class="btn btn-success btn-md" ><i class="fas fa-check"></i></button>';
        }
        else
        {
           $boton ='<button class="btn btn-danger btn-md" ><i class="fas fa-times"></i></button>';
        }
            $salida .='
            <tr>
              <td>'.$filas->alumno_nombre.' '.$filas->alumno_apellido.'</td>
              <td>'.$filas->grupo.'</td>
              <td>'.$filas->dept_alumno.'</td>
              <td>'.$boton.'</td>
           </tr>';


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
 ?>
