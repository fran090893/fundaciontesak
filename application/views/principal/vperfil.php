<div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Perfil</h3>
          
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4><?php echo $this->session->userdata['logged_in']['s_nombre']." ".$this->session->userdata['logged_in']['s_apellido']; ?></h4>
                  <div class="follow-ava">
                    <img src="<?Php echo base_url();?>assets/img/profile-widget-avatar.jpg" alt="">
                  </div>
                  <h6><?php if ($this->session->userdata['logged_in']['s_cargo'] == 1) {
    echo "Administrador";
} elseif ($this->session->userdata['logged_in']['s_cargo'] == 2) {
    echo "Coordinador";
} elseif ($this->session->userdata['logged_in']['s_cargo'] == 3) {
    echo "Colaborador";
} ?></h6>
                </div>
             
              
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  
                  <li class="active">
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Perfil
                                      </a>
                  </li>
                  <li >
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Editar Perfil
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  
                  <!-- profile -->
                  <div id="profile" class="tab-pane active">
                    <section class="panel">
                      <div class="bio-graph-heading">
                      </div>
                      <div class="panel-body bio-graph-info">
                        <h1>Datos de la persona</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>Nombres</span>: <?php echo $this->session->userdata['logged_in']['s_nombre']?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Last Name </span>: <?php echo $this->session->userdata['logged_in']['s_apellido']?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Cargo </span>: <?php if ($this->session->userdata['logged_in']['s_cargo'] == 1) {
    echo "Administrador";
} elseif ($this->session->userdata['logged_in']['s_cargo'] == 2) {
    echo "Coordinador";
} elseif ($this->session->userdata['logged_in']['s_cargo'] == 3) {
    echo "Colaborador";
} ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Departamento </span>: <?php echo $this->session->userdata['logged_in']['s_departamento']?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Telefono </span>: <?php echo $this->session->userdata['logged_in']['s_telefono']?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Phone </span>: (+021) 956 789123</p>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Editar informacion</h1>
                        <form action="<?php echo base_url(); ?>cperfil/update_perfil" method="POST" class="form-horizontal" role="form">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nombres</label>
                            <div class="col-lg-6">
                              <input name="nombre" type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo $this->session->userdata['logged_in']['s_nombre']?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Apellidos</label>
                            <div class="col-lg-6">
                              <input name="apellido" type="text" class="form-control" id="l-name" placeholder=" "value="<?php echo $this->session->userdata['logged_in']['s_apellido']?>">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Telefono</label>
                            <div class="col-lg-6">
                              <input name="telefono" type="text" class="form-control" id="c-name" placeholder=" "value="<?php echo $this->session->userdata['logged_in']['s_telefono']?>">
                            </div>
                          </div>
                          
                         

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>