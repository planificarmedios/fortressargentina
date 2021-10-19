<style type="text/css">
<!--
table {
    vertical-align: top;
}

tr {
    vertical-align: top;
}

td {
    vertical-align: top;
}

.text-center {
    text-align: center
}

.text-right {
    text-align: right
}

table th,
td {
    text-align: center;
    font-size: 11px;
    padding: 1;
}

.detalle td {
  padding: 1;
}

.border-bottom {
    border-bottom: solic 1px #bdc3c7;
}


h1 {
    page-break-before: always;
}

-->
</style>

<header class="row">
<h1 align="center"contenteditable>
<img align="left"style="width:30%"src="sales_invoice/assets/img/logo.png"></br></br>
TARIFARIO DE CAJAS Y SERVICIO OFRECIDOS (ANEXO III)</br></h1><p>&nbsp;
</p><p>&nbsp;</p>
<strong><p>LOS PRECIOS EXPRESADOS EN LA PRESENTE LISTA INCLUYEN IVA</p></strong>
<p>&nbsp;</p>
<body><center><table border="1"cellpadding="0"cellspacing="0"width="630"style="border-collapse:
collapse;
table-layout:fixed;
width:473pt;
mso-padding-bottom-alt:0cm;
mso-padding-left-alt: 0cm;
mso-padding-right-alt:0cm;
mso-padding-top-alt:0cm;
mso-yfti-tbllook:1184">

<?php 
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
$get_data=callAPI('GET', $servidor.'/api/servicios/adicionales', false);
$response=json_decode($get_data, true);

      echo "
      <section class='content'>
        <div class='row'>
          <div class='col-md-12'>
              <div class='box box-default' style='color:#000'>
              <div class='box-body'>
                <table border=1 bordercolor='#000000' id='dataTables1' class='table table-bordered table-striped table-hover'>
                  <thead>
                    <tr  border=1 bordercolor='#000000'>
                      <th class='center'>Nombre</th>
                      <th class='center'>Tipo Uso</th>
                      <th class='center'>Mensual Contrat. Anual</th>
                      <th class='center'>Mensual Contrat. Semestral</th>
                      <th class='center'>Mensual Contrat. Trimestral</th>
                      <th class='center'>Mensual Contrat. Mensual</th>
                      <th class='center'>Mensual Gold</th>
                      <th class='center'>% Notif. Ingreso a Caja</th>
                    </tr>
                  </thead>
                  <tbody>
      ";

      foreach ($response as $d) {

        if ($d['tipo_servicio'] == 5 ) { 

			  $id = $d['id'][0];
			  $servicio = $d['nombre'][0]; 
			  $descripcion = $d['descripcion']; 
              $precio = $d['precio'];
              $precio_anual = $d['precio'];
              $precio_anual_for = number_format($precio_anual, 2,',', '.');
              $coef_comercial  = $d['coef_comercial'];
              $coef_mensual  = $d['coef_contr_mensual'];
              $coef_trim = $d['coef_contr_trim'];
              $coef_semestral = $d['coef_contr_semestral'];
              $coef_gold = $d['coef_gold'];
              $coef_notificacion = $d['coef_notificacion'];
              $precio_for = number_format($precio, 2,'.', '');

              $coef_comercial_for = number_format($coef_comercial, 2,'.', '');
              $coef_mensual_for = number_format($coef_mensual, 2,'.', '');
              $coef_trim_for = number_format($coef_trim, 2,'.', '');
              $coef_semestral_for = number_format($coef_semestral, 2,'.', '');
              $coef_gold_for = number_format($coef_gold, 2,'.', '');
              $coef_notificacion_for = number_format($coef_notificacion, 2,'.', '');
			  $intervalo= $d['intervalo'][0];
			  $tipo_servicio= $d['tipo_servicio'];
			  $tp = "Sala"; 
              $abono_mensual = $precio_for * $coef_mensual_for;
              $abono_mensual = number_format($abono_mensual, 2,',', '.');
              $abono_trimestral = $precio_for * $coef_trim_for;
              $abono_trimestral = number_format($abono_trimestral, 2,',', '.');
              $abono_semestral =$precio_for * $coef_semestral_for; 
              $abono_semestral = number_format($abono_semestral, 2,',', '.');
			
                      echo "<tr>
                      <td width='15%' color:'blue'  class='center'>$servicio</td>
                      <td width='8%'  class='center'>Personal</td>
                      <td width='12%'  class='center'>$ $precio_anual_for</td>
                      <td width='12%'  class='center'>$ $abono_semestral</td>
                      <td width='12%'  class='center'>$ $abono_trimestral</td>
                      <td width='12%'  class='center'>$ $abono_mensual</td>
                      <td width='10%'  class='center'>$coef_gold_for % </td>
                      <td width='12%'  class='center'>$coef_notificacion_for % </td>
                      </tr>";

                      $precio_comercial = $precio_for * $coef_comercial_for ;
                      $precio_comercial_for = number_format($precio_comercial, 2,',', '.');
                      $abono_mensual_comercial = $precio_for * $coef_mensual_for * $coef_comercial_for ;
                      $abono_mensual_comercial = number_format($abono_mensual_comercial, 2,',', '.');
                      $abono_trimestral_comercial = $precio_for * $coef_trim_for * $coef_comercial_for ;
                      $abono_trimestral_comercial = number_format($abono_trimestral_comercial, 2,',', '.');
                      $abono_semestral_comercial =$precio_for * $coef_semestral_for * $coef_comercial_for ; 
                      $abono_semestral_comercial = number_format($abono_semestral_comercial, 2,',', '.');

                      echo "<tr>
                      <td width='15%'  class='center'>$servicio</td>
                      <td width='8%'  class='center'>Comercial</td>
                      <td width='12%'  class='center'>$ $precio_comercial_for</td>
                      <td width='12%'  class='center'>$ $abono_semestral_comercial </td>
                      <td width='12%'  class='center'>$ $abono_trimestral_comercial</td>
                      <td width='12%'  class='center'>$ $abono_mensual_comercial</td>
                      <td width='10%'  class='center'>$coef_gold_for % </td>
                      <td width='12%'  class='center'>$coef_notificacion_for % </td>
                      </tr>";


            }
        	}
 ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>   
</section>



<p>&nbsp;</p>
<p>&nbsp;</p>

<table border="1" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
    <col class="col0">
    <col class="col1">
    <col class="col2">
    <tbody>

    <?php 
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
$get_data=callAPI('GET', $servidor.'/api/servicios/adicionales', false);
$response=json_decode($get_data, true);

      echo "
      <section class='content'>
        <div class='row'>
          <div class='col-md-12'>
              <div class='box box-default' style='color:#000'>
              <div class='box-body'>
                <table border=1 bordercolor='#000000' id='dataTables1' class='table table-bordered table-striped table-hover'>
                  <thead>
                    <tr  border=1 bordercolor='#000000'>
                      <th class='center'>Servicio </th>
                      <th class='center'>Descripción </th>
                      <th class='center'>Costo del Servicio</th>
                      <th class='center'>Tipo de Uso</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
      ";

      foreach ($response as $d) {

        if (($d['tipo_servicio'] == 1) or ($d['tipo_servicio'] == 1003))  { 
          
          if ($d['tipo_servicio'] == 1) {
            $evento = 'Por hora'; 
          } else {
              $evento = 'Por suceso'; 
          };
          
          $precio = $d['precio'];
          $precio_for = number_format($precio, 2,',', '.');
         
      ?>    
        <tr class="row0">
            <td class="column0 style2 s"><?php echo $d['nombre'][0]; ?> </td>
            <td class="column1 style2 s"><?php echo $d['descripcion']?> </td>
            <td class="column2 style4 n">$<?php echo $precio_for?> </td>
            <td class="column2 style4 n"> <?php echo $evento?> </td>
        </tr>
      <?php
      }
      }  
     ?>
    </tbody>
</table>


</body>

</div>
<!--.row-->
<p>&nbsp;</p>
<p>&nbsp;</p>



<div class="row section" style="margin-top:-1rem">
    <div class="col-1">
        <table style='width:100%'>
            <thead contenteditable>
                <tr class="invoice_detail">
                    <th width="100%">Formas y condiciones de pago</th>
                </tr>
            </thead>
            <tbody contenteditable>
                <tr class="invoice_detail">
                    <td width="100%" style="text-align:left">
                        <blockquote>
                            <p><br>

                                <strong> Contratación con renovación automática anual, semestral, trimestral o mensual 
                                con pago mensual adelantado sólo por débito automático por tarjeta de crédito<br>
                               


                            </p>
                        </blockquote>
                </tr>
            </tbody>
        </table>
    </div>
    <!--.row-->
    <p>&nbsp;</p>
   
    <p class=MsoNormal style='margin-top:0cm;margin-right:29.5pt;margin-bottom:
8.0pt;margin-left:21.3pt;text-align:justify;text-justify:inter-ideograph'><b><span lang=ES style='font-size:10.0pt;line-height:107%;mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin'>En la
                ciudad de Mar del Plata, a los …… del mes ……………………………… del año …………… </span>
            <o:p></o:p></span>
        </b></p>

 
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
                      <th width="50%" >FIRMA TITULAR</th>
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

        </div>
        <!--.me-->
        </header>
    </div>
    <!--.notec001-->


    </page>