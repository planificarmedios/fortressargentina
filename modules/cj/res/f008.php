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
    				CIERRE DE CAJA DE SEGURIDAD </br> DEVOLUCIÓN DE LLAVES.
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
                            <strong> Inicio de contratación: </strong> <?php echo $fi; ?> <br>
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
        mso-bidi-theme-font:minor-latin'>En la Ciudad de Mar del Plata, a los ................... del mes de ............................................ del año ...........,  
        con motivo de haber decidido cancelar la locación de la Caja de Seguridad detallada previamente, .............. (SI/NO) hago entrega a Uds. de las llaves correspondientes. dejando expresa constancia que la caja mencionada se encuentra vacía 
        y además en este mismo acto .............. (SI/NO) hago entrega a Uds. de las llaves correspondientes. </br></br></br> Saludo a Uds. muy atentamente, <o:p></o:p></span></p> 
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
   