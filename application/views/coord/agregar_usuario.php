<div class="content-wrapper">
    <div class="container-fluid">
      <?php

        if($error == 's')
        {
          echo'
                  <br>
                  <div class="alert alert-danger">
                    <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                    <strong>¡Alerta! </strong> No se pudo realizar la operación solicitada.
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
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-user"></i> Agregar un usuario</h3></div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url('c_coord/cusuariocd/agregarUsuario');?>">
                <div class="form-group">
                  <label for="nombre_usuario">Nombres:</label>
                  <input class="form-control" id="nombre_usuario" name="nombre_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo nombre" required="true" pattern="[A-Z a-z áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>

                <div class="form-group">
                  <label for="apellido_usuario">Apellidos:</label>
                  <input class="form-control" id="apellido_usuario" name="apellido_usuario" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo apellido" required="true" pattern="[A-Z a-z áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>

                <div class="form-group">
                  <label for="correo">Correo eletrónico:</label>
                  <input class="form-control" id="correo" name="correo" type="email" aria-describedby="nameHelp" placeholder="Digitar correo electrónico" required="true">
                </div>

                <div class="form-group">
                  <label for="telefono">Teléfono:</label>
                  <input class="form-control" id="telefono" name="telefono" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre de usuario" required="true">
                </div>

                <div class="form-group">
                  <label for="nombre_us">Nombre de usuario:</label>
                  <input class="form-control" id="nombre_us" name="nombre_us" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre de usuario" required="true">
                </div>

                <div class="form-group">
                  <label for="contra_us">Contraseña:</label>
                  <input class="form-control" id="contra_us" name="contra_us" type="password" aria-describedby="nameHelp" placeholder="Contraseña" required="true">
                </div>

                <div class="form-group">
                  <label for="contra_us1">Confirmar contraseña:</label>
                  <input class="form-control" id="contra_us1" name="contra_usq" type="password" aria-describedby="nameHelp" placeholder="Confirmar contraseña" required="true">
                </div>

                <div class="form-group">
                  <label for="cargo">Cargo:</label>
                  <select class="custom-select"  id="cargo" name="cargo" required>
                    <option value="">Seleccionar</option>
                    <?php
                      foreach($cargos as $opc)
                      {
                        echo '<option value="'.$opc->id_cargo.'">'.$opc->cargo.'</option>';
                      }
                     ?>
                 </select>
                </div>
                <div class="form-group">
                  <input class="btn btn-success btn-block" type="submit" value="Agregar usuario">
                </div>
              </form>

        </div>
      </div>
    </div>
  </div>
