<?php
session_start();
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
if ($_GET['act']=='delete') {
		if (isset($_GET['id']) and isset($_GET['nrocaja']) and isset($_GET['serie'])) { 
		    $id = $_GET['id']; 
		    $nrocaja = $_GET['nrocaja'];
			$serie = $_GET['serie'];
		    $usuario = $_SESSION['name_user'];
		}
		$jsonData = array( 'id' => "$id", 'usuario' => "$usuario", 'serie' => "$serie", 'nrocaja' => "$nrocaja" );
		$data_string = json_encode($jsonData);
		$ch = curl_init($servidor.'/api/cajas/delete/');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
		);
		$result = curl_exec($ch);
	    header("location: ../../main.php?module=cj&alert=3");
	
} 
?>		
		
