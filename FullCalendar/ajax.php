<?php 
session_start();
require_once ("../callAPI.php");
require_once ("../parametros.php");
if(isset($_POST['dataidobat']) and isset($_POST['dataservicio'])) {
$f = $_POST['dataidobat'];
$s = $_POST['dataservicio'];
		}
		
		$get_data = callAPI('GET', $servidor.'/api/rangos/disponibles/'.$s.'/'.$f,false); 
		$response = json_decode($get_data, true); 
			if ($response == null) {
				$m = 'Sin horarios disponibles';
			} else {
				$m = 'Disponibilidad: ';
			}
		
		echo "<div class='form-group' id='idInicio' name='idInicio'>
               		<label class='col-sm-2 control-label'>Inicio</label>
                       <div class='col-sm-10'>
                    <select  id='Inicio' name='Inicio'> 
					<option value=''>" 
					?>
                    <?php echo $m;    
					"</option>" 
					?>	
						<?php 
						$x = 0;
						$cont = 0;
						 foreach ($response as $d) { 
						 		 $a[$x]      = $d['id']; 
								 $inicio[$x] = $d['inicio'];
								 $_SESSION['id_max'] = $d['id'];
								 $x++; 
								 $cont++;
                        }
						
						 		  for ($i=0;$i<=($_SESSION['id_max']);$i++) {
										  if (($a[$i+2])-($a[$i])== 2){
												?>
												<option value="<?php echo $a[$i]; ?>">&#9724;<?php echo $inicio[$i].' hs';?></option>
												<?php
										  } 

										  elseif (($a[$i])==($_SESSION['id_max'])){
											    ?>
												<option value="<?php echo $a[$i]; ?>">&#9724;<?php echo $inicio[$i].' hs';?></option>
												<?php
										  } 
								  }
							
			echo 	"
					</select>
                </div>
              </div>";
			
?>