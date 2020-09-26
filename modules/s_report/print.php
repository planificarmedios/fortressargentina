<?php
session_start();
ob_start();

//require_once "../../config/database.php";
include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";
$hari_ini = date("d-m-Y");
$tgl1 = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];
$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
          include_once ("../../callAPI.php");
		  include_once ("../../parametros.php");
		  require_once("../../MP/mailing_transaction/fechaCastellano.php");
		  require_once("../../MP/mailing_transaction/fechaNumber.php");
          $get_data = callAPI('GET', $servidor.'/api/reservas/viewallordered/',false);
		  $response = json_decode($get_data, true);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>REPORTE</title>
        <link rel="stylesheet" type="text/css" href="../../assetsOr/css/laporan.css" />
    </head>
    <body>
        <div id="title">
           <h3>&nbsp;</h3>
           <h3 style="color:#03F">Datos de Reservas</h3>
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Fecha <?php echo fechaCastellano($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Desde <?php echo fechaCastellano($tgl1); ?> 
        </div>
         <div id="title-tanggal">
            Hasta <?php echo fechaCastellano($tgl2);  ?> 
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="80%" border="1" align="center">
                <thead style="border-color:#000" style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">Sala</th>
                        <th height="20" align="center" valign="middle">Fecha </th>
                        <th height="20" align="center" valign="middle">Hora Inicio</th>
                        <th height="20" align="center" valign="middle">Hora Fin</th>
                        <th height="20" align="center" valign="middle">Cliente</th>
                        <th height="20" align="center" valign="middle">Estado</th>
						<th height="20" align="center" valign="middle">Token</th>

                    </tr>
                </thead>
                <tbody>
<?php

$d = substr($tgl1, 0,2);$m = substr($tgl1, 3,2);$y = substr($tgl1, 6,4);$f_i = $y.'-'.$m.'-'.$d;
$d = substr($tgl2, 0,2);$m = substr($tgl2, 3,2);$y = substr($tgl2, 6,4);$f_f = $y.'-'.$m.'-'.$d;

		   foreach ($response as $data) {
				 $fecha_reserva = $data['fecha_reserva']; 
					
					 if  (($fecha_reserva > $f_i) and ($fecha_reserva < $f_f)){
							  $sala = $data['nombre'];
							  $ss = substr($fecha_reserva, 0,10);
							  $fs = fechaNumber ($ss);
							  $idInicio = $data['idInicio'];
							  $idFin = $data['idFin'];
							  $start = $data['start'];
							  $end = $data['end'];
							  $cliente= $data['apellido_nombre'];
							  $estado = $data['estado'];
							  $codigo = $data['codigo'];
							  if ($estado == '0'){$m = 'Cancelado'; $color="#F00";}else {$m = 'Reservado'; $color="#093";}
	
						echo "  <tr>
									<td  style='color:$color' height='13' align='center' valign='middle'>$sala</td>
									<td  style='color:$color' height='13' align='center'  valign='middle'>$fs</td>
									<td  style='color:$color' height='13' align='center'  valign='middle'>$start</td>
									<td  style='color:$color' height='13' align='center'  valign='middle'>$end</td>
									<td  style='color:$color' height='13' align='center' valign='middle'>$cliente</td>
									<td  style='color:$color' height='13' align='center' valign='middle'>$m</td>
									<td  style='color:$color' height='13' align='center' valign='middle'>$codigo</td>

								</tr>";
					 }
			}
	
?>	
                </tbody>
            </table>
            
 
        </div>
    </body>
</html>
