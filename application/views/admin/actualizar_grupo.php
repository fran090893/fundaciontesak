<div class="content-wrapper">
  <div class="container-fluid">
      <br>
      <a href="v_buscarGrupo" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
        <div class="card card-register mx-auto mt-5">
          <div class="card-header"><h3 style="text-align:center;"><i class="fas fa-fw fa-users"></i> Actualizar datos un grupo</h3></div>
          <div class="card-body">
            <form method="POST" action="actualizarGrupo">
              <div class="form-group">
                <?php foreach($actualizar as $campo)
                {?>
                <label for="nombre_evento">Nombre del grupo</label>
                <input class="form-control" id="nombre_grupo" name="nombre_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del evento" required="true" value="<?php echo $campo->grupo_nombre;?>">
              </div>
              <div class="form-group">
                <label for="descripcion_grupo">Descipción del grupo</label>
                <input class="form-control" id="descripcion_grupo" name="descripcion_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)" value="<?php echo $campo->grupo_descripcion;?>">
              </div>
              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input class="form-control" id="direccion" name="direccion_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar dirección (centro escolar o institución)" required="true" value="<?php echo $campo->grupo_direccion;?>">
              </div>
              <div class="form-group">
                <label for="municipio">Municipio</label>
                <input class="form-control" id="municipio" name="municipio_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar municipio (centro escolar o institución)" required="true" value="<?php echo $campo->grupo_municipio;?>">
              </div>
              <div class="form-group">
                <label for="telefono_grupo">Teléfono</label>
                <input class="form-control" id="telefono_grupo" name="telefono_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar teléfono (centro escolar o institución)" value="<?php echo $campo->grupo_tel;?>">
              </div>
              <div class="form-group">
                <label for="nombre_encargado">Encargado</label>
                <input class="form-control" id="nombre_encargado" name="encargado_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del encargado" required="true" value="<?php echo $campo->grupo_encargado;?>">
              </div>
              <div class="form-group">
                <label for="celular_grupo">Teléfono Encargado</label>
                <input class="form-control" id="celular_grupo" name="celular_grupo" type="text" aria-describedby="nameHelp" placeholder="Digitar teléfono del encargado" required="true" value="<?php echo $campo->grupo_celular;?>">
              </div>
              <div class="form-group">
                <label for="dept">Departamento</label>
                <select class="form-control"  id="dept" name="dept" required="true" value="<?php echo $campo->id_departamento;?>">
                  <option value="0">Seleccionar</option>
                  <?php
                  foreach($depts as $opc)
                  {
                    echo '<option value="'.$opc->id_departamento.'">'.$opc->departamento_nombre.'</option>';
                  }
                   ?>
               </select>
              </div>
              <br>
              <input class="btn btn-primary btn-block" type="submit" value="Guardar cambios">
            </form>
          <?php }?>

      </div>
    </div>
  </div>
</div>
