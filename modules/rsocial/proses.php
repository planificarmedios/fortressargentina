<?php
session_start();
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
			
					
			        $razon_social = $_POST['denominacion'];
					$tipo_iva = $_POST['condicion'];
			        $email = $_POST['email'];
					$tipo_doc = $_POST['tipo'];
					$numero_doc = $_POST['numero_doc'];
					$domicilio = $_POST['domicilio'];
					$localidad = $_POST['localidad'];
					$provincia = $_POST['provincia'];
					$cp = $_POST['cp'];
					
						$jsonData = array( 'razon_social' => "$razon_social",
										   'tipo_iva' =>     "$tipo_iva",
										   'email' =>        "$email",
										   'tipo_doc' => 	 "$tipo_doc",
										   'numero_doc' => 	 "$numero_doc",
										   'domicilio' => 	 "$domicilio", 
										   'localidad' => 	 "$localidad",
										   'provincia' => 	 "$provincia",
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
                        header("location: ../../main.php?module=rsocial&alert=1");
		}
} 

