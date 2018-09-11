<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <br>
            <h2 style="text-align:center;"><i class="fas fa-fw fa-calendar-alt"></i> Eventos proximos</h2>
            <br/>
              <input type="text" name="busqueda_proximos" id="busqueda_proximos" class="form-control" placeholder="Buscar un evento proximo" />
           <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombre del evento</th>
                    <th>Fecha</th>
                    <th>Grupo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="datos_proximos">
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
<script src="<?php echo base_url('assets/style/js/buscadores/colaborador/buscar_eproximos_cl.js');?>"></script>
