 <?php
$url = '192.168.1.92:2999/api/reservas/addweb/';
$ch = curl_init($url);
$codigo = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXIZ".uniqid()); //
$c = substr($codigo, 0,10); //extrae los primeros 6 digitos

$idUsuario = 2;
$idServicio = 1;
$idInicio = 1;
$idFin = 10;
$fechaReserva = '2019-12-20';

$jsonData = array(
				"clienteID"=>"$idUsuario",
				"servicioID"=>"$idServicio",
				"estado"=>0,
				"rango_inicio"=>"$idInicio",
				"rango_fin"=>"$idFin",
				"token"=>"$c",
				"fecha_reserva"=>"$fechaReserva"
);

$jsonDataEncoded = json_encode($jsonData);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$response = curl_exec($ch);

?>    
 