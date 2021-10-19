<?php
session_start();
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
 if ($_GET['act']=='insert') {
		if (isset($_POST['guardar'])) {
	    $id_cliente = $_POST['id_cliente'];
		$tipo_caja = $_POST['tipo_caja'];
		$nombre = $_POST['nombre'];
		$comentario = 'Reserva de Caja';
		$celular= $_POST['celular'];
		$email= $_POST['email'];
		$tipo_consulta= $_POST['tipo_consulta'];
		
		$jsonData = array( 'id_cliente' => "$id_cliente", 
						   'tipo_caja' => "$tipo_caja",
						   'contacto' => "$nombre",
						   'tel' => "$celular",
						   'email' => "$email",
						   'comentario' => "$comentario",
						   'tipo_consulta' => "$tipo_consulta"
						   );
		$data_string = json_encode($jsonData);
		$ch = curl_init($servidor.'/api/consultas/add');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
		);
		$result = curl_exec($ch);    
        header("location: ../../main.php?module=consultas&alert=1");
	}


} elseif ($_GET['act']=='temporal') {

			if (isset($_POST['guardar'])) {
			$id_cliente = $_POST['id_cliente'];
			$serie= $_POST['serie'];
			$tipo_consulta= $_POST['tipo_consulta'];
			$inicio= $_POST['inicio'];
			$fin= $_POST['fin'];
			$comentario= $_POST['comentario'];
			
			$jsonData = array( 'id_cliente' => "$id_cliente", 
							   'serie' => "$serie",
							   'tipo_consulta' => "$tipo_consulta",
							   'inicio' => "$inicio",
							   'fin' => "$fin",
							   'comentario' => "$comentario"
							   );
			$data_string = json_encode($jsonData);
			$ch = curl_init($servidor.'/api/consultas/temporal');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
			);
			$result = curl_exec($ch);    
			header("location: ../../main.php?module=consultas&alert=1");
			}


		} elseif ($_GET['act']=='permanente') {

			if (isset($_POST['guardar'])) {
			$id_cliente = $_POST['id_cliente'];
			$serie= $_POST['serie'];
			$tipo_consulta= $_POST['tipo_consulta'];
			$inicio= $_POST['inicio'];
			$fin= $_POST['fin'];
			$comentario= $_POST['comentario'];
			
			$jsonData = array( 'id_cliente' => "$id_cliente", 
							   'serie' => "$serie",
							   'tipo_consulta' => "$tipo_consulta",
							   'inicio' => "$inicio",
							   'fin' => "2999-12-31",
							   'comentario' => "$comentario"
							   );
			$data_string = json_encode($jsonData);
			$ch = curl_init($servidor.'/api/consultas/temporal');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
			);
			$result = curl_exec($ch);    
			header("location: ../../main.php?module=consultas&alert=1");
			}




} elseif ($_GET['act']=='delete') {
		if (isset($_GET['id']) and isset($_GET['nrocaja'])) { 
		    $id = $_GET['id']; 
		    $nrocaja = $_GET['nrocaja'];
		    $usuario = $_SESSION['name_user'];
		}
		$jsonData = array( 'id' => "$id", 'usuario' => "$usuario", 'nrocaja' => "$nrocaja" );
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
   if ( isset ($_GET['id'])) { 
		$id = $_GET['id']; 
	}
	
	$jsonData = array( 'id' => "$id" );
										   
						$data_string = json_encode($jsonData);
						$ch = curl_init($servidor.'/api/consultas/update/');
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'Content-Type: application/json',
							'Content-Length: ' . strlen($data_string))
							);
						$result = curl_exec($ch);   
			header("location: ../../main.php?module=consultas&alert=2");

}  elseif ($_GET['act']=='comentarios') {
		if (isset($_POST['guardar'])) {
			$id_consulta = $_POST['id_consulta'];
			$comentario= $_POST['comentario'];
			$id_usuario = $_SESSION['id_user'] ;
		}
	
	$jsonData = array( 'comentario' => "$comentario",
					   'id_consulta' => "$id_consulta",
					   'id_usuario' => "$id_usuario"
					   );

	$data_string = json_encode($jsonData);
	$ch = curl_init($servidor.'/api/consultas/addcomentario');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: ' . strlen($data_string))
	);
	$result = curl_exec($ch);    
	header("location: ../../main.php?module=form_consultas&form=edit&id=$id_consulta");

}
?>