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
          <div class="card-header"><h3 style="text-align:center;"><i class="far fa-file-excel"></i> Agregar una tabla de alumnos </h3></div>
            <div class="card-body">
              <?php echo form_open_multipart('c_admin/calumno/agregarTablaAlumnos');?>
                <label>Buscar un archivo:</label>
                <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" name="archivo_excel" class="custom-file-input" id="customFile1">
                  <label class="custom-file-label" for="customFile">Seleccionar un archivo Excel</label>
                </div>
              </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success btn-block" value="Agregar tabla de alumnos"/>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script>
            $('#customFile1').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);

            })
  </script>
