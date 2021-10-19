<?php
session_start();

if ($_GET['act']=='enviarnotificaciones') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	


			$get_data = callAPI('GET', $servidor.'/mailsPrueba/',false);
			$response = json_decode($get_data, true);
	 		foreach ($response as $d) {
					$mail = $d['mail']; 
   
  
						$jsonData = array(  'mail' => "$mail"
					                     );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/enviarMail');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);
			}

	        header("location: ../../main.php?module=notificaciones&alert=1");
					
} 

?>