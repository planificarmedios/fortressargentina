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
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="login-check.php" method="POST">
				
				<span class="login100-form-title p-b-43">
						<a><img src="images/horizontal.png" class="img-fluid"></a> 
				</span>

				<?php  
 
      if (empty($_GET['alert'])) {
        echo "";
      } 

      elseif ($_GET['alert'] == 1) {
        echo "<div style='text-align:center' class='alert alert-danger validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-times-circle'></i>Usuario o password incorrectos</h4>
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div style='text-align:center' class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sesión finalizada</h4>
              </div>";
      }
	  
	  elseif ($_GET['alert'] == 3) {
        echo "<div style='text-align:center' class='alert alert-danger validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i>Ingresar Captcha</h4>
              </div>";
      }
	  
	  elseif ($_GET['alert'] == 4) {
        echo "  <span class='focus-input100'></span> 
		<div style='text-align:center' class='alert alert-danger validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-times-circle'></i>Verificar Captcha</h4> 
              </div>";
      }

      elseif ($_GET['alert'] == 5) {
       echo "<div style='text-align:center' class='alert alert-success validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'></i>Se ha enviado mail de acceso</h4>
              </div>";
      }

      elseif ($_GET['alert'] == 6) {
       echo "<div style='text-align:center' class='alert alert-success validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'>Nuevo acceso procesado</i></h4>
              </div>";
      }
	  
	  elseif ($_GET['alert'] == 9) {
       echo "<div style='text-align:center' class='alert alert-success validate-input m-b-18'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i>Nueva clave registrada.</h4>
              </div>";
      }
	 
      ?> 

	

					<div class="wrap-input100 validate-input" data-validate = "Ingresar formato válido: ex@abc.xyz">
						<input class="input100" type="text" autocomplete="off"  id="username" name="username" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Mail Registrado</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Ingresar contraseña">
						<input class="input100" type="password" autocomplete="off" id="password" name="password" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>

					<div align="center">               
                        <div align="center" class="g-recaptcha" data-sitekey="6LdludYUAAAAAHuKYB88n72h66UUBzncrxKvZHOm">
                    </div>
          </div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						
						<div class="note"><strong><a href="lg.php" class="txt1">Quiero ser cliente</a></strong></div>

						<div><strong><a href="ftpss.php" class="txt1">Olvidé contraseña</a></strong></div>
					</div>


			

				<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Ingresar
						</button>
					</div>

				<div align="center" class="validate-input m-b-10"></div>
                    <div class="container-login100-form-btn">              
                    <input type="button"  class="btn btn-outline-danger btn-lg btn-block btn-flat" 
                    OnClick="location.href='http://192.168.0.14/fortressargentina'" value="Cancelar"></input>
                </div>
					
                	<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="note"><strong><a class="txt1"></a></strong></div>
						<div><strong><a  class="txt1"></a></strong></div>
					</div>

					<div class="login100-form-social flex-c-m">

						<a href="mailto:" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-envelope-o" aria-hidden="true" title="Email"></i>
						</a>						

						<a href="https://www.facebook.com/fortressargentina" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true" title="Facebook"></i>
						</a>

						<a href="https://www.instagram.com/fortressargentina/" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-instagram" aria-hidden="true" title="Instagram"></i>
						</a>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: url('images/bg-02.jpg');">
				</div>
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

</body>
</html>