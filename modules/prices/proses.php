<?php
session_start();
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
 if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
	
			        $nombre = $_POST['nombre'];
					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					$intervalo = $_POST['intervalo'];
					$tipo_servicio = $_POST['tipo_servicio'];
					
					
						$jsonData = array( 'nombre' => "$nombre",
										   'descripcion' => "$descripcion",
										   'precio' => "$precio",
										   'intervalo' => "$intervalo", 
										   'tipo_servicio' => "$tipo_servicio"
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/servicios/add');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);    

                header("location: ../../main.php?module=prices&alert=1");
		}

} elseif ($_GET['act']=='delete') {
	
			if (isset($_GET['id'])) { $id = $_GET['id']; }
				$jsonData = array( 'id' => "$id" );
				$data_string = json_encode($jsonData);
				$ch = curl_init($servidor.'/api/servicios/delete/');
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string))
				);
				$result = curl_exec($ch);
					
                header("location: ../../main.php?module=prices&alert=3");
	
}  elseif ($_GET['act']=='update') {
				
					if (isset($_POST['id'])) { 
					$id = $_POST['id']; 
				    $nombre = $_POST['nombre'];
					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					$intervalo = $_POST['intervalo'];
					$tipo_servicio = $_POST['tipo_servicio'];
					}
				
					$jsonData = array( 
						 				   'id' => "$id",
										   'nombre' => "$nombre",
										   'descripcion' => "$descripcion",
										   'precio' => "$precio",
										   'intervalo' => "$intervalo", 
										   'tipo_servicio' => "$tipo_servicio"
										   );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/servicios/update/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						
						$result = curl_exec($ch);    
            header("location: ../../main.php?module=prices&alert=2");
}
?>