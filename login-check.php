<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

		$secretKey = '6LdludYUAAAAACyqn0islF1QxAZ8vX-h766hbaRC'; //claves fortress
        $captcha = $_POST['g-recaptcha-response'];
			if(!$captcha){header("Location: indexcaptcha.php?alert=3");exit;}
			$ip = $_SERVER['REMOTE_ADDR'];
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
			$responseKeys = json_decode($response,true);
	
				if(intval($responseKeys["success"]) !== 1) {
				  header("Location: indexcaptcha.php?alert=4"); exit;
				} else {
					require_once ("callAPI.php");
					require_once ("parametros.php");
					$username = $_POST['username'];
					$password = $_POST['password'];
					
					
						if (empty($username) && empty($password)){
							header("Location: indexcaptcha.php?alert=12");
						} else {
						$jsonData = array( 'user' => "$username", 'pass' => "$password"  );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/clientes/login/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);
						$events = json_decode($result , true);

						
										if ($events){
											session_start();
											$_SESSION['id_user']   = $events['id'];
											$_SESSION['username']  = $events['username'];
											$_SESSION['password']  = $events['password'];
											$_SESSION['nombre']    = $events['nombre'];
											$_SESSION['apellido']  = $events['apellido'];
											$_SESSION['name_user'] = $events['nombre'].' '.$events['apellido'];
											$_SESSION['email']     = $events['email'];
											$_SESSION['permisos_acceso']     = $events['permisos_acceso'];
											$_SESSION['change_pass']     = $events['change_pass'];
											$login = false;
											

											if ($_SESSION['change_pass']== 1) {
												header("Location: recvpss.php?alert=8");		
											} 

											elseif (($_SESSION['permisos_acceso'] == 2) or ($_SESSION['permisos_acceso'] == 4)) {
												header("Location: pluton/index.php");
												$login = true;
											}
											
											elseif ($_SESSION['permisos_acceso'] == 1 ){
												$_SESSION['permisos_acceso'] = 'Administrador';
												header("Location: main.php?module=start");
												$login = true;
											} 

											elseif ($_SESSION['permisos_acceso'] == 5 ) {
												$_SESSION['permisos_acceso'] = 'Usuario';
												header("Location: main.php?module=start");
												$login = true;
											} 

											elseif ($_SESSION['permisos_acceso'] == 7 ) {
												$_SESSION['permisos_acceso'] = 'Facturacion';
												header("Location: main.php?module=start");
												$login = true;
											}
											
										} else {
											header("Location: indexcaptcha.php?alert=1");
											$login = false;
										}

										if ($login == true) {
											$mensaje = 'Login usuario';
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
										}
						}
						
				}
	}
?>
