<?php

if($error == 's')
{
  echo'
          <br>
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert"><span>&times;</span> </button>
            <strong>¡Alerta! </strong> No se pudo realizar la operación registro.
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

foreach($group as $datosg)
{
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
                  <br>
                  <a href="<?php echo base_url('c_admin/cgrupo/v_buscarGrupo');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
                  <br>
                  <br>
                  <div class="card card-register mx-auto">
                    <div class="card-header"><h3 style="text-align:center;"><i class="fas fa-fw fa-users"></i> <?php echo $datosg->grupo_nombre;?></h3></div>
                      <div class="card-body">
                        <br>
                          <div class="form-group" style="text-align:center;">
                            <p>Descripción:<?php echo $datosg->grupo_descripcion;?> </p>
                            <p>Dirección:<?php echo $datosg->grupo_direccion;?> </p>
<?php } ?>
                          </div>
                      </div>
                    </div>
                    <br/>
                    <br/>
                    <input type="text" name="busqueda_alumnos" id="busqueda_alumnos" class="form-control" placeholder="Buscar alumno"/>
                    <br/>
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                    <thead>
                      <tr>
                        <th>Nombre completo</th>
                        <th>Grupo</th>
                        <th>Departamento</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  <tbody id="datos_alumnos">
                  </tbody>
                </table>
            </div>
        </div>
      </div>
   </div>
</div>

<script src="<?php echo base_url('assets/style/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/style/js/buscadores/admin/buscar_alumnos.js');?>"></script>
