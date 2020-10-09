<script type="text/javascript">

function validarFinalizacion (input){
	  document.getElementById('cambio').value = '1';
    //alert (document.getElementById('cambio').value);
}

</script>

<?php

if ($_GET['formEdit']=='edit') { 

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
            $tipo_uso = $d['tipo_uso'];
            $periodo_contratacion = $d['periodo_contratacion'];
						$cobertura_gold = $d['cobertura_gold'];
						$ingreso_boveda =  $d['ingreso_boveda'];
						
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

        <?php 
	 

    if (empty($_GET['alert'])) {echo ""; } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Almacenado correctamente!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> 
              Modificado correctamente!
              </h4>
             
            </div>";
    }
    ?>
          <!-- form start -->
          <form role="form" style="color:#003" id="datos_recibo" class="form-horizontal" action="modules/cj/proses.php?act=updateCaja" method="POST">
            <div class="box-body">
            
             <fieldset> 
               <div class="form-group">
               	<div class="row">

                 <?php
                if (($d['f_inicio'] == null) or ($d['f_inicio'] <= '1900-01-01') or ($d['f_inicio'] == '') ){ 
                   $fi = ''; $ff = '';
                } else {
                    $type = 'text'; 
                    $ff = fechaNumber(substr($d['f_final'], 0,10));
                    $fi = fechaNumber(substr($d['f_inicio'], 0,10));
                  };
                ?>

              <input hidden id="cambio" name="cambio" ></input>
                
                <div class="col-sm-12 col-md-2">
                   <label class="control-label">Desde <?php echo $fi ?> </label>
                   <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd"  value='<?php echo  $d['f_inicio'];?>' id="f_inicio" name="f_inicio" autocomplete="off">
             	 </div>

               <div class="col-sm-12 col-md-2" hidden >
                   <label class="control-label">Hasta <?php echo $ff ?></label>
                   <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" value='<?php echo $d['f_final'];?>' id="f_final" name="f_final"  autocomplete="off">
                </div>

                <div class="col-sm-12 col-md-2">
                   <label class="control-label">Contratacion</label>
                   		<select id="periodo_contratacion" name="periodo_contratacion" class="chosen-select" onchange="validarFinalizacion(this)" required>
						        	<?php
                        $t0 = 0; $t1 = 1;  $t2 = 2; $t3 = 3; $t4 = 4; $t5 = 5; 
                        if ($d['periodo_contratacion'] == 1) {
                          echo "    <option selected='selected' value=\"$t1\"> Anual </option>";
                          echo "    <option value=\"$t2\"> Semestral </option>"; 
                          echo "    <option value=\"$t3\"> Trimestral </option>"; 
                          echo "    <option value=\"$t4\"> Mensual  </option>"; 
                          echo "    <option value=\"$t5\"> Anual Pago adelantado </option>";

                        } else if ($d['periodo_contratacion'] == 2) {
                          echo "    <option value=\"$t1\"> Anual </option>";
                          echo "    <option selected='selected' value=\"$t2\"> Semestral </option>"; 
                          echo "    <option value=\"$t3\"> Trimestral </option>"; 
                          echo "    <option value=\"$t4\"> Mensual </option>"; 
                          echo "    <option value=\"$t5\"> Anual Pago adelantado </option>";
                        } else if  ($d['periodo_contratacion'] == 3) {
                          echo "    <option value=\"$t1\"> Anual </option>";
                          echo "    <option value=\"$t2\"> Semestral </option>"; 
                          echo "    <option selected='selected' value=\"$t3\"> Trimestral </option>"; 
                          echo "    <option value=\"$t4\"> Mensual </option>"; 
                          echo "    <option value=\"$t5\"> Anual Pago adelantado </option>";
                        } else if  ($d['periodo_contratacion'] == 4) {
                          echo "    <option value=\"$t1\"> Anual </option>";
                          echo "    <option value=\"$t2\"> Semestral </option>"; 
                          echo "    <option value=\"$t3\"> Trimestral </option>"; 
                          echo "    <option selected='selected' value=\"$t4\"> Mensual </option>"; 
                          echo "    <option value=\"$t5\"> Anual Pago adelantado </option>";
                        } else if  ($d['periodo_contratacion'] == 5) {
                          echo "    <option value=\"$t1\"> Anual </option>";
                          echo "    <option value=\"$t2\"> Semestral </option>"; 
                          echo "    <option value=\"$t3\"> Trimestral </option>"; 
                          echo "    <option value=\"$t4\"> Mensual </option>"; 
                          echo "    <option selected='selected' value=\"$t5\"> Anual Pago adelantado </option>";  

                        } else {
                          echo "    <option value=\"$t0\"> ---- Ingresar Opción ---- </option>";
                          echo "    <option value=\"$t1\"> Anual </option>";
                          echo "    <option value=\"$t2\"> Semestral </option>"; 
                          echo "    <option value=\"$t3\"> Trimestral </option>"; 
                          echo "    <option  value=\"$t4\"> Mensual </option>"; 
                          echo "    <option  value=\"$t5\"> Anual pago adelantado </option>";
                        }
                        ?> 
                        </select> 
                 </div>

                 <div class="col-sm-12 col-md-2">
                   <label class="control-label">Tipo Uso</label>
                   		<select id="tipo_uso" name="tipo_uso" class="chosen-select" >
						        	<?php
                        if ($d['tipo_uso'] == 0) {
                        $t1 = 0; $t2 = 1;  
                        echo "    <option selected='selected' value=\"$t1\"> Uso Personal </option>";
                        echo "    <option value=\"$t2\"> Uso Comercial </option>"; 
                        } else {
                        $t1 = 1; $t2 = 0;
                        echo "    <option selected='selected' value=\"$t1\"> Uso Comercial </option>";
                        echo "    <option value=\"$t2\"> Uso Personal </option>";
                        }
                        ?>
                        </select> 
                 </div>          



                
                <div class="col-sm-12 col-md-2">
                   <label class="control-label">Aviso de Ingreso</label>
                   <select id="ingreso_boveda" name="ingreso_boveda" class="chosen-select" >
							<?php
                                     if ($d['ingreso_boveda'] == 0) {
										$t1 = 0; $t2 = 1;  
										echo "    <option selected='selected' value=\"$t1\"> No Contratado </option>";
										echo "    <option value=\"$t2\"> Contratado </option>"; 
									  } else {
										 $t1 = 1; $t2 = 0;
										echo "    <option selected='selected' value=\"$t1\"> Contratado </option>";
										 echo "    <option value=\"$t2\"> No Contratado </option>";
									  }
							?>
                        </select> 
                
                </div>
                
                <div class="col-sm-12 col-md-2">
                <label class="control-label">Cobertura Gold</label>
                  		<select id="cobertura_gold" name="cobertura_gold" class="chosen-select" >
                                <?php
                                     if ($d['cobertura_gold'] == 0) {
										$t1 = 0; $t2 = 1;  
										echo "    <option selected='selected' value=\"$t1\"> No Contratado </option>";
										echo "    <option value=\"$t2\"> Contratado </option>"; 
									  } else {
										 $t1 = 1; $t2 = 0;
										echo "    <option selected='selected' value=\"$t1\"> Contratado </option>";
										 echo "    <option value=\"$t2\"> No Contratado </option>";
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
                    <label class="control-label">Titular</label>
                      <select id="id_cliente" name="id_cliente" class="chosen-select">
                      <option value="0">-- Restablecer campos --</option>
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
                        <select disabled class="chosen-select">
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
									        $banco = $tj['banco'];
											$tipo = $tj['tipo'];
											$n = '**** **** '.(substr($numero, 8,10));
											$vencimiento = fechaNumber($tj['vencimiento']);
											if ($tipo=='Cbu') { $vencimiento='';};
											$v = (substr($vencimiento, 3,7));	
									
									   if ($id_tarjeta == $tj['id']) {
											echo "    <option selected='selected' value=\"$id5\"> | Marca / Banco : $banco | $marca | Vencimiento: $v | N° : $n  | Cobro por : $tipo </option>";
										  } else {
											echo "    <option value=\"$id5\"> | Marca / Banco : $banco | $marca | Vencimiento: $v | N° : $n  | Cobro por : $tipo </option>";
									  }
								}
							
							?>
                      </select>
                   </div>
                </div>
              </div>
             </fieldset>
				
	  <input hidden="hidden" id="id_servicio" name="id_servicio"  						value=<?php echo $id_servicio; ?>> 			
    <input hidden="hidden" id="fi_original" 		name="fi_original"           		value=<?php echo $fi_original; ?>> 
    <input hidden="hidden" id="ff_original" 		name="ff_original"           		value=<?php echo $ff_original; ?>>
    <input hidden="hidden" id="serie" 		        name="serie"                 		value=<?php echo $serie; ?>>   
    <input hidden="hidden" id="idcaja"              name="idcaja"                		value=<?php echo $_GET['id']; ?>>
    <input hidden="hidden" id="nro_caja"            name="nro_caja"              		value=<?php echo $nro_caja; ?>>
    <input hidden="hidden"  id="id_cliente_original"        name="id_cliente_original"   		value=<?php echo $id_cliente; ?>>  
    <input hidden="hidden"  id="id_tarjeta_original"        name="id_tarjeta_original"   		value=<?php echo $id_tarjeta; ?>>
    <input hidden="hidden"  id="id_rsocial_original"        name="id_rsocial_original"   		value=<?php echo $id_rsocial; ?>> 
    <input hidden="hidden" id="gold_original" 		          name="gold_original"         	  value=<?php echo $cobertura_gold; ?>> 
    <input hidden="hidden" id="ingreso_boveda_original"     name="ingreso_boveda_original"  value=<?php echo $ingreso_boveda; ?>> 
    <input hidden="hidden"  id="uso_original" 	          	name="uso_original"          		value=<?php echo $tipo_uso; ?>>              
            
        
            </div><!-- /.btn btn-outline--->

            <div class="box-footer">
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">

                <?php 
                if ($id_cliente > 0)
                  {
                  echo " <a href='?module=formPrintModule_cj&formPrintModule=print&id=$i&nrocaja=$nro_caja' class='btn btn-primary'>Módulo de Impresiones</a>";
                  echo " <a href='?module=formPrintModule_cj&formPrintModule=auditoria&id=$i&serie=$serie&nro_caja=$nro_caja' class='btn btn-info'>Auditoría de Caja</a>";
                  }
                ?>

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
							  <th class="center">Email</th>
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
						  $email = ' '.$d['email']; 
						  $dni = ' '.$d['dni']; 	
						  $titular = $d['titular'];
						  if ($d['status']==0) {$m = 'Inactivo';} else {$m = 'Activo';};
			
              echo "<tr>
			  		  <td width='5%'   class='center'>$id_caja</td> 
					  <td width='5%'   class='center'>$id_asociado</td>
                      <td width='30%' class='center'>$nombre$apellido</td>
					  <td width='30%' class='center'>$email</td>
					  <td width='10%' class='center'>$dni</td>
					  <td width='5%' class='center'>$m</td>
				      <td class='center' width='5%'>
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
} if ($_GET['formEdit']=='listarDisponibles') { 
  if ($_POST['tamano']) {
    $tamano = $_POST['tamano'];
  }
?>
    <section class="content-header" style="color:#003">

    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Cajas</li>
      <li class="active"> Listar</li>
    </ol>

    <div class="row">
          <div class="col-md-11">
            
            <div class="col-md-2 pull-left">
              <a class="btn btn-success btn-social" href="?module=formAddCaja_cj&formAddCaja=add">
                <i class="fa fa-plus"></i> Agregar Caja
              </a>
            </div>

            <div class="col-md-2 pull-left">
              <a class="btn btn-info btn-social" href="modules/cj/exportTotales.php" target="_blank">
              <i class="fa fa-file-excel-o"></i> Informe Auditoría 
                </a>
            </div>

            <div class="col-md-2 pull-left">
              <a class="btn btn-danger btn-social" href="?module=formPrintModule_cj&formPrintModule=listar">
                <i class="fa fa-undo"></i> Volver
              </a>
            </div>

          </div>  
        </div>
      </section>

      <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-warning" style="color:#003">
          <div class="box-body">
            <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
              <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center"># Caja</th>
                
                <th class="center">Tipo de Caja</th>
                <th class="center">Dimensiones</th>
                <th class="center">Estado</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
		  include_once ("fechaNumber.php");
	      $get_data = callAPI('GET', $servidor.'/api/cajas/disponibleTamano/'.$tamano,false);
		  $response = json_decode($get_data, true);
		  
		
			 foreach ($response as $d) {
				      $id = $d['id'];
						  $serie = $d['serie'];
              $tipocaja = $d['tipocaja'];
              $servicio = $d['id_servicio'];
						  $id_cliente = $d['id_cliente'];
              $descripcion= $d['descripcion'];
              $nrocaja= $d['nro_caja'];
              if ($id_cliente == 0) 
              {
                $m = 'Disponible'; $color = "#00993"; 
                $f_inicio = '';
                $f_final  = '';
              } else {
                $m = $id_cliente;
              };
              
						  
					  echo "<tr>
					  
                  <td width='5%'  class='center'>$serie</td>
                 
					        <td width='10%' class='center'>$tipocaja</td>
                  <td width='15%' class='center'>$descripcion</td>
					        <td width='7%'  class='center'>$m</td>
					        <td width='10%' class='center'>
                      <div>
					  
					  	 
              <a data-toggle='tooltip' data-placement='top' title='Acciones' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=formEdit_cj&formEdit=edit&id=$id&nrocaja=$nrocaja'><i style='color:#fff' class='glyphicon glyphicon-edit'></i></a>
						  
						  
						  <a data-toggle='tooltip' data-placement='top' title='Listar Registros' style='margin-right:5px' class='btn btn-warning btn-sm' href='?module=form_cj&form=list&id=$id&nrocaja=$nrocaja&serie=$serie'><i style='color:#fff' class='glyphicon glyphicon-search'></i>
                          </a>";
				 
			if ($id_cliente <> 0) {
			?> 
            <a href='?module=formPrintModule_cj&formPrintModule=print&id=<?php echo $id;?>&nrocaja=<?php echo $nrocaja;?>' data-toggle='tooltip' data-placement='top' title='Módulo Impresiones' style='margin-right:5px' class='btn btn-primary btn-sm' ><i style='color:#fff' class='glyphicon glyphicon-print'></i></a>
            <?php } else { ?>
			<a data-toggle="tooltip" data-placement="top"  class="btn btn-default btn-sm" href="" onclick=""><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>			 
			<?php 
			}
				 
						  
            if ($id_cliente == 0) {
			?> 
            <a href="modules/cj/prosesDelete.php?act=delete&id=<?php echo $id;?>&nrocaja=<?php echo $nrocaja;?>&serie=<?php echo $serie;?>" data-toggle="tooltip" data-placement="top" title="Eliminar Caja" class="btn btn-danger btn-sm" onclick="return confirm('Se eliminará la caja nro. <?php echo $serie; ?> ?');"><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>
            <?php } else { ?>
			<a data-toggle="tooltip" data-placement="top" title="No se puede eliminar" class="btn btn-default btn-sm" href="" onclick=""><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>			 
			<?php 
			}
			?>  
				
				
            <?php

              echo "    </div>
                      </td>
                    </tr>";
            }
		    ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content



<?php
}
?> 