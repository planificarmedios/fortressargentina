<?php
session_start();
ob_start();

if (isset($_GET['id'])) {$i = $_GET['id']; }
		
            include_once ("../../callAPI.php");
			include_once ("../../parametros.php");
			include_once ("../user/fechaNumber.php");
			$get_data = callAPI('GET', $servidor.'/api/clientes/'.$i,false);
			$response = json_decode($get_data, true);
			foreach ($response as $d) {
			?>
						
            <html xmlns="http://www.w3.org/1999/xhtml"> 
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>REPORTE</title>
                <link rel="stylesheet" type="text/css" href="../../assetsOr/css/laporan.css" />
            </head>
            <body>
            
               
            <h3 style="color:#03F" align="center">&nbsp;</h3>
           
           <?php if ($d['tipo_documento'] == 1) { $doc = 'DNI'; } elseif ($d['tipo_documento'] == 2) {
			   $doc = 'CUIL'; } elseif ($d['tipo_documento'] == 3) { $doc = 'CUIT'; }
			?>
               
            <p align="justify">
            Los que suscriben, por un lado <strong> <?php echo $d['nombre'].' '.$d['apellido'] ; ?> </strong> con  
            <strong> <?php echo $doc.': '.$d['dni'] ; ?> </strong></u>
            nacido el .........<strong> <?php echo  fechaNumber($d['fecha_nacimiento']) ; ?> </strong>......... 
            con domicilio en <strong> <?php echo $d['dommicilio'] ; ?> </strong> 
            Teléfono .........<strong> <?php echo  $d['tel_fijo'] ; ?> </strong>......... 
            Teléfono Personal .........<strong> <?php echo  $d['telefono_movil'] ; ?> </strong>......... 
            y en su carácter de Usuario que reviste la forma de operar <strong> Indistinta o Conjunta; </strong> y por el otro 						lado <strong> Fortress Argentina </strong> , convienen en celebrar el presente de uso que tiene por objeto establecer las modalidades operativas y las disposiciones que regirán el funcionamiento y usos de las Cajas de Seguridad FORTRESS, así como determinar los derechos y obligaciones de las partes contratantes en el alquiler de los espacios de guarda, formando parte integral del Contrato de Servicio de Caja de Seguridad.</p> 
               
            <p align="left"><u><strong> I.	DE LA CAJA DE SEGURIDAD</strong></u></p>
            <p></p>
            <p align="justify">
            <strong>•	DESCRIPCION: </strong> La CAJA DE SEGURIDAD es el espacio de guarda de bienes que SEGURIDAD FORTRESS S.A en adel&lt;oante denominado ¨FORTRESS¨ y/o la ¨PRESTADORA¨, pone a disposición de cada USUARIO en adelante USUARIO y/o CLIENTE. FORTRESS dispone de varios tipos de Cajas de Seguridad, cuyas características pueden variar en cuanto a acceso y medidas. Las particularidades de cada Caja de Seguridad puesta a disposición de un usuario se explicitan en la Ficha 003 que se adjunta a cada Contrato de Servicio que se suscriba con cada usuario y en los términos y condiciones que surgirán de cada Contrato y del presente Reglamento.</p>

   </body>
</html>
<?php 
}