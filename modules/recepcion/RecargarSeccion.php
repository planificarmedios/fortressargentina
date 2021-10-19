<?php 	
@$fecha = date("Y-m-d H:i:s",time());
$date = new DateTime($fecha, new DateTimeZone('America/Argentina/Buenos_Aires'));
date_default_timezone_set('America/Argentina/Buenos_Aires');
$zonahoraria = date_default_timezone_get();
@$h=date("H:i:s",time());
  



function fechaCastellano ($fecha) {
	$fecha = substr($fecha, 0, 10);
	$numeroDia = date('d', strtotime($fecha));
	$dia = date('l', strtotime($fecha));
	$mes = date('F', strtotime($fecha));
	$anio = date('Y', strtotime($fecha));
	$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
	return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
  }
  $f = fechaCastellano(strftime("%A, %d de %B de %Y %H:%M"));
?>

<section class="content-header" style="color:#003">


	<?php	
	include_once ("../../callAPI.php");
  require_once ("../../parametros.php");
  require_once ("../../fechaNumber.php");
        
	$get_data = callAPI('GET', $servidor.'/api/access/SemaforoDisponibilidad/',false);
				$response = json_decode($get_data, true);
		  
		  		foreach ($response as $d) {
					$habilitado = $d['HABILITADO'];
          $alerta = $d['SEMAFORO'];
          $ocupados= $d['CANTIDAD'];
				}

			echo "	
			<i class='fa fa-cog fa-spin fa-3x fa-fw'></i>
				<div class='row' pull-left>
				<div class='col-md-12 '>
				  
				  
				<div class='col-md-2'></div>
				  <div class='col-md-2'></div>
				  <div class='col-md-2' >
				  <a class='btn btn-warning btn-social' href='modules/recepcion/proses.php?act=limpiarEstadistica&valor=7'>
					<i class='fa fa-plus'></i> Limpiar Pedorros
				  </a>
				</div>

				  <div class='col-md-2' >
				  <a class='btn btn-primary btn-social' href='?module=form_recepcion&form=ingresomanual'>
					<i class='fa fa-plus'></i> Ingreso Manual de Acceso
				  </a>
				</div>
		  
				"; 

				if ($habilitado == 1) {
				echo "	
				<div class='col-md-2' >
				  <a class='btn btn-danger btn-social' href='modules/recepcion/proses.php?act=cambiar&valor=0'>
				  <i class='fa fa-exclamation'></i> Detener Ingresos
					</a>
				</div>
        <div class='col-md-2'>
				  <a class='btn btn-success btn-social' disabled >
				  <i class='fa fa-exclamation'></i> Restablecer Ingresos
					</a>
					</div>
				"; }

				if ($habilitado == 0) {
					echo "
          <div class='col-md-2' >
				  <a class='btn btn-danger btn-social' disabled >
				  <i class='fa fa-exclamation'></i> Detener Ingresos
					</a>
				</div>
				<div class='col-md-2'>
				  <a class='btn btn-success btn-social' href='modules/recepcion/proses.php?act=cambiar&valor=1'>
				  <i class='fa fa-exclamation'></i> Restablecer Ingresos
					</a>
					</div>
					"; }
				echo "
				</div>  
			  </div>
			 ";
	
	?>

<fieldset>      
             <div class="form-group">
           	  <div class="row">
                 <div class="col-sm-18 col-md-18"> 
                   <?php  

				
				


				if ($habilitado == 0) { ?>  

					<img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EB2B2B;"> 
                    <img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
					<img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
				
			    <?php
        } else { 

                    if ($alerta == 'rojo') { ?> 
                      <img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EB2B2B;"> 
                      <img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
					  <img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
                    <?php
                    }
                    elseif ($alerta == 'verde') { ?>
                      
                      <img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
                      <img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
					  <img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#15BC75"> 
                    <?php
                    }
					          elseif ($alerta = 'amarillo') { ?>
                      
						<img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
						<img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#F1CF23"> 
						<img  width="130" height="130" style= "border: 2px solid #252323;border-radius:120px;background-color:#EFE9E8"> 
					  <?php
					  }
					}

				 

                    ?>
                </div>
				           
                		
                 			 
					  
              </div>
				 
           </fieldset>


</section>


<center><h2 style="color:#000"><?php echo 'Hora Actual: '. $h.'hs'; ?> </h2>
 <section class="content">
  <div class="row">
    <div class="col-md-6">
     <div class="box box-warning">
        <div class="box-body">
          <table style="color:#000" id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
              
                <th class="center">Fecha</th>
                <th class="center">iD</th>
                <th class="center">Hora</th>
                <th class="center">##</th>
                <th class="center">Cliente </th>
                <th class="center">Situación </th>
                <th class="center"></th>
              </tr>
            </thead>
            <tbody>
            <?php 
            include ('database.php'); 
            ?>
            
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
     <div class="box box-warning">
        <div class="box-body">
          <table style="color:#000" id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                
                <th class="center">Fecha</th>
                <th class="center">Hora</th>
                <th class="center"># id</th>
                <th class="center">Cliente </th>
                <th class="center">Situación </th>
                <th class="center"></th>
              </tr>
            </thead>
            <tbody>
            <?php 
            include ('databaseImpresa.php'); 
            ?>
            
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>   
</section>