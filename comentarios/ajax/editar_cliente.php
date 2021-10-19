<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	
	
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	$abonado=mysqli_real_escape_string($con,(strip_tags($_POST["mod_abonado"],ENT_QUOTES)));
	$nombre_objetivo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre_objetivo"],ENT_QUOTES)));		
	$codigo_rubro=intval($_POST["mod_codigo_rubro"]);
	$codigo_tipo_prestacion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo_tipo_prestacion"],ENT_QUOTES)));		
	$vigilancia_fisica=mysqli_real_escape_string($con,(strip_tags($_POST["mod_vigilancia_fisica"],ENT_QUOTES)));
	$monitoreo_fijo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_monitoreo_fijo"],ENT_QUOTES)));
	$monitoreo_movil=mysqli_real_escape_string($con,(strip_tags($_POST["mod_monitoreo_movil"],ENT_QUOTES)));
	$nro_pago_objetivo=intval($_POST['mod_nro_pago_objetivo']);
	$con_arma=mysqli_real_escape_string($con,(strip_tags($_POST["mod_con_arma"],ENT_QUOTES)));		
	$codigo_ambito=intval($_POST["mod_codigo_ambito"]);		
	$observaciones=mysqli_real_escape_string($con,(strip_tags($_POST["mod_observaciones"],ENT_QUOTES)));		
	$tipo_calle=intval($_POST["mod_tipo_calle"]);		
	$calle=mysqli_real_escape_string($con,(strip_tags($_POST["mod_calle"],ENT_QUOTES)));
	$nro_domicilio=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nro_domicilio"],ENT_QUOTES)));
	$medio=mysqli_real_escape_string($con,(strip_tags($_POST["mod_medio"],ENT_QUOTES)));
	$piso=mysqli_real_escape_string($con,(strip_tags($_POST["mod_piso"],ENT_QUOTES)));
	$depto=mysqli_real_escape_string($con,(strip_tags($_POST["mod_depto"],ENT_QUOTES)));
	$entre_calle_1=mysqli_real_escape_string($con,(strip_tags($_POST["mod_entre_calle_1"],ENT_QUOTES)));
	$entre_calle_2=mysqli_real_escape_string($con,(strip_tags($_POST["mod_entre_calle_2"],ENT_QUOTES)));		
	$codigo_localidad=intval($_POST["mod_codigo_localidad"]);
	$codigo_partido=intval($_POST["mod_codigo_partido"]);
	$codigo_provincia=intval($_POST["mod_codigo_provincia"]);
	
	$id_cuenta = intval($_POST['mod_id']);
	$sql="UPDATE 
				agencias.cuentas SET abonado='".$abonado."', nombre_objetivo='".$nombre_objetivo."', codigo_rubro='".$codigo_rubro."', 
				codigo_tipo_prestacion='".$codigo_tipo_prestacion."', vigilancia_fisica='".$vigilancia_fisica."', monitoreo_fijo='".$monitoreo_fijo."' , 
				monitoreo_movil='".$monitoreo_movil."' , nro_pago_objetivo='".$nro_pago_objetivo."' , con_arma='".$con_arma."' , 
				codigo_ambito='".$codigo_ambito."' , observaciones='".$observaciones."' , tipo_calle='".$tipo_calle."' , calle='".$calle."' , 
				nro_domicilio='".$nro_domicilio."' , medio='".$medio."' , piso='".$piso."' , depto='".$depto."' , entre_calle_1='".$entre_calle_1."' , 
				entre_calle_2='".$entre_calle_2."' , codigo_localidad='".$codigo_localidad."' , codigo_partido='".$codigo_partido."', 
				codigo_provincia='".$codigo_provincia."'
		WHERE id_cuenta='".$id_cuenta."'";
	
	$query_update = mysqli_query($con,$sql);
		if ($query_update){
			$messages[] = "Objetivo ha sido actualizado satisfactoriamente.";
		} else{
			$errors []= "Algo ha salido mal con el Objetivo intenta nuevamente.".mysqli_error($con);
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