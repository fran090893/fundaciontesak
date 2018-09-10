<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php

            if($error == 's')
            {
              echo'
                      <br>
                      <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                        <strong>¡Alerta! </strong> No se pudo realizar la operación solicitada.
                      </div>';
            }
            else
            {
                if($error == 'n')
                {
                  echo'
                          <br>
                          <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                            <strong>¡Exito! </strong> Operación realizada correctamente.
                          </div>';
                }
                else
                {
                  echo'';
                }
            }

            ?>
            <br>
            <h2 style="text-align:center;"><i class="fas fa-fw fa-users"></i> Usuarios disponibles</h2>
            <br/>
              <input type="text" name="busqueda_usuarios" id="busqueda_usuarios" class="form-control" placeholder="Buscar un usuario" />
           <br/>
           <div class="table-responsive">
             <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
               <thead>
                 <tr>
                   <th>Nombre completo</th>
                   <th>Usuario</th>
                   <th>Departamento</th>
                   <th>Cargo</th>
                   <th>Correo electrónico</th>
                   <th>Teléfono</th>
                   <th>Acciones</th>
                 </tr>
               </thead>
                <tbody id="datos_usuarios">
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var BASE_URL = "<?php echo base_url();?>";
</script>
<script src="<?php echo base_url('assets/style/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/style/js/buscadores/admin/buscar_usuario.js');?>"></script>
