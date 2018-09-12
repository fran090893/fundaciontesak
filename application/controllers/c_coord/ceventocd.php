<?php
class Ceventocd extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_coord/meventocd');
    $this->load->model('m_coord/mgrupocd');
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
      $datos['grupos'] = $this->mgrupocd->consultarGrupo();
      $datos['error'] = '';
      $datos['title'] = 'Agregar evento | Fundación Tesak';
      $this->load->view('layout/header', $datos);
      $this->load->view('coord/agregar_evento',$datos);
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
      $this->load->view('coord/eventos_proximos',$datos);
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
      $this->load->view('coord/eventos_realizados',$datos);
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
      $this->load->view('coord/lista_asistencia',$datos);
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
      $datos['resultados1'] = $this->meventocd->reporteGeneralConsulta1($id_grupo);
      $datos['resultados2'] = $this->meventocd->reporteGeneralConsulta2($id_grupo);
      $titulo['title'] = 'Reporte general | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('coord/reporte_general',$datos);
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
      $this->load->view('coord/asistencia_grupal');
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
      $id_grupo = $this->input->get('g', TRUE);
      $g['e_realizado_id'] = $id_evento;
      $g['e_realizado_id_cd'] = $id_grupo;
      $this->session->set_userdata($g);
      $datos['actualizar'] = $this->meventocd->consultarEventoRealizado($id_evento);
      $datos['g_consulta1'] = $this->mgrupocd->consultarGrupo();
      $titulo['title'] = 'Actualizar evento realizado | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('coord/actualizar_evento',$datos);
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
      $id_grupo = $this->input->get('id',TRUE);
      $id_evento = $this->input->get('e', TRUE);
      $datos['e1'] = $id_evento;
      $datos['g11'] = $id_grupo;
      $n['id_g_asistencia'] = $this->input->get('id', TRUE);
      $n['id_e_asistencia'] = $this->input->get('e', TRUE);
      $this->session->set_userdata($n);
      $titulo['title'] = 'Listado de asistencia | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('coord/reporte_asistencia',$datos);
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
      $resultados = $this->meventocd->buscarAsistencia($busqueda);
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
                        <button class="insertaa btn btn-success btn-md"  data-id="'.$filas->id_alumno.'" data-evento="'.$id_evento.'" title="Asistio" ><i class="fas fa-check"></i></button>
                        <button class="insertab btn btn-danger btn-md" data-id="'.$filas->id_alumno.'"  data-evento="'.$id_evento.'" title="No asistio"><i class="fas fa-times"></i></button>
                      </td>
             </tr>';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="4">No hay resultados en su búsqueda.</td>
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
      $resultados = $this->meventocd->buscarEventoProximo($busqueda);

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
                        <a href="v_buscarAsistencia?id='.$filas->id_grupo.'&e='.$filas->id_evento.'" title="Listado de alumnos" class="btn btn-primary btn-md"><i class="fas fa-list-ul"></i></a>
                      </td>
             </tr>
              ';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="4">No hay resultados en su búsqueda.</td>
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

        $bandera = $this->meventocd->agregarEvento($arreglo);

        if($bandera = true)
        {
          $datos['grupos'] = $this->mgrupocd->consultarGrupo();
          $datos['error'] = 'n';
          $datos['title'] = 'Agregar evento | Fundación Tesak';
          $this->load->view('layout/header', $datos);
          $this->load->view('coord/agregar_evento',$datos);
          $this->load->view('layout/scripting');
        }
        else
        {
          $datos['grupos'] = $this->mgrupocd->consultarGrupo();
          $datos['error'] = 's';
          $datos['title'] = 'Agregar evento | Fundación Tesak';
          $this->load->view('layout/header', $datos);
          $this->load->view('coord/agregar_evento',$datos);
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

      $bandera = $this->meventocd->asistenciaConsulta($arreglo);

      if($bandera = true)
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

      $bandera = $this->meventocd->eventoRealizadoConsulta($id_evento);

      if($bandera = true)
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
      $resultados = $this->meventocd->buscarAsistenciaGrupal($busqueda);

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
                        <a href="v_reporteGeneral?id='.$filas->id_grupo.' " class="btn btn-primary btn-md" title="Reporte de asistencia de alumnos"><i class="fas fa-clipboard-check"></i></a>
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
      $resultados = $this->meventocd->buscarEventoRealizadoConsulta($busqueda);

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
                        <a href="reiniciarAsistencia?id='.$filas->id_evento.'" class="btn btn-danger btn-md" title="Reiniciar asistencia del evento"><i class="fas fa-undo"></i></a>
                        <a href="v_actualizarEventoRealizado?id='.$filas->id_evento.'&g='.$filas->id_grupo.'" class="btn btn-success btn-md" title="Editar evento"><i class="far fa-edit"></i></a>
                        <a href="v_buscarAsistenciaReporte?id='.$filas->id_grupo.'&e='.$filas->id_evento.'" class="btn btn-primary btn-md" title="Ver listado de asistencia"><i class="fas fa-list-ul"></i></a>
                      </td>
             </tr>


              ';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="4">No hay resultados en su búsqueda.</td>
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

      $bandera1 = $this->meventocd->borrarAsistencia($id_evento);

      $bandera2 = $this->meventocd->updateEstadoEvento($id_evento);

      if($bandera1 = true & $bandera2 = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/eventos_realizados',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/eventos_realizados',$datos);
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
      $arreglo['grupo'] = $this->session->userdata('e_realizado_id_cd');

      $bandera = $this->meventocd->actualizarEventoRealizado($arreglo);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/eventos_realizados',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Eventos realizados | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('coord/eventos_realizados',$datos);
        $this->load->view('layout/scripting');
      }
    }
  }

  public function buscarReporteAsistencia()
  {
    $salida="";
    $busqueda = $this->input->post('consulta');
    $id_evento = $this->session->userdata('id_e_asistencia');
    $resultados = $this->meventocd->buscarReporteAsistencia($busqueda, $id_evento);
    $boton="";
    if($this->session->userdata('reporte_asistencia1_id') > 0)
    {
      foreach($resultados as $filas)
      {
        if($filas->asistencia == 1 )
        {
          $boton ='<button class="btn btn-success btn-md" title="Asistio" ><i class="fas fa-check"></i></button>';
        }
        else
        {
           $boton ='<button class="btn btn-danger btn-md" title="No asistio" ><i class="fas fa-times"></i></button>';
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
      <td colspan="4">No hay resultados en su búsqueda.</td>
     </tr>';
    }

    echo $salida;
  }

  public function imprimirLista()
  {
    $this->load->library('pdf');
    $id_grupo = $this->input->get('id', TRUE);
    $id_evento = $this->input->get('e', TRUE);

    $resultados1 = $this->meventocd->imprimirListaConsulta1($id_grupo, $id_evento);
    $resultados2 = $this->meventocd->imprimirListaConsulta2($id_grupo, $id_evento);

    $this->pdf = new Pdf();

    $this->pdf->AddPage();
    $this->pdf->SetFillColor(232,232,232);
    $this->pdf->SetFont('Arial','B',11);
    $this->pdf->SetTitle("Imprimir | Lista de asistencia");

    foreach($resultados1 as $datos)
    {
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8, utf8_decode('Departamento: '.$datos->departamento_nombre));
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8, utf8_decode('Evento: '.$datos->evento_nombre),0,1,'');
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8,utf8_decode('Grupo: '.$datos->grupo_nombre),0,1,'');
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8,utf8_decode('Encargado de grupo: '.$datos->grupo_encargado),0,0,'');
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8, 'Fecha: '.date("d/m/Y",strtotime($datos->fecha)),0,1,'');
      $this->pdf->Ln(7);
    }



    $x = 1;
    $this->pdf->Cell(14);
    $this->pdf->Cell(15,6,'Nro.',1,0,'C',1);
    $this->pdf->Cell(50,6,'Apellidos',1,0,'C',1);
    $this->pdf->Cell(50,6,'Nombres',1,0,'C',1);
    $this->pdf->Cell(50,6,'Sexo',1,1,'C',1);

    foreach ($resultados2 as $tabla)
    {
      /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */

      $this->pdf->SetFont('Arial','',11);
      $this->pdf->SetFillColor(255,255,255);
      $this->pdf->Cell(14);
      $this->pdf->Cell(15,6,$x++,1,0,'C',1);

      $this->pdf->Cell(50,6,utf8_decode($tabla->alumno_apellido),1,0,'C',1);
      $this->pdf->Cell(50,6,utf8_decode($tabla->alumno_nombre),1,0,'C',1);
      $this->pdf->Cell(50,6,utf8_decode($tabla->alumno_sexo),1,0,'C',1);

      $this->pdf->Ln(5);
    }


    $this->pdf->Output("Lista de alumnos Feexpt.pdf", 'I');
  }

  public function imprimirLista2()
  {
    $this->load->library('pdf');
    $id_grupo = $this->input->get('id', TRUE);
    $id_evento = $this->input->get('e', TRUE);

    $resultados1 = $this->meventocd->imprimirListaConsulta1($id_grupo, $id_evento);
    $resultados3 = $this->meventocd->imprimirListaConsulta3($id_evento);

    $this->pdf = new Pdf();

    $this->pdf->AddPage();
    $this->pdf->SetFillColor(232,232,232);
    $this->pdf->SetFont('Arial','B',11);
    $this->pdf->SetTitle("Imprimir | Lista de asistencia");

    foreach($resultados1 as $datos)
    {
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8, utf8_decode('Departamento: '.$datos->departamento_nombre));
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8, utf8_decode('Evento: '.$datos->evento_nombre),0,1,'');
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8,utf8_decode('Grupo: '.$datos->grupo_nombre),0,1,'');
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8,utf8_decode('Encargado de grupo: '.$datos->grupo_encargado),0,0,'');
      $this->pdf->Cell(6);
      $this->pdf->Cell(120,8, 'Fecha: '.date("d/m/Y",strtotime($datos->fecha)),0,1,'');
      $this->pdf->Ln(7);
    }



    $x = 1;
    $this->pdf->Cell(14);
    $this->pdf->Cell(15,6,'Nro.',1,0,'C',1);
    $this->pdf->Cell(50,6,'Apellidos',1,0,'C',1);
    $this->pdf->Cell(50,6,'Nombres',1,0,'C',1);
    $this->pdf->Cell(50,6,'Asistencia',1,1,'C',1);

    foreach ($resultados3 as $tabla)
    {
      /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */

      $this->pdf->SetFont('Arial','',11);
      $this->pdf->SetFillColor(255,255,255);
      $this->pdf->Cell(14);
      $this->pdf->Cell(15,6,$x++,1,0,'C',1);

      $this->pdf->Cell(50,6,utf8_decode($tabla->alumno_apellido),1,0,'C',1);
      $this->pdf->Cell(50,6,utf8_decode($tabla->alumno_nombre),1,0,'C',1);
      if($tabla->asistencia == 1)
      {
        $this->pdf->Cell(50,6,'Presente',1,0,'C',1);
      }
      else if($tabla->asistencia == 0)
      {
        $this->pdf->Cell(50,6,'Ausente',1,0,'C',1);
      }

      $this->pdf->Ln(5);
    }


    $this->pdf->Output("Lista de alumnos Feexpt.pdf", 'I');
  }



}
 ?>
