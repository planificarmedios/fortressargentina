<?php 
session_start();
include_once ("callAPI.php");
require_once ("parametros.php");
if(isset($_POST['dataidobat'])){ 
$dni    = $_POST['dataidobat'];

					$get_data = callAPI('GET', $servidor.'/api/existe/dni/'.$dni,false);
                    $response = json_decode($get_data, true);
                    
                    foreach ($response as $d) {
                        
                    	if ($d['existe']==true) {
							$m= 'dni';
							echo "<div class='alert alert-danger alert-dismissable'>
								<button value='true' type='button' class='close' id='dni' name='dni' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<h4>  <i class='icon fa fa-check-circle'></i> El DNI - CUIL - CUIT ya existe!!!!!</h4>
								</div>";
						} else  {
							$m= 'celular';
							echo "<div class='alert alert-success alert-dismissable'>
								<button value='true' type='button' class='close' id='dni' name='dni' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<h4>  <i class='icon fa fa-check-circle'></i> Número validado correctamente !!!!!</h4>
								</div>";
						}
				   	}	
		
?> <script type="text/javascript"> document.getElementById('<?php echo $m?>').focus(); <?php		

}
?>