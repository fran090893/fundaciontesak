<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

  <a href="<?php echo base_url('cinicio/menu');?>"><img src="<?php echo base_url('archivos/Feexpt.png');?>" class="img-fluid" /></a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#" >
    <i class="fas fa-bars"></i>
  </button>


  <!-- Navbar -->
  <ul class="navbar-nav  d-md-inline-block ml-auto">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle"  href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <button class="dropdown-item"><i class="fas fa-fw fa-user"></i> <?php echo $this->session->userdata('usuario');?></button>
        <a class="dropdown-item" href="<?php echo base_url('clogin/v_cambiarClave');?>"><i class="fas fa-fw fa-key"></i> Cambiar contraseña</a>
        <a class="dropdown-item" href="<?php echo base_url('csalir');?>"  ><i class="fas fa-fw fa-sign-out-alt"></i> Cerrar sesión</a>
      </div>
    </li>
  </ul>

</nav>

<div id="wrapper">


  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('cinicio/menu');?>">
        <i class="fas fa-fw fa-home"></i>
        <span>Inicio</span>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-graduation-cap"></i>
        <span>Grupos</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cgrupo/v_agregarGrupo');?>">Agregar grupo</a>
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cgrupo/v_buscarGrupo');?>">Ver grupos</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-users"></i>
        <span>Usuarios</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cusuario/v_agregarUser');?>">Agregar usuario</a>
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cusuario/v_buscarUsuarios');?>">Ver usuario</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-building"></i>
        <span>Departamentos</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cdept/v_agregarDept');?>">Agregar departamento</a>
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cdept/v_verDept');?>">Ver departamento</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Eventos</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cevento/v_agregarEvento');?>">Agregar evento</a>
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cevento/v_buscarEventosProximos');?>">Eventos proximos</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-book"></i>
        <span>Reportes</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cevento/v_asistenciaGrupal');?>">Asistencia de grupos</a>
        <a class="dropdown-item" href="<?php echo base_url('c_admin/cevento/v_buscarEventosRealizados');?>">Eventos realizados</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Estadisticas</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="login.html">Asistencia anual</a>
        <a class="dropdown-item" href="register.html">Asistencia grupal</a>
        <a class="dropdown-item" href="forgot-password.html">Por departamento</a>
      </div>
    </li>
  </ul>

  <div id="content-wrapper">

    <div class="container-fluid">
