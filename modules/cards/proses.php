<?php
session_start();
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
			
					$marca = $_POST['marca'];
					$tipo = $_POST['tipo'];
					$numero = $_POST['numero'];
					$vencimiento = $_POST['vencimiento'];
					$banco = $_POST['banco'];
				
					$jsonData = array( 'marca' => "$marca",
										   'tipo' => "$tipo",
										   'numero' => "$numero",
									       'banco' => "$banco",
										   'vencimiento' => "$vencimiento"
							   );
					
					
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/tarjetas/add');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
						);
						
					
						$result = curl_exec($ch);    
                        header("location: ../../main.php?module=cards&alert=1");
		}
} 

