<?php
session_start();
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
			
				$name_file          = $_FILES['foto']['name'];
				$s_file        = $_FILES['foto']['size'];
				$tipe_file          = $_FILES['foto']['type'];
				$tmp_file           = $_FILES['foto']['tmp_name'];
				$allowed_extensions = array('jpg','jpeg','png');
				$path_file          = "../../images/user/".$name_file;
				$file               = explode(".", $name_file);
				$extension          = array_pop($file);
				
				if (in_array($extension, $allowed_extensions)) {
	                    if($s <= 1000000) { 
	                      if(move_uploaded_file($tmp_file, $path_file)) {
							  $foto = $name_file;
						  }
						}
				}
	
			        $nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$email = $_POST['email'];
					$fnacimiento = $_POST['fnacimiento'];
					$tipo_documento = $_POST['tipo_documento'];
					$sector_cuerpo = $_POST['sector_cuerpo'];
					$dni = $_POST['dni'];
					$cp = $_POST['cp'];
					$status = $_POST['status'];
					$tel_fijo = $_POST['tel_fijo'];
					$telefono_movil = $_POST['celular'];
					$domicilio = $_POST['domicilio'];
					$provincia = $_POST['provincia'];
					$localidad = $_POST['localidad'];
					$vip = $_POST['vip'];
					$alias = $_POST['alias'];
					$protesis = $_POST['protesis'];
					$chqFiscal = $_POST['chqFiscal'];
			        $condicion_iva = $_POST['condicion_iva'];
					$permisos_acceso = $_POST['permisos_acceso'];
					$estado_civil = $_POST['estado_civil'];
					$dni_matrimonio = $_POST['dni_matrimonio'];
					$nombre_apell_matrimonio = $_POST['nombre_apell_matrimonio'];
			
			
					if ($permisos_acceso == 1){	$id_autorizante = 0;
					} elseif ($permisos_acceso == 2){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 4){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 5){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 7){ $id_autorizante = 0;
					} else { $id_autorizante = $_POST['id_autorizante']; };	
					
						$jsonData = array( 'fecha_nacimiento' => "$fnacimiento",
										   'username' => "$email",
										   'cp' => "$cp",
										   'id_autorizante' => "$id_autorizante",
										   'sector_cuerpo' => "$sector_cuerpo",
										   'status' => "$status", 
										   'nombre' => "$nombre",
										   'apellido' => "$apellido",
										   'tipo_documento' => "$tipo_documento",
										   'dni' => "$dni",
										   'domicilio' => "$domicilio",
										   'email' => "$email",
										   'provincia' => "$provincia",
										   'tel_fijo' => "$tel_fijo",
										   'telefono' => "$telefono_movil",
										   'permiso' => "$permisos_acceso",
										   'foto' => "$foto",
										   'vip' => "$vip",
										   'alias' => "$alias",
										   'condicion_iva' => "$condicion_iva",
										   'protesis' => "$protesis", 
										   'estado_civil' => "$estado_civil",
										   'dni_matrimonio' => "$dni_matrimonio",
										   'nombre_apell_matrimonio' => "$nombre_apell_matrimonio",
										   'localidad' => "$localidad" 
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/administracion/addclienteBis');
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

if ($_GET['act']=='editarNuevoCliente') {
	if (isset($_POST['consultar'])) {
		
		

		$id_cliente= $_POST['id_cliente'];
			
		 
					header("location: ../../main.php?module=form_user&form=edit&id=$id_cliente");
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
					
					
			        $nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$email = $_POST['email'];
					$fnacimiento = $_POST['fnacimiento'];
					$tipo_documento = $_POST['tipo_documento'];
					$dni = $_POST['dni'];
					$cp = $_POST['cp'];
					$status = $_POST['status'];
					$sector_cuerpo = $_POST['sector_cuerpo'];
					$tel_fijo = $_POST['tel_fijo'];
					$telefono_movil = $_POST['celular'];
					$domicilio = $_POST['domicilio'];
					$provincia = $_POST['provincia'];
					$localidad = $_POST['localidad'];
					$permisos_acceso = $_POST['permisos_acceso'];
					$token = $_POST['token'];
					$alias = $_POST['alias'];
					$protesis = $_POST['protesis'];
					$estado_civil = $_POST['estado_civil'];
					$condicion_iva = $_POST['condicion_iva'];
					$vip = $_POST['vip'];
					$dni_matrimonio = $_POST['dni_matrimonio'];
					$nombre_apell_matrimonio = $_POST['nombre_apell_matrimonio'];
					$chqFiscal = $_POST['chqFiscal'];
					
					if (($chqFiscal == true) or ($chqFiscal == 1)) {
						
						$nombre = $_POST['nombre'];
						$apellido = $_POST['apellido'];
						$razon_social = $nombre.' '.$apellido;
						$tipo_doc = $_POST['tipo_documento'];
						$email = $_POST['email'];
						$numero_doc = $_POST['dni'];
						$cp = $_POST['cp'];
						$tipo_iva = $_POST['condicion_iva'];
						$domicilio = $_POST['domicilio'];
						$localidad = $_POST['localidad'];
						
						$jsonData = array( 'razon_social' => "$razon_social",
										   'tipo_iva' =>     "$tipo_iva",
										   'email' =>        "$email",
										   'tipo_doc' => 	 "$tipo_doc",
										   'numero_doc' => 	 "$numero_doc",
										   'domicilio' => 	 "$domicilio", 
										   'localidad' => 	 "$localidad",
										   'cp' => 			 "$cp" 
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/fiscales/add');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
						);
						$result = curl_exec($ch); 
					   }
					
					
					if ($permisos_acceso == 1){	$id_autorizante = 0;
					} elseif ($permisos_acceso == 2){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 4){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 5){ $id_autorizante = 0;
					} elseif ($permisos_acceso == 7){ $id_autorizante = 0;	
					} else { $id_autorizante = $_POST['id_autorizante']; };	
					
					$jsonData = array(    'fecha_nacimiento' => "$fnacimiento",
										   'id' => "$id",
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
										   'alias' => "$alias",
										   'vip' => "$vip",
										   'token' => "$token",
										   'condicion_iva' => "$condicion_iva", 
										   'protesis' => "$protesis",
									       'sector_cuerpo' => "$sector_cuerpo",
									  	   'provincia' => "$provincia",
										   'tel_fijo' => "$tel_fijo",
										   'telefono' => "$telefono_movil",
										   'permiso' => "$permisos_acceso",
										   'estado_civil' => "$estado_civil",
										   'dni_matrimonio' => "$dni_matrimonio",
										   'nombre_apell_matrimonio' => "$nombre_apell_matrimonio",
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
						$nombre_usuario = $_SESSION['name_user'];
					}
						$usuario = $_SESSION['name_user'];
						$jsonData = array(  'id' => "$id",
										    'nombre_usuario' => "$nombre_usuario",
					                        'usuario' => "$usuario"
					                     );
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

elseif ($_GET['act']=='on') {
	include_once ("../../callAPI.php");
	require_once ("../../parametros.php");	
						if (isset($_GET['id'])) { 
							$id = $_GET['id'];
							$nombre_usuario = $_SESSION['name_user'];
						}
							$usuario = $_SESSION['name_user'];
							$jsonData = array(  'id' => "$id",
												'nombre_usuario' => "$nombre_usuario",
												'usuario' => "$usuario"
											 );
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
							header("location: ../../main.php?module=user&alert=5");
						
	} 

elseif ($_GET['vip']=='on') {
include_once ("../../callAPI.php");
require_once ("../../parametros.php");	
					if (isset($_GET['id'])) { 
						$id = $_GET['id'];
						$nombre_usuario = $_SESSION['name_user'];
					}
						$usuario = $_SESSION['name_user'];
						$jsonData = array(  'id' => "$id",
											'nombre_usuario' => "$nombre_usuario",
					                        'usuario' => "$usuario"
					                     );
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/enableclienteVIP');
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

elseif ($_GET['vip']=='off') {
	include_once ("../../callAPI.php");
	require_once ("../../parametros.php");	
						if (isset($_GET['id'])) { 
							$id = $_GET['id'];
							$nombre_usuario = $_SESSION['name_user'];
						}
							$usuario = $_SESSION['name_user'];
							$jsonData = array(  'id' => "$id",
												'nombre_usuario' => "$nombre_usuario",
												'usuario' => "$usuario"
											 );
							$data_string = json_encode($jsonData);
							$ch = curl_init($servidor.'/api/disableclienteVIP');
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

	

?>