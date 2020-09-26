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


-->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" style="font-size: 11pt; font-family: arial" >

    <div id="c001" name="c001"  style="visibility:visible">
 <header class="row">
      <div class="logoholder text-center" >
        <img style="width:200%" src="sales_invoice/assets/img/logo.png">
      </div><!--.logoholder-->
      
  <div class="row section" align="center">
     <div class="col-8">
    <h1 contenteditable>CONTRATO DE LOCACIÓN DE CAJA DE SEGURIDAD Y REGLAMENTO DE USO</h1>
  </div><!--.col-->
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
                          <p><strong> Nombre / Razón Social Titular: </strong> <?php echo $nombre.' '.$apellido; ?><br>
                            <strong> Domicilio: </strong> <?php echo $dom. '' ?> ( <?php echo $cp3. '' ?>). <?php echo $l. '' . $p ?><br>
                            <strong> Tipo: </strong><?php echo $doc. ' '; ?> <strong> 
                            Nro. Doc: </strong> <?php echo $nro_doc. ' '; ?>   <br>
                            <strong> Email: </strong><?php echo $email. ' '; ?><br> 
                            <strong>Tel. Fijo: </strong> <?php echo $telf. ' '; ?>   <strong> 
                            Tel. Móvil: </strong><?php echo $telm. ' '; ?> <br>
                            <strong>Id: </strong><?php echo $idcliente. ' '; ?> <br>
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
                      <th width="100%" >B. DATOS DE CAJA DE SEGURIDAD CONTRATADA</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
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
                      <th width="100%" >C. PERÍODO DE CONTRATACIÓN</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
                            <strong> Desde: </strong> <?php echo $fi; ?><br>
                            <strong> Hasta: </strong><?php echo $ff; ?> <br>
                            <strong> Indeterminado: SI / NO <br>
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
                      <th width="100%" >D. SERVICIOS ADICIONALES</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
                            <strong> Cobertura Gold: </strong> <?php echo $ch; ?><br>
                             <strong> Notificación Via Mail Ingreso a Bóveda: </strong> SI / NO <br>
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
                      <th width="100%" >E. PRECIO SERVICIO CONTRATADO</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
                            <strong> ($ <?php echo number_format($precio,2,",",".").' '; ?>) </strong>  
							<?php echo NumeroAletras($precio); ?> <br>
                             
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
                      <th width="100%" >F. DOMICILIO SEGURIDAD FORTRESS SA:</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p>
                            <strong> Dirección: </strong> Sarmiento 2685 1° Subsuelo Oficina(7600) Mar del Plata<br>
                            <strong> CUIT: </strong>  <br>
                            <strong> Email: </strong>  <br>
                          </p>
                        </blockquote>
                    </tr>
                  </tbody>
                </table>
            </div><!--.row-->
          <p>&nbsp;</p>
          <p>&nbsp;</p>
       
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
        mso-bidi-theme-font:minor-latin'>Entre los suscriptos, por una EL PRESTATARIO DEL SERVICIO/LOCATARIO o 
        CLIENTE, (arriba mencionado en el punto “A” y con sus datos obrantes en la Ficha del Cliente, en
        adelante Anexo o Ficha 001), solicita a SEGURIDAD FORTRESS SA, en adelante EL
        PRESTADOR o LOCADOR o EMPRESA, el servicio de caja de seguridad, que quedará sujeto al siguiente
        contrato de locación de caja de seguridad y su respectivo reglamento de uso:<o:p></o:p></span></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p><p>&nbsp;</p>
        <p>&nbsp;</p>

        
        <div class="row section" align="center">
         <div class="col-8">
        	<h1 contenteditable>CONTRATO DE LOCACIÓN DE CAJA DE SEGURIDAD</h1>
        </div><!--.col-->
        <p>&nbsp;</p>
        
        
        <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
        8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b
        style='mso-bidi-font-weight:normal'><u><span lang=ES style='font-size:10.0pt;
        line-height:107%;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
        mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
        Calibri;mso-bidi-theme-font:minor-latin'>ARTICULO 1 – DEFINICIONES E
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
este Articulo 1 y en el Reglamento de uso de Caja de Seguridad del Locador
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
medidas y demás particularidades que se explican en la Ficha 003 adjunta y en
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
mso-bidi-theme-font:minor-latin'>“<span class=GramE>Fichas“</span></span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: significarán la Ficha 001 donde constan
todos los datos filiatorios del Locador, la Ficha 002 de las personas
autorizadas para el uso de la Caja de Seguridad y la Ficha 003 que describe el
tamaño, características y lista de precios de las Cajas y servicios ofrecidos.<o:p></o:p></span></p>

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
En caso de Contratos de Período Indeterminado el débito se realizará en forma
mensual. En caso de pago en efectivo, el presente es recibo suficiente. El
Contrato es de renovación automática por periodo consecutivo salvo selección de
plazo determinado para períodos menores a 1 año. Durante el plazo de vigencia
del presente Contrato el Locatario tendrán derecho de uso de servicios
adicionales por la Locadora dentro del local brindado por ella o por terceros,
previo pago de la taifa correspondiente y bajo las condiciones específicas para
ese servicio. Como, por ejemplo, el acceso a una sala privada por tiempo determinado.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><u><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEGUNDA</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>: El
Locatario usará la Caja directamente o través de un autorizado con mandato
conferido en ficha del Locador (máximo dos autorizados por cajas de uso
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
dispone el articulo siguiente.<o:p></o:p></span></p>

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
señalado, siempre que se haya contratado la cobertura correspondiente.<o:p></o:p></span></p>

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
Locatario a la Caja, y de corresponder, proceder a su apertura ante el ante el
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
color:black;mso-themecolor:text1'>propia en la ficha 001, la que </span><span
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
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En la
ciudad de Mar del Plata, a los ………………………<span class=GramE>…….</span>. del mes
de ………………<span class=GramE>…….</span>.…………………………. del año ……………<span
class=GramE>…….</span>. se firman dos ejemplares del mismo tenor.<o:p></o:p></span></b></p>

          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      <div class="row section" style="margin-top:-1rem">
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
          
          <div class="row section" style="margin-top:-1rem">
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
	
</page>	
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" style="font-size: 11pt; font-family: arial" >
    
    
      <div class="logoholder text-center" >
        <img  style="width:200%" src="sales_invoice/assets/img/logo.png">
      </div><!--.logoholder-->

        
       <div class="row section" align="center">
         <div class="col-8">
        	<h1 contenteditable>REGLAMENTO DE USO</h1>
        </div><!--.col-->
        <p>&nbsp;</p>
        <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>El
presente Reglamento de Uso tiene por objeto establecer las modalidades
operativas y las disposiciones que regirán el funcionamiento y usos de las
Cajas de Seguridad de <b>SEGURIDAD FORTRESS <span class=GramE>SA ,</span></b>
así como determinar los derechos y obligaciones de las partes contratantes en
el alquiler de los espacios de guarda, formando parte integral del Contrato de
Locación de Caja de Seguridad.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l24 level1 lfo19'><![if !supportLists]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><span style='mso-list:Ignore'>I.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>DE LA CAJA DE SEGURIDAD.<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>DESCRIPCION</span></u></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: La CAJA DE SEGURIDAD es el espacio de guarda
de bienes que <b>SEGURIDAD FORTRESS S.A</b> en adelante FORTRESS, pone a
disposición de cada Locatario. FORTRESS dispone de varios tipos de Cajas de
Seguridad, cuyas características pueden variar en cuanto a acceso y medidas.
Las particularidades de cada Caja de Seguridad puesta a disposición de un <span
style='color:black;mso-themecolor:text1'>usuario se explicitan en la Ficha 003
que se adjunta </span>a cada Contrato de Locación que se suscriba con cada
usuario y en los términos y condiciones que surgirán de cada Contrato y del
presente Reglamento.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>Asimismo,
cada Caja de Seguridad estará identificada con un número el cual se <span
style='color:black;mso-themecolor:text1'>establecerá en el punto “B” del
Contrato de Locación de Caja de Seguridad que servirá para la identificac</span>ión
de <span class=GramE>las mismas</span>. <o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>LLAVES</span></u></b><u><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: </span></u><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>Cada
Caja de Seguridad dispondrá de dos llaves únicas que se pondrán a disposición
del Locatario en forma simultánea a la suscripción del Contrato de Locación, y
de las cuales queda expresamente prohibida su reproducción por el Locatario. <b>SEGURIDAD
FORTRESS SA </b>no retendrá ninguna llave de la Caja <span class=SpellE>locada</span>,
salvo la llave de Control necesaria para el proceso de apertura conjunto entre
personal de <b>SEGURIDAD FORTRESS SA </b>y el Cliente. Ninguna de las partes
por si solo puede proceder a la apertura de la Caja sin la otra llave. Si el
usuario perdiera las llaves, o no las devolviera al término de la locación,
deberá abonar el gasto de la modificación o recambio de la cerradura de la Caja
de Seguridad en cuestión y la emisión de dos nuevas llaves, a los precios vigentes
en el momento que se produjera el requerimiento. <b>SEGURIDAD FORTRESS SA </b>podrá
pedir un depósito en garantía para cubrir estas contingencias al inicio de cada
período locativo. Es obligación del Locatario en caso de extravío, hurto o robo
de <span class=GramE>las mismas</span>, dar de inmediato aviso a <b>SEGURIDAD
FORTRESS SA </b>mediante denuncia policial dentro de las 48hs de producido el
hecho. <b>SEGURIDAD FORTRESS SA </b>una vez recibida la comunicación, hará
cambiar por cuenta de aquél la cerradura, siendo también a su carga los gastos
que demande la confección de nuevas llaves y la apertura forzada de la caja de
seguridad. Para la asignación de llaves, se le solicitará al Cliente que, de un
grupo de un mínimo de cinco (5) sobres cerrados que contienen en cada uno 2
llaves, seleccione al azar uno de ellos con 2 llaves idénticas en el interior
de éstos, y que se programarán para abrir la caja asignada. <o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>DE LO GUARDADO:</span></u></b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'> </span></u><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>El
Locatario usara la Caja de Seguridad sólo para guardar en ella dinero, joyas,
documentos, títulos, valores mobiliarios y otros bienes análogos, susceptibles
de contenerse dentro de ella. Se deja constancia de que todas las cajas de
seguridad de <b>SEGURIDAD FORTRESS SA </b>cuentan con una cobertura de 50.000
U$S (cincuenta mil dólares) o su equivalente en moneda argentina incluido en el
precio del abono. El monto que podrá guardar dentro de la misma no podrá
exceder la suma de 50.000 U$S (cincuenta mil dólares) o su equivalente en
moneda argentina. En caso de siniestro por el cual el Locador debiese responder
contractualmente, la obligación de resarcimiento por parte del Locador tendrá
como limite el importe señalado. Si los valores superan la suma de 50.000 U$S (cincuenta
mil dólares) o su equivalente en moneda argentina, será exclusiva
responsabilidad del Locatario, salvo que haya contratado el Servicio de
Cobertura Gold, en dicho caso podrá guardar valores hasta el monto de la
cobertura de 100.000 U$S (cien mil dólares) o su equivalente en moneda
argentina. En caso de que se requiera guardar un número mayor al mencionado, el
cliente deberá comunicar esta situación con el fin de contratar una nueva caja
de seguridad. El Cliente usará la caja exclusivamente con fines lícitos. Queda
absolutamente prohibido guardar en la Caja de Seguridad cosas dañosas,
peligrosas o de tráfico prohibido. Ante sospecha o evidencia de introducción de
algunos de tales elementos, <b>SEGURIDAD FORTRESS SA </b>tendrá derecho a
examinar las cosas que el Locatario se dispone a guardar en la Caja, en su
presencia o citando al Locatario para examinar los elementos guardados en ella.
La negativa o reticencia del Locatario a someterse a ese control, dará derecho
a <b>SEGURIDAD FORTRESS SA </b>al forzamiento de la Caja, con intervención de
un escribano público designado por <b>SEGURIDAD FORTRESS SA </b>y costo a cargo
del Locatario, así como rescindir el contrato sin que deba reintegrar los
aranceles proporcionales abonados por el Locatario.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l24 level1 lfo19'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><span style='mso-list:Ignore'>II.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>DE LA CONTRATACION.</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><span style='mso-spacerun:yes'> </span>La
contratación de <b>SEGURIDAD FORTRESS SA </b>con cada cliente (o Locatario) se
instrumentará a través de un contrato de locación, que establecerá las
condiciones del alquiler temporario, plazo, precio y demás cuestiones. El
contrato se completará con fichas Anexos y se sostendrá en la reglamentación de
Fondo que surge del presente Reglamento.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><b><span lang=ES style='font-size:10.0pt;
line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black;mso-themecolor:text1'>Ficha</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black;mso-themecolor:text1'>: El convenio
de Locación se completará con la Ficha 001 o Anexo del Cliente donde constarán
todos los datos filiatorios del Locatario, y si correspondiere la Ficha 002 o Anexo
de Autorizados, donde constarán las personas autorizadas para el uso de la Caja
de Seguridad, y la Ficha 003 o Anexo de Servicios, el cual describe las
características y listas de precio de los servicios ofrecidos.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><b><span lang=ES style='font-size:10.0pt;
line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black;mso-themecolor:text1'>Reglamento</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black;mso-themecolor:text1'>: La relación
contractual entre <b>SEGURIDAD FORTRESS SA </b>y el Cliente estará también
normada por el presente Reglamento de Uso, el que podrá variar en su contenido
periódicamente. <b>SEGURIDAD FORTRESS SA </b>deberá tener en todas sus
sucursales una copia del reglamento vigente a partir de la puesta en vigor de
éste, o en su defecto y a su criterio, publicar el mismo en la página web
oficial de <b>SEGURIDAD FORTRESS SA</b>.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black;mso-themecolor:text1'>Tipo de Uso</span></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;color:black;mso-themecolor:text1'>: Se denomina
<b>USO PERSONAL</b>, a aquellas Cajas de Seguridad destinadas a la guarda de
valores, cuyo titular sea una persona humana y en las que los titulares y
autorizados acceden con una frecuencia razonable para tal fin; entendiéndose
como “frecuencia razonable” hasta 4 ingresos inclusive por mes, contados para
su cálculo todos los accesos al sector de bóveda realizados por el titular y/o
autorizado/s desde el 01 hasta el último día corridos de cada mes. Se denomina
de <b>USO COMERCIAL</b>, todas las Cajas de Seguridad que el titular sea una
persona j</span><span lang=ES style='font-size:10.0pt;line-height:115%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>urídica o una
persona física cuyo uso es Comercial, y con una frecuencia de hasta 8 ingresos
inclusive por mes, <span style='color:black;mso-themecolor:text1'>contados para
su cálculo todos los accesos al sector de bóveda realizados por el titular y/o
autorizado/s desde el 01 hasta el último día corridos de cada mes.</span><o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l24 level1 lfo19'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><span style='mso-list:Ignore'>III.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>DE LOS AUTORIZADOS.</span></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'><o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><b><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEGURIDAD
FORTRESS SA </span></b><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>se reserva el
derecho de no alquilar cajas de seguridad bajo titularidad conjunta. <span
style='color:black;mso-themecolor:text1'><o:p></o:p></span></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:black;
mso-themecolor:text1'>Las cajas de seguridad podrán ser utilizadas por el
Locatario directamente o a través de un autorizado, estableciendo un máximo de
dos (2) autorizados en cajas de uso Personal y cuatro (4) en cajas de uso
Comercial.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>Será
considerando “Autorizado” a toda persona mayor de 18 años a quien el Locatario
designe como tal a través de un <span style='color:black;mso-themecolor:text1'>mandato
conferido en el Anexo 002, debiendo registrar </span>los datos de todos los
Autorizados, como también, sus datos biométricos ante <b>SEGURIDAD FORTRESS <span
class=GramE>SA <span style='font-weight:normal'>,</span></span></b> para
habilitar el uso de la Caja de Seguridad. El Autorizado podrá acceder al
recinto de la Bóveda y acceder a la caja de seguridad de la <span
style='color:black;mso-themecolor:text1'>misma manera que el Titular mediante
una de las dos llaves entregadas. El Locatario debe firmar la ficha de alta del
Autorizado.<o:p></o:p></span></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En el caso
de que el Locatario sea una persona jurídica el Locador podrá exigir poderes
especiales para el ingreso a la Caja de Seguridad instrumentados por escritura
pública, siempre que haya realizado el proceso de alta como autorizado o
titular, en todo caso <b>SEGURIDAD FORTRESS SA </b>debe contar con copia fiel
del estatuto certificada por escribano y última asamblea donde se hayan
designado las autoridades. El Locador no se hace responsable por la entrada de
apoderados una vez vencidos y/o revocados sus poderes por el Locatario, si el
Locador no hubiera sido notificado fehacientemente de dicha circunstancia. <o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:black;
mso-themecolor:text1'>El Locatario podrá modificar la identidad de sus
autorizados las veces que así lo desee, durante la vigencia de la locación,
abonando si correspondiere los cargos administrativos pertinentes a la
Locadora, al precio de lista vigente en cada oportunidad.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpLast style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En caso de
que el Locatario sea una persona jurídica, el cambio de autorizados debe ser
solicitado por quien contrato el servicio inicialmente. De no ser posible debe
presentarse Acta de Asamblea y Acta de Directorio, certificadas por escribano
público designando las nuevas autoridades y los nuevos autorizados.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>IV.
DEL ACCESO.<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>PROCEDIMIENTO</span></u></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>. Tanto el Locatario como su/s autorizado/s
tendrán los mismos derechos y obligaciones en cuanto al acceso a la Caja de
Seguridad. Asimismo, deberán guardar decoro y recato en el uso de las cajas de
seguridad, asegurando no disturbar a otras personas que puedan estar utilizando
los servicios de locación de las Cajas de Seguridad. Al mismo tiempo se reserva
el derecho de admisión y permanencia en los recintos bajo su guarda, en caso de
que los usuarios no respeten estas disposiciones. <o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>REGISTRO DE DATOS BIOMÉTRICOS</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>. <b>SEGURIDAD FORTRESS SA </b>llevará un
registro de datos biométricos obligatorios para identificar a los usuarios y
franquear su acceso a las Cajas. <b>SEGURIDAD FORTRESS SA </b>guardará los
datos a los efectos previstos, y los usuarios prestan conformidad para tales
procedimientos.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>INGRESO</span></u></b><u><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>.</span></u><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>
Para ingresar al recinto en donde se ubica la Caja de Seguridad <span
class=SpellE>locada</span> y acceder a ésta, el Locatario y/o, en su defecto
los autorizados deberán concurrir en el horario de atención establecido por la
Locadora, llenar y firmar la ficha de ingreso (en caso de que así se estipule)
y proceder al control biométrico establecido mediante reconocimiento de huella
digital, clave numérica y reconocimiento facial indistinta o conjuntamente. El
acceso al recinto de Bóveda será siempre conjunto, cliente y empleado de <b>SEGURIDAD
FORTRESS SA</b>. El sistema de acceso está desarrollado para que ninguna
persona pueda entrar en forma individual al recinto de Bóveda. Tal limitación
aplica a clientes, autorizados, empleados, funcionarios y accionistas de <b>SEGURIDAD
FORTRESS SA</b>.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>MEDIDAS DE SEGURIDAD</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>. Queda terminantemente prohibido el ingreso a
la sede de <b>SEGURIDAD FORTRESS SA </b>con armas blancas o armas de fuego, ya
sea para su resguardo dentro de la Caja de Seguridad como la portación dentro
del local. El acceso al local contará con un arco detector de metales y otro
detector de metales manual, los que serán manipulados por personal se
seguridad. Ni titulares, ni autorizados podrán ingresar a la Empresa habiendo
activado los detectores de metales sin permitir al personal de <b>SEGURIDAD
FORTRESS SA </b>a verificar el contenido de sus pertenencias. A fin de evitar
falsos positivos a través de los detectores metálicos, el Cliente deberá
informar si posee prótesis que pudieran activar estos dispositivos. El local
contará con sistema de CCTV instalado en toda la sucursal salvo zona de boxes,
salas de espera, salas de escrituras y baños para resguardo de la privacidad.
El cliente y autorizados declaran conocer estas medidas de seguridad y deberán
seguir las instrucciones impartidas por el personal de <b>SEGURIDAD FORTRESS <span
class=GramE>SA <span style='font-weight:normal'>,</span></span></b> en cuanto
al desplazamiento por la Empresa. El Cliente será responsable civil y
penalmente de los actos de sus autorizados.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpLast style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>APERTURA DE LA CAJA</span></u></b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>. </span></u><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>La
apertura de la Caja se realizará con la llave del Cliente y la llave del
control que mantendrá el personal de Bóveda. Ambas llaves deberán ser colocadas
para la apertura. Una vez retirado el Cofre, se procederá al cierre de la tapa
de seguridad y tanto el cliente como el personal de Bóveda deberán retirar la
llave. El Cliente siempre mantendrá su llave en su poder y en ninguna
circunstancia se la entregará al personal o a un tercero. Toda incorporación o
retiro de contenido debe realizarse en los Boxes Privados destinados a dicho
fin, no pudiéndose realizar ninguna operación dentro de la Bóveda. Se establece
que el tiempo de uso de cada Box privado no podrá superar nunca los 20 minutos
contados desde el ingreso del cliente al Box, de los que tomará debido registro
el personal de <b>SEGURIDAD FORTRESS <span class=GramE>SA <span
style='font-weight:normal'>,</span></span></b> resultando incontrastable e
inimpugnable tal registro por el cliente. Si al cabo del plazo de uso, el
cliente no liberara el Box, el personal de <b>SEGURIDAD FORTRESS SA</b>, estará
habilitado a solicitar que finalice su operación y proceder al guardado del
Cofre en su lugar.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>V. DE
LOS SERVICIOS ACCESORIO.<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>SALAS:</span></u></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'> El locador dispondrá dentro del local de <b>SEGURIDAD
FORTRESS <span class=GramE>SA ,</span></b> de distintas salas de escrituras o
uso comercial para que el Locatario y/o los autorizados puedan hacer uso.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>La
utilización de las salas privadas estará sujeta a una limitación temporal de
horas y conforme a las tarifas que se publicarán periódicamente.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>Para el uso
de las salas, los usuarios deberán proceder según los mecanismos de reservas
previas que estarán a su disposición en la sede de <b>SEGURIDAD FORTRESS SA. </b>Para
todo caso de reserva de salas, el Cliente podrá permanecer hasta el horario por
<span class=GramE>éste</span> abonado y bajo las condiciones establecidas en el
Reglamento de Uso y Reserva de Salas (Anexo F-007).<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><b><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEGURIDAD
FORTRESS SA </span></b><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>no se compromete
a que las Salas estarán siempre disponibles, sino que se ajustará a las
prioridades de reservas efectuadas.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>Queda
absolutamente prohibido utilizar las salas Privadas para fines contrarios a las
buenas costumbres.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>FORTRESS no
se hace responsable bajo ningún aspecto de los negocios, operaciones, conteo de
dinero o cualquier otro acto o suceso que ocurra dentro de las salas. Dichos
actos o negocios deben ser lícitos y bajo exclusiva responsabilidad de los
clientes.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><b><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEGURIDAD
FORTRESS SA </span></b><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>no tendrá
conocimiento alguno del tipo de operaciones que en las salas se realice y
tampoco filmará ni grabará o de forma alguna registrará lo que suceda en dichos
recintos.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>SEGUROS:</span></u></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'> Los clientes pueden solicitar Servicio de
Cobertura Gold hasta 100.000 U$S (cien mil dólares) o su equivalente en moneda
argentina. Dicha cobertura será a costo del cliente en base a las tarifas
vigentes informadas en la sede. <b>SEGURIDAD FORTRESS SA </b>podrá en cualquier
momento limitar o discontinuar el servicio o limitar el otorgamiento de éste
para determinado modelo de cajas.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:normal;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:#385623;mso-themecolor:accent6;
mso-themeshade:128'><span style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><b><u><span lang=ES style='font-size:10.0pt;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>ACOMPAÑAMIENTO:</span></u></b><span
lang=ES style='font-size:10.0pt;mso-bidi-font-family:Calibri;mso-bidi-theme-font:
minor-latin'> El Cliente podrá contratar un servicio de acompañamiento para
movilizar sus pertenencias. Este servicio será prestado por personal de la
Empresa o por un tercero a solicitud del Cliente. Dicha contratación será a
exclusivo cargo y riesgo del Cliente que contrate el servicio. <b>SEGURIDAD
FORTRESS SA </b>no tendrá responsabilidad alguna durante el período de
contratación de dicho servicio fuera de la sede. <span style='color:#385623;
mso-themecolor:accent6;mso-themeshade:128'><o:p></o:p></span></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:normal;mso-list:l35 level1 lfo20'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><b><u><span lang=ES style='font-size:10.0pt;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:black;
mso-themecolor:text1'>NOTIFICACION DE INGRESO A BÓVEDA:</span></u></b><b><span
lang=ES style='font-size:10.0pt;mso-bidi-font-family:Calibri;mso-bidi-theme-font:
minor-latin;color:black;mso-themecolor:text1'> SEGURIDAD FORTRESS SA </span></b><span
lang=ES style='font-size:10.0pt;mso-bidi-font-family:Calibri;mso-bidi-theme-font:
minor-latin;color:black;mso-themecolor:text1'>pone a disposición de los
clientes el servicio de aviso de ingreso a Bóveda, el cual será mediante el
envío de un e-mail a la dirección electrónica informada por el titular
(Cliente), informando fecha, hora y persona que ha ingresado al recinto de
Bóveda. Este servicio tendrá un costo adicional fijado en la Ficha 003.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpLast style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:normal;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;mso-bidi-font-family:Calibri;mso-bidi-theme-font:
minor-latin;color:black;mso-themecolor:text1'>CONTADOR DE DINERO:</span></u></b><b><span
lang=ES style='font-size:10.0pt;mso-bidi-font-family:Calibri;mso-bidi-theme-font:
minor-latin;color:black;mso-themecolor:text1'> </span></b><span lang=ES
style='font-size:10.0pt;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black;mso-themecolor:text1'>Las salas de reuniones y boxes, podrán </span><span
lang=ES style='font-size:10.0pt;mso-bidi-font-family:Calibri;mso-bidi-theme-font:
minor-latin'>contar con máquinas contadoras de dinero. Según criterio y
disponibilidad aleatoria de <b>SEGURIDAD FORTRESS SA.</b> El uso de éstas es a
riesgo exclusivo del Cliente y/o usuarios. FORTRESS en ninguna circunstancia
garantiza su disponibilidad, su exactitud ni es responsable de uso de éstas.<u><o:p></o:p></u></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b
style='mso-bidi-font-weight:normal'><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
Calibri;mso-bidi-theme-font:minor-latin'>V. DE LOS VALORES.<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;background:yellow;mso-highlight:yellow'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><b><u><span lang=ES style='font-size:10.0pt;
line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
background:yellow;mso-highlight:yellow'>EL MONTO DEL CONTRATO</span></u></b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;background:yellow;mso-highlight:yellow'>: </span></u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin;background:yellow;mso-highlight:yellow'>El
monto del contrato de Locación de Caja de Seguridad quedará establecido según
el monto pactado en la cláusula PRIMERA del Contrato que suscribirán el Locador
y cada Locatario. Tal monto comprenderá todo el período de locación y se
abonará por anticipado en el momento de suscribir el Contrato de Locación de
Caja de Seguridad para aquellos períodos inferiores a un año. Para abonos
anuales, el cliente podrá optar por diferentes medios de pago que están
vigentes al momento de la contratación, como así también la frecuencia de
cobro, la cual será trimestral salvo que se opte por pago adelantado.<u><o:p></o:p></u></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>SERVICIOS</span></u></b><u><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>:</span></u><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>
De acuerdo con las características de cada locación, el Locatario y/o los
autorizados podrán disponer de los servicios adicionales prestados por la
Locadora dentro del local de <b>SEGURIDAD FORTRESS SA </b>con determinados
descuentos o condiciones especiales según acuerdos y promociones vigentes.<u><o:p></o:p></u></span></p>

<p class=MsoListParagraphCxSpLast style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>LISTA DE PRECIOS</span></u></b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>: </span></u><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>Las
listas de precios locativos y de los servicios adicionales pueden variar
periódicamente. Tal actualización queda bajo exclusiva disposición del cliente
y será correspondientemente informada en el local de <b>SEGURIDAD FORTRESS SA</b>.<u><o:p></o:p></u></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b
style='mso-bidi-font-weight:normal'><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b
style='mso-bidi-font-weight:normal'><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
Calibri;mso-bidi-theme-font:minor-latin'>VI. DE LAS RESTRICCIONES.<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ES style='font-size:10.0pt;
line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black;mso-themecolor:text1'>El Locatario NO podrá designar a más de dos
(2) personas como autorizados en Cajas de uso Personal y de cuatro (4) en Cajas
de uso Comercial.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ES style='font-size:10.0pt;
line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;
color:black;mso-themecolor:text1'>NO podrán acceder más de dos (2) personas de
manera conjunta a la Bóveda. En caso de acceder dos personas a la misma zona de
máxima seguridad, una de ella deberá esperar en el box asignado.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>No se podrá acceder a la Caja de Seguridad
fuera de los horarios habituales, ni acompañado por personas no autorizadas.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>No se podrán guardar en la Caja de Seguridad
bienes peligrosos, o fuera del comercio, o prohibidos por cualquier ley
aplicable. Tampoco podrán exceder en valor los importes consignados.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>Los boxes no se podrán usar más de veinte (20)
minutos por ingreso.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpLast style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;line-height:115%'><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b
style='mso-bidi-font-weight:normal'><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;
mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
Calibri;mso-bidi-theme-font:minor-latin'>VII. DE LOS DERECHOS DE <span
style='mso-bidi-font-weight:bold'>SEGURIDAD FORTRESS SA.</span><o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>DERECHO DE INSPECCION:</span></u></b><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'> El Locador podrá ejercer el derecho de
inspección en todos aquellos casos en los que quiera constatar el cumplimiento
electivo de la prohibición de guardar cosas dañadas, peligrosas o de tráfico
prohibido en la República Argentina. Dicha inspección se debe realizar con la
presencia del Locatario o Escribano Público en caso de negativa o ausencia del
Locatario luego de haber sido notificado fehacientemente.<u><o:p></o:p></u></span></p>
<p class=MsoListParagraphCxSpFirst style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'>&nbsp;</p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>RETIRO DE BIENES:</span></u></b><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'> El Locador presta al Locatario las garantías
de clausura y conservación de la Caja, salvo caso fortuito o fuerza mayor, pero
no responde por los objetos que ella contenga en cuanto a la naturaleza,
cantidad demerito, valor, etc., y su conservación, cuidado y retiro corresponde
al Titular. La falta de pago de la locación, la falta de devolución de las
llaves al vencimiento del plazo locativo y cualquier otro incumplimiento del
Locatario no terminado en el plazo de 20 días hábiles de notificado a tal
efecto, producirá <i style='mso-bidi-font-style:normal'>ipso iure </i>la
rescisión del contrato pudiendo el Locador hacer uso de su derecho aquí
establecido y abrir la Caja con intervención de escribano público, inventariar
su contenido y ponerlo a disposición del Locatario durante el termino de 30
días, vencido los cuales podrá subastarlo para cobrarse lo que sea debido,
intimando al Locatario a la recepción del saldo, si es que lo hubiere. Si el
Locatario no retirase los bienes remanentes, el Locador podrá destruirlos, con
cargo al Locatario. En caso de fallecimiento, incapacidad o interdicción civil
o comercial, el Locador no podrá ejercer de este derecho y la caja no podrá
abrirse sino por orden judicial.<u><o:p></o:p></u></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol'><span style='mso-list:Ignore'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><b><u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>MODIFICACION</span></u></b><u><span lang=ES
style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>:</span></u><span lang=ES style='font-size:
10.0pt;line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>
El Locador tiene el derecho de modificar y/o actualizar el reglamento cuando
este lo estime necesario. Un ejemplar del nuevo reglamento estará disponible en
cada local <b>SEGURIDAD FORTRESS SA.</b> El Locatario se compromete a través
del Contrato de Locación de caja de Seguridad a anoticiarse del contenido de
cada nuevo reglamento y aceptar acatar sus nuevas disposiciones.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:10.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph;text-indent:0cm;line-height:115%;mso-list:l7 level1 lfo22'><![if !supportLists]><span
lang=ES style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:#385623;mso-themecolor:accent6;
mso-themeshade:128'><span style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><b><u><span lang=ES style='font-size:10.0pt;
line-height:115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>FORZAMIENTO
DE LA CAJA</span></u></b><u><span lang=ES style='font-size:10.0pt;line-height:
115%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>:</span></u><span
lang=ES style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'> El Cliente acepta que, en caso de necesidad
de forzamiento de la caja, el plazo de espera mínimo será de 3 horas para el
pedido de forzamiento urgente y de 24 horas en caso de <span style='color:black;
mso-themecolor:text1'>pedido de forzamiento normal. El forzamiento puede ser
solicitado por el cliente titular únicamente mediante el formulario establecido
para dicho fin, el forzamiento deber ser realizado en presencia de un
funcionario de <b>SEGURIDAD FORTRESS SA</b>, el cliente y un escribano público,
salvo los casos establecidos en el punto VII de este mismo Reglamento.</span><span
style='color:#385623;mso-themecolor:accent6;mso-themeshade:128'><o:p></o:p></span></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En caso de
robo o extravió de las llaves de apertura del cofre, debe presentarse la
denuncia policial correspondiente. El forzamiento tendrá un costo adicional
según las tarifas vigentes al momento de hecho y estarán a cargo del Locatario.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><b style='mso-bidi-font-weight:normal'><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>VIII. DE LOS LÍMITES DE RESPONSABILIDAD<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><b><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>SEGURIDAD
FORTRESS SA </span></b><span lang=ES style='font-size:10.0pt;line-height:107%;
mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>ignora el
contenido de las Cajas y no responde por él, salvo culpa grave o dolo de sus
dependientes que causaren directamente un daño al contenido. <b>SEGURIDAD
FORTRESS SA </b>ha adoptado todos los recaudos en orden el cumplimiento de su
deber de seguridad. En tanto mantenga esos recaudos, <b>SEGURIDAD FORTRESS SA </b>en
ningún caso responderá por daños en el contenido causados por hechos
provenientes de caso fortuito o fuerza mayor.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><b style='mso-bidi-font-weight:normal'><span
lang=ES style='font-size:10.0pt;line-height:107%;mso-bidi-font-family:Calibri;
mso-bidi-theme-font:minor-latin'>IX. PERSONAS POLÍTICAMENTE EXPUESTAS (<span
class=SpellE>PEP´s</span>) </span></b><span lang=ES style='font-size:10.0pt;
line-height:107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0cm;margin-right:29.5pt;
margin-bottom:8.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;
text-justify:inter-ideograph'><span lang=ES style='font-size:10.0pt;line-height:
107%;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>Aquellas
personas que según lo establecido por la <a name="_Hlk28253021">resolución
52/2012 de la UIF </a>sean consideradas <b>Personas Políticamente Expuestas (<span
class=SpellE>PEP´s</span> <span class=SpellE>Politically</span> Exponed People)</b>
deberán completar la correspondiente DDJJ de <span class=SpellE>PEP´s</span>.
(Anexo D-001)<o:p></o:p></span></p>

<p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      <div class="row section" style="margin-top:-1rem">
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
          
          <div class="row section" style="margin-top:-1rem">
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


        
        
         
    </div><!--.me-->
  </header>
</div><!--.notec001-->

	<div style="width:100%; border-top:dashed 1px;margin-top:10mm;margin-bottom:10mm" > </div>
	
</page>	
   