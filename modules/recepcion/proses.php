<?php
session_start();

if ($_GET['act']=='update') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	
					if (
						(isset($_GET['nro_caja'])) 
						and 
						(isset($_GET['id_evento'])) 
						and 
						(isset($_GET['id_titular']))) 
						{ 
						
						$nro_caja = $_GET['nro_caja'];
						$id_evento = $_GET['id_evento'];
						$id_titular = $_GET['id_titular'];
						} else {
							$nro_caja = $_GET['nro_caja'];
							$id_evento = $_GET['id_evento'];
							$id_titular = 0;
					}				
						
						$jsonData = array( 
										   'nro_caja' => "$nro_caja",
							 	           'id_titular' => "$id_titular",  
										   'id' => "$id_evento" 
										   );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/access/update');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);    
	                    header("location: ../../main.php?module=recepcion&alert=1");
		
}

elseif ($_GET['act']=='ingresomanual') {
	include_once ("../../callAPI.php");
	require_once ("../../parametros.php");	
		if (isset($_POST['guardar'])) {
				
			$zk_manual = $_POST['zk_manual'];
			$jsonData = array( 
					'zk_manual' => "$zk_manual",
					);
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/access/ingresomanual');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);    
						header("location: ../../main.php?module=recepcion");
		}
} 



elseif ($_GET['act']=='limpiarEstadistica') {
	include_once ("../../callAPI.php");
	require_once ("../../parametros.php");	
		
	if (isset($_GET['valor'])){
		$valor = $_GET['valor'];
	} 		
			
			$jsonData = array( 
					'valor' => "$valor",
					);
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/LimpiarEstadistica');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);    
						header("location: ../../main.php?module=recepcion");
		
} 

elseif ($_GET['act']=='cambiar') {
	include_once ("../../callAPI.php");
	require_once ("../../parametros.php");	

		if (isset($_GET['valor'])){
			$valor = $_GET['valor'];
		} 

					$jsonData = array( 
						'valor' => "$valor",
						);
		
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/access/cambiarSemaforo');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);    
						header("location: ../../main.php?module=recepcion");

						
} elseif ($_GET['act']=='updateImpresiones') {

						include_once ("../../callAPI.php");
						include_once ("../../parametros.php");
						
									if (isset($_GET['id_evento'])){ 
									$id_evento = $_GET['id_evento']; 
									}
									
												$jsonData = array(  'id_evento' => "$id_evento");
												$data_string = json_encode($jsonData);
												$ch = curl_init($servidor.'/api/updateImpresiones');
												curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
												curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
												curl_setopt($ch, CURLOPT_HTTPHEADER, array(
												'Content-Type: application/json',
												'Content-Length: ' . strlen($data_string))
												);
												$result = curl_exec($ch);   
												header("location: ../../main.php?module=recepcion");
											}