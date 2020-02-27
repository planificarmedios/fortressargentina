<?php
require_once ("callAPI.php");
$r = '2019-11-12';

sleep(1);
	
		echo "<div class='form-group' class='col-lg-12'>
                <div class='form-group'>
				  <div class='col-sm-10'>
                    <select class='form-control' id='idFin' name='idFin'> 
					<option value=''>Seleccionar Horario" 
					?>
                    <?php ;    
					"</option>" 
					?>	
						<?php 
						 //foreach ($response as $d) { ?>
                          <option value="1">01<?php //echo $d['id'].'hs';?></option>
                          <option value="2">02<?php //echo $d['id'].'hs';?></option>
                        <?php
                        //}
			echo 	"
					</select>
				  </div>
                </div>
              </div>";
			
?> 
