<?php
session_start();
 if (isset($_POST['title']) && isset($_POST['codigo']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['idInicio']) && isset($_POST['idFin'])){
	
	$_SESSION['title'] = $_POST['title'];
	$_SESSION ['start'] = $_POST['start'];
	$_SESSION['end'] = $_POST['end'];
	$_SESSION['idInicio'] = $_POST['idInicio'];
 }
 ?>
 
 <!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <base href="<?php echo url_site;?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"/>

    <title><?php echo 'PRUEBA';?></title>
  </head>
  <body>
  
<div class="col-sm-8" align="center">
         <h4 style="color:#00F">Datos del Titular</h4>
         <form  method="POST" align="center" action="MP/">
          <div class="form-row">
            <div class="form-group col-sm-6">
              <label>Nombre</label>
              <input type="text" name="nome" class="form-control" value='<?php echo $_SESSION['name_user']?>' readonly required/>
            </div>

            <div class="form-group col-sm-6">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value='<?php echo $_SESSION['email']?>'required/>
            </div>

            <div class="form-group col-sm-6">
              <label>Código Reserva</label>
              <input type="text" name="codigo" class="form-control" value='<?php echo $_SESSION['codigo']?>' readonly required/>
            </div>
            
            <div class="form-group col-sm-6">
              <label>Fecha Reserva</label>
              <input type="text" name="start" class="form-control" value='<?php echo $_SESSION['start']?>' readonly/>
            </div>
            
             <div class="form-group col-sm-6">
              <label>Horario Inicio</label>
              <input type="text" name="idInicio" class="form-control" value='<?php echo $_SESSION['idInicio']?>' readonly/>
            </div>
            
            <div class="form-group col-sm-6">
              <label>Horario Final</label>
              <input type="text" name="idFin" class="form-control" value='<?php echo $_SESSION['idFin']?>' readonly/>
            </div>
            
            
          </div>
          
      </div>

      <div class="col-sm-4">
        <h4><center>Importe de la Transacción</h4>
        Importe a realizar
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text">$ARS</label>
          </div>
          <input type="text" name="valor" class="form-control"  value="<?php echo $_SESSION['valor'] ?>" title='CAMPO SOLO NÚMERICO' readonly required/>
        </div>
        <input type="submit" value="Continuar" class="btn btn-success btn-lg btn-block">
         </form>
      </div>
                
   </body>
</html>
                 