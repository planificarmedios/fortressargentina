<?php 
session_start();
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
if(isset($_POST['dataidobat']) and isset($_POST['dataidaut'])) { 
$cliente        = $_POST['dataidobat'];
$id_autorizante = $_POST['dataidaut'];
			
					
		$get_data = callAPI('GET', $servidor.'/api/titulares/',false);
		$response = json_decode($get_data, true);
				
		
					foreach ($response as $t) {
							  $id = $t['id'];
							  $dni = $t['dni'];
							  $_SESSION['nombre'] = $t['nombre'];	
							  $n = $t['nombre'];
							  $_SESSION['apellido']= $t['apellido'];
							  $a = $t['apellido'];
							  if ($cliente == $t['id']){ 
								  $dni =''; $n =''; $a ='';};
								  echo "
								  <div class='col-sm-12 col-md-4' style='visibility:visible'>
								   <label class='control-label'>Cliente Autorizantexxxx</label>
									      <select class='form-control' id='id_autorizante' name='id_autorizante' required>
										     <option value=$id>$dni | $n | $a </option>
										  </select>
								  </div>";
							  
					}
		
}
?>