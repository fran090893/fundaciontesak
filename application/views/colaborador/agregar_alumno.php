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
        <a href="<?php echo base_url('c_colaborador/cgrupocl/v_buscarGrupo');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
          <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-user"></i> Agregar un alumno</h3></div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url('c_colaborador/calumnocl/agregarAlumno');?>">
                <div class="form-group">
                  <label for="nombre_alumno">Nombres del alumno:</label>
                  <input class="form-control" id="nombre_alumno" name="nombre_alumno" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo nombre" required="true" pattern="[A-Z a-z áéíóú ÁÉÍÓÚ Ññ ]+" >
                </div>
                <div class="form-group">
                  <label for="apellido_alumno">Apellidos del alumno:</label>
                  <input class="form-control" id="apellido_alumno" name="apellido_alumno" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo apellido" required="true" pattern="[A-Z a-z áéíóú ÁÉÍÓÚ Ññ ]+" >
                </div>
                <div class="form-group">
                  <label for="grupo">Sexo:</label>
                  <select class="custom-select"  id="sexo" name="sexo" required>
                    <option value="">Seleccionar</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                 </select>
                </div>
                <div class="form-group">
                  <label for="fecha">Fecha de nacimiento:</label>
                  <input class="form-control" id="fecha" name="fecha" type="date" aria-describedby="nameHelp"  required="true">
                </div>
                <div class="form-group">
                  <label for="instituto">Institución:</label>
                  <input class="form-control" id="instituto" name="instituto" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre de la institución" required="true" pattern="[A-Z a-z 0-9 áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>
                <div class="form-group">
                  <input class="btn btn-success btn-block" type="submit" value="Agregar alumno">
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
