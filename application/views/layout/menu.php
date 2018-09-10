  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-address-card"></i> Información del usuario</h3></div>
        <div class="card-body">
          <br>
            <div class="form-group" style="text-align:center;">
                  <p>Nombre de usuario:<strong> <?php echo $this->session->userdata('usuario');  ?></strong></p>
                  <p>Teléfono: <strong><?php echo $this->session->userdata('telefono');  ?></strong></p>
                  <p>Correo electrónico: <strong><?php echo $this->session->userdata('correo');  ?></strong> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
