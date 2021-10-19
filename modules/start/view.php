<?php
if (empty($_SESSION['name_user']) && empty($_SESSION['password'])){
	header("Location: index.php?alert=33"); 
}

        include_once ("callAPI.php");
        require_once ("parametros.php");

		$get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1027',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $total_extragrande = $d['cantidad'];
		}

        $get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1004',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $total_grande = $d['cantidad'];
		}

 		$get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1003',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $total_mediana = $d['cantidad'];
		}

		$get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1002',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $total_chica = $d['cantidad'];
		}


       $get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadas',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $ocupadas = $d['cantidad'];
        }
        
        $get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/reparacion',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
                $enreparacion = $d['cantidad'];
        }
        
        $get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadasFortress',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
                $reservadasfortress = $d['cantidad'];
        }
        
        $get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/totales',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $c = $d['cantidad'];
		}

	  
		
		$get_data = callAPI('GET', $servidor.'/api/estadisticas/reservas/ocupadas/dia',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $dd = $d['cantidad'];
		}


		$get_data = callAPI('GET', $servidor.'/api/totalizarAvencerse',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $tt = $d['cantidad'];
		}

		

		

?>
<style>

body {
font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", 
Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}



#chartdiv {
  width: 100%;
  height: 250px;
}


#chartdiv3 {
  width: 50%;
  height: 250px;
}

#chartdiv2 {
  width: 100%;
  height: 250px;
}

#chartdiv4 {
  width: 50%;
  height: 250px;
}




  
</style>

  <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
  
  <!-- Chart code -->
<script>
	
var container = am4core.create("chartdiv", am4core.Container);
container.width = am4core.percent(100);
container.height = am4core.percent(100);
container.layout = "horizontal";

function createChart(data) {

  // Create chart
  var chart = container.createChild(am4charts.PieChart3D);

  // Add data
  chart.data = data;

  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries3D());
 
  pieSeries.dataFields.value = "litres";
  pieSeries.dataFields.category = "country";
 
  pieSeries.labels.template.disabled = true;
  pieSeries.ticks.template.disabled = true;
  pieSeries.slices.template.propertyFields.fill = "color";
  chart.legend = new am4charts.Legend();
  chart.legend.fontSize = 15;


  

  
};
	  
//caja extragrande
createChart([{
   
   "country": "Disponible",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadas/1027',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $ocupadas_extragrande = $d['cantidad'];
				}
				
  ?>
  "litres": <?php echo ($total_extragrande-$ocupadas_extragrande);?>,
  "color": am4core.color("#00a65a")
}, {
  "country": "Fortress",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadasFortress/1027',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $fortress_extragrande = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $fortress_extragrande;?>,
  "color": am4core.color("#00c0ef")

},  
		 
{
  "country": "En reparacion",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/reparacion/1027',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $reparacion_extragrande = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $reparacion_extragrande;?>,
  "color": am4core.color("grey")
},
			 
			 
{
  "country": "Alquilada",
  "litres": <?php echo ($ocupadas_extragrande-$fortress_extragrande-$reparacion_extragrande); ?>,
    "color": am4core.color("#dd4b39"),
      "config": {
          "isActive": true,
          "stroke": am4core.color("#3787ac"),
          "filters": [{
          "type": "DropShadowFilter"
          }]
      }
}, 
	
			
			
]);
	  
	  
///////////////////////////////// caja grande ///////////////////////////////// 
	  
createChart([{
   "country": "Disponible",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadas/1004',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $ocupadas_grande = $d['cantidad'];
				}
				
  ?>
  "litres": <?php echo ($total_grande-$ocupadas_grande);?>,
  "color": am4core.color("#00a65a")
}, {
  "country": "Fortress",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadasFortress/1004',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $fortress_grande = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $fortress_grande;?>,
  "color": am4core.color("#00c0ef")

},  
		 
{
  "country": "En reparacion",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/reparacion/1004',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $reparacion_grande = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $reparacion_grande;?>,
  "color": am4core.color("grey")
},
			 
			 
{
  "country": "Alquilada",
  "litres": <?php echo ($ocupadas_grande-$fortress_grande-$reparacion_grande); ?>,
    "color": am4core.color("#dd4b39"),
      "config": {
          "isActive": true,
          "stroke": am4core.color("#3787ac"),
          "filters": [{
          "type": "DropShadowFilter"
          }]
      }
}, 
	
			
			
]);
	  
/////////////////////////////////////////// caja mediana ///////////////////////////////////////////////////////////////////////
	  
createChart([{
   "country": "Disponible",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadas/1003',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $ocupadas_mediana = $d['cantidad'];
				}
				
  ?>
  "litres": <?php echo ($total_mediana-$ocupadas_mediana);?>,
  "color": am4core.color("#00a65a")
}, {
  "country": "Fortress",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadasFortress/1003',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $fortress_mediana = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $fortress_mediana;?>,
  "color": am4core.color("#00c0ef")

},  
		 
{
  "country": "En reparacion",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/reparacion/1003',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $reparacion_mediana = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $reparacion_mediana;?>,
  "color": am4core.color("grey")
},
			 
			 
{
  "country": "Alquilada",
  "litres": <?php echo ($ocupadas_mediana-$fortress_mediana-$reparacion_mediana); ?>,
    "color": am4core.color("#dd4b39"),
      "config": {
          "isActive": true,
          "stroke": am4core.color("#3787ac"),
          "filters": [{
          "type": "DropShadowFilter"
          }]
      }
}, 
	
			
			
]);
	  
	  
	  
///////////////////////////////////// caja chica //////////////////////////////////////////////////////////
	  
createChart([{
   "country": "Disponible",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadas/1002',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $ocupadas_chica = $d['cantidad'];
				}
				
  ?>
  "litres": <?php echo ($total_chica-$ocupadas_chica);?>,
  "color": am4core.color("#00a65a")
}, {
  "country": "Fortress",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadasFortress/1002',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $fortress_chica = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $fortress_chica;?>,
  "color": am4core.color("#00c0ef")

},  
		 
{
  "country": "En reparacion",
  <?php
	            include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/reparacion/1002',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $reparacion_chica = $d['cantidad'];
				}
  ?>
  "litres": <?php echo $reparacion_chica;?>,
  "color": am4core.color("grey")
},
			 
			 
{
  "country": "Alquilada",
  "litres": <?php echo ($ocupadas_chica-$fortress_chica-$reparacion_chica); ?>,
    "color": am4core.color("#dd4b39"),
      "config": {
          "isActive": true,
          "stroke": am4core.color("#3787ac"),
          "filters": [{
          "type": "DropShadowFilter"
          }]
      }
}, 
	
			
			
]);


  </script>




  
 
  <!-- Main content -->
  <section class="content">

  
  

    <!-- Small boxes (Stat box) -->
    <section class="content">
  <div class="row">
    <div class="col-md-13">



 
<div class="box box-warning" style="color:#003">
<div class="box-body">

<div id="chartdiv2"></div>


     
	  <div class="col-lg-3 col-xs-4" id="chartdiv3"></div>
	  <div class="col-lg-3 col-xs-4" id="chartdiv4"></div>
	  

	
	 <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-info"><i class="fa fa-lock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Total Cajas en Bóveda</span>
			<span class="info-box-number">
				<?php echo $c; ?>
			  </span>
		  </div>
		</div>
      </div><!-- ./col -->

     <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-info"><i class="fa fa-lock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Cajas Ocupadas</span>
			<span class="info-box-number">
				<?php echo $ocupadas; ?>
			  </span>
		  </div>
		</div>
      </div><!-- ./col -->

     <div class="col-lg-3 col-xs-4">
       <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-info"><i class="fa fa-lock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Cajas Disponibles</span>
			<span class="info-box-number">
				<?php echo $c - $ocupadas; ?>
			  </span>
		  </div>
		</div>
      </div><!-- ./col -->
    
   
    <div class="col-lg-3 col-xs-4">
       <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-red"><i class="fa fa-lock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Cajas Próximo a Vencerse</span>
			<span class="info-box-number">
				<?php echo $tt; ?>
			</span>

			
           <a href="?module=formEdit_cj&formEdit=vencerse" class="small-box-footer" title="Listar" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
         

		  </div>
		</div>
      </div><!-- ./col -->
	
	<div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-info"><i class="fa fa-unlock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Cajas Ocupadas</span>
			<span class="info-box-number">
				<?php echo $ocupadas; ?>
			  </span>
		  </div>
		</div>
      </div><!-- ./col -->
	
	<div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-info"><i class="fa fa-unlock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Cajas Alquiladas</span>
			<span class="info-box-number">
				<?php echo ($ocupadas-$reservadasfortress-$enreparacion); ?>
			  </span>
		  </div>
		</div>
      </div><!-- ./col -->
	
	<div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-info"><i class="fa fa-unlock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">Reservadas Fortress</span>
			<span class="info-box-number">
				<?php echo $reservadasfortress; ?>
			  </span>
		  </div>
		</div>
      </div><!-- ./col -->
	
	<div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="info-box">
		  <span class="info-box-icon bg-info"><i class="fa fa-unlock"></i></span>
		  <div class="info-box-content">
			<span class="info-box-text">En Reparación</span>
			<span class="info-box-number">
				<?php echo $enreparacion; ?>
			  </span>
		  </div>
		</div>
      </div><!-- ./col -->
	
	
    
  
   </div><!-- /.row -->

   <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#dbc76c;color:#fff" class="small-box">
          <div class="inner">
            <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1027',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $extragrande = $d['cantidad'];
				}
		    ?>
                <h3 style="color:#000"><?php echo $extragrande; ?></h3>
                <h4 style="color:#000">TOTAL DE CAJAS EXTRA-GRANDES</h4>
              </div>
              <div class="icon">
                <i class="fa fa-lock"></i>
              </div>
           <a href="?module=cj" class="small-box-footer" title="Ir a cajas" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
         </div>
      </div><!-- ./col -->

      

   <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#dbc76c;color:#fff" class="small-box">
		  <div class="inner">
           <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1004',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $grande = $d['cantidad'];
				}
		    ?>
                <h3 style="color:#000"><?php echo $grande; ?></h3>
                <h4 style="color:#000">TOTAL DE CAJAS GRANDES</h4>
              </div>
              <div class="icon">
                <i class="fa fa-lock"></i>
              </div>
           <a href="?module=cj" class="small-box-footer" title="Ir a cajas" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
         </div>
      </div><!-- ./col -->


		
 <div class="row">
      <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#dbc76c;color:#fff" class="small-box">
          <div class="inner">
           <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1003',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $grande = $d['cantidad'];
				}
		    ?>
                <h3 style="color:#000"><?php echo $grande; ?></h3>
                <h4 style="color:#000">TOTAL DE CAJAS MEDIANAS</h4>
          </div>
          <div class="icon">
            <i class="fa fa-lock"></i>
          </div>
          
            <a href="?module=cj" class="small-box-footer" title="Ir a cajas" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
           
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#dbc76c;color:#fff" class="small-box">
           <div class="inner">
           <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/cajas/totalTamano/1002',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $grande = $d['cantidad'];
				}
		    ?>
                <h3 style="color:#000"><?php echo $grande; ?></h3>
                <h4 style="color:#000">TOTAL DE CAJAS CHICAS</h4>
          </div>
          <div class="icon">
            <i class="fa fa-lock"></i>
          </div>
          
            <a href="?module=cj" class="small-box-footer" title="Ir a cajas" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
           
        </div>
      


      </div><!-- /.row -->





    
<body link="#0563C1" vlink="#954F72">
<center>
<table border="1" cellpadding="0" cellspacing="0" width="567" style="border-collapse:
 collapse;table-layout:fixed;width:428pt">
 </table>


</body>
	
	<div id="chartdiv"></div>
	


        </div>
      </div>
    </div>
  </div>   
</section>

<script>
am4core.useTheme(am4themes_animated);
var chart = am4core.create("chartdiv2", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

chart.data = [ {

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
          "country": "<?php echo  $concatenado ?>",
          "value": "<?php echo $suma ?>"
        <?php
		    }
   ?>
} ];


var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 40;
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
var series = chart.series.push(new am4charts.CurvedColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "value";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.tension = 1;
series.columns.template.fillOpacity = 0.75;
var hoverState = series.columns.template.states.create("hover");
hoverState.properties.fillOpacity = 1;
hoverState.properties.tension = 0.8;
chart.cursor = new am4charts.XYCursor();
// Add distinctive colors for each column using adapter
series.columns.template.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
});

chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarY = new am4core.Scrollbar();
</script>



<script>
var chart = am4core.create("chartdiv3", am4charts.XYChart);

/* Add data */
chart.data = [ {

<?php 
include_once ("callAPI.php");
require_once ("parametros.php");
$get_data = callAPI('GET', $servidor.'/api/totalizadoringresoscajas',false);
			  $response = json_decode($get_data, true);
			  //$c = '44';
			  foreach ($response as $d) {
			  $concatenado = $d['CONCATENADO'];
			  $suma= $d['Suma'];
	  ?>
	  }, {
		"country": "<?php echo  $concatenado ?>",
		"value": "<?php echo $suma ?>"
	  <?php
		  }
 ?>
} ];

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 40;
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
var series = chart.series.push(new am4charts.CurvedColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "value";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.tension = 1;
series.columns.template.fillOpacity = 0.75;
var hoverState = series.columns.template.states.create("hover");
hoverState.properties.fillOpacity = 1;
hoverState.properties.tension = 0.8;
chart.cursor = new am4charts.XYCursor();

series.columns.template.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
});

chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarY = new am4core.Scrollbar();
</script>



<script>
am4core.useTheme(am4themes_animated);

// Create chart instance
var chart = am4core.create("chartdiv4", am4charts.XYChart);

// Add data
chart.data = [ {

<?php 
include_once ("callAPI.php");
require_once ("parametros.php");
require_once ("fechaNumber.php");
$get_data = callAPI('GET', $servidor.'/api/access/promedioUsoBoxes',false);
			  $response = json_decode($get_data, true);
			   foreach ($response as $d) {
			  $concatenado = $d['CONCATENADO'];
			  $promedio= $d['PROMEDIO'];
			  $usos= $d['USOS'];
			  $totalizador= $d['TOTALIZADOR'];
	  ?>
	  }, {
		"ejex":  "<?php echo $concatenado ?>",
		"value": "<?php echo $promedio	  ?>",
		"value2": "<?php echo $totalizador	  ?>",
		
	  <?php
	 }
 ?>
} ];

var categoryAxis = chart.xAxes.push(new am4charts.DateAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 60;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
function createSeries(field, name) {
  var series = chart.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = field;
  series.dataFields.dateX = "ejex";
  series.name = name;
  series.tooltipText = "{dateX}: [b]{valueY}[/]";
  series.strokeWidth = 2;
  
var bullet = series.bullets.push(new am4charts.CircleBullet());
bullet.events.on("hit", function(ev) {
  alert("Clicked on " + ev.target.dataItem.dateX + ": " + ev.target.dataItem.valueY);
});
}

createSeries("value", "Promedio Diario (minutos)");
createSeries("value2", "Promedio Estadístico (minutos)");

chart.legend = new am4charts.Legend();
chart.cursor = new am4charts.XYCursor();

</script>
