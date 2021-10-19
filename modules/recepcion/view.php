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

		echo "
		<i class='fa fa-cog fa-spin fa-3x fa-fw'></i>
				<div class='row' pull-left>
					
				           <div class='col-md-1' ></div>
							<div class='col-md-2'>
								<a class='btn btn-warning btn-social' href='modules/recepcion/proses.php?act=limpiarEstadistica&valor=7'>
									<i class='fa fa-plus'></i> Limpiar Pedorros
								</a>
							</div>

							<div class='col-md-2' >
											<a class='btn btn-primary btn-social' href='?module=form_recepcion&form=ingresomanual'>
												<i class='fa fa-plus'></i> Ingreso Manual de Acceso
											</a>
							</div>
			</div>
		";


		?>
	</div>
</div>

<div id="seccionRecargar"></div>


<script type="text/javascript">
try {
	$(document).ready(function() {
		setInterval(
			function() {
				$('#seccionRecargar').load('modules/recepcion/RecargarSeccion.php');
			}, 1000
		);
	});
} catch (error) {
	console.error(error);
}
</script>