<div class="content-wrapper">
    <div class="container-fluid">
      <br>
      <a href="v_buscarUsuarios" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
      <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-user"></i> Editar datos de un usuario</h3></div>
            <div class="card-body">
              <form method="POST" action="actualizarUsuario">
                <?php

                      foreach($actualizar1 as $campo)
                      {

                ?>
                <div class="form-group">
                  <label for="nombre_usuario">Nombres:</label>
                  <input class="form-control" id="nombre_usuario" name="nombre_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo nombre" required="true" value="<?php echo $campo->usuario_nombre;?>" pattern="[A-Z a-z áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>

                <div class="form-group">
                  <label for="apellido_usuario">Apellidos:</label>
                  <input class="form-control" id="apellido_usuario" name="apellido_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo apellido" required="true" value="<?php echo $campo->usuario_apellido;?> " pattern="[A-Z a-z áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>

                <div class="form-group">
                  <label for="correo">Correo eletrónico:</label>
                  <input class="form-control" id="correo" name="correo" type="email" aria-describedby="nameHelp" placeholder="Digitar correo electrónico" required="true" value="<?php echo $campo->usuario_correo;?>">
                </div>

                <div class="form-group">
                  <label for="telefono">Teléfono:</label>
                  <input class="form-control" id="telefono" name="telefono" type="text" aria-describedby="nameHelp" placeholder="Digitar número de teléfono (ej. 2222-2222)" required="true" value="<?php echo $campo->usuario_telefono;?>" pattern="\d{4}[\-]\d{4}">
                </div>

                

                <div class="form-group">
                  <label for="contra_us">Contraseña:</label>
                  <input class="form-control" id="contra_us" name="contra_us" type="password" aria-describedby="nameHelp" placeholder="Contraseña" required="true" >
                </div>

               

                <div class="form-group">
                  <label for="dept">Departamento:</label>
                  <select class="custom-select"  id="dept" name="dept" required>
                    <option value="">Seleccionar</option>
                    <?php
                      foreach($depts as $opc)
                      {
                        echo '<option selected="'.$campo->id_departamento.'" value="'.$opc->id_departamento.'">'.$opc->departamento_nombre.'</option>';
                      }
                     ?>
                 </select>
                </div>

                <div class="form-group">
                  <label for="cargo">Cargo:</label>
                  <select class="custom-select"  id="cargo" name="cargo" required>
                    <option value="">Seleccionar</option>
                    <?php
                      foreach($cargos as $opc)
                      {
                        echo '<option selected="'.$campo->id_cargo.'" value="'.$opc->id_cargo.'">'.$opc->cargo.'</option>';
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
