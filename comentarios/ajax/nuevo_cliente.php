<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$abonado=mysqli_real_escape_string($con,(strip_tags($_POST["abonado"],ENT_QUOTES)));
		$nombre_objetivo=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_objetivo"],ENT_QUOTES)));
		$codigo_rubro=$_POST["codigo_rubro"];
		$codigo_tipo_prestacion=$_POST["codigo_tipo_prestacion"];
		$vigilancia_fisica=mysqli_real_escape_string($con,(strip_tags($_POST["vigilancia_fisica"],ENT_QUOTES)));
		$monitoreo_fijo=mysqli_real_escape_string($con,(strip_tags($_POST["monitoreo_fijo"],ENT_QUOTES)));
		$monitoreo_movil=mysqli_real_escape_string($con,(strip_tags($_POST["monitoreo_movil"],ENT_QUOTES)));
		$nro_pago_objetivo=mysqli_real_escape_string($con,(strip_tags($_POST["nro_pago_objetivo"],ENT_QUOTES)));
		$con_arma=mysqli_real_escape_string($con,(strip_tags($_POST["con_arma"],ENT_QUOTES)));
		$codigo_ambito=$_POST["codigo_ambito"];
		$observaciones=mysqli_real_escape_string($con,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
		$tipo_calle=$_POST["tipo_calle"];
		$calle=mysqli_real_escape_string($con,(strip_tags($_POST["calle"],ENT_QUOTES)));
		$nro_domicilio=mysqli_real_escape_string($con,(strip_tags($_POST["nro_domicilio"],ENT_QUOTES)));
		$medio=mysqli_real_escape_string($con,(strip_tags($_POST["medio"],ENT_QUOTES)));
		$piso=mysqli_real_escape_string($con,(strip_tags($_POST["piso"],ENT_QUOTES)));
		$depto=mysqli_real_escape_string($con,(strip_tags($_POST["depto"],ENT_QUOTES)));
		$entre_calle_1=mysqli_real_escape_string($con,(strip_tags($_POST["entre_calle_1"],ENT_QUOTES)));
		$entre_calle_2=mysqli_real_escape_string($con,(strip_tags($_POST["entre_calle_2"],ENT_QUOTES)));
		$codigo_localidad=$_POST["codigo_localidad"];
		$codigo_partido=$_POST["codigo_partido"];
		$codigo_provincia=mysqli_real_escape_string($con,(strip_tags($_POST["codigo_provincia"],ENT_QUOTES)));
		$fecha_creacion_archivo= '0000-00-00';
		
		
		$sql="INSERT INTO cuentas (abonado, nombre_objetivo, codigo_rubro, codigo_tipo_prestacion, vigilancia_fisica, monitoreo_fijo, monitoreo_movil, nro_pago_objetivo,  con_arma, codigo_ambito, observaciones, tipo_calle, calle, nro_domicilio, medio, piso, depto, entre_calle_1, entre_calle_2, codigo_localidad,  codigo_partido, codigo_provincia, fecha_creacion_archivo) 
VALUES ('$abonado','$nombre_objetivo', '$codigo_rubro', '$codigo_tipo_prestacion', '$vigilancia_fisica', '$monitoreo_fijo', '$monitoreo_movil',  '$nro_pago_objetivo', '$con_arma', '$codigo_ambito', '$observaciones', '$tipo_calle', '$calle', '$nro_domicilio', '$medio', '$piso', '$depto',  '$entre_calle_1', '$entre_calle_2', '$codigo_localidad', '$codigo_partido', '$codigo_provincia', '$fecha_creacion_archivo')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>