<?php

if (!isset($_SESSION['usuario'])) {
    header("location: ../../login.php");
}
else{
    $usuario = $_SESSION['usuario'];

}

$id_depto=$_SESSION['depto'];
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="menu.php">Fundación Tesak</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
          <a class="nav-link" href="menu.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Grupos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">Grupos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="agregargrupo.php">Agregar grupo</a>
            </li>
            <li>
              <a href="vergrupo.php">Ver grupos</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuario">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Usuario</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="agregarusuario.php">Agregar usuario</a>
            </li>
            <li>
              <a href="verusuarios.php">Ver usuarios</a>
            </li>
          </ul>
        </li>
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Eventos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar-o"></i>
            <span class="nav-link-text">Eventos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="agregarevento.php">Agregar evento</a>
            </li>
            <li>
              <a href="eventos_proximos.php">Eventos proximos</a>
            </li>
          </ul>

        </li>


<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Eventos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#grupos" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar-o"></i>
            <span class="nav-link-text">Reportes</span>
          </a>
          <ul class="sidenav-second-level collapse" id="grupos">
          <li>
              <a href="asistencia_grupal.php">Asistencia de grupos</a>
            </li>
        
            <li>
              <a href="eventos_realizados.php">Eventos realizados</a>
            </li>
          </ul>
        </li>



         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estadisticas">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#graficos" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Estadisticas</span>
          </a>
          <ul class="sidenav-second-level collapse" id="graficos">
           
            <li>
            <a href="grupo.php">Asistencia grupal</a>
            </li>
            <li>
            <a href="graficadepartamento.php?id=<?php echo $id_depto ?>">Asistencia departamento</a>
            </li>
        </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="dropdown nav-item">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo "<strong> $usuario </strong>";  ?>
            <i class="fa fa-fw fa-user"></i>
          </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="messagesDropdown">
              <li><a class="dropdown-item text-light" style="padding-left:0;"href="../controller/salir.php"><i class="fa fa-fw fa-exchange"></i> Cambiar contraseña</a></li>
              <li><a class="dropdown-item text-light" style="padding-left:0;"href="../controller/salir.php"><i class="fa fa-fw fa-sign-out"></i> Cerrar Sesión</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </nav>