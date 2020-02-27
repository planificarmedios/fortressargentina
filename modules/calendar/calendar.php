calendar

<?php
require_once('bdd.php');
$sql = "SELECT id, title, start, end, color, codigo, idInicio, idFin, idUsuario FROM events WHERE idUsuario > 0";
$req = $bdd->prepare($sql); $req->execute(); $events = $req->fetchAll();
$codigo = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXIZ".uniqid()); // genero un token aleatoriamente
$codigo = substr($codigo, 0,10); //extrae los primeros 6 digitos
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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
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
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"></a>
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
            <div class="col-lg-12 text-center">
                
                <p style="color:#096"  class="lead">Clicar sobre una fecha para consultar disponibilidad!</p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Gestionar Reserva</h4>
			  </div>
			  <div class="modal-body">
						   
					  <input style="visibility:hidden" type="hidden" name="title" class="form-control" id="title" placeholder="Titulo">
					
                  
                   <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Código</label>
					<div class="col-sm-10">
					  <input type="text" name="codigo" class="form-control" id="codigo" value="<?php echo $codigo; ?>" readonly required>
					</div>
				  </div>
                  
                  
				  <div class="form-group">
					<label for="idInicio" class="col-sm-2 control-label">Inicio </label>
					<div class="col-sm-10">
					  <select name="idInicio" class="form-control" id="idInicio">
                      <?php ?>
                          <option value="">Seleccionar Hora de Inicio: </option>
						  <option style="color:#c8c612;" value="10">&#9724; 10:00</option>
                          <option style="color:#8a890f;" value="14">&#9724; 14:00</option>
					  <?php ?>
						</select>
					   </div>
				  </div>
                  
                  <div class="form-group">
					<label for="idFin" class="col-sm-2 control-label">Finalización </label>
					<div class="col-sm-10">
					  <select name="idFin" class="form-control" id="idFin">
                          <option value="">Seleccionar Hora de Finalizaciòn: </option>
						  <option style="color:#a3a112;" value="10">&#9724; 10:00</option>
						  <option style="color:#b8b611;" value="11">&#9724; 11:00</option>
						  <option style="color:#a7a510;" value="12">&#9724; 12:00</option>						  						  						  <option style="color:#989610;" value="13">&#9724; 13:00</option>
						  <option style="color:#8a890f;" value="14">&#9724; 14:00</option>
						  <option style="color:#6e6d0e;" value="15">&#9724; 15:00</option>
                          <option style="color:#5e5d0c;" value="16">&#9724; 16:00</option>
                          <option style="color:#4f4e0b;" value="17">&#9724; 17:00</option>
                          <option style="color:#3f3e09;" value="18">&#9724; 18:00</option>
						</select>
					   </div>
				  </div>
				  
                  
                  
                  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  
					  <input type="hidden" name="end" class="form-control" id="end" readonly>
                      
					
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-success">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modificar / Eliminar Reserva</h4>
			  </div>
			  <div class="modal-body">
								  
					  <input style="visibility:hidden" type="hidden" name="title" class="form-control" id="title" placeholder="Titulo">
					
                  
                  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Código</label>
					<div class="col-sm-10">
					  <input type="text" name="codigo" class="form-control" id="codigo" readonly>
					</div>
				  </div>
                  
				  <div class="form-group">
					<label for="idInicio" class="col-sm-2 control-label">Inicio </label>
					<div class="col-sm-10">
					  <select name="idInicio" class="form-control" id="idInicio">
                          <option value="">Seleccionar Hora de Inicio: </option>
						  <option style="color:#a3a112;" value="10">&#9724; 10:00</option>
						  <option style="color:#b8b611;" value="11">&#9724; 11:00</option>
						  <option style="color:#a7a510;" value="12">&#9724; 12:00</option>						  						 						  <option style="color:#989610;" value="13">&#9724; 13:00</option>
						  <option style="color:#8a890f;" value="14">&#9724; 14:00</option>
						  <option style="color:#6e6d0e;" value="15">&#9724; 15:00</option>
                          <option style="color:#5e5d0c;" value="16">&#9724; 16:00</option>
                          <option style="color:#4f4e0b;" value="17">&#9724; 17:00</option>
                          <option style="color:#3f3e09;" value="18">&#9724; 18:00</option>
						</select>
					   </div>
				  </div>
                  
                  <div class="form-group">
					<label for="idFin" class="col-sm-2 control-label">Finalización </label>
					<div class="col-sm-10">
					  <select name="idFin" class="form-control" id="idFin">
                          <option value="">Seleccionar Hora de Finalización: </option>
						  <option style="color:#a3a112;" value="10">&#9724; 10:00</option>
						  <option style="color:#b8b611;" value="11">&#9724; 11:00</option>
						  <option style="color:#a7a510;" value="12">&#9724; 12:00</option>						  						 						  <option style="color:#989610;" value="13">&#9724; 13:00</option>
						  <option style="color:#8a890f;" value="14">&#9724; 14:00</option>
						  <option style="color:#6e6d0e;" value="15">&#9724; 15:00</option>
                          <option style="color:#5e5d0c;" value="16">&#9724; 16:00</option>
                          <option style="color:#4f4e0b;" value="17">&#9724; 17:00</option>
                          <option style="color:#3f3e09;" value="18">&#9724; 18:00</option>
						</select>
					   </div>
				  </div>
                  
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				  <input type="hidden" name="codigo" class="form-control" id="codigo">
                  
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-success">Confirmar</button>
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
	<script>

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
				right: 'month,basicWeek,basicDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #codigo').val(event.codigo);
					$('#ModalEdit #idInicio').val(event.idInicio);
					$('#ModalEdit #idFin').val(event.idFin);
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
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				$codigo = explode(" ", $event['codigo']);
				$idInicio = explode(" ", $event['idInicio']);
				$idFin = explode(" ", $event['idFin']);
				
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
					idInicio: '<?php echo $event['idInicio']; ?>',
					idFin: '<?php echo $event['idFin']; ?>',
					codigo: '<?php echo $event['codigo']; ?>',
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
