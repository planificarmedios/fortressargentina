<?php
session_start();
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
if ($_GET['act']=='insert') {
	if (isset($_POST['guardar'])) {

				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];
				
				
				$jsonData = array( 'nombre' => "$nombre",
								   'descripcion' => "$descripcion"
				);
									   
					$data_string = json_encode($jsonData);
					$ch = curl_init($servidor.'/api/grupoafinidad/add');
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json',
						'Content-Length: ' . strlen($data_string))
						);
					
					$result = curl_exec($ch);    

			header("location: ../../main.php?module=afinidad&alert=1");
	}
} 

elseif ($_GET['act']=='beneficio') {
	if (isset($_POST['guardar'])) {

				$id_grupoafinidad= $_POST['id'];
				$descripcion= $_POST['descripcion'];
				$porcentaje = $_POST['porcentaje'];
				$duracion = $_POST['duracion'];
				
				
				$jsonData = array( 'id_grupoafinidad' => "$id_grupoafinidad",
								   'descripcion' => "$descripcion",
								   'porcentaje' => "$porcentaje",
								   'duracion' => "$duracion"
				);
									   
					$data_string = json_encode($jsonData);
					$ch = curl_init($servidor.'/api/beneficios/add');
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json',
						'Content-Length: ' . strlen($data_string))
						);
					
					$result = curl_exec($ch);    

			header("location: ../../main.php?module=formEdit_afinidad&formEdit=beneficios&id=$id_grupoafinidad");
	}
} 

elseif ($_GET['act']=='on') {
	include_once ("../../callAPI.php");
	require_once ("../../parametros.php");	

						if (isset($_GET['id']) and isset($_GET['grupoafinidad'])){ 
							$id_cliente = $_GET['id'];
							$grupo_afinidad = $_GET['grupoafinidad'];
						}
							$usuario = $_SESSION['name_user'];
							$jsonData = array(  'id_cliente' => "$id_cliente",
												'grupo_afinidad' => "$grupo_afinidad"
										
							);
							
							$data_string = json_encode($jsonData);
							$ch = curl_init($servidor.'/api/asociarAfinidad');
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'Content-Type: application/json',
								'Content-Length: ' . strlen($data_string))
								);
							$result = curl_exec($ch);   
							
							header("location: ../../main.php?module=formEdit_afinidad&formEdit=edit&id=$grupo_afinidad");
						
	} 
	
	elseif ($_GET['act']=='off') {
	include_once ("../../callAPI.php");
	require_once ("../../parametros.php");	

						if (isset($_GET['id']) and isset($_GET['grupoafinidad'])){ 
							$id_cliente = $_GET['id'];
							$grupo_afinidad = $_GET['grupoafinidad'];
							
						}
							$usuario = $_SESSION['name_user'];
							$jsonData = array(  'id_cliente' => "$id_cliente",
												'grupo_afinidad' => "$grupo_afinidad"
										
							);

							$data_string = json_encode($jsonData);
							$ch = curl_init($servidor.'/api/desasociarAfinidad');
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'Content-Type: application/json',
								'Content-Length: ' . strlen($data_string))
								);
							$result = curl_exec($ch);    
							header("location: ../../main.php?module=formEdit_afinidad&formEdit=edit&id=$grupo_afinidad");
						
	} 

	elseif ($_GET['asociarbeneficiario']=='on') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if (isset($_GET['idcliente']) and isset($_GET['idbeneficio']) and isset($_GET['grupoafinidad'])){ 
								$idcliente = $_GET['idcliente'];
								$idbeneficio = $_GET['idbeneficio'];
								$grupoafinidad = $_GET['grupoafinidad'];
							}
								
								$jsonData = array(  'idcliente' => "$idcliente",
													'idbeneficio' => "$idbeneficio"
								);
								
								$data_string = json_encode($jsonData);
								$ch = curl_init($servidor.'/api/asociarbeneficiario');
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
								curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									'Content-Type: application/json',
									'Content-Length: ' . strlen($data_string))
									);
								$result = curl_exec($ch);   
								
								header("location: ../../main.php?module=formEdit_afinidad&formEdit=asocbeneficios&id=$grupoafinidad&idbeneficio=$idbeneficio");
							
	} 

	elseif ($_GET['asociarbeneficiario']=='off') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if (isset($_GET['id'])){ 
								$id = $_GET['id'];
								
							}
								
								$jsonData = array(  'id' => "$id"					
								);
								
								$data_string = json_encode($jsonData);
								$ch = curl_init($servidor.'/api/enableAfinidad');
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
								curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									'Content-Type: application/json',
									'Content-Length: ' . strlen($data_string))
									);
								$result = curl_exec($ch);   
								
								header("location: ../../main.php?module=afinidad");
							
	} 

	elseif ($_GET['plan']=='off') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if ((isset($_GET['id'])) and (isset($_GET['grupo_afinidad']))){ 
								$id = $_GET['id'];
								$grupo_afinidad = $_GET['grupo_afinidad'];
							}
								
								$jsonData = array(  'id' => "$id"					
								);
								
								$data_string = json_encode($jsonData);
								$ch = curl_init($servidor.'/api/disableAfinidad');
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
								curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									'Content-Type: application/json',
									'Content-Length: ' . strlen($data_string))
									);
								$result = curl_exec($ch);   
								
								header("location: ../../main.php?module=formEdit_afinidad&formEdit=edit&id=7");
							
	} 

	elseif ($_GET['plan']=='on') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if (isset($_GET['id'])){ 
								$id = $_GET['id'];
								
							}
								
								$jsonData = array(  'id' => "$id"					
								);
								
								$data_string = json_encode($jsonData);
								$ch = curl_init($servidor.'/api/enableAfinidad');
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
								curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									'Content-Type: application/json',
									'Content-Length: ' . strlen($data_string))
									);
								$result = curl_exec($ch);   
								
								header("location: ../../main.php?module=afinidad");
							
	} 


	elseif ($_GET['act']=='nuevobeneficiario') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if (isset($_GET['idcliente']) and isset($_GET['idbeneficio']) and isset($_GET['grupoafinidad'])){ 
								$idcliente = $_GET['idcliente'];
								$idbeneficio = $_GET['idbeneficio'];
								$grupoafinidad = $_GET['grupoafinidad'];
							
								
							$jsonData = array(  'idcliente' => "$idcliente",
							'idbeneficio' => "$idbeneficio"
							);
		
							$data_string = json_encode($jsonData);
							$ch = curl_init($servidor.'/api/asociarNuevoBeneficiario');
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'Content-Type: application/json',
								'Content-Length: ' . strlen($data_string))
								);
							$result = curl_exec($ch);   
							
							header("location: ../../main.php?module=formEdit_afinidad&formEdit=asociarbeneficiario&id=$grupoafinidad&idbeneficio=$idbeneficio");
							}
												
	} 


	elseif ($_GET['act']=='asociarcajabeneficio') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if (isset($_GET['id']) and isset($_GET['idbeneficio']) and isset($_GET['idcliente']) and isset($_GET['idcaja']) and isset($_GET['serie'])){ 
								$grupoafinidad = $_GET['id'];
								$idcliente = $_GET['idcliente'];
								$idbeneficio = $_GET['idbeneficio'];
								$idcaja = $_GET['idcaja'];
							    $serie = $_GET['serie'];
								
							$jsonData = array(  'idcliente' => "$idcliente",
												'idcaja' => "$idcaja",
												'serie' => "$serie",
												'idbeneficio' => "$idbeneficio"
							);
		
							$data_string = json_encode($jsonData);
							$ch = curl_init($servidor.'/api/asociarcajabeneficio');
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'Content-Type: application/json',
								'Content-Length: ' . strlen($data_string))
								);
							$result = curl_exec($ch);   
							
							header("location: ../../main.php?module=formEdit_afinidad&formEdit=beneficioscajas&id=$grupoafinidad&idbeneficio=$idbeneficio&idcliente=$idcliente");
							}
												
	} 

	elseif ($_GET['act']=='desasociarbeneficiario') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if (isset($_GET['idcliente']) and isset($_GET['idbeneficio']) and isset($_GET['idregistro']) and isset($_GET['grupoafinidad'])){ 
								$idcliente = $_GET['idcliente'];
								$idbeneficio = $_GET['idbeneficio'];
								$grupoafinidad = $_GET['grupoafinidad'];
								$idregistro = $_GET['idregistro'];
							}
								
							$jsonData = array(  'id' => "$idregistro"
							);
		
							$data_string = json_encode($jsonData);
							$ch = curl_init($servidor.'/api/updateBeneficioCliente');
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'Content-Type: application/json',
								'Content-Length: ' . strlen($data_string))
								);
							$result = curl_exec($ch);   
							
							header("location: ../../main.php?module=formEdit_afinidad&formEdit=asociarbeneficiario&id=9&idbeneficio=1");
												
	} 

	elseif ($_GET['act']=='eliminarcajabeneficio') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
	
							if (isset($_GET['idgrupoafinidad']) and isset($_GET['idbeneficio']) and isset($_GET['idcliente']) and isset($_GET['idregistro'])){ 
								$idgrupoafinidad= $_GET['idgrupoafinidad'];
								$idbeneficio = $_GET['idbeneficio'];
								$idcliente = $_GET['idcliente'];
								$idregistro = $_GET['idregistro'];
							}
								
							$jsonData = array(  'idregistro' => "$idregistro"
							);
		
							$data_string = json_encode($jsonData);
							$ch = curl_init($servidor.'/api/eliminarcajabeneficio');
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'Content-Type: application/json',
								'Content-Length: ' . strlen($data_string))
								);
							$result = curl_exec($ch);   
							
							header("location: ../../main.php?module=formEdit_afinidad&formEdit=beneficioscajas&id=$idgrupoafinidad&idbeneficio=$idbeneficio&idcliente=$idcliente");
												
	} 


	elseif ($_GET['act']=='update') {
		include_once ("../../callAPI.php");
		require_once ("../../parametros.php");	
						if (isset($_POST['id'])) { 
							
							$id = $_POST['id'];
							$nombre = $_POST['nombre'];
							$descripcion = $_POST['descripcion'];
																			
							$jsonData = array(    'nombre' => "$nombre",
												  'id' => "$id",
												  'descripcion' => "$descripcion" 
							);
	
								$data_string = json_encode($jsonData);
								$ch = curl_init($servidor.'/api/updateAfinidad');
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
								curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									'Content-Type: application/json',
									'Content-Length: ' . strlen($data_string))
									);
								$result = curl_exec($ch);    
								header("location: ../../main.php?module=afinidad&alert=1");
				}
		} 

	
		elseif ($_GET['act']=='updatecajaBeneficio') {
			include_once ("../../callAPI.php");
			require_once ("../../parametros.php");	
							if (isset($_POST['id'])) { 
								
								$id = $_POST['id'];
								$descuento = $_POST['descuento'];
								$inicio = $_POST['inicio'];
								$fin = $_POST['fin'];
								$idgrupoafinidad = $_POST['idgrupoafinidad'];
								$idbeneficio = $_POST['idbeneficio'];
								$idcliente = $_POST['idcliente'];
																				
								$jsonData = array(    'descuento' => "$descuento",
													  'id' => "$id",
													  'fin' => "$fin",
													  'inicio' => "$inicio" 
								);
		
									$data_string = json_encode($jsonData);
									$ch = curl_init($servidor.'/api/updatecajaBeneficio');
									curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
									curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										curl_setopt($ch, CURLOPT_HTTPHEADER, array(
										'Content-Type: application/json',
										'Content-Length: ' . strlen($data_string))
										);
									$result = curl_exec($ch);    
									header("location: ../../main.php?module=formEdit_afinidad&formEdit=beneficioscajas&id=$idgrupoafinidad&idbeneficio=$idbeneficio&idcliente=$idcliente");
					}
			} 
	

?>