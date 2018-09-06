<div class="content-wrapper">
    <div class="container-fluid">
          <br>
          <a href="v_buscarEventosProximos" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
            <h2 style="text-align:center;"><i class="fa fa-users"></i> Listado de alumnos</h2>
              <br/>
                <input type="text" name="busqueda_asistencia" id="busqueda_asistencia" class="form-control" placeholder="Buscar un alumno" />
              <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Grupo</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="datos_asistencia">
                </tbody>
              </table>
            <div class="form-group" style="text-align:center;">
            <a  href="#" class="btn btn-info btn-md" ><i class="fas fa-print"></i>&nbsp; Imprimir lista</a>&nbsp;
            <button class="btn btn-success btn-md evento_realizado" data-id="<?php echo $e1; ?>"><i class="fas fa-clipboard-check"></i>&nbsp; Confirmar asistencia</a>
          </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";
  </script>
  <script src="<?php echo base_url('assets/style/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/style/js/buscadores/admin/lista_asistencia_buscar.js');?>"></script>
  <script src="<?php echo base_url('assets/style/js/buscadores/asistencia_sc.js');?>"></script>
