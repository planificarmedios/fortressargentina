<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	$_POST['nombre_empresa']='Vigilancia y Monitoreo Medinilla SA';
	$_POST['telefono']='0223-4761222';
	$_POST['email']='info@medinillaseguridad.com.ar';
	$_POST['direccion']='Catamarca 785';
	$_POST['ciudad']='Mar del Plata';
	$_POST['codigo_postal']='7600';
	$_POST['estado']='Buenos Aires';
	
	if (empty($_POST['nombre_empresa'])) {
           $errors[] = "Nombre de empresa esta vacío";
        }else if (empty($_POST['telefono'])) {
           $errors[] = "Teléfono esta vacío";
        } else if (empty($_POST['email'])) {
           $errors[] = "E-mail esta vacío";
        } else if (empty($_POST['impuesto'])) {
           $errors[] = "Porcentaje comisión vacío";
        } else if (empty($_POST['moneda'])) {
           $errors[] = "Moneda esta vacío";
        } else if (empty($_POST['direccion'])) {
           $errors[] = "Dirección esta vacío";
        } else if (empty($_POST['ciudad'])) {
           $errors[] = "Dirección esta vacío";
		} else if (empty($_POST['fechaComision'])) {
           $errors[] = "Fecha de comisión vacía";	
		
		} else if (empty($_POST['vendedor'])) {
        	$errors[] = "Seleccion vendedor vacía";
		
		
        }   else if (
			!empty($_POST['nombre_empresa']) &&
			!empty($_POST['telefono']) &&
			!empty($_POST['email']) &&
			!empty($_POST['impuesto']) &&
			!empty($_POST['moneda']) &&
			!empty($_POST['fechaComision']) &&
			!empty($_POST['direccion']) &&
			!empty($_POST['vendedor']) &&
			!empty($_POST['ciudad']) 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre_empresa=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_empresa"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$impuesto=mysqli_real_escape_string($con,(strip_tags($_POST["impuesto"],ENT_QUOTES)));
		$moneda=mysqli_real_escape_string($con,(strip_tags($_POST["moneda"],ENT_QUOTES)));
		$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$ciudad=mysqli_real_escape_string($con,(strip_tags($_POST["ciudad"],ENT_QUOTES)));
		
		$estado=mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
		$codigo_postal=mysqli_real_escape_string($con,(strip_tags($_POST["codigo_postal"],ENT_QUOTES)));
		$fechaComision = $_POST["fechaComision"];
		$vendedor = $_POST["vendedor"];
		
		$sql="UPDATE facturas SET porc_comision='".$impuesto."' , fechaComision='".$fechaComision."' , condiciones='9' WHERE condiciones='8' and id_vendedor='".$vendedor."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Datos han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Algo ha salido mal intenta nuevamente.".mysqli_error($con);
			} 
		} else {
				$errors []= "Error desconocido.";
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
						<strong>¡Comisiones actualizadas!</strong> <?php echo $vendedor;  ?>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>