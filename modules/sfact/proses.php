<?php
session_start();
if ($_GET['act']=='update') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	
				if (isset($_GET['id'])) { 
				    $id = $_GET['id'];	
					
						$jsonData = array( 'id' => "$id", );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/movimientos/actualizar');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);    
	                    header("location: ../../main.php?module=sfact&alert=1");
		}
} 

elseif  ($_GET['act']=='clear') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	
				if (isset($_GET['id']) and isset($_GET['usrid'])) { 
				    $id = $_GET['id'];
					$usrid= $_GET['usrid'];
					$jsonData = array( 'id' => "$id", );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/ingreso/actualizar');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);
						header("location: ../../main.php?module=form_sfact&form=listar&id=$usrid"); 
						//main.php?module=form_sfact&form=listar&id=3   
	           }
}
?>