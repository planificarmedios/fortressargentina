<?php
session_start();
ob_start();

include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
require_once("../../MP/mailing_transaction/fechaCastellano.php");
require_once("../../MP/mailing_transaction/fechaNumber.php");

          $get_data = callAPI('GET', $servidor.'/api/reservas/viewall/',false);
		  $response = json_decode($get_data, true);

?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>REPORTE</title>
        <link rel="stylesheet" type="text/css" href="../../assetsOr/css/laporan.css" />
    </head>
    <body>
        <div id="title">
           <h3>Datos de Reserva</h3>
           <h3>Fecha <?php echo fechaCastellano(date("m/d/Y")); ?></h3>
        </div>

        
        <hr><br>
        <div id="isi">
            <table width="80%" border="0.3" align="center" bordercolor="#000000">
                <thead style="background:#e8ecee" bordercolor="#000000">
                    <tr class="tr-title" bordercolor"#000000">
                        <th bordercolor"#000000" height="20" align="center" valign="middle">Sala</th>
                        <th bordercolor"#000000" height="20" align="center" valign="middle">Fecha</th>
                        <th bordercolor"#000000" height="20" align="center" valign="middle">Hora Inicio</th>
                        <th bordercolor"#000000" height="20" align="center" valign="middle">Hora Fin</th>
                        <th bordercolor"#000000" height="20" align="center" valign="middle">Cliente</th>
                        <th bordercolor"#000000" height="20" align="center" valign="middle">Cant. Asistentes</th>
                        <th bordercolor"#000000" height="20" align="center" valign="middle">Estado</th>
						<th bordercolor"#000000" height="20" align="center" valign="middle">Token</th>

                    </tr>
                </thead>
                <tbody>
<?php

$hoy = date("d/m/Y");

		   foreach ($response as $data) {
				 $fecha_reserva = $data['fecha_reserva']; 
				 $ss = substr($fecha_reserva, 0,10);
						 
				if  ((fechaNumber($ss)) == $hoy){
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
	
						echo "  <tr bordercolor='#000000'>
									<td bordercolor='#000000'  height='13' align='center' style='color:$color' valign='middle'>$sala</td>
									<td bordercolor='#000000'  height='13' align='center'  style='color:$color' valign='middle'>$fs</td>
									<td bordercolor='#000000'  height='13' align='center'  style='color:$color' valign='middle'>$start</td>
									<td bordercolor='#000000'  height='13' align='center'  style='color:$color' valign='middle'>$end</td>
                                    <td bordercolor='#000000'  height='13' align='center' style='color:$color' valign='middle'>$cliente</td>
                                    <td bordercolor='#000000'  height='13' align='center' style='color:$color' valign='middle'>$cant_asist</td>
									<td bordercolor='#000000'  height='13' align='center' style='color:$color' valign='middle'>$m</td>
									<td bordercolor='#000000' height='13' align='center' style='color:$color' valign='middle'>$codigo</td>

								</tr>";
					 }
			}
	
?>	
                </tbody>
            </table>
            
 
        </div>
    </body>
</html>
