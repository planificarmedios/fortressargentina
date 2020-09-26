<?php
if ($_GET['form']=='list') { 
if (($_GET['nrocaja']) and ($_GET['id'])and ($_GET['serie'])) {
		$nrocaja = $_GET['nrocaja'];
		$id = $_GET['id'];
		$serie= $_GET['serie'];
?>

<section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Listado de Ingresos
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=cj"> Cajas </a></li>
      <li class="active">Listado </li>
    </ol>
</section>


<section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          
          <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                
                <th class="center"># Id</th>
                <th class="center">Fecha</th>
                <th class="center">Hora</th>
                <th class="center">Registro # Cliente</th>
                <th class="center">Verificado</th>
                <th class="center">Caja</th>
                
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
          include_once ("fechaNumber.php");
	      $get_data = callAPI('GET', $servidor.'/api/movimientos/cajas/'.$nrocaja,false);
		  $response = json_decode($get_data, true);
		  
			 foreach ($response as $d) {
				        $id = $d['ID'];
						
    						$SRVDT = fechaNumber($d['SRVDT']);
                $hh = substr($d['SRVDT'], 11,8);
                $CLIENTE = $d['CLIENTE'];
                $USRID = $d['USRID'];
				    		$VERIFICADO = $d['VERIFICADO'];
                if ($VERIFICADO == '1' ) { 
                      $m = 'Verificado';
                      
                } else { 
                      $m = 'No Verificado';
                      
                };
     				    
        			  echo "<tr>
                    <td width='5'   class='center'>$id</td>
                    <td width='10' class='center'>$SRVDT</td>
                          <td width='10' class='center'>$hh</td>
                          <td width='80' class='center'>$USRID</td>
                    <td width='5'  class='center'>$m</td>
                    <td width='10' class='center'>$serie</td>
                    <div>
            ";
            echo "    </div>
                      </td>
                    </tr>";
            }
		    ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
              
             
            
       </div>
     </div>
   </div>
</section>


<?php
}
} elseif ($_GET['form']=='asoc') { 
	if (($_GET['nro_caja']) and ($_GET['id_caja']) and ($_GET['serie']) ) {
		//$nro_caja = $_GET['i']; //$id_caja = $_GET['id_caja'];
		$nro_caja = $_GET['nro_caja'];
		$id_caja = $_GET['id_caja'];
		$serie = $_GET['serie'];
?>


  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Asociado # <?php echo $nro_caja; ?> 
      <i class="fa fa-lock icon-title"></i> Caja Serie <?php echo $serie; ?>
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=cj"> Cajas </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>
  
  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST"  action="modules/cj/proses.php?act=asociado" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nro. Caja</label>
                <div class="col-sm-5">
                   <input type="number" value="<?php echo $nro_caja;?>" class="form-control" id="nro_caja" name="nro_caja" readonly>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Serie</label>
                <div class="col-sm-5">
                   <input type="text" value='<?php echo $serie;?>' class="form-control" id="serie" name="serie" readonly >
                </div>
              </div>
              
               <input type="number" value="<?php echo $id_caja;?>" id="id_caja" name="id_caja" hidden>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Asociar Cliente</label>
                <div class="col-sm-5">
                   <select  id="id_asociado" name="id_asociado" class="chosen-select" required>
                   <option value="">-- Seleccionar --</option>
                    <?php 
					session_start(); 
					include_once ("callAPI.php");
                    require_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/cajas/noasociados/'.$id_caja,false);
					$response = json_decode($get_data, true);
					
						foreach ($response as $g) {
							  $id2 = $g['TablaCliente'];
							  $dni2 = $g['dni'];
							  $nombre = $g['nombre'];	
							  $apellido = $g['apellido'];
							  $cli= $nombre.' '.$apellido;
							  $cliente = $nombre.' '.$apelllido;
							  $tipo_documento = $g['tipo_documento'];
							  if ($tipo_documento == 1){
								  $tp='DNI';
							  }elseif($tipo_documento == 2){
								  $tp='CUIL';
							  }elseif($tipo_documento == 3){
								  $tp='CUIT';
							  }
							  $ident = $tp.': '.$dni2;
							  $estado = $g['estado'];
							  
							  if ($estado == 0){
								  $es='Cliente inactivo';
								  $c='#ffdfd4';
								  $d='disable';
							  }elseif($estado == 1){
								  $es='Cliente activo';
								  $c='#e0f5dc'; 
							  }
							  
							  if ($estado == 1) {
									echo "    <option style='background-color:$c' value=\"$id2\"> Cliente: $id2  | $cli | $ident | $es </option>";
								  } else {
									echo "    <option disabled='disabled' style='background-color:$c' value=\"$id2\"> Cliente: $id2  | $cli | $ident | $es </option>";
						  	  }
						}
					
					?>
                  </select>
                </div>
              </div>
              
             
             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a  href="?module=cj" class="btn btn-danger btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->

  
 
   <?php
   }
 }  elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id']) and isset($_GET['nrocaja'])) {
  	  require_once("fechaNumber.php");  
	  $i = $_GET['id']; //id_caja
	  $nrocaja = $_GET['nrocaja']; //nrocaja
      
					include_once ("callAPI.php");
					include_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/cajas/'.$i,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
						$id = $d['id'];
						$id_cliente = $d['id_cliente'];
						$id_servicio = $d['id_servicio'];
						$serie = $d['serie'];
						$nro_caja = $d['nro_caja'];
						$tipocaja = $d['tipocaja'];
						$descripcion = $d['descripcion'];
						$apellido = $d['apellido'];
						$nombre = $d['nombre'];
						$cliente = $nombre.' '.$apellido;
						$id_rsocial = $d['id_rsocial'];
						$id_tarjeta = $d['id_tarjeta'];
						$f_inicio = $d['f_inicio'];
						$f_final = $d['f_final'];
						$fi_original =  $d['f_inicio'];
						$ff_original =  $d['f_final']; 
						
						
						if (($f_inicio == null) or ($f_inicio < '1901-01-01') or ($f_inicio == '') ){ 
							$t = 'date';
						} else {
								$t = 'text';
								$fi = fechaNumber(substr($d['f_inicio'], 0,10));
								$ff = fechaNumber(substr($d['f_final'], 0,10));
						};
						
						$cg = $d['cobertura_gold'];
						if ($cg == true) { 
							$ch = 'Contratado'; 
							$value2 = 0;
							$echo2 = 'No Contratado';
						} else {
							$ch = 'No Contratado'; 
							$value2 = 1;
							$echo2 = 'Contratado';
						};
						
						$tipo_uso = $d['tipo_uso'];
						if ($tipo_uso == true) { 
							$ch3 = 'Comercial'; 
							$value3 = 0;
							$echo3 = 'Personal';
						} else {
							$ch3 = 'Personal'; 
							$value3 = 1;
							$echo3 = 'Comercial';
						};
					
					?>
  		

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> # <?php echo $nro_caja; ?> 
      <i class="fa fa-lock icon-title"></i> Caja Serie <?php echo $serie; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=cj"> Cajas </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" id="datos_recibo" class="form-horizontal" action="modules/cj/proses.php?act=updateCliente" method="POST">
            <div class="box-body">
            
            
                <fieldset> 
                   <div class="form-group">
                    <div class="row"> 
                    <label class="col-sm-1">Desde </label>
                         <div class="col-sm-12 col-md-2">
                            <input  value='<?php echo $fi;?>' type='<?php echo $t;?>' id="f_inicio" name="f_inicio" class="form-control" autocomplete="off">
                        </div>
                  
                             <label class="col-sm-1">Hasta</label>
                             <div class="col-sm-12 col-md-2">
                                <input  value='<?php echo $ff;?>' type='<?php echo $t;?>' id="f_final" name="f_final" class="form-control" autocomplete="off">
                             </div>
                            
                             <label class="col-sm-1">Gold</label>
                             <div class="col-sm-12 col-md-2">
                                   <select id="cobertura_gold" name="cobertura_gold" class="chosen-select" >
                                     <option selected value='<?php echo $cobertura_gold?>'>No</option>
                                     <option value='1'>Si</option>
                                    </select>  
                            </div>
                            
                            <label class="col-sm-1">Tipo Uso</label>
                             <div class="col-sm-12 col-md-2">
                                   <select id="tipo_uso" name="tipo_uso" class="chosen-select" >
                                     <option selected value='0'>No</option>
                                     <option value='1'>Si</option>
                                    </select>  
                            </div>
                          
                            
                    </div>
                  </div>
            </fieldset>
                
            
                                     
             <fieldset> 
               <div class="form-group">
               	<div class="row"> 
               	 <div class="col-sm-12 col-md-6">
                    <label class="control-label">Titular</label>
                      <select id="id_cliente" name="id_cliente" class="chosen-select">
                      <option value="0">-- Disponible --</option>
						<?php 
                        session_start(); 
                        include_once ("callAPI.php");
                        require_once ("parametros.php");
                        $get_data = callAPI('GET', $servidor.'/api/titulares/',false);
                        $response = json_decode($get_data, true);
                        
                            foreach ($response as $g) {
                                  $id2 = $g['id']; //id_cliente
                                  $dni2 = $g['dni'];
                                  $_SESSION['nombre'] = $g['nombre'];	
                                  $n2 = $g['nombre'];
                                  $_SESSION['apellido']= $g['apellido'];
                                  $a2 = $g['apellido'];
                                  $usrid = $g['USRID'];
                                  
                                   if ($g['id'] == 0) {
                                    echo "    <option selected='selected' value='0'> -- Disponible -- </option>";
                                  } else if ($d['id_cliente'] == $id2) {
                                    echo "    <option selected='selected' value=\"$id2\"># Cliente: $id2 Doc.: $dni2 | $n2 $a2 </option>";
                                  } else {
                                    echo "    <option value=\"$id2\"> # Cliente: $id2 Doc.: $dni2 | $n2 $a2  </option>";
                                  }
                            }
                        
                        ?>
                      </select>
                </div>
              
                  <div class="col-sm-12 col-md-6">
                    <label class="control-label">Tipo de Caja</label>
                        <select id="id_servicio" name="id_servicio"  class="chosen-select">
                            <option value="0">-- Seleccionar --</option>
                             <?php 
                                include_once ("/callAPI.php");
                                require_once ("parametros.php");
                                $get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
                                $response = json_decode($get_data, true);
                                foreach ($response as $t) {
                                      $id3 = $t['id'];
                                      $nombre = $t['nombre'];
                                      $descripcion2 = $t['descripcion'];
                                      $id_servicio2 = $t['$id_servicio'];
                                      
                                      if ($id_servicio == $t['id']) {
                                        echo "    <option selected='selected' value=\"$id3\"> $nombre: $descripcion2 </option>";
                                      } else {
                                        echo "    <option value=\"$id3\"> $nombre: $descripcion2 </option>";
                                      }
                                }
                                ?>
                       </select>
                   </div>
              	</div>
              </div>
		</fieldset>
             
            
          <fieldset> 
               <div class="form-group">
               	<div class="row">
               	 <div class="col-sm-12 col-md-6">
                    <label class="control-label">Razón Social</label>
                      <select id="id_rsocial" name="id_rsocial" class="chosen-select" required>
                      <option value="0">-- Seleccionar --</option>
						<?php 
                        session_start(); 
                        include_once ("callAPI.php");
                        require_once ("parametros.php");
                        $get_data = callAPI('GET', $servidor.'/api/fiscales/listar',false);
                        $response = json_decode($get_data, true);
                        
                            foreach ($response as $rs) {
                                    $id4 = $rs['id'];
									$razon_social = $rs['razon_social']; 
									$tipo_iva = ' '.$rs['tipo_iva']; 
									$tipo_doc = $rs['tipo_doc'];
									$numero_doc = $rs['numero_doc'];
									if($tipo_doc==1){$tp='DNI';}elseif($tipo_doc==2){$tp='CUIL';}elseif($tipo_doc==3){$tp='CUIT';}else{$tp=$tipo_doc;}
								
                                   if ($id_rsocial == $rs['id']) {
                                        echo "    <option selected='selected' value=\"$id4\"> $tp : $numero_doc | $razon_social | $tipo_iva </option>";
                                      } else {
                                        echo "    <option value=\"$id4\"> $tp : $numero_doc | $razon_social | $tipo_iva </option>";
                                      }
                            }
                        
                        ?>
                      </select>
                </div>
              
                  <div class="col-sm-12 col-md-6">
                    <label class="control-label">Tarjeta Asociada</label>
                        <select id="id_tarjeta" name="id_tarjeta" class="chosen-select"  required>
                            <option value="0">-- Seleccionar --</option>
                             <?php 
							session_start(); 
							include_once ("callAPI.php");
							require_once ("parametros.php");
							include_once ("fechaNumber.php");
							$get_data = callAPI('GET', $servidor.'/api/tarjetas/listar',false);
							$response = json_decode($get_data, true);
							
								foreach ($response as $tj) {
										  $id5 = $tj['id'];
											$marca = $tj['marca']; 
											$numero = $tj['numero'];
											$tipo = $tj['tipo'];
											$n = '**** **** '.(substr($numero, 8,10));
											$vencimiento = fechaNumber($tj['vencimiento']);
											$v = (substr($vencimiento, 3,7));
									
									   if ($id_tarjeta == $tj['id']) {
											echo "    <option selected='selected' value=\"$id5\"> $marca | Vencimiento: $v | N° Tarjeta: $n </option>";
										  } else {
											echo "    <option value=\"$id5\"> $marca | Vencimiento: $v | N° Tarjeta: $n </option>";
									  }
								}
							
							?>
                      </select>
                   </div>
                </div>
              </div>
             </fieldset>
             
            <input hidden="hidden" id="id_cliente_original" name="id_cliente_original"   value=<?php echo $id_cliente; ?>>  
            <input hidden="hidden" id="id_tarjeta_original" name="id_tarjeta_original"   value=<?php echo $id_tarjeta; ?>>
            <input hidden="hidden" id="id_rsocial_original" name="id_rsocial_original"   value=<?php echo $id_rsocial; ?>> 
            <input hidden="hidden" id="gold_original" 		name="gold_original"         value=<?php echo $cg; ?>> 
            <input hidden="hidden" id="uso_original" 		name="uso_original"          value=<?php echo $tipo_uso; ?>> 
            <input hidden="hidden" id="fi_original" 		name="fi_original"           value=<?php echo $fi_original; ?>> 
            <input hidden="hidden" id="ff_original" 		name="ff_original"           value=<?php echo $ff_original; ?>>
            <input hidden="hidden" id="serie" 		        name="serie"                 value=<?php echo $serie; ?>>   
            <input hidden="hidden" id="idcaja"              name="idcaja"                value= <?php echo $_GET['id']; ?>>
            <input hidden="hidden" id="nro_caja"            name="nro_caja"              value=<?php echo $nro_caja; ?>>
        
            </div><!-- /.btn btn-outline--->

            <div class="box-footer">
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class="btn btn-warning" name="Guardar" value="Guardar">
                  <a href='?module=cj' class="btn btn-danger">Cancelar</a>
                </div>
              </div>
            </div>
            </form>

     
          
          <h1>     
          <i class="fa fa-users icon-title" style="color:#FFF"></i> 
   <a class="btn btn-success btn-social pull-right" href='?module=form_cj&form=asoc&nro_caja=<?php echo $nro_caja;?>&id_caja=<?php echo $i;?>&serie=<?php echo $serie;?>' title="Agregar Asociado" data-toggle="tooltip">
      <i class="fa fa-users"></i> Agregar Asociado
    </a>
  </h1>

          
          
                <div class="box box-warning" style="color:#003">
                    <div class="box-body">
                        <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
                         <thead>
                          <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                            <th class="center"># </th>
                            
                            <th class="center"># Asociado</th>
                            <th class="center">Nombre Asociado</th>
							<th class="center">Documento</th>
                            <th class="center">Estado</th>
                            <th class="center">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        
          <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
          $get_data = callAPI('GET', $servidor.'/api/cajas/asociados/'.$nro_caja ,false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $d) {
					      $id_asociado = $d['id'];
						  $id_caja = $d['id_caja'];
						  $nombre = $d['nombre']; 
						  
						  $apellido = ' '.$d['apellido']; 
					      $dni = ' '.$d['dni']; 
						  $titular = $d['titular'];
						  if ($d['status']==0) {$m = 'Inactivo';} else {$m = 'Activo';};
			
              echo "<tr>
			  		  <td width='5'   class='center'>$id_caja</td> 
					  
					  <td width='5'   class='center'>$id_asociado</td>
					  <td width='5'   class='center'>$dni</td>
                      <td width='100' class='center'>$nombre$apellido</td>
					  <td width='10' class='center'>$m</td>
				      <td class='center' width='1'>
                        <div>
						 
                          <a></i></a>";
						  
			 ?>
                            <a data-toggle="tooltip" data-placement="top" title="Desasociar Cliente" style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/cj/proses.php?act=enableasociado&nro_caja=<?php echo $nro_caja;?>&id_asociado=<?php echo $id_asociado;?>&id_caja=<?php echo $i;?>"><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>
            <?php
                           
   
	          
              echo "    </div>
                      </td>
                    </tr>";
            }
		    ?>
            </tbody>
          </table>
                        
  
                    </div>
                </div>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  
 
	<?php
  }
 }
}
?>