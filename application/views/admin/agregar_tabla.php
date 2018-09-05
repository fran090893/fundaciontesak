<div class="content-wrapper">
    <div class="container-fluid">
      <?php

        if($error == 's')
        {
          echo'
                  <br>
                  <div class="alert alert-danger">
                    <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                    <strong>¡Alerta! </strong> Suba un archivo de excel ó intentelo subir nuevamente.
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
                        <strong>¡Exito! </strong> Alumnos agregados correctamente.
                      </div>';
            }
            else
            {
              echo'';
            }
        }

        ?>
        <br>
        <a href="<?php echo base_url('c_admin/cgrupo/v_buscarGrupo');?>" class="btn btn-info btn-md" ><i class="fa fa-angle-left" ></i>&nbsp;  Regresar</a>
        <div class="card card-register mx-auto mt-5">
          <div class="card-header"><h3 style="text-align:center;"><i class="far fa-file-excel"></i> Agregar una tabla alumnos </h3></div>
            <div class="card-body">
              <?php echo form_open_multipart('c_admin/calumno/agregarTablaAlumnos');?>
                <label>Buscar un archivo:</label>
                <div class="form-group">
                    <input type="file" name="archivo_excel" class="form-control-file" />
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success btn-block" value="Agregar tabla de alumnos"/>
                </div>
              </form>

        </div>
      </div>
    </div>
  </div>
