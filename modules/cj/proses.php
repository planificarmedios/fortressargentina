<?php
session_start();
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
if ($_GET['act']=='asociado') {
	if (isset($_POST['guardar'])) {
					$nro_caja= $_POST['nro_caja'];
					$id_asociado = $_POST['id_asociado'];
					$nombre_usuario = $_SESSION['name_user'];
					$id_caja = $_POST['id_caja'];
					$jsonData = array( 'nro_caja' => "$nro_caja", 
									   'nombre_usuario' => "$nombre_usuario", 
									   'id_asociado' => "$id_asociado");
					$data_string = json_encode($jsonData);
					$ch = curl_init($servidor.'/api/asociados/insertar');
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
					'Content-Length: ' . strlen($data_string))
					);
					$result = curl_exec($ch);    
					//header("location: ../../main.php?module=form_cj&form=edit&id=$id_caja");
					header("location: ../../main.php?module=formEdit_cj&formEdit=edit&id=$id_caja&nrocaja=$nro_caja");
					
				//	}
		}


} elseif ($_GET['act']=='updateCaja') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
		$id_cliente_original = 0;
				if (isset($_POST['idcaja'])) {  
					$idcaja 			= $_POST['idcaja']; 
					$id_cliente 		= $_POST['id_cliente']; 
					$id_servicio 		= $_POST['id_servicio']; 
					$nrocaja 			= $_POST['nro_caja']; 
					$id_tarjeta 		= $_POST['id_tarjeta']; 
					$id_rsocial  		= $_POST['id_rsocial'];
					$serie 		  		= $_POST['serie']; 
					$f_inicio 			= $_POST['f_inicio']; 
					$f_final 			= $_POST['f_final'];
					$cobertura_gold 	= $_POST['cobertura_gold'];
					$ingreso_boveda 	= $_POST['ingreso_boveda'];
					$tipo_uso 	 		= $_POST['tipo_uso'];
  				    $id_cliente_original= $_POST['id_cliente_original'];
					$fi_original 		= $_POST['fi_original'];
					$ff_original 		= $_POST['ff_original'];
					$id_tarjeta_original= $_POST['id_tarjeta_original'];
					$id_rsocial_original= $_POST['id_rsocial_original'];
					$gold_original		= $_POST['gold_original'];
					$periodo_contratacion = $_POST['periodo_contratacion'];
					$uso_original 		= $_POST['uso_original'];
					$ingreso_boveda_original = $_POST['ingreso_boveda_original'];
					$nombre_usuario 		= $_SESSION['name_user'];
					$id_usuario_cambio 	= $_SESSION['id_user'];
					$mensaje = '';
					$ultima_modificacion = date("Y-m-d");
					
					
					if ($id_cliente == 0 ) {
						$cobertura_gold = 0;
						$ingreso_boveda= 0;
						$tipo_uso = 0;
						$periodo_contratacion  = 0;
						$id_rsocial = 0; 
						$id_tarjeta = 0; 
						$f_inicio = '';
						$f_final = '';
						
					}

					//cho 'Fecha + 1 año: '.  date("d-m-Y",strtotime($fecha_actual."+ 12 month"));

					if ($_POST['cambio']==1) { 	
						if ($periodo_contratacion==1){
							$f_final =  date("Y-m-d",strtotime($f_inicio."+ 12 month"));
						}elseif ($periodo_contratacion==2){
							$f_final =  date("Y-m-d",strtotime($f_inicio."+ 6 month"));
						}elseif ($periodo_contratacion==3){
							$f_final =  date("Y-m-d",strtotime($f_inicio."+ 3 month"));
						}elseif ($periodo_contratacion==4){
							$f_final =  date("Y-m-d",strtotime($f_inicio."+ 1 month"));
						}elseif ($periodo_contratacion==5){
							$f_final =  date("Y-m-d",strtotime($f_inicio."+ 12 month"));
						}
					}
				
					$jsonData = array( 
										   'id' =>         		  "$idcaja",
										   'serie' =>         	  "$serie",
										   'id_cliente' => 		  "$id_cliente",
										   'usuario' =>    		  "$usuario",
										   'nrocaja' =>    		  "$nrocaja",
										   'id_rsocial' => 		  "$id_rsocial",
						                   'id_tarjeta' => 		  "$id_tarjeta",
										   'f_inicio' =>   		  "$f_inicio",
										   'f_final' =>    		  "$f_final",
										   'cobertura_gold' =>    "$cobertura_gold",
										   'periodo_contratacion' =>      "$periodo_contratacion",
										   'ingreso_boveda' =>    "$ingreso_boveda",
										   'tipo_uso' =>    	  "$tipo_uso",
										   'mensaje' =>    	  	  "$mensaje",
										   'nombre_usuario' =>    "$nombre_usuario",
										   'id_usuario_cambio' => "$id_usuario_cambio",
										   'ultima_modificacion' => "$ultima_modificacion",
										   'id_servicio' => 	  "$id_servicio"
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/cajas/updateDatosCaja/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch); 
				   } // fin del foreach del update cliente

									
	
					header("location: ../../main.php?module=cj&alert=2");
		
			
} elseif ($_GET['act']=='enableasociado') {

include_once ("../../callAPI.php");
include_once ("../../parametros.php");

			if ((isset($_GET['nro_caja'])) and (isset($_GET['id_asociado'])) and (isset($_GET['id_caja']))){ 
			$id_asociado = $_GET['id_asociado']; 
			$nro_caja = $_GET['nro_caja'];
			$i = $_GET['id_caja'];
			}
			$nombre_usuario = $_SESSION['name_user'];
			$id_usuario_cambio 	= $_SESSION['id_user'];
			
						$jsonData = array(  'id_asociado' => "$id_asociado", 
						                    'nombre_usuario' => "$nombre_usuario", 
						                    'usuario' => "$usuario",
						                    'nro_caja' => "$nro_caja"
						                 );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/enableasociado/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json',
						'Content-Length: ' . strlen($data_string))
						);
				        $result = curl_exec($ch);   
	                    header("location: ../../main.php?module=formEdit_cj&formEdit=edit&id=$i&nrocaja=$nro_caja");
	                    
					
}

?>