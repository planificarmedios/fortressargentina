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
    				REGISTRO DE ACCESO A CAJA</br>
    </h1>
 
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  
  		<div class="row section" style="margin-top:-1rem">
            <div class="col-1">
                <table style='width:100%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="100%" >A. DATOS DE LA CAJA</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                        	<br>
                          <?php
                          if ($alias == null or $alias  == '') {
                                  $CLIENTE = $nombre. ' '.$apellido ;
                          } else {
                                  $CLIENTE = $alias ;
                          }
                          ?>

                          <p><strong> Titular / Alias: </strong> <?php echo $CLIENTE; ?><br>
                            <strong> Caja : </strong> <?php echo $serie; ?> 
                            <strong> Tipo de Uso: </strong> <?php echo $tu; ?> <strong> Frecuencia de Uso: <?php if ($tu == 'Personal') { echo 4; } else { echo  8; }?> mensuales.
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
                      <th width="100%" >B. DATOS DEL ASISTENTE</th>
                     </tr> 
                    </thead>
                  <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="100%" style="text-align:left">
                        <blockquote>
                          <p><br>
                          <?php
                          if ($alias_asist == null or $alias_asist  == '') {
                                  $CLIENTE_asist = $nombre_asist. ' '.$apellido_asist ;
                          } else {
                            $CLIENTE_asist = $alias_asist ;
                          }
                          ?>
                            <strong> Asistente / Alias: </strong> <?php echo $CLIENTE_asist?> 
                            <strong> Tipo: </strong><?php echo $doc. ' '; ?> <strong> Nro. Doc: </strong> <?php echo $nro_doc_asist. ' '; ?>   <br>
                            <br>
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
ciudad de Mar del Plata, a los …… del mes …………………………………………  del año …………… </span> <o:p></o:p></span></b></p>
          
       
      <div class="row section" align="left">
            <div class="col-1">
                <table style='width:60%'>
                    <thead contenteditable>
                    <tr class="invoice_detail">
                      <th width="60%" >FIRMA Y ACLARACIÓN DEL CLIENTE</th>
                     </tr> 
                    </thead>
                   <tbody contenteditable>
                    <tr class="invoice_detail">
                      <td width="60%" style="text-align:left">
                        <blockquote>
                          <p>
                          <p>&nbsp;</p>
                            <p>&nbsp;</p>
                         </p>
                        </blockquote>
                    </tr>
                </table>

       </div><!--.row-->
           
    </div><!--.me-->
  </header>
</div><!--.notec001-->
</page>	
   