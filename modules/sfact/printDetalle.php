<?php
session_start();
ob_start();

include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
require_once("../../MP/mailing_transaction/fechaCastellano.php");
require_once("../../MP/mailing_transaction/fechaNumber.php");

if (isset($_GET['codigo'])) {$c = $_GET['codigo']; }
		
            $jsonData = array( 'token' => "$c" );
			$data_string = json_encode($jsonData);$ch = curl_init($servidor.'/api/reservas/viewallbytoken/');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
			);
			
			$result = curl_exec($ch);
			$response = json_decode($result , true);


$hoy = date("d/m/Y");

		   foreach ($response as $data) {
				 			  $sala = $data['nombre'];
							  $fecha_reserva = $data['fecha_reserva']; 
							  $ss = substr($fecha_reserva, 0,10);
							  $sala = $data['nombre'];
							  $fs = fechaNumber ($ss);
							  $idInicio = $data['idInicio'];
							  $idFin = $data['idFin'];
							  $start = $data['start'];
							  $end = $data['end'];
							  $cliente= $data['apellido_nombre'];
							  $estado = $data['estado'];
							  $codigo = $data['codigo'];
							  if ($estado == '0'){$m = 'Cancelado'; $color="#F00";}else {$m = 'Reservado'; $color="#093";}
						?>
						
                        <html xmlns="http://www.w3.org/1999/xhtml"> 
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>REPORTE</title>
            <link rel="stylesheet" type="text/css" href="../../assetsOr/css/laporan.css" />
        </head>
        <body>
            
               
               <h3 style="color:#03F" align="center">&nbsp;</h3>
               <h2 style="color:#03F" align="center">Codigo de reserva: <?php echo $c; ?> </h2>
               <p align="center">Fecha: <?php echo fechaCastellano($ss); ?> </p>
               <p align="center"> Hora Inicio: <?php echo $start; ?> Hora Fin: <?php echo $end; ?></p>
               <p align="center">Cliente: <?php echo $cliente; ?> </p>
               <p align="center">Estado: <?php echo $m; ?> </p>
           
 
 		<?php } ?>       
        
        <hr><br>
            <h3>Asistentes</h3>
        <div id="isi">
            <table width="80%" border="0.3" align="center" bordercolor="#000000">
                <thead style="background:#e8ecee" bordercolor="#000000">
                    <tr class="tr-title">
                        
                        <th bordercolor="#000000" height="20" align="center" valign="middle">Nombre</th>
                        <th bordercolor="#000000" height="20" align="center" valign="middle">Apellido</th>
                        <th bordercolor="#000000" height="20" align="center" valign="middle">Dni</th>
                        <th bordercolor="#000000" height="20" align="center" valign="middle">Tel.Movil</th>
                        <th bordercolor="#000000" height="20" align="center" valign="middle">Situacion</th>
                    </tr>
                </thead>
                <tbody>
          
		
        	<?php 
		    $jsonData = array( 'token' => "$c" );
			$data_string = json_encode($jsonData);$ch = curl_init($servidor.'/api/asistentes/verificar/');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
			);
			
			$result = curl_exec($ch);
			$response = json_decode($result , true);
			$cont = 0;
			
			foreach ($response as $d) {
				        
						  $asistente = $d['asistente'];
						  $nombre = $d['nombre']; 
						  $apellido = $d['apellido']; 
						  $dni = $d['dni'];
						  $celular = $d['celular'];
						  $situacion = $d['situacion'];
						  $cont ++;
						
					      echo "  <tr>
									
									
									<td  height='13'  align='center'  valign='middle'>$nombre</td>
									<td  height='13'  align='center'  valign='middle'>$apellido</td>
									<td  height='13'  align='center'  valign='middle'>$dni </td>
									<td  height='13' align='center' valign='middle'>$celular</td>
									<td  height='13' align='center' valign='middle'>$situacion</td>
							</tr>";
			} 
			
						 if ($cont == 0){
							 
							 echo "  <tr>
									
									<td width='80' height='13' align='center'  valign='middle'>Sin Registros</td>
									<td width='80' height='13' align='center'  valign='middle'>Sin Registros</td>
									<td width='80' height='13' align='center'  valign='middle'>Sin Registros</td>
									<td width='120' height='13' align='center' valign='middle'>Sin Registros</td>
									<td width='120' height='13' align='center' valign='middle'>Sin Registros</td>
							</tr>";
						 
						 }
			?>	
            
            
                </tbody>
            </table>
            <p>&nbsp;</p>
            <hr>
            <h3 style="color:#093" align="center">Adicionales Contratados: </h3>
            <?php 
			
            $jsonData = array( 'token' => "$c" );
			$data_string = json_encode($jsonData);$ch = curl_init($servidor.'/api/adicionales/resumen/');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
			);
			
			$result = curl_exec($ch);
			$response = json_decode($result , true);
			
				foreach ($response as $d) {
							
							  $nombre = $d['nombre'];
							  $descripcion = $d['descripcion']; 
							  $importe = $d['importe']; 
							  
							   ?><h4 align="center">
                               Servicio: <?php echo $nombre; ?> 
                               Descripcion: <?php echo $descripcion; ?>
                               Importe $ARG: <?php echo $importe; ?>
                               </h4><?php
			} ?>
        </div>
    </body>
    
</html>
