<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if ($_POST['estado']==""){
			$errors[] = "Selecciona el estado del producto";
		} else if (empty($_POST['valor_venta_alpublico'])){
			$errors[] = "Precio de Venta vacío";
		} else if (empty($_POST['precio'])){
			$errors[] = "Precio de Costo vacío";
		} else if (empty($_POST['valorDolar'])){
			$errors[] = "Valor Dolar Vacio";
		} else if (
			!empty($_POST['codigo']) &&
			!empty($_POST['nombre']) &&
			!empty($_POST['valor_venta_alpublico']) &&
			!empty($_POST['valorDolar']) &&
			$_POST['estado']!="" &&
			!empty($_POST['precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$estado=intval($_POST['estado']);
		$precio_venta=floatval($_POST['precio']);
		$valor_venta_alpublico=floatval($_POST['valor_venta_alpublico']);
		$valorDolar=floatval($_POST['valorDolar']);
		$date_added=date("Y-m-d H:i:s");
		
		
		$sql="INSERT INTO products (codigo_producto, nombre_producto, status_producto, date_added, precio_producto, valor_venta_alpublico,valorDolar) VALUES ('$codigo','$nombre','$estado','$date_added','$precio_venta','$valor_venta_alpublico','$valorDolar')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto ha sido ingresado correctamente.";
			} else{
				$errors []= "Algo ha salido mal en el ingreso del producto intenta nuevamente.".mysqli_error($con);
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