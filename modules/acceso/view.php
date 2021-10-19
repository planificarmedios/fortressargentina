<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous">
</script>


<div class="row">
	<div class="col-md-12">
		<?php

		if (empty($_GET['alert'])) {
			echo "";
		} elseif ($_GET['alert'] == 1) {
			echo "<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<h4>  <i class='icon fa fa-check-circle'></i> Ingreso registrado correctamente!</h4>
				</div>
				
				
				
				";
		}

	


		?>
	</div>
</div>

<div id="seccionRecargar"></div>


<script type="text/javascript">
try {
	$(document).ready(function() {
		setInterval(
			function() {
				$('#seccionRecargar').load('modules/acceso/RecargarSeccion.php');
			}, 7000
		);
	});
} catch (error) {
	console.error(error);
}
</script>