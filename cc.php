<!DOCTYPE html>
<html lang="en">
    <head>
   
    <title>FORTRESS</title>
    <meta charset="utf-8">
    <link rel="icon" type="images/png" href="images/logo4.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="whisper/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="whisper/css/animate.css">
    <link rel="stylesheet" href="whisper/css/owl.carousel.min.css">
    <link rel="stylesheet" href="whisper/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="whisper/css/magnific-popup.css">
    <link rel="stylesheet" href="whisper/css/aos.css">
    <link rel="stylesheet" href="whisper/css/ionicons.min.css">
    <link rel="stylesheet" href="whisper/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="whisper/css/jquery.timepicker.css">
    <link rel="stylesheet" href="whisper/css/flaticon.css">
    <link rel="stylesheet" href="whisper/css/icomoon.css">
    <link rel="stylesheet" href="whisper/css/style.css">
  </head>
  <body>
    
      <nav  style="font:'Paloseco Light'" class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div  style="font:'Paloseco Light'" class="container" id="comenzar" name="comenzar">
          <img src="images/logo4.png" width="70" height="65"><h3 style="font:'Paloseco MediumItalic'"><a class="mb-4"  href="index.php">F O R T R E S S</a></center></h3>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span style="font:'Paloseco Light'" class="oi oi-menu"></span> 
          </button>

          <div style="font:'Paloseco Light'" class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="cc.php" class="nav-link">Inicio</a></li>
              <li class="nav-item"><a href="#contacto" class="nav-link">Contacto</a></li>
 
            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image:url(images/pag_en_construccion.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h2 style="font:'Paloseco Light'" class="subheading" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></h2>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
               
            </h1>
            
          </div>
        </div>
      </div>
    </div>

       
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script type="text/javascript">
        function enableBtn(){
        document.getElementById("button1").hidden = true;
        document.getElementById("button2").hidden = false;
       }
    </script>
    
          
        <section class="ftco-consultation">
        <div class="container-fluid">
            <div class="row d-md-flex">
            
            <div  class="half order-md-last mt-md-0 d-flex justify-content-center align-items-center img" style="background-image: url(images/nuevasCajas6.jpg);">

                    <div><a href="indexcaptcha.php" class="overlay" ></a></div>
                    <div class="desc text-center" >
                                          
                        
                    </div>
                </div>
                
                <div  id="contacto" name="contacto" class="half p-3 p-md-5 ftco-animate">
                    <h3 class="mb-4">Dejanos tus consultas</h3>
                    <form action="checkForm.php" method="POST">
                    
                    <?php 
                    
                    if (empty($_GET['alert'])) {echo "";  } 
                      elseif ($_GET['alert'] == 1) {
                        echo "<div style='text-align:center' class='alert alert-danger wrap-input100 validate-input m-b-18'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4>  <i class='icon fa fa-check-circle'></i>Datos incompletos o incorrectos</h4>
                              </div>";
                      }
                      elseif ($_GET['alert'] == 2) {
                        echo "<div style='text-align:center' class='alert alert-success alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4>  <i class='icon fa fa-check-circle'></i> Gracias! Pronto será contactado</h4>
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
                                    
                   
                <div class="form-group">
                  <input type="text" id="datos" nombre="datos" class="form-control" placeholder="Nombre" required>
                </div>
                
                <div class="form-group">
                <input type="email" id="mail"  name="mail" class="form-control" placeholder="Email" required>
                </div>
                
                <div class="form-group">
                  <select id="asunto"  name="asunto" class="form-control" placeholder="Asunto" required>
                  <option value=''>Seleccionar tipo de consulta</option>
                  <option value="Solicitud de para Alta Cliente">Quiero ser cliente</option>
                  <option value="Solicitud de Informacion">Necesito más información</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <textarea name="mensaje" value='Mensaje de Prueba' id="mensaje" cols="30" rows="5" class="form-control" placeholder="Ingrese su mensaje y telef. de contacto" required></textarea>
                </div>
                
                             
                <div align="center" class="wrap-input100 validate-input m-b-18">               
                        <div align="center" id="idRecaptcha" name="idRecaptcha" class="g-recaptcha" 
                        data-sitekey="6LdludYUAAAAAHuKYB88n72h66UUBzncrxKvZHOm" data-callback="enableBtn"></div>
                 </div>
                <label> </label>    
                <div class="container-login100-form-btn">
                    <input type="submit" class="btn btn-outline-danger btn-lg btn-block btn-flat" id="button1" name="button1" value="Completar datos y captcha" disabled="true" />
                    <input type="submit" class="btn btn-outline-warning btn-lg btn-block btn-flat" id="button2" name="button2" value="Enviar" hidden="true" />

                </div>
              </form>
                </div>
            </div>
        </div>
    </section>    


    
         
        <div class="row">
          <div class="col-md-12 text-center">

            <!--- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  			<script></script> </i> <a href="https://colorlib.com" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="whisper/js/jquery.min.js"></script>
  <script src="whisper/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="whisper/js/popper.min.js"></script>
  <script src="whisper/js/bootstrap.min.js"></script>
  <script src="whisper/js/jquery.easing.1.3.js"></script>
  <script src="whisper/js/jquery.waypoints.min.js"></script>
  <script src="whisper/js/jquery.stellar.min.js"></script>
  <script src="whisper/js/owl.carousel.min.js"></script>
  <script src="whisper/js/jquery.magnific-popup.min.js"></script>
  <script src="whisper/js/aos.js"></script>
  <script src="whisper/js/jquery.animateNumber.min.js"></script>
  <script src="whisper/js/bootstrap-datepicker.js"></script>
  <script src="whisper/js/jquery.timepicker.min.js"></script>
  <script src="whisper/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="whisper/js/google-map.js"></script>
  <script src="whisper/js/main.js"></script>
    
  </body>
</html>