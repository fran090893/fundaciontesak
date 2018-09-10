<script src="<?php echo base_url('assets/style/js/HC/code/highcharts.js');?>"></script>
<script src="<?php echo base_url('assets/style/js/HC/code/modules/exporting.js');?>"></script>
<script src="<?php echo base_url('assets/style/js/HC/code/modules/export-data.js');?>"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Asistencias reales y esperadas'
    },
    subtitle: {
        text: 'Asistencia por eventos de la Fundación para la Educación experencial Pablo Tesak'
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

    }, {
        name: 'Esperados',
        type: 'spline',
        yAxis: 1,
        data: [<?php echo $stats_e['enero_e']; ?>,<?php echo $stats_e['febrero_e']; ?>,<?php echo $stats_e['marzo_e']; ?>,<?php echo $stats_e['abril_e']; ?>,<?php echo $stats_e['mayo_e']; ?>,<?php echo $stats_e['junio_e']; ?>,<?php echo $stats_e['julio_e']; ?>,<?php echo $stats_e['agosto_e']; ?>,<?php echo $stats_e['septiembre_e']; ?>,<?php echo $stats_e['octubre_e']; ?>,<?php echo $stats_e['noviembre_e']; ?>,<?php echo $stats_e['diciembre_e']; ?>],
        tooltip: {
            valueSuffix: ''
        }
    }]
});
		</script>
