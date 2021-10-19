<style>
#chartdiv2 {
  width: 100%;
  height: 400px;
}

</style>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>

am4core.ready(function() {
am4core.useTheme(am4themes_animated);
var chart = am4core.create("chartdiv2", am4charts.XYChart);

chart.data = [ {
  "date": "2020-09",
  "value": 0
}, {

  <?php 
  include_once ("callAPI.php");
  require_once ("parametros.php");
  $get_data = callAPI('GET', $servidor.'/api/totalizadorventas/cajas',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
                $concatenado = $d['CONCATENADO'];
                $suma= $d['Suma'];
        ?>
        }, {
          "date": "<?php echo  $concatenado ?>",
          "value": "<?php echo $suma ?>"
        
        <?php
		    }
   ?>
} ];

// Create axes
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.grid.template.location = 0;
dateAxis.renderer.minGridDistance = 50;
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.dateX = "date";
series.strokeWidth = 3;
series.fillOpacity = 0.5;

// Add vertical scrollbar
chart.scrollbarY = new am4core.Scrollbar();
chart.scrollbarY.marginLeft = 0;

// Add cursor
chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "zoomY";
chart.cursor.lineX.disabled = true;

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv2"></div>