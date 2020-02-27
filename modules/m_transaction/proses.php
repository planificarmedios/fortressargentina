<?php 
session_start();
require_once "../../config/database.php";
include("sendemail.php");
				//Mando a llamar la funcion que se encarga de enviar el correo electronico
				/*Configuracion de variables para enviar el correo*/
				$mail_username="medinilla.seguridadintegral@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
				$mail_userpassword="Medinilla785@";//Tu contraseña de gmail
			  	$mail_addAddress="sistemas@medinillaseguridad.com.ar";//correo electroniLco que recibira el mensaje
			  	$template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
				$mail_subject=" Información de sim ";
				/*Inicio captura de datos enviados por $_POST para enviar el correo */
				$mail_setFromEmail=$_SESSION['email'];
				$mail_setFromName=$_SESSION['name_user'];
				if ($_POST['transaccion'] == 'Salida') {
					$r = 'Instalacion de Sim '.$_POST['nombre'].' en cuenta '.$_POST['cliente'];
					$query_obat = mysqli_query($mysqli, 
					"SELECT DISTINCT m.nombre, m.codigo, m.unidad, m.cliente FROM medicamentos m, transaccion_medicamentos tm WHERE m.codigo = tm.codigo ")
					or die('error '.mysqli_error($mysqli));
						  while ($data_obat = mysqli_fetch_assoc($query_obat)) {
							if ($data_obat['codigo'] == $_POST['codigo']){ 
								$chip = $data_obat['nombre']; 
								;
							}
						  }
				
				}
				
				if ($_POST['transaccion'] == 'Habilitar') {
					$r = 'Confirmacion de recepcion de sim y afectacion a stock de tecnico';
					$query_obat = mysqli_query($mysqli, 
					"SELECT DISTINCT m.nombre, m.codigo FROM medicamentos m ")
					or die('error '.mysqli_error($mysqli));
						  while ($data_obat = mysqli_fetch_assoc($query_obat)) {
							if ($data_obat['codigo'] == $_POST['codigo']){ $chip = $data_obat['nombre']; }
						  }
				}
				
				if ($_POST['transaccion'] == 'Entrada') {
					$r = 'Asignacion de sim a Tecnico';
					$query_obat = mysqli_query($mysqli, 
					"SELECT DISTINCT m.nombre, m.codigo FROM medicamentos m ")
					or die('error '.mysqli_error($mysqli));
						  while ($data_obat = mysqli_fetch_assoc($query_obat)) {
							if ($data_obat['codigo'] == $_POST['codigo']){ $chip = $data_obat['nombre']; }
						  }
				}
					  
                $mail_subject=$r;
				$txt_message= 'Transaccion: ' . $_POST['codigo_transaccion']. 
							  '<br />Fecha: ' . $_POST['fecha_a']. 
							  '<br />Chip afectado	: ' . $chip.
							  '<br />Tipo Operacion: ' .$r;
							  
				
				sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
            
            $codigo_transaccion = mysqli_real_escape_string($mysqli, trim($_POST['codigo_transaccion']));
            $cliente = $_POST['cliente'];
			$fecha         = mysqli_real_escape_string($mysqli, trim($_POST['fecha_a']));
            $exp             = explode('-',$fecha);
            $fecha_a   = $exp[2]."-".$exp[1]."-".$exp[0];            
            $codigo       = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $num   = mysqli_real_escape_string($mysqli, trim($_POST['num']));
            $total_stock      = mysqli_real_escape_string($mysqli, trim($_POST['total_stock']));
            $tipo_transaccion= mysqli_real_escape_string($mysqli, trim($_POST['transaccion']));
            $created_user    = $_SESSION['id_user'];

          	if (($tipo_transaccion=='Entrada') or ($tipo_transaccion=='Salida')){
			
            $query = mysqli_query($mysqli, "INSERT INTO transaccion_medicamentos(codigo_transaccion,fecha,codigo,numero,created_user,tipo_transaccion) 
                                            VALUES('$codigo_transaccion','$fecha_a','$codigo','$num','$created_user','$tipo_transaccion')")or die('Error: '.mysqli_error($mysqli));    
				if ($query) {
					 $query1 = mysqli_query($mysqli, "UPDATE medicamentos SET 
					 											stock = '$total_stock',
																cliente =  '$cliente'
																WHERE codigo   = '$codigo'")
													or die('Error: '.mysqli_error($mysqli));
					 if ($query1) {                       
						
						header("location: ../../main.php?module=m_transaction&alert=1");
					}
				}   
			}
			
			if ($tipo_transaccion=='Habilitar') {
			
            		 $query1 = mysqli_query($mysqli, "UPDATE medicamentos SET 
					 													aceptado     = '1'
					 													
																  WHERE codigo   = '$codigo'")
													or die('Error: '.mysqli_error($mysqli));
					 if ($query1) {                       
						
						header("location: ../../main.php?module=m_transaction&alert=1");
					}
				   
			}
			
			
        }   
    }
}       
?>