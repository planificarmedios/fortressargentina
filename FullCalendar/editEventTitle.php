<?php
// Conexion a la base de datos
session_start();
require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])&& isset($_POST['codigo'])&& isset($_POST['idInicio']) && isset($_POST['idFin'])){
	$id = $_POST['id'];
	$c = $_POST['codigo'];
	$u = $_SESSION['id_user'];
	$sql = "DELETE FROM events WHERE estado='0' and idUsuario='$u'";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
	
	
}
/*
elseif (isset($_POST['title']) && isset($_POST['id']) && isset($_POST['idInicio']) && isset($_POST['idFin'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = 'xxxx';
	$idInicio = $_POST['idInicio'];
	$idFin = $_POST['idFin'];
	$idR = $idFin + 1;
	$id2 = $id + 1;
	$title = $idInicio.':'.$idFin;
	
	//// se modifica la franja horaria reservada por el cliente
	$sql = "UPDATE events SET  title = '$title', idInicio = '$idInicio', idFin = '$idFin', color = '$color' WHERE id = $id ";
	$query = $bdd->prepare( $sql );
	echo $sql;
	$query = $bdd->prepare( $sql );if ($query == false){print_r($bdd->errorInfo());die('Erreur prepare');}
	$sth = $query->execute();if ($sth == false){print_r($query->errorInfo());die('Erreur execute');}
	
	//// se modifica la franja horaria reservada por el sistema
	$sql = "UPDATE events SET  title = '$title', idInicio = '$idR', idFin = '$idR', color = '$color' WHERE id = $id2 ";
	$query = $bdd->prepare( $sql );
	echo $sql;
	$query = $bdd->prepare( $sql );if ($query == false){print_r($bdd->errorInfo());die('Erreur prepare');}
	$sth = $query->execute();if ($sth == false){print_r($query->errorInfo());die('Erreur execute');}
}*/

header('Location: calendar.php');

	
?>
