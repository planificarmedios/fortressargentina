<?php
include_once ("../../../pluton/images/nodejs-mysql-links-master/callAPI.php");
require_once ("../../../pluton/images/nodejs-mysql-links-master/parametros.php");
$jsonData = array( 'servicioID' => 2 );
$data_string = json_encode($jsonData);$ch = curl_init($servidor.'/api/reservas/viewall/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);
$events = json_decode($result , true);

			  foreach ($events as $d) {
				 
				  $ss = substr($d['start'], 0,10); $horarioI= substr($d['start'], 11, 8); $calendarStart = $ss.' '.$horarioI;		
				  $ee= substr($d['start'], 0,10);    $horarioF= substr($d['end'], 11, 8);   $calendarEnd = $ee.' '.$horarioF;
				  
			  
			  
				  echo " 
				       <br> {$ss} 
					   <br> {$ee} 
				  	   <br> {$horarioI}
					   <br> {$horarioF}
					   <br> {$calendarStart}
					   <br> {$calendarEnd}
				      <br>";
				
			  }
				
			  
?>
			