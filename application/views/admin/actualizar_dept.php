<div class="content-wrapper">
  <div class="container-fluid">
    <br>
      <a href="<?php echo base_url('c_admin/cdept/v_verDept');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
   <div class="card card-register mx-auto mt-5">
      <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-building"></i> Editar datos de un departamento</h3></div>
          <div class="card-body">
            <form method="POST" action="actualizarDept">
              <?php foreach ($actualizar_dept as $campo)
              {
              ?>
                <div class="form-group">
                  <label for="nombre_evento">Nombre del departamento:</label>
                  <input class="form-control" id="nombre_dept" name="nombre_dept" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del departamento" required="true" value="<?php echo $campo->departamento_nombre;?>" pattern="[A-Z a-z 0-9 áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>
                <div class="form-group">
                  <label for="descripcion_evento">Descipción:</label>
                  <input class="form-control" id="descripcion_dept" name="descripcion_dept" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)" value="<?php echo $campo->departamento_descripcion;?>" pattern="[A-Z a-z 0-9 áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>
              <?php } ?>
                <div class="form-group">
                  <input class="btn btn-primary btn-block" type="submit" value="Guardar cambios">
                </div>
            </form>
          </div>
      </div>
  </div>
</div>
