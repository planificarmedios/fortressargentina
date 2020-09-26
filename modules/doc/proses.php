<?php
session_start();
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
			
				$name_file          = $_FILES['foto']['name'];
				$s_file             = $_FILES['foto']['size'];
				$tipe_file          = $_FILES['foto']['type'];
				$tmp_file           = $_FILES['foto']['tmp_name'];
				$allowed_extensions = array('jpg','jpeg','png', 'rar', 'xls', 'doc', 'xltx', 'docx');
				$path_file          = "../../images/doc/".$name_file;
				$file               = explode(".", $name_file);
				$extension          = array_pop($file);
				
				if (in_array($extension, $allowed_extensions)) {
	                    if($s <= 1000000) { 
	                      if(move_uploaded_file($tmp_file, $path_file)) {
							  $foto = $name_file;
						  }
						}
				}
	
			        $titulo = $_POST['nombre'];
					$descripcion = $_POST['resena'];
					$jsonData = array( 'titulo' => "$titulo",
									   'descripcion' => "$descripcion",
									   'foto' =>   "$foto"
									   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/documentacion/add');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
						);
						
						
						
						$result = curl_exec($ch);    
                        header("location: ../../main.php?module=doc&alert=1");
		}
} 

elseif ($_GET['act']=='update') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	
				if (isset($_POST['id'])) { 
				    $id = $_POST['id'];	
					$name_file          = $_FILES['foto']['name'];
					$s_file             = $_FILES['foto']['size'];
					$tipe_file          = $_FILES['foto']['type'];
					$tmp_file           = $_FILES['foto']['tmp_name'];
					$allowed_extensions = array('jpg','jpeg','png');
					$path_file          = "../../images/user/".$name_file;
					$file               = explode(".", $name_file);
					$extension          = array_pop($file);

					if (empty($_FILES['foto']['name'])) {
					$foto = $_POST['fotobis'];
					}else{ 						
							if (in_array($extension, $allowed_extensions)) {
									if($s <= 1000000) { 
									  if(move_uploaded_file($tmp_file, $path_file)) {
										  $foto = $name_file;
									  }
									}
							}
					}
					
					$usrid = $_POST['usrid'];
			        $nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$email = $_POST['email'];
					$fnacimiento = $_POST['fnacimiento'];
					$tipo_documento = $_POST['tipo_documento'];
					$dni = $_POST['dni'];
					$cp = $_POST['cp'];
					$status = $_POST['status'];
					$tel_fijo = $_POST['tel_fijo'];
					$telefono_movil = $_POST['celular'];
					$domicilio = $_POST['domicilio'];
					$provincia = $_POST['provincia'];
					$localidad = $_POST['localidad'];
					$permisos_acceso = $_POST['permisos_acceso'];
					if ($permisos_acceso == 1){	$id_autorizante = 0;
					} elseif ($permisos_acceso == 2){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 4){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 5){ $id_autorizante = 0;
					} else { $id_autorizante = $_POST['id_autorizante']; };	
					
					$jsonData = array(    'fecha_nacimiento' => "$fnacimiento",
										   'id' => "$id",
										   'USRID' => "$usrid",
										   'username' => "$email",
										   'cp' => "$cp",
										   'id_autorizante' => "$id_autorizante",
										   'status' => "$status", 
										   'nombre' => "$nombre",
										   'apellido' => "$apellido",
										   'tipo_documento' => "$tipo_documento",
										   'dni' => "$dni",
										   'foto' => "$foto",
										   'domicilio' => "$domicilio",
										   'email' => "$email",
										   'provincia' => "$provincia",
										   'tel_fijo' => "$tel_fijo",
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

elseif ($_GET['act']=='off') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	
					if (isset($_GET['id'])) { 
						$id = $_GET['id']; 
					    $jsonData = array( 'id' => "$id",);
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/disablecliente');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);    
	                    header("location: ../../main.php?module=user&alert=5");
					}
} 

elseif ($_GET['act']=='on') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	
					if (isset($_GET['id'])) { 
						$id = $_GET['id']; 
					    $jsonData = array( 'id' => "$id",);
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/enablecliente');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);    
	                    header("location: ../../main.php?module=user&alert=6");
					}
} 

?>