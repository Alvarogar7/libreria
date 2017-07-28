	
	
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>

<div id="container" style="min-width: 300px; height: 500px; max-width: 800px; margin: 0 auto"></div>


      <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'scatter',
        zoomType: 'xy'
    },
    title: {
        text: 'Estimacion de ventas <?php echo $var_nombre; ?>'
    },
    subtitle: {
        text: '<?php  echo " Para el año ". $final_fecha. " Las Ventas seran: " .$incognitaX ; ?>'
    },
   
    xAxis: {
        title: {
            enabled: true,
            text: 'Año'
        },
        startOnTick: true,
        endOnTick: true,
        showLastLabel: true
    },
    yAxis: {
        title: {
            text: 'Quetzales'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 100,
        y: 70,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },
    plotOptions: {
        scatter: {
            marker: {
                radius: 5,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)'
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                pointFormat: '{point.x} Año, {point.y} Ventas'
            }
        }
    },
    series: [{
        name: 'Ventas por Año',
        color: 'rgba(219, 83, 83, .5)',
        data: [
        <?php  $contador = 0; 
        foreach($x as $k => $v)
                {
            echo "[".$cuenta_x[$contador].",".$v."]".","." ";
            $xy[$contador]=$x[$contador]*$y[$contador];
            $xx[$contador]=$x[$contador]*$x[$contador];
            $contador = 1+$contador;
            }
   ?>]

    },
    {
        type: 'line',
        name: 'Linea de Estimacion',
        data: [<?php echo"[". $cuenta_x[0] .",".$incognitaX_CERO."]"; ?>, <?php echo"[".$final_fecha.",".$incognitaX."]";  ?>],
        marker: {
            enabled: false
        },
        states: {
            hover: {
                lineWidth: 0
            }
        },
        enableMouseTracking: false
    }
    ],

    
       


});


        </script>