<div class="content-wrapper">
    <div class="container-fluid">
      <br>
        <a href="<?php echo base_url('c_colaborador/ceventocl/v_buscarEventosRealizados');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
      <div class="row">
        <div class="col-12">
          <br>
            <h2 style="text-align:center;"><i class="fas fa-users"></i> Listado de alumnos</h2>
          <br/>
          <input type="text" name="busqueda_asistencia_r" id="busqueda_asistencia_r" class="form-control" placeholder="Buscar un alumno" />
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Grupo</th>
                    <th>Departamento</th>
                    <th>Asistencia</th>
                  </tr>
                </thead>
                <tbody id="datos_asistencia_r">
                </tbody>
              </table>
            </div>
            <div class="form-group" style="text-align:center;">
              <a  href="#" class="btn btn-primary btn-md" ><i class="fas fa-print"></i>&nbsp; Imprimir lista</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";
  </script>
  <script src="<?php echo base_url('assets/style/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/style/js/buscadores/colaborador/buscar_reporte_asistencia_cl.js');?>"></script>
