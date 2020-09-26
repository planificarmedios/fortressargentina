<?php
session_start();
    require_once ("callAPI.php");
	require_once ("parametros.php");
    $mensaje = 'LogOut usuario';
    $usuario = $_SESSION['name_user'];
    
    $jsonData = array(
        'mensaje' =>        "$mensaje",
        'usuario' => 	    "$usuario"
    );

    $data_string = json_encode($jsonData);
    $ch = curl_init($servidor . '/api/AuditLogin/');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));
    $result = curl_exec($ch);

session_destroy();
header('Location: http://192.168.0.14/fortressargentina/');

?>