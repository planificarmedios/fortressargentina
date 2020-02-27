<?php 
session_start();
require_once ("../callAPI.php");
require_once ("../parametros.php");
if((isset($_POST['dataidI'])) and (isset($_POST['dataidF']) and isset($_POST['dataservicio']))){
		$f = $_POST['dataidF'];
		$idI = $_POST['dataidI'];
		$s = $_POST['dataservicio'];
		
}
		$get_data = callAPI('GET', $servidor.'/api/rangos/disponibles/'.$s.'/'.$f.'/'.$idI,false); 
		$response = json_decode($get_data, true);
		
		$c = 0;
		foreach ($response as $d) { 
		
								 $a[$x]      = $d['id']; 
								 $inicio[$x] = $d['inicio'];
								 $fin[$x]    = $d['fin'];
								 $x++; 
								 $_SESSION['id_max'] = $d['id'];
								 $c++;
		} 
		
			if ($response== null) {
				$m = 'Sin Disponibilidad de Horarios';
			} elseif ($c <= 1) {
				$m = 'Sin Disponibilidad de Horarios';
			} else {
				$m = 'Disponibilidad: ';	
			} 
			
		
		echo "<div class='form-group' style='visibility:visible'>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <select class='form-control' id='stok' name='stock'> 
					<option value=''>" 
					?>
                    <?php echo $m;    
					"</option>" 
					?>	
						<?php 
						$id_min = $idI;
						$x = 1;
						$cont = 0;
							 foreach ($response as $d) { 
								 $a[$x]      = $d['id']; 
								 $inicio[$x] = $d['inicio'];
								 $fin[$x]    = $d['fin'];
								 $x = $x + 1; 
								 $_SESSION['id_max'] = $d['id'];
								 $cont++;
							}
							
						 $z = 2;
						 if ($cont > 1){
								  for ($i=1;$i<($_SESSION['id_max']);$i++) {
										  if (($a[$i]+1)==($a[$i+1])){
												if(($z%2==0)){
												?>
												<option value="<?php echo $a[$i]; ?>">&#9724;<?php echo $fin[$i].' hs';?></option>
												<?php
												}
												$z++;
										  } else {
											  break;		
										  }
								  }
						} 		
						 
			echo 	"
					</select>
                  </div>
                </div>
              </div>";
			
?> 