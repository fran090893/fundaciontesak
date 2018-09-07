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
            <h2 style="text-align:center;"><i class="fas fa-fw fa-calendar-alt"></i> Eventos realizados</h2>
          <br/>
            <input type="text" name="busqueda_eventos_r" id="busqueda_eventos_r" class="form-control" placeholder="Buscar un evento realizado"/>
         <br>
         <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombre del evento</th>
                    <th>Fecha del evento</th>
                    <th>Grupo asignado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="datos_eventos_r">
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
<script src="<?php echo base_url('assets/style/js/buscadores/admin/buscar_erealizados.js');?>"></script>
