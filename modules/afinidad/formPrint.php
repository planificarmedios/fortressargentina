<?php
//session_start();

if (isset($_POST['imprimir'])) {
		
		$nrocaja = $_POST['nrocaja'];
		$id = $_POST['id_cliente'];
		$id_servicio = $_POST['id_servicio'];
		$impresiones = $_POST['impresiones'];
		$idcaja = $_POST['idcaja'];
	    $id_rsocial = 0 ;
	    $id_rsocial = $_POST['id_rsocial'];
		$alias = $_POST['alias'];
		$id_asistente = $_POST['id_asistente'];
		$id_evento = $_POST['id_evento'];

		if ($alias) { } else {  $alias = 'No indica el Cliente';};
		  include_once ("../../callAPI.php");
		  include_once ("../../parametros.php");
		  include_once ("fechaNumber.php");
		  include_once ("NumeroAletras.php");
	
		 
		  

	     if   ($id_rsocial == 0 ) { //significa que mantiene el mismo titular para datos del contrato
			 
					$get_data = callAPI('GET', $servidor.'/api/clientes/'.$id,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
						$idcliente = $d['id'];
						$nombre = $d['nombre'];
						$apellido = $d['apellido'];
						$fn = substr($d['fecha_nacimiento'], 0,10); 
						$telm = $d['telefono_movil'];
						$email = $d['email'];
						$telf = $d['tel_fijo'];
						$dom = $d['dommicilio'];
						$doc = $d['tipo_documento'];
						$nro_doc = $d['dni'];
						$USRID = $d['USRID'];
						$alias = $d['alias'];
						$estado_civil = $d['estado_civil'];
						$nombre_apell_matrimonio= $d['nombre_apell_matrimonio'];
						$dni_matrimonio= $d['dni_matrimonio'];
						$cp = $d['cp'];
						$tipo_iva = $d['condicion_iva'];
					}
					
					
					$get_data = callAPI('GET', $servidor.'/api/ciudades/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $g) {
					      
						  if ($cp == $g['cp']) {
						  	 $cp3 = $g['cp'];
							 $l = $g['localidad']; 
							 $p = $g['provincia'];  
						  }
					}
		 
		 } else if ($id_rsocial > 0 ) { // sginifica que esta eligiendo una razon social diferente para el contrato
			 
	                 
                        $get_data = callAPI('GET', $servidor.'/api/fiscales/listar',false);
                        $response = json_decode($get_data, true);
                        foreach ($response as $rs) {
                                   if ($id_rsocial == $rs['id']) {
                                        $doc = $rs['tipo_doc'];
										$nombre = $rs['razon_social'];
									    $nro_doc = $rs['numero_doc'];
									    $dom = $rs['domicilio'];
									    $l = $rs['localidad'];
									    $cp3 = $rs['cp'];
									    $tipo_iva = $rs['tipo_iva'];
									    $telm = '';
									    $alias = '';
									    $estado_civil = '';
										$email = $rs['email'];
										$telf = $rs['tel_fijo'];
									    $idcliente = '';
									    $apellido = '';
                                  }
						}
			 //$apellido = '';
			 //$idcliente = $_POST['id_cliente'];
			// $alias = $_POST['alias'];
			 
		}	 // fin del if para validar si el titular es por defecto o quiere cambiarlo

			if ($id_asistente > 0){
					$get_data = callAPI('GET', $servidor.'/api/clientes/'.$id_asistente,false);
					$response = json_decode($get_data, true);
					foreach ($response as $asist) {
						$id_asist = $asist['id'];
						$nombre_asist = $asist['nombre'];
						$apellido_asist = $asist['apellido'];
						$doc = $asist['tipo_documento'];
						$nro_doc_asist = $asist['dni'];
						$alias_asist = $asist['alias'];
					}
			}	

	
					if ($doc ==1){
							$doc = 'DNI';
					} elseif ($doc ==2) {
							$doc = 'CUIL';
					} elseif ($doc==3){
							$doc = 'CUIT';
					}
					
					
					$get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
                    $response = json_decode($get_data, true);
                    foreach ($response as $t) {
                             if ($id_servicio == $t['id']) {
                                  $descripcion2 = $t['descripcion'];
                                  $precio = $t['precio'];
                             }
					}
					 
		 
					$get_data = callAPI('GET', $servidor.'/api/cajasRazonSocial/'.$idcaja,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
						$id = $d['id'];
						$id_cliente = $d['id_cliente'];
						$id_servicio = $d['id_servicio'];
						$serie = $d['serie'];
						$nro_caja = $d['nro_caja'];
						$id_tarjeta = $d['id_tarjeta'];
						$tipocaja = $d['tipocaja'];
						$descripcion = $d['descripcion'];
						$periodo_contratacion = $d['periodo_contratacion'];
						$cliente = $nombre.' '.$apellido;
						$f_inicio = $d['f_inicio'];
						$f_final = $d['f_final'];
						$fi_original =  $d['f_inicio'];
						$ff_original =  $d['f_final']; 
						$cobertura_gold =  $d['cobertura_gold'];
						$ingreso_boveda =  $d['ingreso_boveda'];
						$tipo_uso =  $d['tipo_uso'];
						$IDFISCAL =  $d['IDFISCAL'];
						$DENOMINACIONFISCAL=  $d['DENOMINACIONFISCAL'];
						$TIPODOCFISCAL =  $d['TIPODOCFISCAL'];
						if ($TIPODOCFISCAL == 1) { 
							$TIPODOCFISCAL = 'DNI';
						} elseif  ($TIPODOCFISCAL == 2) {
							$TIPODOCFISCAL = 'CUIL';
						} elseif  ($TIPODOCFISCAL == 3) {
							$TIPODOCFISCAL = 'CUIT';
						}		 
						$NRODOCFISCAL=  $d['NRODOCFISCAL'];
						$CONDFISCAL=  $d['CONDFISCAL'];
						$DOMICILIOFISCAL=  $d['DOMICILIOFISCAL'];
						$CPFISCAL=  $d['CPFISCAL'];
						$LOCFISCAL=  $d['LOCFISCAL'];

						
						$get_data=callAPI('GET', $servidor.'/api/servicios/adicionales', false);
              $response=json_decode($get_data, true);
              foreach ($response as $a) {
                if ($id_servicio == $a['id'][0]) {
                  $precioxxx = $a['precio'];
                  $coef_comercial = $a['coef_comercial'];
                  $coef_notificacion = $a['coef_notificacion'];
                  $coef_gold = $a['coef_gold'];
                 
                  $coef_uso = $tipo_uso * $coef_comercial;
                  
                  if ($coef_uso == 0) {
                    $abono_uso = $precioxxx; 
                  } else {
                    $abono_uso = $precioxxx * $coef_uso;
                  } 

                  if ($periodo_contratacion == 1) {
					$pc = 'Anual';
					$pagadero = 'mensual';
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
                    $coef_tmpo = $a['coef_contr_semestral'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
					$coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
					$pagadero = 'mensual';
                    
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }
                  } elseif ($periodo_contratacion == 3) {
                    $pc = 'Trimestral';
                    $coef_tmpo = $a['coef_contr_trim'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
					$coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
					$pagadero = 'mensual';

                    if ($cobertura_gold == true){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }

                  } elseif ($periodo_contratacion == 4) {
                    $pc = 'Mensual';
                    $coef_tmpo = $a['coef_contr_mensual'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
					$coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
					$pagadero = 'mensual';

                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }

                  } elseif ($periodo_contratacion == 5) {
                    $pc = 'Anual Adelantado';
                    $coef_tmpo = 1;
                    $abono_mensual = $abono_uso * $coef_tmpo;
					$coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
					$pagadero = 'pagadero por adelantado';

                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = ($abono_mensual * $coef_cob_gold) * 12;
                    } else {
                      $coef_cob_gold = 0;
                      $importe_mensual = ($abono_mensual) * 12;
                    }
                  } 
                  
                      

                }
              }

	}
	
					
					
					$get_data = callAPI('GET', $servidor.'/api/tarjetas/listar',false);
					$response = json_decode($get_data, true);
							
						foreach ($response as $tj) {
										    									
									   if ($id_tarjeta == $tj['id']) {
											$marca = $tj['marca'];
										    $banco = $tj['banco'];
											$num_tarj = $tj['numero'];
											$tipo_cobro = $tj['tipo'];
										    $vencimiento = fechaNumber($tj['vencimiento']);
											$v = (substr($vencimiento, 3,7));
										   	
									  }
						}
	
					
					if ($periodo_contratacion == 1) {
						$per_contrat = 'ANUAL CON RENOVACIÓN AUTOMÁTICA';
						$form_pago = 'DÉBITO POR TARJETA DE CRÉDITO CON PRORROGA AUTOMÁTICA';
					} elseif ($periodo_contratacion == 2) {
						$per_contrat  = 'SEMESTRAL CON RENOVACIÓN AUTOMÁTICA';
						$form_pago = 'DÉBITO POR TARJETA DE CRÉDITO CON PRORROGA AUTOMÁTICA';
					} elseif ($periodo_contratacion == 3) {
						$per_contrat  = 'TRIMESTRAL CON RENOVACIÓN AUTOMÁTICA';
						$form_pago = 'DÉBITO POR TARJETA DE CRÉDITO CON PRORROGA AUTOMÁTICA';
					} elseif ($periodo_contratacion == 4) {
						$per_contrat  = 'MENSUAL CON RENOVACIÓN AUTOMÁTICA';
						$form_pago = 'DÉBITO POR TARJETA DE CRÉDITO CON PRORROGA AUTOMÁTICA';
					} elseif ($periodo_contratacion == 5) {
						$per_contrat  = 'ANUAL CON RENOVACIÓN AUTOMÁTICA';
						$form_pago = 'PAGO ADELANTADO CON PRORROGA AUTOMÁTICA';
					}	

	
					
					$fi = fechaNumber(substr($d['f_inicio'], 0,10));
					$ff = fechaNumber(substr($d['f_final'], 0,10));
						
						
						
						$cobertura_gold = $d['cobertura_gold'];
						if ($cobertura_gold == true) { 
							$cg = 'Contratado'; 
						} else {
							$cg = 'No Contratado'; 
						};
						
						$tipo_uso = $d['tipo_uso'];
						if ($tipo_uso == true) { 
							$tu = 'Comercial'; 
						} else {
							$tu = 'Personal'; 
						};
	
						$ingreso_boveda = $d['ingreso_boveda'];
						if ($ingreso_boveda == true) { 
							$ib = 'Contratado'; 
						} else {
							$ib = 'No Contratado'; 
						};

						$ingreso_boveda = $d['ingreso_boveda'];
				
					if (isset($estado_civil)){
						
						if ($estado_civil == 1) { 
							$estado_civil = 'Soltero'; 
						} 
						
						if ($estado_civil == 2) { 
							$estado_civil = 'Casado con ' . $nombre_apell_matrimonio . ' Doc.: ' . $dni_matrimonio;
						} 
						
						if ($estado_civil == 3) {
							$estado_civil = 'Viudo';
						} 
						
						if ($estado_civil == 4) {
							$estado_civil = 'Unión de Convivencia con '. $nombre_apell_matrimonio . ' Doc.: ' . $dni_matrimonio;
						} 
						
						if ($estado_civil == 5) {
							$estado_civil = 'En pareja ';
						} 
						
						if ($estado_civil == 6) {
							$estado_civil = 'No indica ';
						}
					} else {
						$estado_civil = '';
					}
						
						
						for ($n=0;$n<count($impresiones);$n++)  
						{     
								if ($impresiones[$n] == "c000" ) { 
									     
										include_once "res/c001.php"; 
										include_once "res/r001.php"; 
										include_once "res/f001.php"; 
										include_once "res/f003.php";	
									    include_once "res/r002.php"; 
										include_once "res/d001.php";
										    
								} else { 
									if ($impresiones[$n] == "c001" ) { include_once "res/c001.php"; }  
									if ($impresiones[$n] == "r001" ) { include_once "res/r001.php"; }
									if ($impresiones[$n] == "r002" ) { include_once "res/r002.php"; }
									if ($impresiones[$n] == "f001" ) { include_once "res/f001.php"; } 
									if ($impresiones[$n] == "f003" ) { include_once "res/f003.php"; } 
									if ($impresiones[$n] == "f004" ) { include_once "res/f004.php"; }  
									if ($impresiones[$n] == "f005" ) { include_once "res/f005.php"; }
									if ($impresiones[$n] == "f006" ) { include_once "res/f006.php"; }
									if ($impresiones[$n] == "d001" ) { include_once "res/d001.php"; }
									if ($impresiones[$n] == "d002" ) { include_once "res/d002.php"; }
									if ($impresiones[$n] == "f007" ) { include_once "res/f007.php"; }
									if ($impresiones[$n] == "f008" ) { include_once "res/f008.php"; }
								}
						} 

						
				
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../cj - Copia/sales_invoice/assets/css/main.css">
</head>

<body>
<div class="control-bar">
  <div class="container">
    <div class="row">
      <div class="col-2-4">
      
      
      
      </div>
    
      <div class="col-8 text-right">
        <a href="javascript:window.print()">Imprimir</a>
		<a href="javascript:history.back()">Volver</a>
		<a href="../../main.php?module=form_recepcion&form=edit&id=<?php echo $id_asistente;?>&id_evento=<?php echo $id_evento;?>">Regresar Zona Recepción</a>
      </div><!--.col-->
    </div><!--.row-->
  </div><!--.container-->
</div><!--.control-bar-->
</div><!--.row-->

<?php  

} elseif (isset($_POST['copiar'])) {

					include_once "../cj - Copia/res/f003.php";  
 ?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../cj - Copia/sales_invoice/assets/css/main.css">
	</head>
	
	<body>
	<div class="control-bar">
	  <div class="container">
		<div class="row">
		  <div class="col-2-4">
		  
		  
		  
		  </div>
		
		  <div class="col-8 text-right">
			<a href="javascript:window.print()">Imprimir</a>
			<a href="../../main.php?module=form_prices&form=listar">Volver</a>
		  </div><!--.col-->
		</div><!--.row-->
	  </div><!--.container-->
	</div><!--.control-bar-->
	</div><!--.row-->

<?php	
}	
?>

</body>
</html>