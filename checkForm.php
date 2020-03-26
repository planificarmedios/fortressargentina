<?php
include("sendemail.php");
require_once ("parametros.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $secretKey = $csecreta;
        $captcha = $_POST['g-recaptcha-response'];
			if(!$captcha){header("Location: index.php?alert=3");exit;}
			$ip = $_SERVER['REMOTE_ADDR'];
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
			$responseKeys = json_decode($response,true);
	
				if(intval($responseKeys["success"]) !== 1) {
				  header("Location: index.php?alert=4");
					exit;
				} else {
					
					$nombre = $_POST['nombre'];
					$email = $_POST['mail'];
					$asunto = $_POST['asunto'];
					$mensaje = $_POST['mensaje'];
					
					$jsonData = array('nombre' => "$nombre", 'email' => "$email", 'asunto' => "$asunto", 'mensaje' => "$mensaje");
					$data_string = json_encode($jsonData);$ch = curl_init($servidor.'/api/consultas/');
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json', 
					'Content-Length: ' . strlen($data_string)));
					$result = curl_exec($ch);		

					header("Location: index.php?alert=2");

				}
				
	}
?>
