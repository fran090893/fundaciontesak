<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <br>
            <h2 style="text-align:center;"><i class="fas fa-chart-area"></i> Estadísticas por departamento</h2>
            <br/>
           <br/>
           <div class="table-responsive">
             <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
               <thead>
                 <tr>
                    <th>Departamento</th>
                    <th>Descripción</th>
                    <th>Estadíscas del departamento</th>
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
                        <td><a href="v_statsDept?id='.$filas->id_departamento.'" class="btn btn-info btn-md" title="Datos estadísticos por dept." ><i class="fas fa-chart-area"></i></td>
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
