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
					$datos = $_POST['datos'];
					$mail = $_POST['mail'];
					$asunto = $_POST['asunto'];
					$mensaje = $_POST['mensaje'];
					$mail_username="medinilla.seguridadintegral@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
					$mail_userpassword="Segmed785@";//
				  	$mail_addAddress="seguridadfortresssa@gmail.com";//correo electroniLco que recibira el mensaje
				  	$template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
					$mail_subject=$asunto;
					$txt_message='ASUNTO: '. $asunto. '<br>'. 'MENSAJE: '. $mensaje;
					$mail_setFromEmail=$mail;
					$mail_setFromName=$datos;

					sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
					header("Location: index.php?alert=2");

				}
				
	}
?>
