<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <br>
          <h2 style="text-align:center;"><i class="fas fa-chart-area"></i> Estadistíca por grupos</h2>
          <br/>
            <input type="text" name="busqueda_estadistica_grupal" id="busqueda_estadistica_grupal" class="form-control" placeholder="Buscar un grupo"></input>
         <br/>
         <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
              <thead>
                <tr>
                  <th>Nombre del grupo</th>
                  <th>Encargado</th>
                  <th>Teléfonos</th>
                  <th>Departamento</th>
                  <th>Estadística grupal</th>
                </tr>
              </thead>
              <tbody id="datos_estadistica_grupal">
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
<script src="<?php echo base_url('assets/style/js/buscadores/coord/buscar_stats_grupo_cd.js');?>"></script>
