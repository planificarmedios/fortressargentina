<?php
//require_once "config/database.php";

$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	//header("Location: index.php?alert=1");
	header("Location: main.php?module=start");
}
else {
	$server= '127.0.0.1';$username='root';$password='monitoreo';$database='fortress'; //conexion real
	$mysqli = new mysqli($server, $username, $password, $database);
	//if ($mysqli->connect_error) {die('error'.$mysqli->connect_error);} 

	$query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE ='$username' AND password='$password' AND status='activo'")
									or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['username']  = $data['username'];
		$_SESSION['password']  = $data['password'];
		$_SESSION['name_user'] = $data['name_user'];
		$_SESSION['email']     = $data['email'];
		$_SESSION['permisos_acceso'] = $data['permisos_acceso'];
	
		header("Location: seguridad-fortress/main.php?module=start");
	}


	else {
		//header("Location: index.php?alert=1");
		header("Location: main.php?module=start");
	}
}
?>