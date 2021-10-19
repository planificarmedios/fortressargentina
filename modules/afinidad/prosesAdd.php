<?php
session_start();
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
 if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
	    $nrocaja = $_POST['nrocaja'];
		$serie = $_POST['serie'];
		$tipo_caja = $_POST['tipo_caja'];
		$usuario = $_SESSION['name_user'];
		
		
		$jsonData = array( 'nrocaja' 	=> "$nrocaja", 
						   'serie' 		=> "$serie",
		                   'usuario' 	=> "$usuario",
						   'tipo_caja' 	=> "$tipo_caja"
						   );
		$data_string = json_encode($jsonData);
		$ch = curl_init($servidor.'/api/cajas/add');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
		);
		$result = curl_exec($ch);    
        header("location: ../../main.php?module=cj&alert=1");
		}
 }
?>		
		
