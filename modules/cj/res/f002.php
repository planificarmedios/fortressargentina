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
        DATOS PERSONALES DEL AUTORIZADO (ANEXO II)</br>
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
                          <p><strong> Nombre / Razón Social Titular: </strong> <?php echo $nombre.' '.$apellido; ?><br>
                            <strong> Domicilio: </strong> <?php echo $dom. '' ?> ( <?php echo $cp3. '' ?>). <?php echo $l. '' . $p ?><br>
                            <strong> Tipo: </strong><?php echo $doc. ' '; ?> <strong> 
                            <strong> Nro. Doc: </strong> <?php echo $nro_doc. ' '; ?>   <br>
                            <strong> Email: </strong><?php echo $email. ' '; ?><br> 
                            
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
                      <th width="100%" >B. DATOS DEL SERVICIO AUTORIZADO</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            <strong> Tipo de titularidad: </strong> Autorizado por Titular <br>
                            <strong> Número de Caja: </strong> <?php echo $serie; ?><br>
                            <strong> Tamaño: </strong><?php echo $descripcion2; ?> <br>
                            <strong> Tipo de Uso: </strong> <?php echo $ch3; ?> <br>
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
                      <th width="100%" >C. DATOS DE LA PERSONA AUTORIZADA</th>
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
								  $dni = $d['dni'];
								  $email = $d['email']; 
								  $domicilio = $d['dommicilio'];
								  $cp2 = $d['cp'];
								   
								   		$get_data2 = callAPI('GET', $servidor.'/api/ciudades/',false);
										$response2 = json_decode($get_data2, true);
								   
								   	  	foreach ($response2 as $g) {
									      if ($cp2 == $g['cp']) {
											  $cp3 = $g['cp'];  
											  $l = $g['localidad'];
											  $p = $g['provincia'];
										  } 
									    }
								?>  
									<br>
									<strong> Nombre y Apellido: </strong> <?php echo $nombre. ' ' .$apellido ?><br>
									<strong> Dni: </strong><?php echo $dni; ?> <br>
							        <strong> Email: </strong><?php echo $email; ?> <br>
							        <strong> Domicilio: </strong><?php echo $domicilio; ?> <br>
							        <strong> Localidad: </strong><?php echo $l . ' ' . $p; ?> <strong> CP: </strong>(<?php echo $cp2; ?>)<br>
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
          <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En la
ciudad de Mar del Plata, a los …… del mes ………………………………  del año …………… </span> <o:p></o:p></span></b></p>
          
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          
          <div class="row section" align="center">
            <div class="col-1">
                <table style='width:50%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th align="left" width="50%" >ACLARACIÓN: </th>
                     </tr> 
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
                      <th width="50%" >FIRMA CLIENTE: </th>
                     </tr> 
                    </thead>
                </table>
            </div><!--.row-->
          
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          
          
          <div class="row section" align="center">
            <div class="col-1">
                <table style='width:50%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="50%" >REPRESENTANTE FORTRESS ARGENTINA SA</th>
                     </tr> 
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
                </table>
            </div><!--.row-->
<div style="width:100%; border-top:dashed 1px;margin-top:10mm;margin-bottom:10mm" > </div>
	
           
    </div><!--.me-->
  </header>
</div><!--.notec001-->

	<div style="width:100%; border-top:dashed 1px;margin-top:10mm;margin-bottom:10mm" > </div>
	
</page>	
   