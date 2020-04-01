<?php
session_start();
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
 if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
	
			        $nrocaja = $_POST['nrocaja'];
					$tipo_caja = $_POST['tipo_caja'];
					
					
						$jsonData = array( 'nrocaja' => "$nrocaja",
										   'tipo_caja' => "$tipo_caja"
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/cajas/add');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);    

                header("location: ../../main.php?module=cj&alert=1");
		}

} elseif ($_GET['act']=='delete') {
	
			if (isset($_GET['id'])) { $id = $_GET['id']; }
				$jsonData = array( 'id' => "$id" );
				$data_string = json_encode($jsonData);
				$ch = curl_init($servidor.'/api/cajas/delete/');
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string))
				);
				$result = curl_exec($ch);
					
                header("location: ../../main.php?module=cj&alert=3");
	
}  elseif ($_GET['act']=='update') {
				
					if (isset($_POST['id']) and isset($_POST['id_cliente']) and isset($_POST['id_servicio'])) { 
					$id = $_POST['id']; 
				   	$id_cliente = $_POST['id_cliente'];
					$id_servicio = $_POST['id_servicio'];
					}
				
					$jsonData = array( 
						 				   'id' => "$id",
										   'id_cliente' => "$id_cliente",
										   'id_servicio' => "$id_servicio"
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/cajas/update/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);    
            header("location: ../../main.php?module=cj&alert=2");
}
?>