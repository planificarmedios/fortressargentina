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
