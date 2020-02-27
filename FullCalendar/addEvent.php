<?php
require_once('bdd.php');
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['idInicio']) && isset($_POST['idFin'])){
	$title = $_POST['title'];
	$start = $_POST['start'];
	$fechaReserva = $_POST['start'];
	$codigo = $_POST['codigo'];
	$end = $_POST['end'];
	$idInicio = $_POST['idInicio'];
	$idFin = $_POST['idFin'];
	$idServicioReservado = 287;
	$idUsuario = 8;
	$idR = $idFin + 1;
	//$title = $idInicio.':'.$idFin.'tttttttttttt';
	
	
	//// se inserta la franja horaria reservada
	$sql = "INSERT INTO events(title, codigo, start, end, color,fechaReserva,idServicioReservado,idInicio,idFin,idUsuario) 
	values ('$title', '$codigo', '$start', '$end', '$color', '$fechaReserva', '$idServicioReservado','$idInicio', '$idFin', '8')";
	echo $sql;
	$query = $bdd->prepare( $sql );if ($query == false){print_r($bdd->errorInfo());die('Erreur prepare');}
	$sth = $query->execute();if ($sth == false){print_r($query->errorInfo());die('Erreur execute');}
	
	//// se inserta media hora de reserva para acondicionamiento salon
	$sql = "INSERT INTO events(title, codigo, start, end, color, fechaReserva, idServicioReservado, idInicio, idFin, idUsuario) 
	values ('$title', '$codigo', '$start', '$end', '$color', '$fechaReserva', '$idServicioReservado','$idR', '$idR', '0')";
	echo $sql;
	$query = $bdd->prepare( $sql );if ($query == false){print_r($bdd->errorInfo());die('Erreur prepare');}
	$sth = $query->execute();if ($sth == false){print_r($query->errorInfo());die('Erreur execute');}
}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
