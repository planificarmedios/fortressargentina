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
          $get_data = callAPI('GET', $servidor.'/api/auditoria/imprimir/',false);
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
           <h3 style="color:#03F">Informe de Auditoría</h3>
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
                    <th width='1%' class="center">#</th>
                    <th width='10%' class="center">Fecha</th>
                    <th width='10%' class="center">Hora</th>
                    <th width='5%' class="center">Caja Nro</th>
				    <th width='5%' class="center">Serie</th>  
				    <th width='20%' class="center">Acción</th>
                    <th width='10%' class="center">Valor Ant.</th>
                    <th width='10%' class="center">Valor Nuevo</th>

                    </tr>
                </thead>
                <tbody>
<?php

$d = substr($tgl1, 0,2);$m = substr($tgl1, 3,2);$y = substr($tgl1, 6,4);$f_i = $y.'-'.$m.'-'.$d;
$d = substr($tgl2, 0,2);$m = substr($tgl2, 3,2);$y = substr($tgl2, 6,4);$f_f = $y.'-'.$m.'-'.$d;

                                foreach ($response as $d) {
                                    $id = $d['id'];
                                    $serie = $d['serie'];
                                    $CLIENTE = $d["CLIENTE"];
                                    $IDCLIENTE = $d["IDCLIENTE"];
                                    $fecha = fechaNumber($d['fecha']);
                                    $hh = substr($d['fecha'], 11,5); 
                                    $desc_evento = $d['desc_evento']; 
                                    $nro_caja = $d['nro_caja'];
                                    $tipo_cambio = $d['tipo_cambio'];
                                    $valor_anterior = $d['valor_anterior'];
                                    $valor_nuevo = $d['valor_nuevo'];

                                    if ($tipo_cambio == '4' ) {
                                        if ( $valor_anterior == '0') {
                                          $valor_anterior = 'No contratado'; $valor_nuevo = 'Contratado';
                                        } elseif ( $valor_anterior == '1') {
                                          $valor_anterior = 'Contratado'; $valor_nuevo = 'No Contratado';
                                        }
                                      }elseif ($tipo_cambio == '5' ) {
                                        if ( $valor_anterior == '0') {
                                          $valor_anterior = 'Personal'; $valor_nuevo = 'Comercial';
                                        } elseif ( $valor_anterior == '1') {
                                          $valor_anterior = 'Comercial'; $valor_nuevo = 'Personal';
                                        }
                                      }elseif ($tipo_cambio == '8' ) {
                                        if ( $valor_anterior == '0') {
                                          $valor_anterior = 'No contratado'; $valor_nuevo = 'Contratado';
                                        } elseif ( $valor_anterior == '1') {
                                          $valor_anterior = 'Contratado'; $valor_nuevo = 'No Contratado';
                                        }
                                    } 
                                    
                                    if ($fecha >= $tgl1 and $fecha <= $tgl2) 
                                    {
                                    echo "
                                    <tr>
                                    <td width='1%'  class='center'>$id</td>
                                    <td width='10%' class='center'>$fecha</td>
                                    <td width='10%' class='center'>$hh</td>
                                    <td width='5%'  class='center'>$nro_caja</td>	
                                    <td width='5%'  class='center'>$serie</td>
                                    <td width='20%' class='center'>$desc_evento</td>
                                    <td width='10%' class='center'>$valor_anterior</td>
                                    <td width='10%' class='center'>$valor_nuevo</td>
                                    <div>
                                    <a></a>";
                                    }
                                    echo "
                                        </div>
                                        </td>
                                      </tr>";
                              }
	
                            ?>	
                </tbody>
            </table>
            
 
        </div>
    </body>
</html>
