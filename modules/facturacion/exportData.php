<?php
// Decir a PHP que vamos generar un archivo que debe descargarse
include_once ("../../callAPI.php");
include_once ("../../parametros.php");
include_once ("../../fechaNumber.php");
$get_data = callAPI('GET', $servidor.'/api/cajas/consultaOcupadas',false);
$response = json_decode($get_data, true);


   foreach ($response as $data) {
    $records[] = $data;
    echo $data['serie'].",";
    //echo $data['id_cliente'].",";
    //echo $data['tipo_uso'].",";
    //echo $data['CLIENTE']."\n";

    




  }
$csv_file = 'Informe_de_Cajas_facturacion'.date('Ymd') .'.csv';
//header("Content-Type: text/csv");
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename=$csv_file");

/*
$fh = fopen( 'php://output', 'w' ); 
$is_coloumn = true;
if(!empty($records)) {
foreach($records as $record) {
if($is_coloumn) {
fputcsv($fh, array_keys($record));
$is_coloumn = false;
}
fputcsv($fh, array_values($record));
}
fclose($fh);
}
exit;*/

?>