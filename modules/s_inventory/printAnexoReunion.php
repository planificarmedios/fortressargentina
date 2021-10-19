
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
							  $dni = $data['dni']; 
							  $email = $data['email']; 
							  $domicilio = $data['dommicilio']; 
							  $fs = fechaNumber ($ss);
                $idInicio = $data['idInicio'];
                $tipo_doc = $data['tipo_documento'];
                  if ($tipo_doc == 1) { 
                    $doc = 'DNI';
                  } elseif ($tipo_doc == 2 ) { 
                    $doc = 'CUIL';
                  } elseif ($tipo_doc == 3) { 
                    $doc = 'CUIT';
                  };
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
            <title>RESERVA DE SALA DE REUNIONES (ANEXO V) </title>
            <link rel="stylesheet" type="text/css" href="../../assetsOr/css/laporan.css" />
        </head>
        <body>
            
               
               <h3 style="color:#03F" align="center">&nbsp;</h3>
               <h2 align="center">FICHA DE SALAS DE REUNIÓN (ANEXO V) </h2>
               <p align="center">Fecha: <?php echo fechaCastellano($ss); ?> </p>
               <p align="center"> Hora Inicio: <?php echo $start; ?> Hora Fin: <?php echo $end; ?></p>
			   <p align="center"> Reserva: <?php echo $sala; ?>  

			   <h3>DATOS DEL ANFITRIÓN</h3>


              <p> <?php echo $cliente; ?> <?php if($tipo_doc==1){echo 'DNI';} else{echo 'CUIL / CUIT';} ' '. $dni; ?> </p>
			  
 
 		<?php } ?>       
        
        
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
      ?>
      <h3>DATOS DE LOS ASISTENTES</h3>
			<?php
			foreach ($response as $d) {

						
			     
						  $asistente = $d['asistente'];
						  $nombre = $d['nombre']; 
						  $apellido = $d['apellido']; 
						  $dni = $d['dni'];
						  $celular = $d['celular'];
						  
						  $cont ++;
						  
						  echo " 

						  <hr><br>
						  
							  <div id='isi'>
								  <table width='80%' border='0.3' align='center' bordercolor='#000000'>
							  <thead style='background:#e8ecee' bordercolor='#000000'>
								  <tr class='tr-title'>
									  
									  <th  height='20' align='left' ></th>
									  <th  height='20 align='left' ></th>
									 
									  
								  </tr>
							  </thead>
							  <tbody>";
						  
						  
					      echo "  <tr>
									
                
									<td  height='13'  align='left'  >Asistente: $nombre</td>
									<td  height='13'  align='left'  >Dni: $dni </td>
                  
                  									
							</tr>
							
              <td></td> <td></td><td></td><td></td><td></td><td></td><td></td>
              <td align='left'>FIRMA</td> 
			  <td align='left'>ACLARACION Y DOCUMENTO</td> 
									
							";
			} 
			
						
			?>	
            
            
                </tbody>
            </table>
            <p>&nbsp;</p>
            <hr>
            <h3 style="color:#093" align="center"> </h3>
            
        </div>
    </body>
    
</html>

<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }

.text-center{
	text-align:center
}
.text-right{
	text-align:right
}
table th, td{
	font-size:13px
}
.detalle td{
	padding:7px;
}

.border-bottom{
	border-bottom: solic 1px #bdc3c7;
}


h1 {
	page-break-before: always;
}


-->
</style>


   
 
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        
           
        
          <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
        8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><span
        lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
        minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEGURIDAD FORTRESS SA dispone dentro sus instalaciones, de distintas salas de reuniones para la 
		firma de escrituras o uso comercial, para que el Locatario y autorizados puedan hacer uso. La utilización de las salas de reuniones estará sujeta a una limitación temporal 
		de horas y conforme a las tarifas que se publicarán periódicamente. Para el uso de las salas, los usuarios deberán proceder según los mecanismos de reservas informados 
		por SEGURIDAD FORTRESS SA . Para todo caso de reserva de salas, el Cliente podrá permanecer hasta el horario por éste abonado y bajo las condiciones establecidas en el 
		Reglamento de Uso y Reserva de Salas. SEGURIDAD FORTRESS SA no se compromete a que las Salas estarán siempre disponibles, sino que se ajustará a las prioridades de reservas 
		efectuadas. Queda absolutamente prohibido utilizar las salas Privadas para fines contrarios a las buenas costumbres. FORTRESS no se hace responsable bajo ningún aspecto de los 
		negocios, operaciones, conteo de dinero o cualquier otro acto o suceso que ocurra dentro de las salas. Dichos actos o negocios deben ser lícitos y bajo exclusiva responsabilidad 
		de los clientes. SEGURIDAD FORTRESS SA no tendrá conocimiento alguno del tipo de operaciones que en las salas se realice y tampoco filmará ni grabará o de forma alguna 
		registrará lo que suceda en dichos recintos.</p>

		<p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
		  <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>

		<div class="row section" align="center">
            <div class="col-1">
                <table style='width:80%'>
                    <thead contenteditable>
                    
                   </thead>
                  <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="50%" >FIRMA ANFITRIÓN SA</th>
                     </tr> 
                     <tr class="invoice_detail">
                      <th  width="80%" > ACLARACIÓN</th>
                     </tr> 
                    </thead>
                </table>
            </div><!--.row-->
          
          <p>&nbsp;</p>
          
          <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'> En la
ciudad de Mar del Plata, a los …… del mes …………………………………………  del año …………… </span> <o:p></o:p></span></b></p>
<p>&nbsp;</p>
<p>&nbsp;</p>         
       

         
    </div><!--.me-->
  </header>
</div><!--.notec001-->


</page>	
   
