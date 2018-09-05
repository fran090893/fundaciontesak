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
          <div class="card-header"><h3 style="text-align:center;"><i class="fas fa-fw fa-users"></i> Crear un grupo</h3></div>
          <div class="card-body">
            <form method="POST" action="<?php base_url('c_admin/cgrupo/agregarGrupo');?>">
              <div class="form-group">
                <label for="nombre_evento">Nombre del grupo:</label>
                <input class="form-control" id="nombre_grupo" name="nombre_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del evento" required="true">
              </div>
              <div class="form-group">
                <label for="descripcion_grupo">Descipción del grupo:</label>
                <input class="form-control" id="descripcion_grupo" name="descripcion_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)">
              </div>
              <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input class="form-control" id="direccion" name="direccion_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar dirección (centro escolar o institución)" required="true">
              </div>
              <div class="form-group">
                <label for="municipio">Municipio:</label>
                <input class="form-control" id="municipio" name="municipio_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar municipio (centro escolar o institución)" required="true">
              </div>
              <div class="form-group">
                <label for="telefono_grupo">Teléfono:</label>
                <input class="form-control" id="telefono_grupo" name="telefono_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar teléfono (centro escolar o institución)">
              </div>
              <div class="form-group">
                <label for="nombre_encargado">Encargado:</label>
                <input class="form-control" id="nombre_encargado" name="encargado_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del encargado" required="true">
              </div>
              <div class="form-group">
                <label for="celular_grupo">Teléfono Encargado:</label>
                <input class="form-control" id="celular_grupo" name="celular_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar teléfono del encargado" required="true">
              </div>
              <div class="form-group">
                <label for="dept">Departamento:</label>
                <select class="form-control"  id="dept" name="dept" required="true">
                  <option value="0">Seleccionar</option>
                  <?php
                  foreach($depts as $opc)
                  {
                    echo '<option value="'.$opc->id_departamento.'">'.$opc->departamento_nombre.'</option>';
                  }
                   ?>
               </select>
              </div>
              <div class="form-group">
                <input class="btn btn-success btn-block" type="submit" value="Crear grupo">
              </div>
            </form>

      </div>
    </div>
  </div>
</div>
