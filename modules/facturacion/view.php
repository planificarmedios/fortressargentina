<section class="content-header" style="color:#003">
  <h1>     <i class="fa fa-lock icon-title"></i> Informe de Cajas para Facturación
   <a class="btn btn-success btn-social pull-right"  href="modules/facturacion/exportData.php"  title="Facturación" data-toggle="tooltip">
      <i class="fa fa-file-excel-o"></i> Descargar Archivo csv
    </a>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php 
	 

    if (empty($_GET['alert'])) {echo ""; } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Almacenado correctamente!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> 
              Modificado correctamente!
              </h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 4)  {
      
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i>
              <strong>Caja actualizada  a Disponible!!!!!</strong> Hay clientes en espera para este tipo de cajas
              <a href='?module=consultas' class='alert-link'>Consultar</a>
              </i> 
              </h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-warning alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> 
              Caja actualizada sin Clientes en espera de disponibilidad !
              </h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Eliminado correctamente!</h4>
            </div>";
    }
    ?>

      <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:black"  border=1 bordercolor="#000000">
                
                
                <th class="center"># Caja</th>
                <th class="center">Caja</th>
                <th class="center">Titular</th>
                <th class="center">Precio</th>
                <th class="center">Cf/uso</th> 
                <th class="center">Imp s/uso</th>
                <th class="center">Tmpo. Contrato</th>
                <th class="center">Cf/tmpo</th> 
                <th class="center">Imp s/tmpo</th>
                <th class="center">Notif</th>
                <th class="center">Cf.Notif.</th>
                <th class="center">Cb.Gold</th>
                <th class="center">Cf.Gold</th>
                <th class="center">ABONO MENSUAL</th>
                <th class="center">Modificado</th>
               
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
		  include_once ("fechaNumber.php");
	      $get_data = callAPI('GET', $servidor.'/api/cajas/consultaOcupadas',false);
		  $response = json_decode($get_data, true);
		  
		
			 foreach ($response as $d) {
       
				      $id = $d['id'];
              $nrocaja = $d['nro_caja'];
              $precio = $d['precio'];
              $id_servicio = $d['id_servicio'];
              $precio_for = number_format($precio, 2,'.', '');
						  $serie = $d['serie'];
              $tipocaja = $d['tipocaja'];
              $periodo_contratacion = $d['periodo_contratacion'];
              $cobertura_gold = $d['cobertura_gold'];
              
              $id_cliente = $d['id_cliente'];
              $ingreso_boveda = $d['ingreso_boveda'];

              if ($ingreso_boveda==1){
                  $ib = 'SI';
              } else {
                $ib = ''; 
              }

              if ($cobertura_gold==1){
                $cg = 'SI';
              } else {
                $cg = ''; 
              }

              $tipo_uso = $d['tipo_uso'];
              $ultima_modificacion = fechaNumber($d['ultima_modificacion']);
						  $nombre = $d['nombre']; 
						  if (($d['id_cliente']) > 1 and ($d['status']==1)) {
							  $s = 'Activo';
						  } elseif (($d['id_cliente']) > 1 and ($d['status']==0)) {
						     $s = 'Inactivo';
						  } elseif (($d['id_cliente'])== 0 and ($d['status']==0)) {
							  $s = '';
						  }
						  
						  $apellido = $d['apellido']; 
              $f_inicio = $d['f_inicio'];
						  $f_final  = $d['f_final'];
						  $f_inicio = fechaNumber($f_inicio); 
							$f_final = fechaNumber($f_final);	
              
              $cliente = $nombre.' '.$apellido;
              if ($id_cliente == 0) 
              {
                $m = 'Disponible'; $color = "#00993"; 
                $f_inicio = '';
                $f_final  = '';
              } else {
                $m = $id_cliente;
              };

              $get_data=callAPI('GET', $servidor.'/api/servicios/adicionales', false);
              $response=json_decode($get_data, true);
              foreach ($response as $a) {
                if ($id_servicio == $a['id'][0]) {
                  $precioxxx = $a['precio'];
                  $coef_comercial = $a['coef_comercial'];
                  $coef_notificacion = $a['coef_notificacion'];
                  $coef_gold = $a['coef_gold'];
                 
                  $coef_uso = $tipo_uso * $coef_comercial;
                  
                  if ($coef_uso == 0) {
                    $abono_uso = $precioxxx; 
                  } else {
                    $abono_uso = $precioxxx * $coef_uso;
                  } 

                  if ($periodo_contratacion == 1) {
                    $pc = 'Anual';
                    $coef_tmpo = 1;
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual* $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }
                  } elseif ($periodo_contratacion == 2) {
                    $pc = 'Semestral';
                    $coef_tmpo = $a['coef_contr_semestral'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }
                  } elseif ($periodo_contratacion == 3) {
                    $pc = 'Trimestral';
                    $coef_tmpo = $a['coef_contr_trim'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == true){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }

                  } elseif ($periodo_contratacion == 4) {
                    $pc = 'Mensual';
                    $coef_tmpo = $a['coef_contr_mensual'];
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = $abono_mensual * $coef_cob_gold ;
                    } else {
                      $importe_mensual = $abono_mensual;
                      $coef_cob_gold = 0;
                    }

                  } elseif ($periodo_contratacion == 5) {
                    $pc = 'Anual Adelantado';
                    $coef_tmpo = 0;
                    $abono_mensual = $abono_uso * $coef_tmpo;
                    $coef_notif_bobeda = $ingreso_boveda*$coef_notificacion;
                    if ($cobertura_gold == 1){
                      $coef_cob_gold =   $cobertura_gold*$coef_gold;
                      $importe_mensual = 0;
                    } else {
                      $coef_cob_gold = 0;
                      $importe_mensual = 0;
                    }
                  } 
                  
                      

                echo "<tr>
                  <td width='3%'  class='center'>$serie</td>
                  <td width='8%' class='center'>$tipocaja</td>
                  <td width='3%' class='center'>$id_cliente</td>
                  <td width='3%' class='center'>$ $precioxxx</td>
                  <td width='3%' bgcolor='#C5F0FB' class='center'>% $coef_uso</td>
                  <td width='3%' bgcolor='#C5F0FB' class='center'>$ $abono_uso</td>
                  <td width='6%' bgcolor='#FCD4CC' class='center'>$pc</td>
                  <td width='3%' bgcolor='#FCD4CC' class='center'>% $coef_tmpo</td>
                  <td width='3%' bgcolor='#FCD4CC' class='center'>$ $abono_mensual</td>
                  <td width='3%' bgcolor='#A9F5BC' class='center'>$ib</td>
                  <td width='3%' bgcolor='#A9F5BC' class='center'>% $coef_notif_bobeda</td>
                  <td width='3%' bgcolor='#CECEF6' class='center'>$cg</td>
                  <td width='3%' bgcolor='#CECEF6' class='center'>% $coef_cob_gold</td>
                  <td width='5%' bgcolor='#CECEF6' class='center'>$ $importe_mensual</td>
                  <td width='5%' class='center'>$ultima_modificacion</td>          
                </tr>";
                }
              }

            
          }    
		    ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content

