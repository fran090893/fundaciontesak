<?php
class Cdept extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin/Mdept');
  }

  public function v_agregarDept()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['error'] = '';
      $datos['title'] = 'Agregar departamento | Fundación Tesak';
      $this->load->view('layout/header', $datos);
      $this->load->view('admin/agregar_departamento',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_actualizarDept()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_dept = $this->input->get('id',TRUE);
      $g['id_dept1'] = $id_dept;
      $this->session->set_userdata($g);
      $datos['actualizar_dept'] = $this->Mdept->filaDept($id_dept);
      $datos['error'] = '';
      $titulo['title'] = 'Actualizar departamento | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('admin/actualizar_dept',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_verDept()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['lista_dept1'] = $this->Mdept->consultarDept();
      $datos['error'] = '';
      $datos['title'] = 'Departamentos disponibles | Fundación Tesak';
      $this->load->view('layout/header', $datos);
      $this->load->view('admin/ver_departamentos',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function agregarDept()
  {
      if(!$this->session->userdata('usuario'))
      {
        $datos['error'] = '';
        $this->load->view('login',$datos);
      }
      else
      {
          $arreglo['nombre_dept'] = $this->input->post('nombre_dept');
          $arreglo['descripcion_dept'] = $this->input->post('descripcion_dept');

          $bandera = $this->Mdept->agregarDept($arreglo);

          if($bandera = true)
          {
            $datos['error'] = 'n';
            $datos['title'] = 'Agregar departamento | Fundación Tesak';
            $this->load->view('layout/header', $datos);
            $this->load->view('admin/agregar_departamento',$datos);
            $this->load->view('layout/scripting');
          }
          else
          {
            $datos['error'] = 's';
            $datos['title'] = 'Agregar departamento | Fundación Tesak';
            $this->load->view('layout/header', $datos);
            $this->load->view('admin/agregar_departamento',$datos);
            $this->load->view('layout/scripting');
          }
      }
  }

  public function actualizarDept()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
        $arreglo['nombre_dept'] = $this->input->post('nombre_dept');
        $arreglo['descripcion_dept'] = $this->input->post('descripcion_dept');

        $bandera = $this->Mdept->actualizarDept($arreglo);

        if($bandera = true)
        {
          $datos['lista_dept1'] = $this->Mdept->consultarDept();
          $datos['error'] = 'n';
          $datos['title'] = 'Departamentos disponibles | Fundación Tesak';
          $this->load->view('layout/header', $datos);
          $this->load->view('admin/ver_departamentos',$datos);
          $this->load->view('layout/scripting');
        }
        else
        {
          $datos['lista_dept1'] = $this->Mdept->consultarDept();
          $datos['error'] = 's';
          $datos['title'] = 'Departamentos disponibles | Fundación Tesak';
          $this->load->view('layout/header', $datos);
          $this->load->view('admin/ver_departamentos',$datos);
          $this->load->view('layout/scripting');
        }
    }
  }
}
 ?>
