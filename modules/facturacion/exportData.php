<?php
ob_start();
?>
<?php
// Decir a PHP que vamos generar un archivo que debe descargarse
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
include_once ("../../fechaNumber.php");
$get_data = callAPI('GET', $servidor.'/api/totalizadorventas_planes/cajas',false);
$response = json_decode($get_data, true);

//cabecera del .csv
echo "SERIE,";
echo "CLIENTE,";
echo "ESTADO CLIENTE,";
echo "NOMBRE,"; 
echo "INICIO_CONTRATO,";
echo "FINAL_CONTRATO,";
echo "R.SOCIAL,"; 
echo "DENOMINACION,"; 
echo "TIPO,"; 
echo "DOC,"; 
echo "DOMICILIO,";  
echo "CP,";  
echo "LOCALIDAD,"; 
echo "IVA,"; 
echo "MAIL,"; 
echo "TIPO,"; 
echo "NUMERO TARJETA,"; 
echo "MARCA,";  
echo "VENCIMIENTO,"; 
echo "TIPO CAJA,"; 
echo "$ PRECIO,"; 
echo "% Cf/uso,"; 
echo "$ Abono/uso,"; 
echo "Tmpo. Contrato,"; 
echo "% Cf/tmpo,"; 
echo "$ Abono Mensual,"; 
echo "Notif,"; 
echo "% Cf.Notif.,"; 
echo "Cb.Gold,"; 
echo "% Cf.Gold,"; 
echo "$ ABONO A FACTURAR,"; 
echo "ID_PLAN,"; 
echo "PLAN ACTIVO,"; 
echo "PLAN DESC,"; 
echo "PLAN INICIO,";
echo "PLAN FIN,";
echo "IMPORTE FINAL,";
echo "FECHA ULT. MODIFICACION\n"; 


//registros del .csv
foreach ($response as $data) {
$PLAN_INICIO = fechaNumber ($data['PLAN_INICIO']);
$PLAN_FIN = fechaNumber ($data['PLAN_FIN']);


    echo $data['serie'].",";
    echo $data['id_cliente'].",";

    if (($data['id_cliente']) > 1 and ($data['status']==1)) {
        $s = 'Activo';
    } elseif (($data['id_cliente']) > 1 and ($data['status']==0)) {
       $s = 'Inactivo';
    } elseif (($data['id_cliente'])== 0 and ($data['status']==0)) {
        $s = '';
    }

    $nro_tarjeta = "'".$data['numero'];
    $inicio = fechaNumber ($data['INICIO_CONTRATO']);
    $fin = fechaNumber ($data['FINAL_CONTRATO']);

    echo $s.",";
    echo $data['CLIENTE'].",";
    echo $inicio.",";
    echo $fin.",";
    echo $data['id_rsocial'].",";
    echo $data['razon_social'].",";
    echo $data['tipo_doc'].","; 
    echo $data['numero_doc'].","; 
    echo $data['domicilio'].","; 
    echo $data['cp'].",";  
    echo $data['localidad'].",";
    echo $data['tipo_iva'].",";
    echo $data['email'].","; 
    echo $data['tipo'].",";  
    echo $nro_tarjeta.","; 
    echo $data['marca'].",";  
    $vencimiento = "'".date("m-Y", strtotime($data['vencimiento']));
    echo $vencimiento.","; 
    echo $data['tipocaja'].","; 

                  $tipo_uso = $data['tipo_uso'];
                  $precioxxx = $data['precio'];
                  $periodo_contratacion = $data['periodo_contratacion'];
                  $coef_comercial = $data['coef_comercial'];
                  $coef_notificacion = $data['coef_notificacion'];
                  $coef_gold = $data['coef_gold'];
                  $ingreso_boveda = $data['ingreso_boveda'];
                  $cobertura_gold = $data['cobertura_gold'];
                  $ID_PLAN = $data['ID_PLAN'];
                  $PLAN_ACTIVO = $data['PLAN_ACTIVO'];
                  $PLAN_DESC = $data['PLAN_DESC'];
                  $PLAN_INICIO = fechaNumber ($data['PLAN_INICIO']);
                  $PLAN_FIN = fechaNumber ($data['PLAN_FIN']);

                  

                  $coef_uso = $tipo_uso * $coef_comercial;
                  
                  if ($coef_uso == 0) {
                    $abono_uso = $precioxxx; 
                  } else {
                    $abono_uso = $precioxxx * $coef_uso;
                  } 

                  if ($periodo_contratacion == 1) {
                    $pc = 'Anual';
                    $coef_tmpo = 1;
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual* $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }
                  } elseif ($periodo_contratacion == 2) {
                    $pc = 'Semestral';
                    $coef_tmpo = $data['coef_contr_semestral'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }
                  } elseif ($periodo_contratacion == 3) {
                    $pc = 'Trimestral';
                    $coef_tmpo = $data['coef_contr_trim'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == true){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }

                  } elseif ($periodo_contratacion == 4) {
                    $pc = 'Mensual';
                    $coef_tmpo = $data['coef_contr_mensual'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }

                  } elseif ($periodo_contratacion == 5) {
                    $pc = 'Anual Adelantado';
                    $coef_tmpo = 0;
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = 0;
                    } else {
                      $coef_cob_gold = 0;
                      $importe_mensual = 0;
                    }
                  } 

                  if ($ingreso_boveda==1){
                    $ib = 'SI';
                } else {
                  $ib = ''; 
                }
  
                if ($cobertura_gold==1){
                  $cg = 'SI';
                } else {
                  $cg = ''; 
                }

                if ($PLAN_ACTIVO == 1) {
                  $importe_final = $importe_mensual - ($importe_mensual * $PLAN_DESC / 100 );
                } else {
                  $importe_final = $importe_mensual;
                }
                
                echo "'$ ".$precioxxx.",";
                echo "'% ".$coef_uso.",";
                echo "'$ ".$abono_uso.",";
                echo $pc.",";
                echo "'% ".$coef_tmpo.",";
                echo "'$ ".$abono_mensual.",";
                echo $ib.",";
                echo "'% ".$coef_notif_bobeda.",";
                echo $cg.",";
                echo "'% ".$coef_cob_gold.",";
                echo "'$ ".$importe_mensual.",";
                echo $ID_PLAN .",";
                echo $PLAN_ACTIVO .",";
                echo "'% ".$PLAN_DESC .",";
                echo $PLAN_INICIO.",";
                echo $PLAN_FIN.",";
                echo "'$ ".$importe_final.",";
                $modificado = date("d/m/Y", strtotime($data['MODIFICADO']));
                echo $modificado."\n"; 
                
            } 

 $csv_file = 'Informe_facturacion_'.date('Y-m-d') .'.csv';
//header("Content-Type: text/csv");
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename=$csv_file");
?>
<?php
ob_end_flush();
?>