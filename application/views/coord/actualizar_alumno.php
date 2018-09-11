<div class="content-wrapper">
  <div class="container-fluid">
      <br>
        <a href="<?php echo base_url('c_coord/cgrupocd/v_buscarGrupo');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
          <div class="card card-register mx-auto mt-5">
            <div class="card-header"><h3 style="text-align:center;"><i class="fa fa-user"></i> Editar datos de un alumno</h3></div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url('c_coord/calumnocd/actualizarAlumno');?>">
                <?php

                      foreach($actualizar as $campo)
                      {

                ?>
                <div class="form-group">
                  <label for="nombre_alumno">Nombres del alumno:</label>
                  <input class="form-control" id="nombre_alumno" name="nombre_alumno" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo nombre" required="true" value="<?php echo $campo->alumno_nombre;?>" pattern="[A-z A-z áéíóú ÁÉÍÓÚ Ññ ]+">
                </div>
                <div class="form-group">
                  <label for="apellido_alumno">Apellidos del alumno:</label>
                  <input class="form-control" id="apellido_alumno" name="apellido_alumno" type="text" aria-describedby="nameHelp" placeholder="Digitar primer y segundo apellido" required="true" value="<?php echo $campo->alumno_apellido;?>" pattern="[A-z A-z áéíóú ÁÉÍÓÚ Ññ ]+">
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
                  <input class="form-control" id="fecha" name="fecha" type="date" aria-describedby="nameHelp"  required="true" value="<?php echo $campo->alumno_fecha;?>">
                </div>
                <div class="form-group">
                  <label for="instituto">Institución:</label>
                  <input class="form-control" id="instituto" name="instituto" type="text" aria-describedby="nameHelp" placeholder="Digitar nombre de la institución" required="true" value="<?php echo $campo->alumno_instituto;?>" pattern="[A-z A-z 0-9 áéíóú ÁÉÍÓÚ Ññ ]+">
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
