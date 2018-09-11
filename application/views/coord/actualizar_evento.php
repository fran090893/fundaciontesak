<div class="content-wrapper">
  <div class="container-fluid">
      <br>
        <a href="<?php echo base_url('c_coord/ceventocd/v_buscarEventosRealizados');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
          <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fas fa-fw fa-calendar-alt"></i> Editar datos de un evento</h3></div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url('c_coord/ceventocd/actualizarEventoRealizado');?>">
                <?php

                      foreach($actualizar as $campo)
                      {

                ?>
                <div class="form-group">
                  <label for="nombre_evento">Nombre del evento:</label>
                  <input class="form-control" value="<?php echo $campo->evento_nombre; ?>" id="nombre_evento" name="nombre_evento" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del evento" required="true" pattern="[A-Z a-z 0-9 áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>
                <div class="form-group">
                  <label for="descripcion_evento">Descipción:</label>
                  <input class="form-control"  value="<?php echo $campo->evento_descripcion; ?>" id="descripcion_evento" name="descripcion_evento" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)" pattern="[A-Z a-z 0-9 áéíóú ÁÉÍÓÚ Ññ ]+" >
                </div>
              <?php }?>
                <div class="form-group">
                  <input class="btn btn-primary  btn-block" type="submit" value="Guardar cambios">
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
