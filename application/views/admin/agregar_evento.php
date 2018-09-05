<div class="content-wrapper">
    <div class="container-fluid">
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

        ?>
        <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fas fa-fw fa-calendar-alt"></i> Agregar un evento</h3></div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url();?>c_admin/cevento/agregarEvento">
                <div class="form-group">
                  <label for="nombre_evento">Nombre del evento</label>
                  <input class="form-control" id="nombre_evento" name="nombre_evento" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del evento" required="true">
                </div>
                <div class="form-group">
                  <label for="descripcion_evento">Descipción</label>
                  <input class="form-control" id="descripcion_evento" name="descripcion_evento" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)" required="true">
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de evento</label>
                  <input class="form-control" id="fecha" name="fecha" type="date" aria-describedby="nameHelp"  required="true">
                </div>

                <div class="form-group">
                  <label for="grupo">Grupo</label>
                  <select class="form-control"  id="grupo" name="grupo" required="true">
                    <option value="0">Seleccionar</option>
                    <?php
                    foreach($grupos as $opc)
                    {
                      echo '<option value="'.$opc->id_grupo.'">'.$opc->grupo_nombre.'</option>';
                    }

                   ?>
                 </select>
                </div>
                <div class="form-group">
                  <input class="btn btn-success btn-block" type="submit" value="Agregar evento">
                </div>
              </form>

        </div>
      </div>
    </div>
  </div>
