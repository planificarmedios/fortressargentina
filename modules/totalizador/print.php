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
$fecha_inicio = date("Y-m-d", strtotime($tgl1));
//$f_final = strtotime ( '+1 day' , strtotime ( $tgl2 ) ) ;
$fecha_final = date("Y-m-d", strtotime($tgl2));

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
          include_once ("../../callAPI.php");
		  include_once ("../../parametros.php");
		  require_once("../../MP/mailing_transaction/fechaCastellano.php");
		  require_once("../../MP/mailing_transaction/fechaNumber.php");
          $get_data = callAPI('GET', $servidor.'/api/totalizador/ingreso_cajas/'.$fecha_inicio.'/'.$fecha_final,false); 
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
           <h3 style="color:#03F">Totalizador de Ingresos por Caja</h3>
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Fecha: de las 00.00 hs del  <?php echo fechaCastellano($tgl1); ?>
			<br>Hasta las 00.00 hs <?php echo fechaCastellano($tgl2);  ?> 
			
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Desde las 00.00 hs del  <?php echo fechaCastellano($tgl1); ?> 
			
        </div>
         <div id="title-tanggal">
            Hasta las 00.00 hs <?php echo fechaCastellano($tgl2);  ?> 
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="80%" border="1" align="center">
                <thead style="border-color:#000" style="background:#e8ecee">
                    <tr class="tr-title">
				        <th height="20" align="center" valign="middle">Totalizador</th>
                        <th height="20" align="center" valign="middle">Tipo Uso</th>
                        <th height="20" align="center" valign="middle">Caja</th>
                        <th height="20" align="center" valign="middle">Serie Caja</th>
                        <th height="20" align="center" valign="middle">Cliente</th>
				    </tr>
                </thead>
                <tbody>
<?php


		   foreach ($response as $data) {
					
				 $totalizador = $data['TOTALIZADOR'];
			     $idcaja = $data['CAJA'];
			     $serie = $data['SERIE'];
			     $idtitular = $data['ID_TITULAR'];
                 $uso = $data['USO'];			
                    if ($uso == 0) { 
                        $tipo_uso = 'Personal';
                    } else  { 
                        $tipo_uso = 'Comercial';
                    };
                    
						echo "  <tr>
									<td  height='13' align='center'  valign='middle'>$totalizador</td>
									<td  height='13' align='center'  valign='middle'>$tipo_uso</td>
									<td  height='13' align='center'  valign='middle'>$idcaja</td>
									<td  height='13' align='center' valign='middle'>$serie</td>
                                    <td  height='13' align='center' valign='middle'>$idtitular</td>
								</tr>";
                      
                    }
	
?>	
                </tbody>
            </table>
            
 
        </div>
    </body>
</html>
