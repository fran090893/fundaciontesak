<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <br>
          <a href="v_asistenciaGrupal" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
          <br>
          <br>
            <h2 style="text-align:center;"><i class="fas fa-fw fa-book"></i> Reporte general</h2>
          <br/>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="text-align:center;">
                <thead></thead>
                <tbody>
                  <?php
                    echo'<tr><th>Nombres</th>';

                    foreach($resultados2 as $filas2)
                    {
                      echo' <th>'.$filas2->evento.'</br>';
                    }

                    foreach ($resultados1 as $filas1)
                    {
                      echo'<tr><td>  '.$filas1->alumno_nombre.' '.$filas1->alumno_apellido.'</td>';

                      $arr1 = str_split($filas1->asistencia);

                      for( $i = 0; $i <= count($arr1); $i=$i+2 )
                      {
                            echo '<td>';
                            if( $arr1[$i] == 1 )
                            {
                              echo '<button class="btn btn-success btn-md" title="Asistio"><i class="fas fa-check"></i></button>';

                            }else
                            {
                              echo '<button class="btn btn-danger btn-md" title="No asistio"><i class="fas fa-times"></i></button>';

                            }'</td>';


                        }

                      echo '</th>';
                      echo '</tr>';
                    }
                  ?>
                </tbody>
              </table>
        </div>
      </div>
  </div>
