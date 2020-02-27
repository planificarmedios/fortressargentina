<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
	
	function validacion() {
		valor = document.getElementById("dni").value;
			if( valor == null || valor.length  <=7 ) {
				alert ('El campo DNI/CUIT debe ser entre 8 -11 caracteres');
		  		return false;
  	        }

  	    valor = document.getElementById("celular").value;
			if( valor == null || valor.length  <=9 ) {
				alert ('El campo telefono debe ser de 10 caracteres');
		  		return false;
  	        }
	}
	
</script>
</head>
<body style="background-image: url(images/fuertes.jpeg);">
	
	<div align="center" class="limiter" style="background-image: url(images/nuevasCajas2.jpg);">
		<div align="center" class="container-login100">
			<div align="center" class="wrap-login100">
				<div align="center" class="login100-form-title" style="background-image: url(images/nuevasCajas2.jpg);">
                
					<span class="login100-form-title-1">
					<font face="SERIF" color="#dcc48c"><strong></strong> </span>
				</div>
                

				<form align="left" class="login100-form validate-form" action="chv.php" method="POST" onsubmit="return validacion()">
                
                <?php  
 
      if (empty($_GET['alert'])) {
        echo "";
      } 

      elseif ($_GET['alert'] == 1) {
        echo "<div style='text-align:center' class='alert alert-success wrap-input100 validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i>Datos registrados correctamente. En breve recibirá una notificación con los pasos a seguir.</h4>
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div style='text-align:center' class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sesión finalizada</h4>
              </div>";
      }
	  
	  elseif ($_GET['alert'] == 3) {
        echo "<div style='text-align:center' class='alert alert-danger wrap-input100 validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i>  Ingresar Captcha</h4>
              </div>";
      }
	  
	  elseif ($_GET['alert'] == 4) {
        echo "  <span class='focus-input100'></span> 
				<div style='text-align:center' class='alert alert-danger wrap-input100 validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Verificar Captcha</h4>
              </div>";
      }
	  
	  
      ?>  
      				<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Ingresar Nombre">
						<input class="input100" type="text" id="nombre" name="nombre" placeholder="Nombre o Razón Social" required>
						<span class="focus-input100"></span>
					</div>

					<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Ingresar Apellido">
						<input class="input100" type="text" id="apellido" name="apellido" placeholder="Apellido* (Opcional)">
						<span class="focus-input100"></span>
					</div>
                
					<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Ingresar Mail">
						<input class="input100" type="email" id="mail" name="mail" placeholder="Mail" required>
						<span class="focus-input100"></span>
					</div>

					
					<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Sólo números permitidos">
						<input class="input100" type="number" id="dni" name="dni" maxlength="11" minlength="8" required pattern="[0-9]+" placeholder="Dni / CUIT" required title="Sólo números permitidos 8 dígitos para DNI - 11 para CUIL-CUIT">
						<span class="focus-input100"></span>
					</div>

					<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Formato 2236111000">
						<input class="input100" type="number" id="celular" name="celular" maxlength="10" minlength="10" required pattern="[0-9]+"placeholder="Celular" required title="Debe completar con 10 números">
						<span class="focus-input100"></span>
					</div>

					<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Ingresar Domicilio">
						<input class="input100" type="text" id="domicilio" name="domicilio" placeholder="Domicilio" required>
						<span class="focus-input100"></span>
					</div>

					<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Ingresar Provincia">
						<input class="input100" type="text" id="provincia" name="provincia" placeholder="Provincia" required>
						<span class="focus-input100"></span>
					</div>

					<div align="center" class="wrap-input100 validate-input m-b-10" data-validate="Ingresar Ciudad">
						<input class="input100" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" required>
						<span class="focus-input100"></span>
					</div>

					<div align="center" class="wrap-input100 validate-input m-b-18">               
                        <div align="center" class="g-recaptcha" data-sitekey="6LdludYUAAAAAHuKYB88n72h66UUBzncrxKvZHOm">
                        </div>
                    </div>
                    
					<div class="container-login100-form-btn">
                    <input type="submit" class="btn btn-outline-secondary btn-lg btn-block btn-flat" name="login" value="Confirmar" />
                    </div>  
                    <div align="center" class="wrap-input100 validate-input m-b-14"></div>
                                 
                    <input type="button"  class="btn btn-outline-danger btn-lg btn-block btn-flat" OnClick="location.href='index.php' " value="Volver"></input>
                   
                    </div>
  				</form>
       	</div>
	  </div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="main.js"></script>

</body>
</html>