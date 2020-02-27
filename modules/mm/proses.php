
<?php
session_start();
require_once "../../config/database.php";

if ($_GET['act']=='delete') {
        if (isset($_GET['codigo'])) { $codigo = $_GET['codigo']; }
		include_once ("../callAPI.php");
		$c = $codigo;
		$jsonData = array( 'token' => "$c" );
		$data_string = json_encode($jsonData);
		$ch = curl_init('192.168.1.45:2999/api/reservas/delete/');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
		);
		$result = curl_exec($ch);
		
                header("location: ../../main.php?module=mm&alert=3");
    }       
?>