<?php
session_start();
ob_start();

include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
include_once ("../../fechaNumber.php");

     
      $get_data = callAPI('GET', $servidor.'/api/cajas/auditoriaTotales/',false);
      $response = json_decode($get_data, true);

                echo "#Id Registro.,";
                echo "CAJA.,";
                echo "#ID CLIENTE.,";
                echo "#ID SERVICIO.,";
                echo "#ID RAZON SOCIAL.,";
                echo "#ID TARJETA.,";
                echo "INICIO CONTRATO.,";
                echo "FINAL CONTRATO.,"; 
                echo "COBERT GOLD.,";  
                echo "TIPO USO.,";
                
                
                echo "PERIODO DE CONTRATO.,";
                echo "PRECIO BASE.,";
                echo "% COEF. USO COMERCIAL.,";
                echo "% COEF. COBERTURA GOLD.,";
                echo "% COEF. CONTRATAC. MENSUAL.,";
                echo "% COEF. CONTRATAC. TRIMESTRAL.,";
                echo "% COEF. CONTRATAC. SEMESTRAL,";
                echo "AVISO INGRESO A BOVEDAD.,";
                echo "% COEF. NOTIF. INGRESO A BOVEDAD.,";
                echo "USUARIO.,";
                echo "FECHA ULT. MODIFICACION.\n"; 
          //registros del .csv
          foreach ($response as $d) {

            $id = $d['id'];
            $serie = $d['serie'];
            $id_cliente = $d['id_cliente'];
            $id_servicio = $d['id_servicio'];
            $precio = $d['precio'];
            $id_rsocial = $d['id_rsocial'];
            $id_tarjeta = $d['id_tarjeta'];
            $f_inicio = fechaNumber($d['f_inicio']);
            $f_final = fechaNumber($d['f_final']);
            $cobertura_gold = $d['cobertura_gold'];
            $serie = $d['serie'];
            $tipo_uso = $d['tipo_uso'];
            $ingreso_boveda = $d['ingreso_boveda'];
            $nombre_usuario = $d['nombre_usuario'];
            $ultima_modificacion = fechaNumber($d['ultima_modificacion']);
            $periodo_contratacion = $d['periodo_contratacion'];
            $precio = $d['precio'];
            $hora = $d['hora'];
            $hora_for = substr($hora,11, 5);
            $coef_comercial = $d['coef_comercial'];
            $coef_gold = $d['coef_gold'];
            $coef_contr_mensual = $d['coef_contr_mensual'];
            $coef_contr_trim = $d['coef_contr_trim'];
            $coef_contr_semestral = $d['coef_contr_semestral'];
            $coef_notificacion = $d['coef_notificacion'];

           
            if ($periodo_contratacion == 1) {
              $pc = 'Anual';
            } elseif ($periodo_contratacion == 2) {
              $pc = 'Semestral';
            } elseif ($periodo_contratacion == 3) {
              $pc = 'Trimestral';
            } elseif ($periodo_contratacion == 4) {
              $pc = 'Mensual';
            } elseif ($periodo_contratacion == 5) {
              $pc = 'Anual Adelantado';
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



          echo $id.",";
          echo $serie.",";
          echo $id_cliente.",";
          echo $id_servicio.",";
          echo $id_rsocial.",";
          echo $id_tarjeta.",";
          echo $f_inicio.",";
          echo $f_final.","; 
          echo $cg.","; 
          echo $tipo_uso.",";
          echo $periodo_contratacion .",";
          echo "'$ ".$precio.",";
          echo "'% ".$coef_comercial.",";
          echo "'% ".$coef_gold.",";
          echo "'% ".$coef_contr_mensual.",";
          echo "'% ".$coef_contr_trim.",";
          echo "'% ".$coef_contr_semestral.",";
          echo $ib.",";
          echo "'% ".$coef_notificacion.",";
          echo $nombre_usuario.",";
          echo $ultima_modificacion.' '.$hora_for."\n"; 
          } 

$csv_file = 'Informe_de_Cajas_facturacion_'.date('Y-m-d') .'.csv';
//header("Content-Type: text/csv");
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename=$csv_file");

?>