<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">

		function tampil_obat(input){
		var idI = input;
		var servicio = 1; ///////////////cambiar
		document.getElementById('fechaSeleccionada').value = idI;
		$.post
		("ajax.php", 
			{ dataidobat: idI, dataservicio: servicio,},
			  	function(response) {      
				  $('#idInicio').html(response)
				  document.getElementById('jumlah_masuk').focus();
				  document.getElementById("gifAnimado").style.visibility = "hidden";
				 
				}
			);
		}
		
		function validarFin(){
			var idI = document.getElementById('idInicio').value;
			var fecha = document.getElementById('fechaSeleccionada').value;
			var servicio = 1; ///////////////cambiar
			$.post
			("validarFin.php", 
				{ dataidI: idI, dataidF: fecha, dataservicio: servicio}, 
					function(response) {      
					   	$('#idFin').html(response);
						document.getElementById("idFinalizacion").style.visibility = "visible";
					   	document.getElementById('jumlah_fin').focus();
						document.getElementById("gifAnimado").style.visibility = "hidden";
					}
			);
		}
		
		function habilitar(input){
		var i = input.value;
			if (i > 0){
				document.getElementById("gifAnimado").style.visibility = "visible";
				document.getElementById("Iimporte").style.visibility = "visible";
				document.getElementById("idFinalizacion").style.visibility = "visible";
				document.getElementById("Ccodigo").style.visibility = "visible";
				document.getElementById("gifAnimado").style.visibility = "hidden";
				
				
			} else {
				document.getElementById("gifAnimado").style.visibility = "hidden";
				document.getElementById("idFinalizacion").style.visibility = "visible";
			}
		}
		
		function deshabilitar(){
			document.getElementById("idFinalizacion").style.visibility = "hidden";
		}
		
		function esconder(){
			document.getElementById("idFinalizacion").style.visibility = "hidden";
		}
		
		function animarGif(){
			document.getElementById("gifAnimado").style.visibility = "visible";
		}
		
		function cargarIdFinalizacion(input){
			var i = input.value;
			document.getElementById('idFinSeleccionado').value = i;
		}
		
		function getSelectValues(select) {
		  var result = [];
		  var token = document.getElementById('codigo').value;
		  var cliente = document.getElementById('cliente').value;
		  var options = select && select.options;
		  var opt;
		  var a = 0;
		  
		  for (var i=0, iLen=options.length; i<iLen; i++) {
			opt = options[i];
			a++;
			
			if (opt.selected) {
			  result.push(opt.value || opt.text);
			  //alert ('Validando los datos adicionales en cada iteracion' + opt.value + ' en la iteracion ' + a + ' token ' + token + ' Cliente: ' + cliente);
			  /////////////////////////////////////////////////////		
			  $.post
			 ("insertar_adicionales.php", 
					{ dataServicio: opt.value, 
					  dataCliente: cliente,
					  dataToken: token}, 
						function(response) {      
							//$('#idFin').html(response);
						}
				);
			  
			  /////////////////////////////////////////////////////
			} 
		  }
		  document.getElementById('adicionales').value = result; 
		}
		
		function verificar() {
		  var result = document.getElementById('adicionales').value;
		  //alert ('Validando los datos adicionales' + result);
		}
</script>

<?php
session_start(); 
if (!isset($_SESSION['id_user'])){header("Location: ../");}
require_once ("../callAPI.php");
require_once ("../parametros.php");
require_once("../MP/mailing_transaction/fechaCastellano.php");

$codigo = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXIZ".uniqid()); //
$c = substr($codigo, 0,10); //extrae los primeros 6 digitos
$_SESSION ['codigo'] = $c;
$u = $_SESSION["id_user"];
$_SESSION["idServicio"] = 1; ///////////////cambiar

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inicio</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet' />
 <style>
   body {
        padding-top: 70px;
        
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
	.boton {
	margin: 0 auto;
	display: block;
	width: 40px;
	height: 36px;
	padding: 10px;
	border-radius: 7px;
	background: #666;
	color: white;
	cursor: pointer;
	position: relative;
	}
	
	.boton span {
		display: block;
		width: 40px;
		height: 4px;
		background: white;
		margin-top:7px;
	}
	
	label {
	  cursor: pointer;
	}
	#menu-toggle {
	  display: none; /* hide the checkbox */
	}
	#menu {
	  display: none;
	  text-align: center;
	  background: white;
	  padding:10px 0;
	}
	
	#menu li a {
		color: black;
		padding: 10px 0;
		display: block;
	}
	#menu-toggle:checked + #menu {
	  display: block;
	}

	.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
    background-color: red;
}
   .container .row .col-lg-12.text-center div p {
	font-family: Georgia, Times New Roman, Times, serif;
}
   </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color:#dbc76c" class="navbar-brand" href="#">Clicar Fecha para Disponibilidad</a>
                
          </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a style="color:#D2C575" href="../pp/index.php" title="Volver">Volver Zona Clientes</a>
                    
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  <!-- Page Content -->
    <div class="container">
    
    	
        <div class="row">
            <center><div class="col-lg-12">
               
            <div id="calendar" class="col-centered">
                </div>
            </div>
 	   </div>
      
		<div class="modal fade" id="ModalAdd" name="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			

			<!-- form class="form-horizontal" method="POST" action="../MP/crud/cc.php"-->
            <form class="form-horizontal" method="POST" action="../MP/index.php">
            				
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<center><h4 class="modal-title" id="myModalLabel">Gestión de Reservas Sala A</h4>
			  </div>
			  <div class="modal-body">
                            
               <div class="loading" name="gifAnimado" id="gifAnimado">
                   <img name="gifAnimado" id="gifAnimado"src="images/loader-small.gif"/>
                   <br/>Consultando disponibilidad...
               </div>
               
               	
               <div class="form-group" name="idAdicionales" id="idAdicionales">
                <label class="col-sm-2 control-label" > Adicionales</label>
                <div class="col-sm-10">
                  <select multiple class="form-control"  name="idSelect2" id="idSelect2" 
     onblur="var el = document.getElementsByTagName('select')[0]; getSelectValues(el);" >
                    <option value="" selected> -- Seleccionar: Menú de Opción Múltiple -- </option>
                    <?php 
					session_start(); 
					require_once ("../callAPI.php");
					require_once ("../parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/servicios/extras/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					      $id = $d['id'][0];
						  $precio = $d['precio'];
						  $nombre = $d['nombre'][0];
						 ?> 
                         <option value= "<?php echo $id ?>"> <?php echo $nombre;?> </option>
					<?php	  
					}
					?>
                    </optgroup>
                  </select>
                 </div>
               </div>   
						   
				             
                                
               <div class="form-group">
                  <label for="idInicio" class="col-sm-2 control-label">Inicio</label>
                  <div class="col-sm-10">
                      <select name="idInicio" class="form-control" id="idInicio" onchange="validarFin(), habilitar(this), animarGif()" required></select>
                  </div>
			   </div>
               
               <div class="form-group" hidden="true">
                   <div class="col-sm-10">
                      <select class="form-control"  id="jumlah_masuk" name="jumlah_masuk"></select>
                    </div>
               </div>
               
               <div class="form-group" id="idFinalizacion" name="idFinalizacion">
                 	<label for="idFin"  class="col-sm-2 control-label">Finalización </label>
                    <div class="col-sm-10">
					  <select name="idFin" class="form-control" id="idFin" onchange="cargarIdFinalizacion(this)" required></select>
				    </div>
			   </div>
               
                <div class="form-group" hidden="true">
                   <div class="col-sm-10">
                      <select class="form-control"  id="jumlah_fin" name="jumlah_fin"></select>
                    </div>
               </div>
               
               <div class="form-group" name="Ccodigo" id="Ccodigo">
					<label for="title" class="col-sm-2 control-label">Código</label>
					<div class="col-sm-10">
					  <input type="text" name="codigo" class="form-control" id="codigo" value="<?php echo $_SESSION['codigo'];?>" readonly required>
					</div>
				  </div>
                  
               <div class="form-group">
                  <label  for="start" class="col-sm-2 control-label">Fecha </label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
			   </div>
               
                                 
           	 <script type="text/javascript">
				 // Material Select Initialization
					$(document).ready(function() {
					$('.mdb-select').materialSelect();
					});
			 </script>
             <input type="text" name="idFinSeleccionado" id="idFinSeleccionado" hidden="true"></input>	    	 
             <input type="text" name="fechaSeleccionada" id="fechaSeleccionada" hidden="true"></input>
             <input type="text" name="adicionales"       id="adicionales" hidden="true"></input>	
             <input type="text" name="cliente"           id="cliente" value="<?php echo $_SESSION["id_user"];?>"  hidden="true"></input>
             
             
             </div>
             
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="deshabilitar()">Cancelar</button>
				<button type="submit"  class="btn btn-warning" onClick="verificar()"> Continuar </button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
 		
    </div>
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.js'></script>
	<script src='js/fullcalendar/locale/es.js'></script>
	<script type="text/javascript">
	
	

	$(document).ready(function() {

	   var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'basicDay,basicWeek',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			defaultView: 'agendaDay',
			
			minTime: "09:00",
			maxTime: "20:00",
			editable: true,
			hiddenDays: [ 0 ], // hide Tuesdays and Thursdays
			
			
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
			var d = new Date();
			var actual = (moment(d).format('YYYY-MM-DD'));
			var eleccion = (moment(start).format('YYYY-MM-DD'));
			
			  if (eleccion > actual){
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #real').val(moment(start).format('DD-MM-YYYY'));
				$('#calendar').fullCalendar( 'changeView', 'agendaDay');
				$('#ModalAdd').modal('show');
				var r = start.format('DD-MM-YYYY');
				var s = start.format('YYYY-MM-DD');
				tampil_obat(s);
			  
			  } else {
				  alert ('Sólo pueden realizarse reservas con un día de antelación');
			  }
			},
			
			
			eventRender: function(event, element) {
				element.bind('click', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #codigo').val(event.codigo);
					$('#ModalEdit #idInicio').val(event.idInicio);
					$('#ModalEdit #idFin').val(event.idFin);
					$('#ModalEdit #estado').val(event.estado);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position
				edit(event);
			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
				edit(event);
			},
			events: [
			//alert 'Entre aca';
			<?php 
						
			$jsonData = array( 'servicioID' => 1 ); ///////////////cambiar
			$data_string = json_encode($jsonData);                                                                             
			$ch = curl_init($servidor.'/api/reservas/ocupados/'); //maquina Feli
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                   
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                    
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));$result = curl_exec($ch);
			$events = json_decode($result , true);
			//$ss = ' '; $e = ' '; $ee = ' '; $h = ' '; $start = ' '; $end = ' '; $event['start'] = ' '; $event['end'] = ' ';			
			foreach($events as $event): 
					$start = explode(" ", $event['start']); 
					$end = explode(" ", $event['end']);
					if($start[1] == '00:00:00'){ $start = $start[0]; }else{ $start = $event['start']; }
					if($end[1] == '00:00:00'){ $end = $end[0]; }else{ $end = $event['end']; }
				
			?>
				{
					start: '<?php echo $event['start']; ?>',
					end: '<?php echo $event['end']; ?>',
					title: '<?php echo 'Reservados'; ?>',
					
				},
			<?php endforeach; ?>
				
			]
			
		});
		
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			Event[3] = codigo;
			Event[4] = idInicio;
			Event[5] = idFin;
			
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Evento se ha guardado correctamente');
						}else{
						alert('No se pudo guardar. Inténtalo de nuevo.'); 
					}
				}
			});
		}
	
	});
</script>
</body>
</html>