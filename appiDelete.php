<?php
if (!isset($_SESSION['id_user'])){header("Location: ../");}
session_start();
include_once ("callAPI.php");
include_once ("parametros.php");
$c = $_SESSION['codigo'];
$jsonData = array( 'token' => "$c" );
$data_string = json_encode($jsonData);
$ch = curl_init($servidor.'/api/reservas/delete/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);
header("Location: pluton/index.php");
?>