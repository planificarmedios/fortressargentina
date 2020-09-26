<?php 
session_start();
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
if(isset($_POST['dataidobat'])){ 
$dni    = $_POST['dataidobat'];

$get_data = callAPI('GET', $servidor.'/api/valida/dni/'.$dni,false);
$response = json_decode($get_data, true);
				
		foreach ($response as $t) {			
				if($t['existe'] == 'true') {
					$m= 'dni';
					echo "<div class='alert alert-danger alert-dismissable'>
						  <button value='true' type='button' class='close' id='stok' name='stock' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4>  <i class='icon fa fa-check-circle'></i> El DNI - CUIL - CUIT ya existe!!!!!</h4>
						  </div>";
				} elseif ($t['existe'] == 'false') {
					$m= 'celular';
					echo "<div class='alert alert-success alert-dismissable'>
						  <button value='true' type='button' class='close' id='stok' name='stock' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4>  <i class='icon fa fa-check-circle'></i> Número validado correctamente !!!!!</h4>
						  </div>";
				}
				   
		}
?> <script type="text/javascript"> document.getElementById('<?php echo $m?>').focus(); <?php		

}
?>