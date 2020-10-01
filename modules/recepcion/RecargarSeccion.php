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


<center><h1 style="color:#000"><?php echo 'Hora Actual: '. $h.'hs'; ?> </h1>
 <section class="content">
  <div class="row">
    <div class="col-md-12">
     <div class="box box-warning">
        <div class="box-body">
          <table style="color:#000" id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="center">#</th>
                <th class="center">Fecha</th>
                <th class="center">Hora</th>
                <th class="center">#Cliente</th>
                <th class="center">Nombre o Alias </th>
                <th class="center">Situación Asistente </th>
                <th class="center">Acciones</th>
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
  </div>   
</section>