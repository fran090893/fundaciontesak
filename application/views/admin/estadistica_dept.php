<script src="<?php echo base_url('assets/style/js/HC/code/highcharts.js');?>"></script>
<script src="<?php echo base_url('assets/style/js/HC/code/modules/exporting.js');?>"></script>
<script src="<?php echo base_url('assets/style/js/HC/code/modules/export-data.js');?>"></script>

<div class="form-group">
  <br>
    <a href="v_EstadisticaDept" class="btn btn-info btn-md" ><i class="fa fa-angle-left"></i>&nbsp;  Regresar</a>
</div>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
 var a = "<?php echo $stats_r['nombre_dept'];?>";
Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Asistencias reales del departamento: ' + a
    },
    subtitle: {
        text: 'Asistencia de los grupos de la Fundación para la Educación Experencial Pablo Tesak'
    },
    xAxis: [{
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: '',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis

    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    series: [{
        name: 'Real',
        type: 'column',
        yAxis: 1,
        data: [<?php echo $stats_r['enero_r']; ?>,<?php echo $stats_r['febrero_r']; ?>,<?php echo $stats_r['marzo_r']; ?>,<?php echo $stats_r['abril_r']; ?>,<?php echo $stats_r['mayo_r']; ?>,<?php echo $stats_r['junio_r']; ?>,<?php echo $stats_r['julio_r']; ?>,<?php echo $stats_r['agosto_r']; ?>,<?php echo $stats_r['septiembre_r']; ?>,<?php echo $stats_r['octubre_r']; ?>,<?php echo $stats_r['noviembre_r']; ?>,<?php echo $stats_r['diciembre_r']; ?>],
        tooltip: {
            valueSuffix: ''
        }

    }]
});
		</script>
