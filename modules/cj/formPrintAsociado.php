<?php

if (isset($_POST['imprimir'])) 
{
		
  $nrocaja = $_POST['nrocaja'];
  $idcaja = $_POST['idcaja'];
  $idasociado = $_POST['idasociado'];
  $serie = $_POST['serie'];
  $idtitular = $_POST['idtitular'];	
  $idservicio = $_POST['idservicio'];
  $impresiones = $_POST['impresiones'];
  

    include_once ("../../callAPI.php");
    include_once ("../../parametros.php");
    include_once ("fechaNumber.php");
    include_once ("NumeroAletras.php");

      
        $get_data = callAPI('GET', $servidor.'/api/clientes/'.$idasociado,false);
        $response = json_decode($get_data, true);
        foreach ($response as $r) {
          $idcliente = $r['id'];
          $nombre = $r['nombre'];
          $USRID = $r['USRID'];
          $apellido = $r['apellido'];
          $fn = substr($r['fecha_nacimiento'], 0,10); 
          $telm = $r['telefono_movil'];
          $email = $r['email'];
          $telf = $r['tel_fijo'];
          $dom = $r['dommicilio'];
          $doc = $r['tipo_documento'];
          $nro_doc = $r['dni'];
          $cp = $r['cp'];
          $tipo_iva = $r['condicion_iva'];
          $alias = $r['alias'];
		  $estado_civil = $r['estado_civil'];
  		  $nombre_apell_matrimonio= $r['nombre_apell_matrimonio'];
		  $dni_matrimonio= $r['dni_matrimonio'];	
			
        }

        if ($doc ==1){
          $doc = 'DNI';
        } elseif ($doc ==2) {
            $doc = 'CUIL';
        } elseif ($doc==3){
            $doc = 'CUIT';
        }
            
        $get_data = callAPI('GET', $servidor.'/api/ciudades/',false);
        $response = json_decode($get_data, true);
        foreach ($response as $g) {
              
            
            if  ($cp == $g['cp']) {
                $cp3 = $g['cp'];
                $l = $g['localidad']; 
                $p = $g['provincia'];  
            }
        }

       $get_data = callAPI('GET', $servidor.'/api/cajaId/'.$idcaja,false);
					$response = json_decode($get_data, true);
					foreach ($response as $r) {
						$id = $r['id'];
            $serie = $r['serie'];
            
						$tipocaja = $r['tipocaja'];
						$f_inicio = $r['f_inicio'];
						$f_final = $r['f_final'];
						$fi_original =  $r['f_inicio'];
						$ff_original =  $r['f_final']; 
					    $tipo_uso =  $r['tipo_uso'];
                       
            
                if ($tipo_uso == true) { 
                  $tu = 'Comercial'; 
                } else {
                  $tu = 'Personal'; 
                };
          
          }
          
        
        
         $get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
                  $response = json_decode($get_data, true);
                  foreach ($response as $t) {
                           if ($idservicio == $t['id']) {
                                $descripcion2 = $t['descripcion'];
                                $precio = $t['precio'];
                           }
          }
	
				if ($estado_civil == 1) { 
						$estado_civil = 'Soltero'; 
						} elseif ($estado_civil == 2) { 
							$estado_civil = 'Casado con ' . $nombre_apell_matrimonio . ' Doc.: ' . $dni_matrimonio;
						} elseif ($estado_civil == 3) {
							$estado_civil = 'Viudo';
						} elseif ($estado_civil == 4) {
							$estado_civil = 'Unión de Convivencia con '. $nombre_apell_matrimonio . ' Doc.: ' . $dni_matrimonio;
						} elseif ($estado_civil == 5) {
							$estado_civil = 'En pareja ';
						} elseif ($estado_civil == 6) {
							$estado_civil = 'No indica ';
						} else {
							$estado_civil = '';
				}
         
   		  $fi = fechaNumber(substr($r['f_inicio'], 0,10));
          $ff = fechaNumber(substr($r['f_final'], 0,10));
		 	
        
          for ($n=0;$n<count($impresiones);$n++)  
          {     
              if ($impresiones[$n] == "c000" ) 
              { 
                include_once "res/r001.php";
                include_once "res/f001asoc.php"; 
                //include_once "res/f005.php";
                include_once "res/d001.php"; 
				include_once "res/r002.php";  
              
              } else {
              
                if ($impresiones[$n] == "r001" ) { include_once "res/r001.php"; }
                if ($impresiones[$n] == "r002" ) { include_once "res/r002.php"; } 
                if ($impresiones[$n] == "f001asoc" ) { include_once "res/f001asoc.php"; } 
                if ($impresiones[$n] == "f005" ) { include_once "res/f005.php"; }
                if ($impresiones[$n] == "d001" ) { include_once "res/d001.php"; }
              
              }
          } 
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="sales_invoice/assets/css/main.css">
</head>

<body>
<div class="control-bar">
<div class="container">
  <div class="row">
    <div class="col-2-4">
    
      </div>
  
    <div class="col-4 text-right">
      <a href="javascript:window.print()">Imprimir</a>
      <a href="javascript:history.back()">Volver</a>
    </div><!--.col-->
  </div><!--.row-->
</div><!--.container-->
</div><!--.control-bar-->
</div><!--.row-->
<?php  
}
?>

</body>
</html>