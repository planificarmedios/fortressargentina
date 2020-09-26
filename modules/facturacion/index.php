<?php
	include('config/empresa.php');
	$numero=1;
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Script PHP para crear recibos de ingreso con PHP" />
    <meta name="author" content="Obed Alvarado" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Crear recibos</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->

    <link href="assets/css/style.css" rel="stylesheet" />
	<link rel=icon href='http://obedalvarado.pw/img/logo-icon.png' sizes="32x32" type="image/png">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
</head>
<body >
    <div class="container outer-section" >
        
       <form class="form-horizontal" role="form" id="datos_recibo" method="post">
        <div id="print-area">
                  <div class="row pad-top font-big">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <a href="https://obedalvarado.pw/" target="_blank">  <img src="img/logo.png" alt="Logo sistemas web" /></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong>E-mail : </strong> <?php echo email_empresa;?>
                    <br />
                    <strong>Teléfono :</strong> <?php echo telefono_empresa;?> <br />
					<strong>Sitio web :</strong> <?php echo web_empresa;?> 
                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong><?php echo nombre_empresa;?>  </strong>
                    <br />
                    Dirección : <?php echo direccion_empresa;?> 
                </div>

            </div>
          
            
            

            <div class="row ">
			<hr />
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <h2>Detalles de cliente :</h2>
                     <div class="row">
						<div class="col-md-12">
							<label>Cliente</label>
							<input type="text" name="cliente" id="cliente" class="form-control" placeholder="Coloca el nombre de la persona que recibe el pago" required>
						</div>
					 
					 </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <h2>Detalles del recibo:</h2>
				<div class="row">	
					
					<div class="col-md-3">
						<label><strong>Fecha: </strong></label>
						<input type="text" class="form-control" readonly value="<?php echo date("d/m/Y");?>" >
					</div>
					<div class="col-md-3">
						<label><strong>Forma de pago: </strong></label>
						<select class="form-control" required name="forma_pago" id="forma_pago">
							<option value="1">Efectivo</option>
							<option value="2">Cheque</option>
							<option value="1">Transferencia</option>
						</select>						
					</div>
					
					<div class="col-md-3">
						<label><strong>Recibo #: </strong></label>
						<input type="text" class="form-control" required name="numero" id="numero" placeholder="Número de recibo">
					</div>
					
					<div class="col-md-3">
						<label><strong>Monto <?php echo simbolo_moneda;?>: </strong></label>
						<input type="text" class="form-control" required name="monto" id="monto">
					</div>
					
				</div>	
                    
                    <h4><strong>Concepto: </strong> </h4>
				
								
                    <input type="text"  class="form-control" id="concepto" name="concepto"   placeholder="Señala brevemente cuál es el motivo del pago" required>
                    
                  
                </div>
            </div>
            
         
            
            
           
           
            
		
        </div>
       <div class="row"> <hr /></div>
        <div class="row pad-bottom  pull-right">
		
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success ">Generar recibo</button>
             
              

                
            </div>
        </div>
		</form>
    </div>

	
   
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript">

	$("#datos_recibo").submit(function(){
		  var cliente = '33';
		  var forma_pago = '1';
		  var numero = '5555';
		  var monto = '531265';
		  var concepto = 'kkkkk';
		 
		VentanaCentrada('./pdf/documentos/recibo.php?cliente='+cliente+'&forma_pago='+forma_pago+'&numero='+numero+'&monto='+monto+'&concepto='+concepto,'Recibo','','1024','768','true');	
		 
		 
	 });
		

		
		
		
</script>
</html>
