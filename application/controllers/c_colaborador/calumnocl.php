<?php
class Calumnocl extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_colaborador/malumnocl');
    $this->load->model('m_colaborador/mgrupocl');
  }

  public function v_lista_alumnos()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id',TRUE);
      $n['id_g'] = $id_grupo;
      $this->session->set_userdata($n);
      $datos['error'] = '';
      $datos['group'] = $this->mgrupocl->idGrupo($id_grupo);
      $titulo['title'] = 'Lista de alumnos | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('colaborador/lista_alumnos',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_agregarAlumno()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id',TRUE);
      $n['id_g1'] = $id_grupo;
      $this->session->set_userdata($n);
      $datos['error'] = '';
      $datos['group'] = $this->mgrupocl->idGrupo($id_grupo);
      $titulo['title'] = 'Lista de alumnos | Fundación Tesak';
      $this->load->view('layout/header',$titulo);
      $this->load->view('colaborador/agregar_alumno',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_actualizarAlumno()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_alumno = $this->input->get('id',TRUE);
      $g['id_alumno'] = $id_alumno;
      $this->session->set_userdata($g);
      $datos['actualizar'] = $this->malumnocl->consultarAlumnoID($id_alumno);
      $titulo['title'] = 'Actualizar alumno | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('colaborador/actualizar_alumno',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function buscarAlumno()
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
      $resultados = $this->malumnocl->buscarAlumno($busqueda);

      if($this->session->userdata('na') > 0)
      {
        foreach($resultados as $filas)
        {
              $salida .='
              <tr>
                      <td>'.$filas->alumno_nombre.' '.$filas->alumno_apellido.'</td>
                      <td>'.$filas->grupo.'</td>
                      <td>'.$filas->nombre_dept.'</td>
                      <td>
                        <a href="v_actualizarAlumno?id='.$filas->id_alumno.'" class="btn btn-success btn-md" title="Editar datos de un alumno"><i class="far fa-edit"></i></a>
                        <a href="eliminarAlumno?id='.$filas->id_alumno.'" class="btn btn-danger btn-md" title="Eliminar alumno"><i class="far fa-trash-alt"></i></a>
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

  public function agregarAlumno()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $arreglo['nombre_alumno'] = $this->input->post('nombre_alumno');
      $arreglo['apellido_alumno'] = $this->input->post('apellido_alumno');
      $arreglo['sexo'] = $this->input->post('sexo');
      $arreglo['fecha'] = $this->input->post('fecha');
      $arreglo['instituto'] = $this->input->post('instituto');

      $bandera = $this->malumnocl->agregarAlumno($arreglo);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Agregar alumno | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('colaborador/agregar_alumno',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Agregar alumno | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('colaborador/agregar_alumno',$datos);
        $this->load->view('layout/scripting');
      }
    }
  }

  public function actualizarAlumno()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $arreglo['nombre_alumno'] = $this->input->post('nombre_alumno');
      $arreglo['apellido_alumno'] = $this->input->post('apellido_alumno');
      $arreglo['sexo'] = $this->input->post('sexo');
      $arreglo['fecha'] = $this->input->post('fecha');
      $arreglo['instituto'] = $this->input->post('instituto');

      $bandera = $this->malumnocl->actualizarAlumno($arreglo);

      if($bandera = true)
      {
        redirect('c_colaborador/calumnocl/v_lista_alumnos?id='.$this->session->userdata('id_g').'');
      }
      else
      {
        redirect('c_colaborador/calumnocl/v_lista_alumnos?id='.$this->session->userdata('id_g').'');
      }
    }
  }

  public function eliminarAlumno()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_alumno = $this->input->get('id', TRUE);
      $bandera = $this->malumnocl->eliminarAlumno($id_alumno);

      if($bandera = true)
      {
        redirect('c_colaborador/calumnocl/v_lista_alumnos?id='.$this->session->userdata('id_g').'');
      }
      else
      {
        redirect('c_colaborador/calumnocl/v_lista_alumnos?id='.$this->session->userdata('id_g').'');
      }

    }
  }

  public function v_agregarTabla()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_grupo = $this->input->get('id', TRUE);
      $n['id_tabla1'] = $id_grupo;
      $this->session->set_userdata($n);
      $datos['error'] = '';
      $datos['title'] = 'Agregar tabla de alumnos | Fundación Tesak';
      $this->load->view('layout/header', $datos);
      $this->load->view('colaborador/agregar_tabla',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function agregarTablaAlumnos()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $this->load->library('excel');
      $config['upload_path']          = './archivos/tablas';
      $config['allowed_types']        = 'xls|csv|xlsx';
      $config['max_size']             = 100;
      $this->load->library('upload', $config);

      $this->upload->do_upload('archivo_excel');

      if (!$this->upload->do_upload('archivo_excel'))
      {
        $datos['error'] = 's';
        $datos['title'] = 'Agregar tabla de alumnos | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('colaborador/agregar_tabla',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $id_grupo = $this->session->userdata('id_tabla1');

      	$fecha1 = date('y-m-a');

        $nombreArchivo = $this->upload->data('full_path');

        $inputFileType = PHPEXCEL_IOFactory::identify($nombreArchivo);
        $objReader = PHPEXCEL_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($nombreArchivo);

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($i=2; $i <= $highestRow ; $i++)
        {
        	$arreglo['nombre'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        	$arreglo['apellido'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        	$arreglo['fecha'] = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        	$arreglo['sexo'] = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        	$arreglo['instituto'] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();

          $bandera = $this->malumnocl->agregarTablaConsulta($arreglo, $id_grupo);

          if ($bandera = true)
          {
            $datos['error'] = 'n';
            $datos['title'] = 'Agregar tabla de alumnos | Fundación Tesak';
            $this->load->view('layout/header', $datos);
            $this->load->view('colaborador/agregar_tabla',$datos);
            $this->load->view('layout/scripting');
          }
          else
          {
            $datos['error'] = 's';
            $datos['title'] = 'Agregar tabla de alumnos | Fundación Tesak';
            $this->load->view('layout/header', $datos);
            $this->load->view('colaborador/agregar_tabla',$datos);
            $this->load->view('layout/scripting');
          }
        }
      }
    }
  }

}

 ?>
