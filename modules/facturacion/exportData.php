<?php
// Decir a PHP que vamos generar un archivo que debe descargarse
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
include_once ("../../fechaNumber.php");
$get_data = callAPI('GET', $servidor.'/api/cajas/facturarOcupadas',false);
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
echo "TIPO CAJA,"; 
echo "Precio,"; 
echo "Cf/uso,"; 
echo "Abono/uso,"; 
echo "Tmpo. Contrato,"; 
echo "Cf/tmpo,"; 
echo "Abono Mensual,"; 
echo "Notif,"; 
echo "Cf.Notif.,"; 
echo "Cb.Gold,"; 
echo "Cf.Gold,"; 
echo "FECHA ULT. MODIFICACION\n"; 


//registros del .csv
   foreach ($response as $data) {
    echo $data['serie'].",";
    echo $data['id_cliente'].",";

    if (($data['id_cliente']) > 1 and ($data['status']==1)) {
        $s = 'Activo';
    } elseif (($data['id_cliente']) > 1 and ($data['status']==0)) {
       $s = 'Inactivo';
    } elseif (($data['id_cliente'])== 0 and ($data['status']==0)) {
        $s = '';
    }
    echo $s.",";
    echo $data['CLIENTE'].",";
    echo $data['INICIO_CONTRATO'].",";
    echo $data['FINAL_CONTRATO'].",";
    echo $data['id_rsocial'].",";
    echo $data['razon_social'].",";
    echo $data['tipo_doc'].","; 
    echo $data['numero_doc'].","; 
    echo $data['domicilio'].","; 
    echo $data['cp'].",";  
    echo $data['localidad'].",";
    echo $data['tipo_iva'].",";
    echo $data['email'].","; 
    echo $data['tipocaja'].","; 

                  $tipo_uso = $data['tipo_uso'];
                  $precioxxx = $data['precio'];
                  $periodo_contratacion = $data['periodo_contratacion'];
                  $coef_comercial = $data['coef_comercial'];
                  $coef_notificacion = $data['coef_notificacion'];
                  $coef_gold = $data['coef_gold'];
                  $ingreso_boveda = $data['ingreso_boveda'];
                  $cobertura_gold = $data['cobertura_gold'];

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
                    $coef_cob_gold = $cobertura_gold*$coef_gold;
                  } elseif ($periodo_contratacion == 2) {
                    $pc = 'Semestral';
                    $coef_tmpo = $data['coef_contr_semestral'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    $coef_cob_gold = $cobertura_gold*$coef_gold;
                  } elseif ($periodo_contratacion == 3) {
                    $pc = 'Trimestral';
                    $coef_tmpo = $data['coef_contr_trim'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    $coef_cob_gold = $cobertura_gold*$coef_gold;
                  } elseif ($periodo_contratacion == 4) {
                    $pc = 'Mensual';
                    $coef_tmpo = $data['coef_contr_mensual'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    $coef_cob_gold = $cobertura_gold*$coef_gold;
                  } elseif ($periodo_contratacion == 5) {
                    $pc = 'Anual Adelantado';
                    $coef_tmpo = 0;
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    $coef_cob_gold = $cobertura_gold*$coef_gold;
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
                  
                echo '$'.$precioxxx."$,";
                echo '%'.$coef_uso."%,";
                echo '$'.$abono_uso."$,";
                echo $pc.",";
                echo '%'.$coef_tmpo."%,";
                echo '$'.$abono_mensual."$,";
                echo $ib.",";
                echo '%'.$coef_notif_bobeda."%,";
                echo $cg.",";
                echo '%' .$coef_cob_gold."%,";
                $modificado = date("d/m/Y", strtotime($data['MODIFICADO']));
                echo $modificado."\n"; 
                
            } 

 $csv_file = 'Informe_de_Cajas_facturacion_'.date('Y-m-d') .'.csv';
//header("Content-Type: text/csv");
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename=$csv_file");



?>