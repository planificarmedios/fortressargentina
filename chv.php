<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $secretKey = '6LdludYUAAAAACyqn0islF1QxAZ8vX-h766hbaRC';
        $captcha = $_POST['g-recaptcha-response'];
			if(!$captcha){header("Location: lg.php?alert=3");exit;}
			$ip = $_SERVER['REMOTE_ADDR'];
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
			$responseKeys = json_decode($response,true);
	
				if(intval($responseKeys["success"]) !== 1) {
				  header("Location: lg.php?alert=4"); exit;
				} else {
					require_once ("callAPI.php");
					require_once ("parametros.php");
					$nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$email = $_POST['mail'];
					$dni = $_POST['dni'];
					$telefono = $_POST['celular'];
					$domicilio = $_POST['domicilio'];
					$provincia = $_POST['provincia'];
					$localidad = $_POST['localidad'];
					$permiso = 4; //permiso invitado
					
					
						if (empty($nombre) && empty($apellido)){
							header("Location: lg.php?alert=12");
						} else {
							header("Location: indexcaptcha.php?alert=5");
						$jsonData = array( 'telefono' => "$telefono", 
										   'nombre' => "$nombre",
										   'apellido' => "$apellido",
										   'dni' => "$dni",
										   'domicilio' => "$domicilio",
										   'email' => "$email",
										   'provincia' => "$provincia",
										   'telefono' => "$telefono",
										   'permiso' => "$permiso",
										   'localidad' => "$localidad"  
										   );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/cliente/addinvitado');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);
						
						}
						
				}
	}
?>
