<?php 
session_start();
require_once ("../callAPI.php");
require_once ("../parametros.php");
if(isset($_POST['dataServicio']) and isset($_POST['dataToken']) and isset($_POST['dataCliente'])) {
$ds = $_POST['dataServicio'];
$dt = $_POST['dataToken'];
$dc = $_POST['dataCliente'];

$jsonData = array( 'token' => "$dt", 'id_servicio' => "$ds", 'id_cliente' => "$dc" );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/adicionales/add');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);
						
						}
?>