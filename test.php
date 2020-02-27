<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">

		function getSelectValues(select) {
		  var result = [];
		  var options = select && select.options;
		  var opt;
		
		  for (var i=0, iLen=options.length; i<iLen; i++) {
			opt = options[i];
		
			if (opt.selected) {
			  result.push(opt.value || opt.text);
			} 
		  }
		
		  document.getElementById('adicionales').value = result; 
		}
		
		function verificar() {
		  var result = document.getElementById('adicionales').value;
		  alert ('Validando los datos adicionales' + result);
		}
		
</script>

				                <div class="form-group">
                <label class="col-sm-2 control-label">Adicionales</label>
                <div class="col-sm-10">
                  <select multiple class="form-control" name = "idSelect2" id="idSelect2" 
     onblur="var el = document.getElementsByTagName('select')[0]; getSelectValues(el);" >
                    <option value="">Seleccionar </option>
                    <?php 
					session_start(); 
					require_once ("callAPI.php");
					require_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/servicios/adicionales/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					      $id = $d['id'][0];
						  $precio = $d['precio'];
						  $nombre = $d['nombre'][0];
						 ?> 
                         <option value= "<?php echo $id ?>"> <?php echo $nombre;?> </option>
					<?php	  
					}
					?>
                  </select>
                 </div>
               </div> 

				<div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple class="form-control" name = "idSelect3" id="idSelect3" >
                      <option value="">Seleccionar </option>
                      <option value="1"></option>Opcion 1
                      <option value="2"></option>Opcion 2
                      <option value="3">Opcion 3 </option>
                      <option value="4">Opcion  </option>
                
                    </select>
                  </div>
          

      
                                 
           	 <script type="text/javascript">
				 // Material Select Initialization
					$(document).ready(function() {
					$('.mdb-select').materialSelect();
					});
			 </script>
             <input type="text" name="idFinSeleccionado" id="idFinSeleccionado" hidden="true"></input>	    	 
             <input type="text" name="fechaSeleccionada" id="fechaSeleccionada" hidden="true"></input>
             <input type="text" name="adicionales"       id="adicionales" </input>	
             
     <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="deshabilitar()">Cancelar</button>
				<button type="submit"  class="btn btn-warning" onClick="verificar()"> Continuar </button>
			  </div>
			</form>