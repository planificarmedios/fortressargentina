<?php
include_once ("callAPI.php");
require_once ("parametros.php");
$c = 'EBBIOGCNXI'; 
$jsonData = array( 'token' => "$c", );
$data_string = json_encode($jsonData); $ch = curl_init($servidor.'/api/reservas/viewbytoken/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
$result = curl_exec($ch); 
$events = json_decode($result , true);

foreach ($events as $event) {

 				  $_SESSION['idInicio']=  $event['idInicio'];
				  $_SESSION['idFin'] =  $event['idFin'];
				  $_SESSION['precio'] =  $event['precio'];
				  $_SESSION['precio'] = $event['precio'];
				  $_SESSION['nombre'] =  $event['Apellido Nombre'];
				  $_SESSION['email'] =  $event['email'];
				  $_SESSION['s'] =  $event['start'];
				  $_SESSION['e']=  $event['end'];
				  $_SESSION['estado'] = $event['estado'];
				  $_SESSION['codigo'] = $event['codigo'];
				  $ss = substr($_SESSION['s'], 0,10);
				  $_SESSION['ss']= $ss;
				  $ee= substr($_SESSION['e'], 0,10);
				  $_SESSION['ee']= $ee;
				  $_SESSION['horarioI5Caract']= substr($_SESSION['s'], 11, 5);
				  $_SESSION['horarioF5Caract']= substr($_SESSION['e'], 11, 5);
				  $horarioI= substr($_SESSION['s'], 11, 8);
				  $horarioF= substr($_SESSION['e'], 11, 8);
				  $start = $_SESSION['ss'].' '.$horarioI;
				  $end = $_SESSION['ee'].' '.$horarioF;

				echo " <br> {$idInicio}  <br>";
				echo " <br> {$_SESSION['idFin']}  <br>";
				echo " <br> {$_SESSION['precio']}  <br>";
				echo " <br> {$_SESSION['nombre']}  <br>";
				echo " <br> {$_SESSION['email']}  <br>";
				echo " <br> {$_SESSION['s']}  <br>";
}

?>
			