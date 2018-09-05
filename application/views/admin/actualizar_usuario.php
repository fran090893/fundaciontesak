<div class="content-wrapper">
    <div class="container-fluid">
      <br>
      <a href="v_buscarUsuarios" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
      <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-user"></i> Actualizar datos de un usuario</h3></div>
            <div class="card-body">
              <form method="POST" action="actualizarUsuario">
                <?php

                      foreach($actualizar1 as $campo)
                      {

                ?>
                <div class="form-group">
                  <label for="nombre_usuario">Nombres</label>
                  <input class="form-control" id="nombre_usuario" name="nombre_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo nombre" required="true" value="<?php echo $campo->usuario_nombre;?>">
                </div>

                <div class="form-group">
                  <label for="apellido_usuario">Apellidos</label>
                  <input class="form-control" id="apellido_usuario" name="apellido_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo apellido" required="true" value="<?php echo $campo->usuario_apellido;?>">
                </div>

                <div class="form-group">
                  <label for="correo">Correo eletrónico</label>
                  <input class="form-control" id="correo" name="correo" type="text" aria-describedby="nameHelp" placeholder="Digitar correo electrónico" required="true" value="<?php echo $campo->usuario_correo;?>">
                </div>

                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input class="form-control" id="telefono" name="telefono" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre de usuario" required="true" value="<?php echo $campo->usuario_telefono;?>">
                </div>

                <div class="form-group">
                  <label for="nombre_us">Nombre de usuario</label>
                  <input class="form-control" id="nombre_us" name="nombre_us" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre de usuario" required="true" value="<?php echo $campo->usuario;?>">
                </div>

                <div class="form-group">
                  <label for="contra_us">Contraseña</label>
                  <input class="form-control" id="contra_us" name="contra_us" type="password" aria-describedby="nameHelp" placeholder="Contraseña" required="true" >
                </div>

                <div class="form-group">
                  <label for="contra_us1">Confirmar contraseña</label>
                  <input class="form-control" id="contra_us1" name="contra_us1" type="password" aria-describedby="nameHelp" placeholder="Confirmar contraseña" required="true">
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

                <div class="form-group">
                  <label for="cargo">Cargo</label>
                  <select class="form-control"  id="cargo" name="cargo" required="true" value="<?php echo $campo->id_cargo;?>">
                    <option value="0">Seleccionar</option>
                    <?php
                      foreach($cargos as $opc)
                      {
                        echo '<option value="'.$opc->id_cargo.'">'.$opc->cargo.'</option>';
                      }
                     ?>
                 </select>
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
