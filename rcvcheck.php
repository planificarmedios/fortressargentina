<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $secretKey = '6LdludYUAAAAACyqn0islF1QxAZ8vX-h766hbaRC';
        $captcha = $_POST['g-recaptcha-response'];
			if(!$captcha){header("Location: ftpss.php?alert=3");exit;}
			$ip = $_SERVER['REMOTE_ADDR'];
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
			$responseKeys = json_decode($response,true);
	
				if(intval($responseKeys["success"]) !== 1) {
				  header("Location: ftpss.php?alert=4"); exit;
				} else {
					require_once ("callAPI.php");
					require_once ("parametros.php");
					$email = $_POST['email'];
						if (empty($email)){
							header("Location: ftpss.php?alert=12");
						} else {
						$jsonData = array( 'email' => "$email");
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/cliente/recuperarpass/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);
						$events = json_decode($result , true);
							header("Location: indexcaptcha.php?alert=6");
						}
						
				}
	}
?>
