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
      <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-building"></i> Agregar un departamento</h3></div>
          <div class="card-body">
            <form method="POST" action="agregarDept">
                <div class="form-group">
                  <label for="nombre_evento">Nombre del departamento:</label>
                  <input class="form-control" id="nombre_dept" name="nombre_dept" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre del departamento" required="true" pattern="[A-Z a-z 0-9 áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>
                <div class="form-group">
                  <label for="descripcion_evento">Descipción:</label>
                  <input class="form-control" id="descripcion_dept" name="descripcion_dept" type="text" aria-describedby="nameHelp" placeholder="Digitar descripción (opcional)" pattern="[A-Z a-z 0-9 áéíóú ÁÉÍÓÚ Ññ , -  _  # . / ]+">
                </div>
                <div class="form-group">
                  <input class="btn btn-success btn-block" type="submit" value="Agregar departamento">
                </div>
            </form>
          </div>
      </div>
  </div>
</div>
