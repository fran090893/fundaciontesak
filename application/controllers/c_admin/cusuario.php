<?php
class Cusuario extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin/musuario');
    $this->load->model('m_admin/mdept');
  }

  public function v_agregarUser()//Vista agregar usuario
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['depts'] = $this->mdept->consultarDept();
      $datos['cargos'] = $this->musuario->consultarCargos();
      $datos['error'] = '';
      $datos['title'] = 'Agregar usuario | Fundación Tesak';
      $this->load->view('layout/header', $datos);
      $this->load->view('admin/agregar_usuario',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_actualizarUsuario()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_usuario = $this->input->get('id',TRUE);
      $g['id_usuario1'] = $id_usuario;
      $this->session->set_userdata($g);
      $datos['actualizar1'] = $this->musuario->consultarUsuario($id_usuario);
      $datos['depts'] = $this->mdept->consultarDept();
      $datos['cargos'] = $this->musuario->consultarCargos();
      $datos['error'] = '';
      $titulo['title'] = 'Actualizar usuario | Fundación Tesak';
      $this->load->view('layout/header', $titulo);
      $this->load->view('admin/actualizar_usuario',$datos);
      $this->load->view('layout/scripting');
    }
  }

  public function v_buscarUsuarios()//Vista buscar usuario
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $datos['error'] = '';
      $datos['title'] = 'Usuarios disponibles | Fundación Tesak';
      $this->load->view('layout/header',$datos);
      $this->load->view('admin/ver_usuarios',$datos);
      $this->load->view('layout/scripting');

    }
  }

  public function agregarUsuario()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $arreglo['nombre_usuario'] = $this->input->post('nombre_usuario');
      $arreglo['apellido_usuario'] = $this->input->post('apellido_usuario');
      $arreglo['correo'] = $this->input->post('correo');
      $arreglo['telefono'] = $this->input->post('telefono');
      $arreglo['nombre_us'] = $this->input->post('nombre_us');
      $arreglo['contra_us'] = $this->input->post('contra_us');
      $arreglo['dept'] = $this->input->post('dept');
      $arreglo['cargo'] = $this->input->post('cargo');

      $bandera = $this->musuario->agregarUsuario($arreglo);

      if($bandera = true)
      {
        $datos['depts'] = $this->mdept->consultarDept();
        $datos['cargos'] = $this->musuario->consultarCargos();
        $datos['error'] = 'n';
        $datos['title'] = 'Agregar usuario | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('admin/agregar_usuario',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['depts'] = $this->mdept->consultarDept();
        $datos['cargos'] = $this->musuario->consultarCargos();
        $datos['error'] = 's';
        $datos['title'] = 'Agregar usuario | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('admin/agregar_usuario',$datos);
        $this->load->view('layout/scripting');
      }
    }
  }

  public function eliminarUsuario()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $id_usuario = $this->input->get('id', TRUE);

      $bandera = $this->musuario->eliminarUsuario($id_usuario);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Usuarios disponibles | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('admin/ver_usuarios',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Usuarios disponibles | Fundación Tesak';
        $this->load->view('layout/header', $datos);
        $this->load->view('admin/ver_usuarios',$datos);
        $this->load->view('layout/scripting');

      }


    }
  }

  public function actualizarUsuario()
  {
    if(!$this->session->userdata('usuario'))
    {
      $datos['error'] = '';
      $this->load->view('login',$datos);
    }
    else
    {
      $arreglo['nombre_usuario1'] = $this->input->post('nombre_usuario');
      $arreglo['apellido_usuario1'] = $this->input->post('apellido_usuario');
      $arreglo['correo1'] = $this->input->post('correo');
      $arreglo['telefono1'] = $this->input->post('telefono');
      $arreglo['nombre_us1'] = $this->input->post('nombre_us');
      $arreglo['contra_us1'] = $this->input->post('contra_us');
      $arreglo['dept1'] = $this->input->post('dept');
      $arreglo['cargo1'] = $this->input->post('cargo');

      $bandera = $this->musuario->actualizarUsuario($arreglo);

      if($bandera = true)
      {
        $datos['error'] = 'n';
        $datos['title'] = 'Usuarios disponibles | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('admin/ver_usuarios',$datos);
        $this->load->view('layout/scripting');
      }
      else
      {
        $datos['error'] = 's';
        $datos['title'] = 'Usuarios disponibles | Fundación Tesak';
        $this->load->view('layout/header',$datos);
        $this->load->view('admin/ver_usuarios',$datos);
        $this->load->view('layout/scripting');
      }
    }
  }

  public function buscarUsuarios()
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
      $resultados = $this->musuario->buscarUsuario($busqueda);

      if($this->session->userdata('usu') > 0)
      {
        foreach($resultados as $filas)
        {
              $salida .='
              <tr>
                      <td>'.$filas->usuario_nombre.' '.$filas->usuario_apellido.'</td>
                      <td>'.$filas->usuario.'</td>
                      <td>'.$filas->departamento.'</td>
                      <td>'.$filas->cargo.'</td>
                      <td>'.$filas->usuario_correo.'</td>
                      <td>'.$filas->usuario_telefono.'</td>
                      <td>
                        <a href="v_actualizarUsuario?id='.$filas->id_usuario.'" class="btn btn-success btn-md" ><i class="far fa-edit"></i></a>
                        <a href="eliminarUsuario?id='.$filas->id_usuario.'" class="btn btn-danger btn-md"><i class="far fa-trash-alt"></i></a>
                      </td>
             </tr>
              ';
         }

      }
      else
      {
        $salida .= '<tr>
        <td colspan="7">No hay resultados en su busqueda.</td>
       </tr>';
      }

      echo $salida;
    }
  }
}
 ?>
