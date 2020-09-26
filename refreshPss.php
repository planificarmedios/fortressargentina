<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $secretKey = '6LdludYUAAAAACyqn0islF1QxAZ8vX-h766hbaRC';
        $captcha = $_POST['g-recaptcha-response'];
			if(!$captcha){header("Location: recvpss.php?alert=3");exit;}
			$ip = $_SERVER['REMOTE_ADDR'];
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
			$responseKeys = json_decode($response,true);
	
				if(intval($responseKeys["success"]) !== 1) {
				  header("Location: recvpss.php?alert=4"); exit;
				} else {
					require_once ("callAPI.php");
					require_once ("parametros.php");
					$token = $_POST['token'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					$password2 = $_POST['password2'];
					
					
						if (empty($token) && empty($password)){
							header("Location: recvpss.php?alert=12");
						} elseif ($password <> $password2){
							header("Location: recvpss.php?alert=7");
						} else {
						$jsonData = array( 'username' => "$username", 
							               'token' => "$token", 
							               'pass' => "$password"  );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/cliente/updatepass/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);
						$events = json_decode($result , true);
							header("Location: indexcaptcha.php?alert=9");
										
						}
						
				}
	}
?>
