<?php session_start();

if(isset($_POST['dataidobat'])) { 
$cp = $_POST['dataidobat'];

include_once ("../user/callAPI.php");
					$get_data = callAPI('GET', $servidor.'/api/ciudades/'.$cp,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					      $local = $d['localidad'];	
						  $provincia= $d['provincia'];
		          		echo "<
						
						<div class='form-group'>
						  <label class='col-sm-2 control-label'>Localidad</label>
							<div class='col-sm-5'>
							  <input type='text' class='form-control' id='local' name='localidad' required>
							</div>
					  </div>
						
						>";
				}
} 

?> 