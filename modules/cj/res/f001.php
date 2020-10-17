<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }

.text-center{
	text-align:center
}
.text-right{
	text-align:right
}
table th, td{
	font-size:13px
}
.detalle td{
	padding:7px;
}

.border-bottom{
	border-bottom: solic 1px #bdc3c7;
}


h1 {
	page-break-before: always;
}


-->
</style>


   
     <header class="row">
    <h1 align="center" contenteditable>
    <img align="left"  style="width:30%" src="sales_invoice/assets/img/logo.png"></br></br>
    				FICHA DEL TITULAR - (ANEXO I)</br>
    </h1>
 
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  
  		<div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >A. DATOS DEL TITULAR</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                        	<br>
                          <p><strong> Nombre / Razón Social: </strong> <?php echo $nombre.' '.$apellido; ?><?php echo $doc. ' '; ?> <strong> Nro. Doc: </strong> <?php echo $nro_doc. ' '; ?> <br>
                          <strong> Estado Civil: </strong><?php echo $estado_civil ?> <br>
                            <strong> Domicilio: </strong> <?php echo $dom. '' ?> ( <?php echo $cp3. '' ?>). <?php echo $l ?><br>
                            
                            <strong> Email: </strong><?php echo $email. ' '; ?> <strong> Fecha Nac.:  </strong>  <?php if (!isset($fn)){ echo 'No Indica';} else { echo fechaNumber($fn);}?> <br> 
                            <strong>Tel. Fijo: </strong> <?php echo $telf. ' '; ?>   <strong> Tel. Móvil: </strong><?php echo $telm. ' '; ?> 
                            <strong> Id: </strong><?php if (!isset($USRID)){ echo ''; } else { echo ($USRID); } ?> <strong> Alias: </strong> <?php if (!isset($alias)){ echo 'No Indica'; } else { echo ($alias); } ?> <br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div>
		</div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        
        <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >B. DATOS DEL SERVICIO CONTRATADO</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            
                            <strong> Caja: </strong> <?php echo $serie; ?>
                            <strong> Tamaño: </strong><?php echo $descripcion2; ?> <br>
                            <strong> Tipo de Uso: </strong> <?php echo $tu; ?> <strong> Frecuencia de Uso: <?php if ($tu == 'Personal') { echo 4; } else { echo  8; }?> mensuales.
                            </strong><br>
							              <strong> Desde: </strong> <?php echo $fi; ?>  <strong>  - Hasta: </strong><?php echo $ff; ?> 
							              <strong>  <?php echo $per_contrat; ?> <br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        
        <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >C. PERSONAS AUTORIZADAS</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
							
							<?php  
							$get_data = callAPI('GET', $servidor.'/api/cajas/asociados/'.$nro_caja ,false);
		                    $response = json_decode($get_data, true);
				
							   foreach ($response as $d) {
								  $nombre = $d['nombre']; 
								  $apellido = ' '.$d['apellido']; 
								  $tipo_doc = $d['tipo_documento'];
								  $dni = $d['dni'];
								  $email = $d['email']; 
								  $domicilio = $d['dommicilio'];
								  $cp2 = $d['cp'];
								   
								   		$get_data2 = callAPI('GET', $servidor.'/api/ciudades/',false);
									 	  $response2 = json_decode($get_data2, true);
                       $cont = 0;
								   	  	foreach ($response2 as $g) {
									      if ($cp2 == $g['cp']) {
											  $cp3 = $g['cp'];  
											  $l = $g['localidad'];
                        $p = $g['provincia'];
                        $cont = $cont + 1;
										  } 
									    }
								?>  
                      
                        <?php 
                            if($tipo_doc==1){$tp='DNI';}elseif($tipo_doc==2){$tp='CUIL';}elseif($tipo_doc==3){$tp='CUIT';}else{$tp=$tipo_doc;}?>
                            <br>
                            <strong> Nombre y Apellido: </strong> <?php echo $nombre. ' ' .$apellido ?> 
                            <strong> <?php echo $tp ?> : </strong><?php echo $dni; ?> 
                            <strong> Email: </strong><?php echo $email; ?> <br>
                            <strong> Domicilio: </strong><?php echo $domicilio; ?> 
                            <strong> Localidad: </strong><?php echo $l . ' ' . $p; ?> <strong> CP: </strong>(<?php echo $cp2; ?>)
                            <br>
                            <?php } 
                            if (!isset($cont)) {?>
                              <br>
                              <strong> SIN DESIGNACIÓN DE AUTORIZADOS </strong> 
                              <br>
                            <?php
                            }
                           ?> 
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p>

          <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >D. DATOS  SOBRE FORMA DE PAGO</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            <strong> Forma de cobro: </strong> <?php $form_pago; ?>
							              <strong> Marca: </strong> <?php echo $marca; ?><br>
                            <strong> Número de Tarjeta: </strong><?php echo $num_tarj; ?> 
                            <strong> Banco: </strong> <?php echo $banco; ?> 
							              <strong> Vencimiento: </strong> <?php echo $v; ?> <br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          
          <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En la
ciudad de Mar del Plata, a los …… del mes …………………………………………  del año …………… </span> <o:p></o:p></span></b></p>
          
       
<div class="row section" align="center">
            <div class="col-1">
                <table style='width:80%'>
                    <thead contenteditable>
                    
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
                          <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                  <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="50%" >FIRMA CLIENTE</th>
                     </tr> 
                     <tr class="invoice_detail">
                      <th  width="80%" >ACLARACIÓN</th>
                     </tr> 
                    </thead>
                </table>
            </div><!--.row-->
          
          <p>&nbsp;</p>
                    
          <div class="row section" align="center">
            <div class="col-1">
                <table style='width:80%'>
                    <thead contenteditable>
                    
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
                          <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                  <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="50%" >REPRESENTANTE SEGURIDAD FORTRESS SA</th>
                     </tr> 
                     <tr class="invoice_detail">
                      <th  width="80%" > ACLARACIÓN</th>
                     </tr> 
                    </thead>
                </table>
            </div><!--.row-->

            <p>&nbsp;</p>
            <p>&nbsp;</p>
         
    </div><!--.me-->
  </header>
</div><!--.notec001-->
</page>	
   