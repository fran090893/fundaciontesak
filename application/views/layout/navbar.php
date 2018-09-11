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
        <?php
        //Grupos
        $lk_agregarg_ad = base_url('c_admin/cgrupo/v_agregarGrupo');
        $lk_verg_ad = base_url('c_admin/cgrupo/v_buscarGrupo');
        $lk_agregarg_cd = base_url('c_coord/cgrupocd/v_agregarGrupo');
        $lk_verg_cd = base_url('c_coord/cgrupocd/v_buscarGrupo');
        $lk_verg_cl = base_url('c_colaborador/cgrupocl/v_buscarGrupo');

        if($this->session->userdata('cargo') == 1)
        {
          echo '
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Grupos</span>
            </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item" href="'.$lk_agregarg_ad.'">Agregar grupo</a>
                  <a class="dropdown-item" href="'.$lk_verg_ad.'">Ver grupos</a>
                </div>
          </li>

                ';
        }
        else if($this->session->userdata('cargo') == 2)
        {
          echo '
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Grupos</span>
            </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item" href="'.$lk_agregarg_cd.'">Agregar grupo</a>
                  <a class="dropdown-item" href="'.$lk_verg_cd.'">Ver grupos</a>
                </div>
              </li>
                ';

        }
        else if($this->session->userdata('cargo') == 3)
        {
          echo'
          <li class="nav-item">
            <a class="nav-link" href="'.$lk_verg_cl.'">
              <i class="fas fa-fw fa-graduation-cap"></i>
              <span>Ver grupos</span>
            </a>
          </li>
          ';
        }
        ?>

        <?php
        //Usuarios
        $lk_agregaru_ad = base_url('c_admin/cusuario/v_agregarUser');
        $lk_veru_ad = base_url('c_admin/cusuario/v_buscarUsuarios');
        $lk_agregaru_cd = base_url('c_coord/cusuariocd/v_agregarUser');
        $lk_veru_cd = base_url('c_coord/cusuariocd/v_buscarUsuarios');

        if($this->session->userdata('cargo') == 1)
        {
          echo '
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-users"></i>
                <span>Usuarios</span>
            </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item" href="'.$lk_agregaru_ad.'">Agregar usuario</a>
                  <a class="dropdown-item" href="'.$lk_veru_ad.'">Ver usuarios</a>
                </div>
              </li>

                ';
        }
        else if($this->session->userdata('cargo') == 2)
        {
          echo '
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-users"></i>
                <span>Usuarios</span>
            </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item" href="'.$lk_agregaru_cd.'">Agregar usuario</a>
                  <a class="dropdown-item" href="'.$lk_veru_cd.'">Ver usuarios</a>
                </div>
              </li>
                ';

        }
        ?>
        <?php
        //Departamentos
        $lk_agregardept_ad = base_url('c_admin/cdept/v_agregarDept');
        $lk_verdept_ad = base_url('c_admin/cdept/v_verDept');
        if($this->session->userdata('cargo') == 1)
        {
          echo '
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-building"></i>
              <span>Departamentos</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <a class="dropdown-item" href="'.$lk_agregardept_ad.'">Agregar departamento</a>
              <a class="dropdown-item" href="'.$lk_verdept_ad.'">Ver departamento</a>
            </div>
          </li>';
        }
    ?>
    <?php
    //Eventos
    $lk_agregare_ad = base_url('c_admin/cevento/v_agregarEvento');
    $lk_proximose_ad = base_url('c_admin/cevento/v_buscarEventosProximos');
    $lk_agregare_cd = base_url('c_coord/ceventocd/v_agregarEvento');
    $lk_proximose_cd = base_url('c_coord/ceventocd/v_buscarEventosProximos');
    $lk_realizadoe_cl = base_url('c_colaborador/ceventocl/v_buscarEventosRealizados');
    $lk_proximose_cl = base_url('c_colaborador/ceventocl/v_buscarEventosProximos');

    if($this->session->userdata('cargo') == 1)
    {
      echo '
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Eventos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="'.$lk_agregare_ad.'">Agregar evento</a>
          <a class="dropdown-item" href="'.$lk_proximose_ad.'">Eventos proximos</a>
        </div>
      </li>

            ';
    }
    else if($this->session->userdata('cargo') == 2)
    {
      echo '
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Eventos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="'.$lk_agregare_cd.'">Agregar evento</a>
          <a class="dropdown-item" href="'.$lk_proximose_cd.'">Eventos proximos</a>
        </div>
      </li>
            ';

    }
    else if($this->session->userdata('cargo') == 3)
    {
      echo'
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Eventos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="'.$lk_proximose_cl.'">Eventos proximos</a>
          <a class="dropdown-item" href="'.$lk_realizadoe_cl.'">Eventos realizados</a>
        </div>
      </li>
      ';
    }

     ?>

     <?php
     //Reportes
     $lk_asistenciag_ad = base_url('c_admin/cevento/v_asistenciaGrupal');
     $lk_erealizados_ad = base_url('c_admin/cevento/v_buscarEventosRealizados');
     $lk_asistenciag_cd = base_url('c_coord/ceventocd/v_asistenciaGrupal');
     $lk_erealizados_cd = base_url('c_coord/ceventocd/v_buscarEventosRealizados');
       if($this->session->userdata('cargo') == 1)
       {
         echo '
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-fw fa-book"></i>
             <span>Reportes</span>
           </a>
           <div class="dropdown-menu" aria-labelledby="pagesDropdown">
             <a class="dropdown-item" href="'.$lk_asistenciag_ad.'">Asistencia de grupos</a>
             <a class="dropdown-item" href="'.$lk_erealizados_ad.'">Eventos realizados</a>
           </div>
         </li>

               ';
       }
       else if($this->session->userdata('cargo') == 2)
       {
         echo '
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-fw fa-book"></i>
             <span>Reportes</span>
           </a>
           <div class="dropdown-menu" aria-labelledby="pagesDropdown">
             <a class="dropdown-item" href="'.$lk_asistenciag_cd.'">Asistencia de grupos</a>
             <a class="dropdown-item" href="'.$lk_erealizados_cd.'">Eventos realizados</a>
           </div>
         </li>
               ';

       }

     ?>
     <?php
     //Estadistica
     $lk_statsa_ad = base_url('c_admin/cestadistica/v_EstadisticaAnual');
     $lk_statsg_ad = base_url('c_admin/cestadistica/v_buscarEstadisticaGrupal');
     $lk_statsd_ad = base_url('c_admin/cestadistica/v_EstadisticaDept');
     $lk_statsg_cd = base_url('c_coord/cestadisticacd/v_buscarEstadisticaGrupal');
     $lk_statsd_cd = base_url('c_coord/cestadisticacd/v_EstadisticaDept');
       if($this->session->userdata('cargo') == 1)
       {
         echo '
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Estadísticas</span>
           </a>
           <div class="dropdown-menu" aria-labelledby="pagesDropdown">
             <a class="dropdown-item" href="'.$lk_statsa_ad.'">Asistencia anual</a>
             <a class="dropdown-item" href="'.$lk_statsg_ad.'">Asistencia grupal</a>
             <a class="dropdown-item" href="'.$lk_statsd_ad.'">Por departamento</a>
           </div>
         </li>

               ';
       }
       else if($this->session->userdata('cargo') == 2)
       {
         echo '
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Estadísticas</span>
           </a>
           <div class="dropdown-menu" aria-labelledby="pagesDropdown">
             <a class="dropdown-item" href="'.$lk_statsg_cd.'">Asistencia grupal</a>
             <a class="dropdown-item" href="'.$lk_statsd_cd.'">Por departamento</a>
           </div>
         </li>
               ';

       }
     ?>
  </ul>

  <div id="content-wrapper">

    <div class="container-fluid">
