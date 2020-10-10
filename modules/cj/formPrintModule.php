<?php

if ($_GET['formPrintModule']=='listarDisponibles') { 
?>
  <section class="content-header" style="color:#000">
  <h1>
  <i class="fa fa-list icon-title" style="color:#000"></i> Listar Cajas Disponibles 

  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=cj"> Cajas </a></li>
    <li class="active"> Listar Disponibles </li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" action="?module=formEdit_cj&formEdit=listarDisponibles" class="form-horizontal"  method="POST">
            <div class="box-body">

       
         <fieldset> 
             <div class="form-group">
               	<div> 
                 <div class="col-sm-4 col-md-4">
						            
                            <select  required="required" class="chosen-select" name="tamano" id="tamano">					                
                                              <option selected value="">------------------ Ingresar una opción del Menú ------------------ </option>
                                              <?php 
                                              include_once ("callAPI.php");
                                              require_once ("parametros.php");
                                              $get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
                                              $response = json_decode($get_data, true);
                                              foreach ($response as $d) {
                                                  $id = $d['id'];
                                                  $nombre = $d['nombre'];
                                                  $descripcion = $d['descripcion'];
                                                  echo "    <option value=\"$id\"> $nombre: $descripcion </option>";
                                              }
                                              ?>
                          </select>
                       </div>
              	</div>
              </div>
		</fieldset>
        
        
         <div class="box-footer">
             
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class="btn btn-primary" name="imprimir" value="Listar" >
                  <a href='?module=cj' class="btn btn-danger">Volver</a>
                </div>
              </div>

            </div>
           </div>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  </form>  

  <?php

} elseif ($_GET['formPrintModule']=='listarOcupadas') { 

?>
  <section class="content-header" style="color:#000">
  <h1>
  <i class="fa fa-list icon-title" style="color:#000"></i> Listar Cajas Ocupadas 

  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=cj"> Cajas </a></li>
    <li class="active"> Listar Ocupadas </li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" action="?module=formEdit_cj&formEdit=listarOcupadas" class="form-horizontal"  method="POST">
            <div class="box-body">

       
         <fieldset> 
             <div class="form-group">
               	<div> 
                 <div class="col-sm-4 col-md-4">
						            
                            <select  required="required" class="chosen-select" name="tamano" id="tamano">					                
                                              <option selected value="">------------------ Ingresar una opción del Menú ------------------ </option>
                                              <?php 
                                              include_once ("callAPI.php");
                                              require_once ("parametros.php");
                                              $get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
                                              $response = json_decode($get_data, true);
                                              foreach ($response as $d) {
                                                  $id = $d['id'];
                                                  $nombre = $d['nombre'];
                                                  $descripcion = $d['descripcion'];
                                                  echo "    <option value=\"$id\"> $nombre: $descripcion </option>";
                                              }
                                              ?>
                          </select>
                       </div>
              	</div>
              </div>
		</fieldset>
        
        
         <div class="box-footer">
             
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class="btn btn-primary" name="imprimir" value="Listar" >
                  <a href='?module=cj' class="btn btn-danger">Volver</a>
                </div>
              </div>

            </div>
           </div>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  </form>  


<?php






} else if ($_GET['formPrintModule']=='auditoria') { 
  if (isset($_GET['id']) and isset($_GET['nro_caja']) and isset($_GET['serie'])) {
    require_once("fechaNumber.php");  
    $idcaja = $_GET['id']; //id_caja
    $serie= $_GET['serie']; 
    $nro_caja= $_GET['nro_caja']; 

    ?>
      <section class="content-header" style="color:#000">
        <h1>
        <i class="fa fa-list icon-title" style="color:#000"></i> # <?php echo $nro_caja; ?> 
       <i class="fa fa-lock icon-title"></i> Caja Serie <?php echo $serie; ?>
    
        </h1>
        <ol class="breadcrumb">
          <li><a href="?module=cj"> Cajas </a></li>
          <li class="active"> Auditoria </li>
        </ol>
      </section>

 <section class="content">
  <div class="row">
    <div class="col-md-12">
      
      <div class="box box-warning" style="color:#003">
        <div class="box-body">

        <form role="form" class="form-horizontal" method="GET" action="modules/cj/exportData.php" target="_blank">
          <div class="box-body">
              <input name="nro_caja" value="<?php echo $nro_caja; ?>" hidden/>
                  <div class="box-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-11">
                        <button type="submit" class="btn btn-success btn-social btn-submit" style="width: 210px;">
                          <i class="fa fa-file-excel-o"></i> Generar reporte de Caja
                        </button>

                        
                      </div>
                  </div>
           </div>
        </form>
  

    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
             <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <td class="center">#</td>
                <td class="center">#clte</td>
                <td class="center">#serv</td>
                <td class="center">#Rsoc</td>
                <td class="center">#tarj</td>
                <td class="center">inicio</td>
                <td class="center">final</td> 
                <td class="center">gold</td>  
                <td class="center">serie</td>
                <td class="center">uso</td>
                <td class="center">bvda</td>
                <td class="center">usuario</td>
                <td class="center">modif</td>
                <td class="center">periodo</td>
                <td class="center">precio</td>
                <td class="center">%com</td>
                <td class="center">%gold</td>
                <td class="center">%mens</td>
                <td class="center">%trim</td>
                <td class="center">%sem</td>
                <td class="center">%nf</td>
             </tr>
            </thead>
            <tbody>
        
        <?php
      include_once ("callAPI.php");
      require_once ("parametros.php");
      include_once ("fechaNumber.php");

      $get_data = callAPI('GET', $servidor.'/api/cajas/auditoriaCaja/'.$nro_caja,false);
      $response = json_decode($get_data, true);
        
        foreach ($response as $d) {
                $id = $d['id'];
                $id_cliente = $d['id_cliente'];
                      $id_servicio = $d['id_servicio'];
                      $id_rsocial = $d['id_rsocial'];
                      $id_tarjeta = $d['id_tarjeta'];
                      $f_inicio = fechaNumber($d['f_inicio']);
                      $f_final = fechaNumber($d['f_final']);
                      $cobertura_gold = $d['cobertura_gold'];
                      $serie = $d['serie'];
                      $hora = $d['hora'];
                      $hora_for = substr($hora,11, 5);
                      $tipo_uso = $d['tipo_uso'];
                      $ingreso_boveda = $d['ingreso_boveda'];
                      $nombre_usuario = $d['nombre_usuario'];
                      $ultima_modificacion = fechaNumber($d['ultima_modificacion']);
                      $ultima_modificacion = $ultima_modificacion.' '.$hora_for;
                      $periodo_contratacion = $d['periodo_contratacion'];
                      $precio = $d['precio'];
                      $coef_comercial = $d['coef_comercial'];
                      $coef_gold = $d['coef_gold'];
                      $coef_contr_mensual = $d['coef_contr_mensual'];
                      $coef_contr_trim = $d['coef_contr_trim'];
                      $coef_contr_semestral = $d['coef_contr_semestral'];
                      $coef_notificacion = $d['coef_notificacion'];
             
					
              echo "<tr>
              
                      <td width='3%'   class='center'>$id</td> 
                      <td width='3%'   class='center'>$id_cliente</td>
                      <td width='3%'   class='center'>$id_servicio</td>
                      <td width='3%'   class='center'>$id_rsocial</td>
                      <td width='3%'   class='center'>$id_tarjeta</td>
                      <td width='3%'   class='center'>$f_inicio</td>
                      <td width='3%'   class='center'>$f_final</td> 
                      <td width='3%'   class='center'>$cobertura_gold</td>  
                      <td width='3%'   class='center'>$serie</td>
                      <td width='3%'   class='center'>$tipo_uso</td>
                      <td width='3%'   class='center'>$ingreso_boveda</td>
                      <td width='8%'   class='center'>$nombre_usuario</td>
                      <td width='8%'   class='center'>$ultima_modificacion</td>
                     
                      <td width='3%'   class='center'>$periodo_contratacion</td>
                      <td width='3%'   class='center'>$$precio</td>
                      <td width='3%'   class='center'>%$coef_comercial</td>
                      <td width='3%'   class='center'>%$coef_gold</td>
                      <td width='3%'   class='center'>%$coef_contr_mensual</td>
                      <td width='3%'   class='center'>%$coef_contr_trim</td>
                      <td width='3%'   class='center'>%$coef_contr_semestral</td>
                      <td width='3%'   class='center'>%$coef_notificacion</td>

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
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!--
    <?php
  }
}  elseif ($_GET['formPrintModule']=='print') { 
  	if (isset($_GET['id']) and isset($_GET['nrocaja'])) {
  	  require_once("fechaNumber.php");  
	    $idcaja = $_GET['id']; //id_caja
      $nrocaja = $_GET['nrocaja']; //nrocaja
      
      if (isset($_GET['asistente'])) {
        $id_asistente = $_GET['asistente'];
        $selected = 'selected';
      } else {
        $id_asistente = 0;
        $noselected = 'selected';
      }

      if (isset($_GET['id_evento'])) {
        $id_evento = $_GET['id_evento'];
      } else {
        $id_evento = 0;
      }

      
					include_once ("callAPI.php");
					include_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/cajas/'.$idcaja,false);
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
						}
						
						?>
  		


  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> # <?php echo $nro_caja; ?> 
      <i class="fa fa-lock icon-title"></i> Caja Serie <?php echo $serie; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=cj"> Cajas </a></li>
      <li class="active"> Imprimir </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" id="datos_recibo" class="form-horizontal" action="modules/cj/formPrint.php"  method="POST">
            <div class="box-body">
    
         <fieldset> 
             <div class="form-group">
             <div class="row"> 
               	      <div class="col-sm-8 col-md-4" align="center">
						            <label class="control-label">Ctrl + Click Selección Múltiple</label></br>
                            <select id="impresiones[]" size="15" name="impresiones[]"  multiple="multiple" required="required">					                
                                              <option <?php if (!(isset($_GET['asistente']))){ echo $noselected;}?> value="">-- Ingresar una opción del Menú --</option>
                                              <option value="c000">Legajo Completo Titular del Servicio</option>
                                              <option <?php if (isset($_GET['asistente'])){ echo $selected;}?> value="f007">Registro de Acceso a Caja</option>
                                              <option value="c001">Contrato de Locación de Caja de Seguridad</option>
                                              <option value="r001">Reglamento de Uso</option>
                                              <option value="f001">(Anexo I) Datos Personales del Titular del Servicio</option>
                                              <option value="f003">(Anexo III) Tarifario de Cajas y Servicios Ofrecidos</option>
                                              <option value="f006">(Anexo IV) Solicitud de Apertura Forzada</option>
                                              <option value="f005">(Anexo V) Uso y Reserva de Sala de Reuniones</option>
                                              <option value="r002">(Anexo VI)  Medidas de Seguridad y Detección de Metales</option>
                                              <option value="d001">(Anexo VII) Persona Políticamente Expuesta</option>
                                              <option value="f008">(Anexo VIII) Baja del Servicio</option>
                                              <option value="f004">(Anexo IX) Pago de Servicio </option>
                                              <option value="d002">(Anexo X) Asignación de Nuevas Llaves </option>
                                              <option value="f005"> Horarios y Días Laborables </option>
                                
                           </select>
                       </div>

                       <div class="col-sm-12 col-md-6">
                    <label class="control-label">Titular de Caja</label>
                      <select class="chosen-select" disabled="disabled">
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
									$alias = $g['alias'];
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
                        <select class="chosen-select" disabled="disabled">
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
                   
                   <div class="col-sm-12 col-md-6">
                    <label class="control-label">Titularidad del Contrato</label>
                         <select id="id_rsocial" name="id_rsocial" class="chosen-select" required="required" >	
                      
                        <option selected value="0">-- Mantener Titular de la Caja para impresión de Contrato --</option>
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
	                                     echo "    <option  value=\"$id4\"> $tp : $numero_doc | $razon_social | $tipo_iva </option>";
                                        
                            }
                        
                        ?>
                      </select>
                   </div>  
                   
                  

              	</div>
              </div>
		</fieldset>
        
        <input name="idcaja" id="idcaja" value="<?php echo $idcaja;?>" hidden>
        <input name="nrocaja" id="nrocaja" value="<?php echo $nrocaja;?>" hidden>
        <input name="id_servicio" id="id_servicio" value="<?php echo $id_servicio;?>" hidden>     
        <input name="id_cliente" id="id_cliente" value="<?php echo $id_cliente;?>" hidden>  
	      <input name="alias" id="alias" value= "<?php echo $alias?>" hidden>
        <input type="text" name="imprimirAsociado" id="imprimirAsociado" hidden>
        <input name="id_asistente" id="id_asistente" value="<?php echo $id_asistente;?>" hidden>     
        <input name="id_evento" id="id_evento" value="<?php echo $id_evento;?>" hidden> 
            </div><!-- /.btn btn-outline--->

            <div class="box-footer">
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class="btn btn-primary" name="imprimir" value="Vista Previa" >
                  <a href='?module=cj' class="btn btn-danger">Volver</a>
                </div>
              </div>
            </div>
           

        
          
                <div class="box box-warning" style="color:#003">
                    <div class="box-body">
                        <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
                         <thead>
                          <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                            <td class="center"># </td>
                            
                            <td class="center"># Asociado</td>
                            <td class="center"># Nombre Asociado</td>
                            <td class="center">Doc</td>
                            <td class="center">Email</td>
                            <td class="center">Estado</td>
                            <td class="center">Módulos de Impresión</td>
                          </tr>
                        </thead>
                        <tbody>
                        
          <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
          $get_data = callAPI('GET', $servidor.'/api/cajas/asociados/'.$nro_caja ,false);
      $response = json_decode($get_data, true);
      
        $formp = 'f001asoc';
				
				foreach ($response as $d) {
					      $id_asociado = $d['id'];
                $id_caja = $d['id_caja'];
                $dni = $d['dni'];
                $aliasAsoc = $d['alias'];
                $email = $d['email'];
						    $nombre = $d['nombre']; 
     					  $apellido = ' '.$d['apellido']; 
						    $titular = $d['titular'];
						  if ($d['status']==0) {$m = 'Inactivo';} else {$m = 'Activo';};
			
              echo "<tr>
			  		  <td width='5%'   class='center'>$id_caja</td> 
              <td width='10%'   class='center'>$id_asociado</td>
              <td width='20%' class='center'>$nombre$apellido</td>
              <td width='20%' class='center'>$dni</td>
              <td width='20%' class='center'>$email</td>
              <td width='10%' class='center'>$m</td>
              <td width='15%' class='center'>
              
              
                 
    <a data-toggle='tooltip' data-placement='top' title='Módulo de Impresiones' style='margin-right:5px' class='btn btn-primary btn-sm' 
    href='?module=formPrintModule_cj&formPrintModule=printAsociado&id_caja=$idcaja&id_servicio=$id_servicio&id_asociado=$id_asociado&nrocaja=$nrocaja&idtitular=$id_cliente&serie=$serie'>
    <i class='glyphicon glyphicon-print'></i></a>
						 
						 
                          ";
						  
			 ?>
                            
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
  </form>  
	<?php
  }
 }
} else if ($_GET['formPrintModule']=='printAsociado') { 
    if (
        isset($_GET['id_asociado']) and 
        isset($_GET['id_servicio']) and
        isset($_GET['nrocaja']) and 
        isset($_GET['id_caja']) and 
        isset($_GET['serie']) and 
        isset($_GET['idtitular'])  
     
        ) 
    {

    
    require_once("fechaNumber.php");  
    $idasociado = $_GET['id_asociado']; //id_asociado
    $idcaja = $_GET['id_caja']; //
	  $nrocaja = $_GET['nrocaja']; //nrocaja
    $idtitular = $_GET['idtitular']; 
    $idservicio = $_GET['id_servicio']; 
    $serie = $_GET['serie'];
    ?>

<section class="content-header" style="color:#000">
    <h1>
      
      
      <i class="fa fa-user icon-title" style="color:#000"></i> Módulo de Impresión de Asociados
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=cj"> Cajas </a></li>
      <li class="active"> Impresión de Asociados </li>
    </ol>
  </section>    

<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" id="datos_recibo" class="form-horizontal" action="modules/cj/formPrintAsociado.php"  method="POST">
            <div class="box-body">

            <fieldset> 
               <div class="form-group" hidden=hidden>
               	<div class="row"> 
          
				  <div class="col-sm-12 col-md-4">
                    <label class="control-label">Titularidad del Contrato</label>
                         <select id="id_rsocial" name="id_rsocial" class="chosen-select" required="required" >	
                      
					  <option selected value="0">-- Mantener Titular de la Caja para impresión de Contrato --</option>
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
                                                echo "    <option  value=\"$id4\"> $tp : $numero_doc | $razon_social | $tipo_iva </option>";
                                        
                            }
                        
                        ?>
                      </select>
                   </div>
					
					
					
              	</div>
              </div>
		</fieldset>

 
        
         <fieldset> 
             <div class="form-group">
               	<div> 
               	      <div class="col-sm-12 col-md-8">
						            <label class="control-label">Ctrl + Click Selección Múltiple</label></br>
                            <select id="impresiones[]" size="7" name="impresiones[]"  multiple="multiple" required="required">					                
                                              <option selected value="">-- Ingresar una opción del Menú --</option>
                                              <option value="c000">Legajo Completo Asociado </option>
                                              <option value="r001">Reglamento de Uso</option>
                                              <option value="r002">Reglamento sobre Medidas de Seguridad y Detección de Metales</option>
                                              <option value="f001asoc">Ficha de designación de Autorizado</option>
                                              <option value="f005">Informe de Horarios y Días Laborables</option>
                                              <option value="d001">DD.JJ Persona Políticamente Expuesta</option>
                                             
                                
                           </select>
                       </div>
              	</div>
              </div>
		</fieldset>
        
        
        <input name="nrocaja"     id="nrocaja" value="<?php echo $nrocaja;?>" hidden>
        <input name="idservicio"  id="idservicio" value="<?php echo $idservicio;?>" hidden>     
        <input name="idtitular"   id="idtitular" value="<?php echo $idtitular;?>" hidden>  
	      <input name="idasociado"  id="idasociado" value= "<?php echo $idasociado?>" hidden>
        <input name="idcaja"      id="idcaja" value="<?php echo $idcaja?>" hidden>
        <input name="serie"       id="serie" value="<?php echo $serie?>" hidden>
             
            <div class="box-footer">
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type='submit' class="btn btn-primary" name="imprimir" value="Imprimir" >
                  <a href='?module=cj' class="btn btn-danger">Volver</a>
                </div>
              </div>
            </div>

            </div>
           </div>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  </form>  
	<?php
    }
 } elseif ($_GET['formPrintModule']=='tarifario') { 
  
  ?>

<section class="content-header" style="color:#000">
  <h1>
    <i class="fa fa-user icon-title" style="color:#000"></i> Imprimnir Tarifario
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=cj"> Tarifario </a></li>
    <li class="active"> Imprimir Tarifario </li>
  </ol>
</section>    



<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" id="datos_recibo" class="form-horizontal" action="modules/cj/formPrint.php"  method="POST">
            <div class="box-body">
                <div class="form-group">
                      <div class="row"> 
                          <div class="col-sm-8 col-md-4" align="center">
                            <label class="control-label">Módulo de Impresión</label></br>
                                <select id="impresiones[]" size="3" name="impresiones[]"  multiple="multiple" required="required">					                
                                                  <option selected value="">-- Ingresar una opción del Menú --</option>
                                                  <option value="f003">(Anexo III) Tarifario de Cajas y Servicios Ofrecidos</option>
                                    
                              </select>
                          </div>
                        </div>
                  </div>

                  <div class="box-footer">
                    <div class="form-group"> 
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type='submit' class="btn btn-primary" name="copiar" value="Imprimir" >
                        <a href='?module=form_prices&form=listar' class="btn btn-danger">Volver</a>
                      </div>
                    </div>
                  </div>
           </div>
          </form>
      </div>                 
    </div>
    </div>
</section>

<?php
}   
?>