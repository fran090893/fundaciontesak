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
      <br>
  <a href="<?php echo base_url('cinicio/menu');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><h3 style="text-align:center;"><i class="fas fa-fw fa-key"></i> Cambiar contraseña</h3></div>
      <div class="card-body">
        <form method="POST" action="cambiarClave">
          <div class="form-group">
            <label for="contra_nueva">Digitar nueva contraseña:</label>
            <input class="form-control" id="contra_nueva" name="contra_nueva" type="password" aria-describedby="nameHelp" placeholder="Digitar contraseña nueva" required="true">
          </div>
          <div class="form-group">
            <label for="contra_nueva1">Confirmar contraseña nueva:</label>
            <input class="form-control" id="contra_nueva1" name="contra_nueva1" type="password" aria-describedby="nameHelp" placeholder="Digitar contraseña nueva" required="true">
          </div>
          <div class="form-group">
            <input class="btn btn-primary btn-block"  type="submit"  value ="Guardar cambios">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
