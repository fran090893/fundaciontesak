<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php

            if($error == 's')
            {
              echo'
                      <br>
                      <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert"><span>&times;</span> </button>
                        <strong>¡Alerta! </strong> No se pudo realizar la operación registro.
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
            <h2 style="text-align:center;"><i class="fas fa-fw fa-building"></i> Departamentos disponibles</h2>
            <br/>
           <br/>
           <div class="table-responsive">
             <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
               <thead>
                 <tr>
                    <th>Departamento</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                 </tr>
               </thead>
                <tbody>
                  <?php
                    foreach($lista_dept1 as $filas)
                    {
                      echo '
                      <tr>
                        <td>'.$filas->departamento_nombre.'</td>
                        <td>'.$filas->departamento_descripcion.'</td>
                        <td><a href="v_actualizarDept?id='.$filas->id_departamento.'" class="btn btn-success btn-md" ><i class="far fa-edit"></i></td>
                      </tr>
                      ';
                    }
                  ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
