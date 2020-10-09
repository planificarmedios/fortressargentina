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
    				CONTRATO DE LOCACIÓN </br> DE CAJA DE SEGURIDAD.
    </h1>
 
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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
                          <p>
                            <?php
                           
                            
                            ?>
                            <strong> Nombre / Razón Social Titular: </strong> <?php echo $nombre.' '.$apellido; ?><br>
                            <strong> Domicilio: </strong> <?php echo $dom. '' ?> ( <?php echo $cp3. '' ?>). <?php echo $l ?><br>
                            <strong> Tipo: </strong><?php echo $doc. ' '; ?> <strong> Nro. Doc: </strong> <?php echo $nro_doc ?><br>
                            <strong> Fecha Nac.:  </strong>  <?php if (!isset($fn)){ echo 'No indica'; } else { echo fechaNumber($fn); } ?> <br>
                            <strong> Estado Civil: </strong><?php echo $estado_civil; ?> <br>
                            <strong> Email: </strong><?php echo $email. ' '; ?><br> 
                            <strong> Tel. Fijo: </strong> <?php echo $telf. ' '; ?>   
                            <strong> Tel. Móvil: </strong><?php echo $telm. ' '; ?> <br>
                            <strong> Id: </strong><?php if (!isset($USRID)){ echo ''; } else { echo ($USRID); } ?> <br>
                            <strong> Alias: </strong> <?php if (!isset($alias)){ echo 'No Indica'; } else { echo ($alias); } ?> <br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div>
		</div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
        
        <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >B. DATOS DE CAJA DE SEGURIDAD CONTRATADA</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            <strong> Número de Caja: </strong> <?php echo $serie; ?><br>
                            <strong> Tamaño: </strong><?php echo $descripcion2; ?> <br>
                            <strong> Tipo de Uso: </strong> <?php echo $tu; ?> <br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
        
        <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >C. PERÍODO DE CONTRATACIÓN <?php echo $per_contrat ?></th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            <strong> Desde: </strong> <?php echo $fi; ?><br>
                            <strong> Hasta: </strong><?php echo $ff; ?> <br>
                            
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
          
           <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >D. SERVICIOS ADICIONALES</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            <strong> Cobertura Gold: </strong> <?php echo $cg; ?><br>
                             <strong> Notificación Via Mail Ingreso a Bóveda: </strong> <?php echo $ib; ?><br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
          
          <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >E. PRECIO SERVICIO CONTRATADO</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            <strong> ($ <?php echo number_format($importe_mensual,2,",",".").' '; ?>) </strong>  
							<?php echo NumeroAletras($importe_mensual).' '.$pagadero; ?>  <br>
                             
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
          
          <div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >F. DATOS SEGURIDAD FORTRESS SA:</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                            <strong> Dirección: </strong> Sarmiento 2685 1° Subsuelo Oficina(7600) Mar del Plata<br>
                            <strong> CUIT: 30-71614962-1</strong>  <br>
                            <strong> Email: info@fortressargentina.com</strong>  <br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
       
		<body lang=ES-AR link="#0563C1" vlink="#954F72" style='tab-interval:35.4pt'>

        <div class=WordSection1>
        
        <p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
        margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
        text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l12 level2 lfo21'><![if !supportLists]><b><span
        lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
        mso-bidi-theme-font:minor-latin'><span style='mso-list:Ignore'><span
        style='font:7.0pt "Times New Roman"'> </span></span></span></b><![endif]><b><span
        lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
        mso-bidi-theme-font:minor-latin'></span></b><span lang=ES
        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
        mso-bidi-theme-font:minor-latin'>Entre los suscriptos, por una <strong> EL PRESTATARIO DEL SERVICIO/LOCATARIO o CLIENTE </strong>, (arriba mencionado en el punto “A” y con sus datos obrantes en la Ficha del Cliente, en adelante Anexo I) , solicita a <strong>SEGURIDAD FORTRESS SA</strong>, en adelante <strong>EL
        PRESTADOR o LOCADOR o EMPRESA</strong>, el servicio de caja de seguridad, que quedará sujeto al siguiente
        contrato de locación de caja de seguridad y su respectivo reglamento de uso, de acuerdo a las siguientes claúsulas:<o:p></o:p></span></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p><p>&nbsp;</p>
        <p>&nbsp;</p>

        
        <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
        8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b
        style='mso-bidi-font-weight:normal'><u><span lang=ES style='font-size:10.0pt;
        line-height:107%;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
        mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
        Calibri;mso-bidi-theme-font:minor-latin'>DEFINICIONES E
        INTERPRETACIONES<o:p></o:p></span></u></b></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l12 level2 lfo21'><![if !supportLists]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><span style='mso-list:Ignore'>1.1<span
style='font:7.0pt "Times New Roman"'> </span></span></span></b><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>Definiciones</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>. Todos los términos utilizados en este
Contrato de Locación de caja de seguridad tendrán los significados asignados en
este Artículo 1 y en el Reglamento de uso de Caja de Seguridad del Locador
vigente al día de la fecha y sus ulteriores ajustes.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“Caja de Seguridad o Caja”</span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará el espacio de guarda de bienes
que <b>SEGURIDAD FORTRESS SA </b>pone a disposición del Locatario según las
medidas y demás particularidades que se explican en Anexo III adjunto y en
los términos y condiciones que surgen del presente contrato y el Reglamento.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“Contrato”</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará este Contrato de Locación de
Caja de Seguridad.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“Anexos”</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significarán los anexos de este Contrato.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“Artículo”</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará cada uno de los Artículos de
este Contrato.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“Dólares<span class=GramE>”<span
style='font-weight:normal'> ,</span></span></span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'> <b>“U.S. Dólares“</b> o <b>“U$S“</b>: significará
la moneda de curso legal en los Estados Unidos de América.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“<span class=GramE>Anexos“</span></span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significarán el Anexo I donde constan
todos los datos filiatorios del Locatario, el Anexo II de las personas
autorizadas para el uso de la Caja de Seguridad, el Anexo III con el tarifario de las cajas y servicios ofrecidos, el Anexo IV de solicitud de apertura forzada, Anexo V de reserva y usos de salas de reuniones, Anexo VI sobre medidas de seguridad y detección de metales y Anexo VII de las personas politicamente expuestas.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“Locador o <span class=GramE>Empresa“</span></span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará la Persona que pone a
disposición las Cajas de Seguridad para su uso por parte de un tercero.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“<span class=GramE>Locatario“</span></span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará la Persona o Cliente Titular que
contrata el servicio de uso de las cajas de Seguridad, tanto persona Física
como Jurídica.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;mso-bidi-font-weight:bold'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><b><span lang=ES style='font-size:10.0pt;
line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>“Pesos
o Moneda <span class=GramE>Argentina“</span></span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará la moneda de curso legal en
circulación en la República Argentina.<b><o:p></o:p></b></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“<span class=GramE>Reglamento“</span></span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará el cuerpo normativo con las
cláusulas y disposiciones que regulan el vínculo contractual entre la Sociedad
y el conjunto de sus Locatarios con relación a derecho y obligaciones
reciprocas y procedimientos hábiles para el uso de la Caja de Seguridad.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l33 level1 lfo24'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>“Servicio de cobertura <span class=GramE>Gold“</span></span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significará aumento de cobertura a U$S
100.000,00 o su equivalente en moneda argentina.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpLast style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l12 level2 lfo21'><![if !supportLists]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><span style='mso-list:Ignore'>1.2<span
style='font:7.0pt "Times New Roman"'> </span></span></span></b><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>Interpretaciones</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>. Palabras transcriptas en plural incluirán el
significado singular y viceversa, palabras transcriptas en género masculino
incluirán todos los géneros. Los títulos se insertan en este Contrato al solo
efecto de servir como referencia, ya que de ninguna manera limitarán o
afectarán la interpelación de las provisiones que titulan. Las referencias a un
Artículo, Sección o Anexo son consideradas como referencias a los Artículos o
Secciones o Anexos de este Contrato a menos que se indicare lo contrario.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>PRIMERA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: En
mérito a los antecedentes expuestos <b>SEGURIDAD FORTRESS SA </b>concede al Locatario,
el uso de la Caja de Seguridad </span><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
Calibri;mso-bidi-theme-font:minor-latin;color:black;mso-themecolor:text1'>arriba
mencionada en el punto “<span class=GramE>B“ y</span> en las condiciones
establecidas en el punto “D”, por un período de contratación y fecha de inicio
del contrato arriba mencionados en punto “ C “por el precio arriba mencionados
en el punto “ E “</span><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>. El precio mencionado en el punto “E “es el
precio vigente al momento de la firma del contrato y que puede ser modificado
por el Locador previa notificación al cliente con un plazo no menor a 30 días.
El Contrato es de renovación automática por período consecutivo salvo selección de
plazo determinado para períodos menores a 1 año. Durante el plazo de vigencia
del presente Contrato el Locatario tendrán derecho de uso de servicios
adicionales por la Locadora dentro del local brindado por ella o por terceros,
previo pago de la tarifa correspondiente y bajo las condiciones específicas para
ese servicio. Como, por ejemplo, el acceso a una sala de reuniones por tiempo determinado.
<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEGUNDA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: El
Locatario usará la Caja directamente o través de un autorizado con mandato
conferido en Anexo II (máximo dos autorizados por cajas de uso
Personal y cuatro para cajas de uso Comercial) debiendo registrar sus datos
biométricos ante el Locador, para habilitar el uso de la Caja de Seguridad. El
Locatario podrá modificar la identidad de sus autorizados las veces que así lo
desee, abonando los cargos pertinentes a la Locadora. Pero nunca podrá
excederse del número mencionado. Queda absolutamente prohibido subarrendar o
ceder el arrendamiento y / o guardar en la Caja cosas dañosas, peligrosas o de
tráfico prohibido; en caso de guardar aparatos electrónicos o celulares, los mismos
deben estar sin baterías o con las mismas descargadas, en caso de que no se
puedan extraer del cuerpo principal. La Empresa no se hace cargo de los daños
que estos puedan ocasionar al cliente, pudiendo demandar al Locador que, no
cumpliendo con esto, ocasione algún tipo de daño a las instalaciones y / o a
terceros. El Locador podrá ejercer el derecho de Inspección a fin de constatar
el cumplimiento efectivo de la presente clausula, siempre en presencia del
Cliente o en su defecto con Escribano Público en caso de negativa del Cliente. <b>SEGURIDAD
FORTRESS SA </b>se reserva el derecho de admisión y permanencia. Es
responsabilidad del Locatario informar cualquier modificación sobre los datos
suministrados de contrato.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>TERCERA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: El
Locatario elige en este acto un sobre cerrado, que contiene dos llaves iguales
y sin réplica de la Caja, las que deberá reintegrar acabada la locación en
similares condiciones salvo desgaste natural su debido uso, dando aviso de
inmediato al Locador si las daña, pierde o le son sustraídas y obligándose a
pagar en tales supuestos el gasto que insuma la sustitución del mecanismo de
clausura de la caja.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>CUARTA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: En
cualquier momento y aún sin causa, previa notificación fehaciente, las partes
podrán rescindir este contrato. Si así lo hiciera el Locador, restituirá el
precio proporcional al tiempo faltante de la Locación, si lo hiciese el
Locatario, perderá la parte proporcional del precio; para Contratos de Periodo
Indeterminados en caso de que la rescisión se hiciera antes del décimo mes
tendrá una multa similar a 2 meses de alquiler. Una vez rescindido el contrato
el cliente deberá devolver las llaves de la Caja, de no hacerlo así, se
aplicará una multa y el locador procederá a abrir la Caja conforme lo que
dispone el artículo siguiente.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>QUINTA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: La
falta de pago de la locación, la falta de devolución de las llaves al
vencimiento del plazo y cualquier otro incumplimiento del Locatario no
remediados en el plazo de 10 días corridos de notificado al efecto, producirá
ipso jure la rescisión del contrato y el bloqueo del ingreso del cliente a su
caja hasta la regularización de la situación, pudiendo el Locador ante la falta
de respuesta del cliente, abrir la Caja con intervención de escribano público,
inventariar su contenido y ponerlo a disposición del Locatario durante el término
de 30 días corridos desde su apertura; vencido el cual podrá subastarlo para
cobrarse lo que sea debido, intimando al Locatario a la recepción del saldo, si
lo hubiere. Si el Locatario no retirase los bienes remanentes, el Locador podrá
destruirlos, con cargo al Locatario. Pasados 3 (tres) días desde la
finalización del contrato, hasta que el cliente realice la correspondiente
entrega de las llaves y vacíe el contenido de su caja, se cobrará una multa
diaria equivalente al valor diario según precio de lista multiplicado por la
cantidad de días excedentes, contados desde el día de finalización del
contrato, hasta la regularización de la situación y pago.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEXTA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: En
caso de fallecimiento, incapacidad o interdicción civil o comercial del
Locatario, la caja no podrá abrirse, sino por orden judicial. Los costos
relacionados a dicho período quedarán a cargo de los herederos o la sucesión. A
todo evento, los herederos serán representados por el administrador de la
sucesión, quien acreditará tal condición fehacientemente ante el Locador.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SÉPTIMA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: El
Locatario usará la Caja sólo para guardar en ella dinero, joyas, documentos,
títulos, valores mobiliarios u otros bienes análogos, susceptibles de
contenerse dentro de ella. Se deja constancia de que todas las cajas de
seguridad de FORTRESS cuentan con una cobertura de 50.000 U$S (cincuenta mil
dólares) o su equivalente en moneda argentina <span class=SpellE>incluído</span>
en el abono. El monto que podrá guardar dentro de la misma no podrá exceder la
suma de 50.000 U$S (cincuenta mil dólares) o su equivalente en moneda
argentina. En caso de siniestro por el cual el Locador debiese responder
contractualmente, la obligación de resarcimiento por parte del Locador tendrá
como límite el importe señalado. Si los valores superan los 50.000 U$S (cincuenta
mil dólares) o su equivalente en moneda argentina será exclusiva
responsabilidad del Locatario, salvo que haya contratado un Servicio de
cobertura Gold. En caso de que el cliente haya contratado el Servicio de
cobertura Gold</span><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black;mso-themecolor:text1'>, indicado en
“D”, la caja de </span><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>seguridad de <b>SEGURIDAD FORTRESS SA </b>contará
con una cobertura de 100.000 U$S (cien mil dólares) o su equivalente en moneda
argentina. El monto que podrá guardar dentro de la misma no podrá exceder la
suma de 100.000 U$S (cien mil dólares) o su equivalente en moneda argentina. En
caso de siniestro por el cual el Locador debiese responder contractualmente, la
obligación de resarcimiento por parte del Locador tendrá como límite el importe
señalado, siempre que se haya contratado la cobertura correspondiente. Las partes 
acuerdan que el pago de la prima debida por el Locador y/o Asegurado y/o Compañía 
Aseguradora, como así también el pago de las eventuales indemnizaciones que puedan 
resultar a cargo de la entidad en caso de siniestro, asumidas en moneda extranjera 
serán abonadas al Locatario, en la moneda de curso legal, para lo cual se convertirán 
de acuerdo a la cotización del Banco de la Nación Argentina, al tipo de cambio vendedor 
de cierre del día hábil anterior a la fecha de pago de la prestación.-<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>OCTAVA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: El
Locador presta al Locatario las garantías de conservación de la Caja, salvo
caso fortuito o fuerza mayor pero no responde por los objetos que ella contenga
en cuanto a su naturaleza, cantidad, demérito, valor, etc., y su conservación,
cuidado y retiro corresponde al titular.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>NOVENA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: En
caso de embargo o secuestro que se comunique a <b>SEGURIDAD FORTRESS SA </b>por
autoridad competente, el Locador quedará obligado a impedir el acceso del
Locatario a la Caja, y de corresponder, proceder a su apertura ante el 
Oficial de Justicia y consiguiente depósito de las cajas extraídas a la orden
del Juez que dispuso la medida cautelar o de ejecución. <b>SEGURIDAD FORTRESS
SA </b>proveerá al Oficial de Justicia toda documentación y filmación que sea
requerida ante un pedido formal de la Justicia o del Organismo Nacional que
esté facultado para hacerlo.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>DÉCIMA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: La
mora se producirá de pleno derecho, por el mero transcurso de los términos, sin
necesidad de notificación.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>DÉCIMO
PRIMERA</span></u></b><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: Con la firma del presente, se hace entrega
al Locatario que recibe de conformidad una copia del presente Contrato y del
Reglamento que se rige para el debido uso de las Cajas de Seguridad y que
integra el plexo normativo de la relación entre las partes. El Locatario se
anoticia que el Reglamento podrá ser modificado y/o actualizado por la
Locadora, quien dejará un ejemplar del nuevo reglamento disponible en cada
local <b>SEGURIDAD FORTRESS SA</b>. El Locatario se compromete a anoticiarse
del contenido de cada nuevo Reglamento y acepta ser obligado por sus nuevas
disposiciones. El Reglamento que se acompaña como Anexo del presente, es parte
integrante del presente Contrato.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>DÉCIMO
SEGUNDA</span></u></b><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: cualquier cuestión de índole litigiosa
derivada de este contrato será sometida exclusivamente ante el Tribunal Arbitral
del Colegio de Abogados del Departamento Judicial de Mar del Plata, y al mismo
efecto, el Locador constituye su domicilio legal en domicilio indicado en el
punto “F”, haciéndolo con el suyo de igual carácter el Locatario en domicilio </span><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black;mso-themecolor:text1'>arriba mencionado en el punto “A”. El
Locatario </span><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>acepta como notificación válida de todas la
novedades y acciones vinculadas al objeto del presente los e-mails que le serán
remitidos a la dirección electrónica que denuncie como </span><span lang=ES
style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black;mso-themecolor:text1'>propia en el Anexo I, la que </span><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>será
válida a todo evento hasta tanto el Locatario no denuncie una nueva.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En Mar del Plata, a los ………… del mes ……………………………………………………  del año …………… 
<br><br> se firman dos ejemplares del mismo tenor.<o:p></o:p></span></b></p>

          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
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
   