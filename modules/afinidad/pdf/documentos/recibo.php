<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	 ob_start();
	session_start();
	/* Connect To Database*/
	include("../../../cj - Copia/config/empresa.php");
	include("../../../cj - Copia/NumeroAletras.php");
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$cliente=strip_tags($_GET['cliente']);
	$forma_pago=intval($_GET['forma_pago']);
	$numero=intval($_GET['numero']);
	$monto=floatval($_GET['monto']);
	$concepto=strip_tags($_GET['concepto']);
	//Fin de variables por GET
	  // get the HTML
    
     include(dirname('__FILE__').'/res/recibo_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Recibo.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
