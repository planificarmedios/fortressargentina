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
    				FICHA DE AUTORIZADO (ANEXO II)</br>
    </h1>
 
  <p>&nbsp;</p>
  <p>&nbsp;</p>


  
  
  		<div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >A. DATOS DEL AUTORIZADO</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                        	<br>
                          <p><strong> Asociado: </strong> <?php echo $nombre.' '.$apellido; ?><br>
                            <strong> Domicilio: </strong> <?php echo $dom. '' ?> ( <?php echo $cp3. '' ?>). <?php echo $l ?><br>
                            <strong> Tipo: </strong><?php echo $doc. ' '; ?> <strong> 
                            Nro. Doc: </strong> <?php echo $nro_doc. ' '; ?>   <br>
							<strong> Estado Civil: </strong><?php echo $estado_civil ?> <br>
                            <strong> Email: </strong><?php echo $email. ' '; ?><br> 
                            <strong>Tel. Fijo: </strong> <?php echo $telf. ' '; ?>   <strong> 
                            Tel. Móvil: </strong><?php echo $telm. ' '; ?> <br>
                            <strong> Alias: </strong> <?php echo $alias. ' '; ?> <br>
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
                            <strong> Rol: </strong> Asociado <br>
                            <strong> Caja: </strong> <?php echo $serie; ?><br>
                            <strong> Tamaño: </strong><?php echo $descripcion2; ?> <br><br>
                           <strong> Tipo de Uso: </strong> <?php echo $tu; ?> <strong> Frecuencia de Uso: <?php if ($tu == 'Personal') { echo 4; } else { echo  8; }?> mensuales.
                            </strong><br>
							              <strong> Desde: </strong> <?php echo $fi; ?>  <strong>  - Hasta: </strong><?php echo $ff; ?> 
							              <strong> CON PRÓRROGA ANUAL AUTOMÁTICA <br>
							
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        
          <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
        8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><span
        lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
        minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>De conformidad con lo establecido en las Condiciones generales y particulares del Contrato de Locación de Cajas de Seguridad y Reglamento de Uso, por la presente y a mi riesgo, autorizo a la persona de datos obrantes en el apartado a y cuya firma auténtica obra en la presente; para abrir y disponer del contenido que hubiere exclusivamente en la Caja de Seguridad,  indicada en el apartado b y   que tengo alquilada en esta Entidad. Manifiesto que el representante que nombro, ha leído y firmado de conformidad el Reglamento de Uso de FORTRESS ARGENTINA SA,  y de cuyos actos me hago responsable en las mismas condiciones que he aceptado para mí y que rigen la locación de la citada Caja.


        <p>&nbsp;</p>
          <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'> En la
ciudad de Mar del Plata, a los …… del mes …………………………………………  del año …………… </span> <o:p></o:p></span></b></p>
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
                      <th width="50%" >FIRMA TITULAR: </th>
                     </tr> 
                    </thead>
                </table>
            </div><!--.row-->

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
                      <th width="50%" >FIRMA ASOCIADO: </th>
                     </tr> 
                    </thead>
                </table>
            </div><!--.row-->
          
         
          
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

 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
        8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><span
        lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
        minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>De conformidad con lo establecido en las Condiciones generales y particulares del Contrato de Locación de Cajas de Seguridad y Reglamento de Uso, y a mi riesgo, revoco la autorización detallada precedentemente.

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
          <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'> En la
ciudad de Mar del Plata, a los …… del mes …………………………………………  del año …………… </span> <o:p></o:p></span></b></p>
<p>&nbsp;</p>
<p>&nbsp;</p>         
       
      <div class="row section" align="center">
            <div class="col-1">
                <table style='width:50%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="50%" >FIRMA Y ACLARACIÓN DEL TITULAR</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
                          <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->

       
          
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
            </div><!--.row--


         
    </div><!--.me-->
  </header>
</div><!--.notec001-->


</page>	
   