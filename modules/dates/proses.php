<?php
session_start();
include_once ("../user/callAPI.php");
 if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
	
			        $nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$email = $_POST['email'];
					$fnacimiento = $_POST['fnacimiento'];
					$dni = $_POST['dni'];
					$cp = $_POST['cp'];
					$status = $_POST['status'];
					$telefono_movil = $_POST['celular'];
					$domicilio = $_POST['domicilio'];
					$provincia = $_POST['provincia'];
					$localidad = $_POST['localidad'];
					$permisos_acceso = $_POST['permisos_acceso'];
					if ($permisos_acceso == 1){	$id_autorizante = 0;
					} elseif ($permisos_acceso == 2){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 4){ $id_autorizante = 0;
					} else { $id_autorizante = $_POST['id_autorizante']; };	
					
						$jsonData = array( 'fecha_nacimiento' => "$fnacimiento",
										   'username' => "$email",
										   'cp' => "$cp",
										   'id_autorizante' => "$id_autorizante",
										   'status' => "$status", 
										   'nombre' => "$nombre",
										   'apellido' => "$apellido",
										   'dni' => "$dni",
										   'domicilio' => "$domicilio",
										   'email' => "$email",
										   'provincia' => "$provincia",
										   'telefono' => "$telefono_movil",
										   'permiso' => "$permisos_acceso",
										   'localidad' => "$localidad" 
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/administracion/addcliente');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);    

                header("location: ../../main.php?module=user&alert=1");
		}
	} elseif 	
	($_GET['act']=='update') {
		
				if (isset($_POST['id'])) { 
				    $id = $_POST['id'];	
					$usrid = $_POST['usrid'];
			        $nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$email = $_POST['email'];
					$fnacimiento = $_POST['fnacimiento'];
					$dni = $_POST['dni'];
					$cp = $_POST['cp'];
					$status = $_POST['status'];
					$telefono_movil = $_POST['celular'];
					$domicilio = $_POST['domicilio'];
					$provincia = $_POST['provincia'];
					$localidad = $_POST['localidad'];
					$permisos_acceso = $_POST['permisos_acceso'];
					if ($permisos_acceso == 1){	$id_autorizante = 0;
					} elseif ($permisos_acceso == 2){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 4){ $id_autorizante = 0;
					} else { $id_autorizante = $_POST['id_autorizante']; };	
					
						$jsonData = array( 
										   'fecha_nacimiento' => "$fnacimiento",
										   'id' => "$id",
										   'USRID' => "$usrid",
										   'username' => "$email",
										   'cp' => "$cp",
										   'id_autorizante' => "$id_autorizante",
										   'status' => "$status", 
										   'nombre' => "$nombre",
										   'apellido' => "$apellido",
										   'DNI' => "$dni",
										   'domicilio' => "$domicilio",
										   'email' => "$email",
										   'provincia' => "$provincia",
										   'telefono' => "$telefono_movil",
										   'permiso' => "$permisos_acceso",
										   'localidad' => "$localidad" 
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/administracion/updatecliente');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);    

                header("location: ../../main.php?module=user&alert=1");
		}
	}
?>