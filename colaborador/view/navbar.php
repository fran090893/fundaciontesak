<?php

if (!isset($_SESSION['usuario'])) {
    header("location: ../../login.php");
}
else{
    $usuario = $_SESSION['usuario'];

}


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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
          <a class="nav-link" href="vergrupo.php">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">Ver grupo</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Eventos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar-o"></i>
            <span class="nav-link-text">Eventos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="eventos_proximos.php">Eventos proximos</a>
            </li>
            <li>
              <a href="eventos_realizados.php">Eventos realizados</a>
            </li>
          </ul>
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
