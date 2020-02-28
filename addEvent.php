<?php
require_once('bdd.php');
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['idInicio']) && isset($_POST['idFin'])){
	session_start();
	$title = $_POST['title'];
	$start = $_POST['start'];
	$fechaReserva = $_POST['start'];
	$codigo = $_POST['codigo'];
	$end = $_POST['end'];
	$color = '#CC553C';
	$idInicio = $_POST['idInicio'];
	$idFin = $_POST['idFin'];
	$idServicioReservado = 294;
	$idUsuario = 8;
	$idR = $idFin ;
	$idFracc = '.30';
	$idR2 = $idFin.$idFracc ;
	//$title = ':'.$idFin.$t;
	
	$_SESSION['start'] = $_POST['start'];
	$_SESSION['end'] = $_POST['end'];
	$_SESSION['idInicio'] = $_POST['idInicio'];
	$_SESSION['idFin'] = $_POST['idFin'];
	
	$url = 'http://127.0.0.1/fortressargentina/MP/index.php';
	header ('Location: '.$url);
	
	/* se inserta la franja horaria reservada
	$sql = "INSERT INTO events(title, codigo, start, end, color,fechaReserva,idServicioReservado,idInicio,idFin,idUsuario) 
	values ('$title', '$codigo', '$start', '$end', '$color', '$fechaReserva', '$idServicioReservado','$idInicio', '$idFin', '8')";
	echo $sql;
	$query = $bdd->prepare( $sql );if ($query == false){print_r($bdd->errorInfo());die('Erreur prepare');}
	$sth = $query->execute();if ($sth == false){print_r($query->errorInfo());die('Erreur execute');}
	
	//// se inserta media hora de reserva para acondicionamiento salon
	$sql = "INSERT INTO events(title, codigo, start, end, color, fechaReserva, idServicioReservado, idInicio, idFin, idUsuario) 
	values ('$title', '$codigo', '$start', '$end', '$color'', '$fechaReserva', '$idServicioReservado','$idR', '$idR2', '0')";
	echo $sql;
	$query = $bdd->prepare( $sql );if ($query == false){print_r($bdd->errorInfo());die('Erreur prepare');}
	$sth = $query->execute();if ($sth == false){print_r($query->errorInfo());die('Erreur execute');} */
}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
