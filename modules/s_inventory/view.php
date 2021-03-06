<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-calendar icon-title"></i> Reservas de la fecha

    <a class="btn btn-primary btn-social pull-right" href="modules/s_inventory/print.php" target="_blank">
      <i class="fa fa-print"></i> Imprimir
    </a>
  </h1>

</section>

<section class="content">
  <div class="row">
    <div class="col-md-13">

      <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">Sala</th>
                <th class="center">Cliente</th>
                <th class="center">Fecha Reserva</th>
                <th class="center">H Inicio</th>
                <th class="center">H Fin</th>
                <th class="center">Cod Reserva</th>
                <th class="center">Estado</th>
                 <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
		  $hoy = date("d/m/Y");
		  require_once("fechaCastellano.php");
		  require_once("fechaNumber.php");
          $get_data = callAPI('GET', $servidor.'/api/reservas/viewall/',false);
		  $response = json_decode($get_data, true);
		
		 foreach ($response as $d) {
				$fecha_reserva = $d['fecha_reserva']; 
				$ss = substr($fecha_reserva, 0,10);
						 
				if  ((fechaNumber($ss)) == $hoy){		  
						  $sala = $d['nombre']; 
						  $idInicio = $d['idInicio'];
						  $idFin = $d['idFin'];
						  $start = $d['start'];
						  $end = $d['end'];
						  $cliente= $d['apellido_nombre'];
						  $estado = $d['estado'];
						  $codigo = $d['codigo'];
						  if ($estado == '0'){$m = 'No Confirmado';}else {$m = 'Reservado';}
		   
              echo "<tr>
                      <td width='80'  class='center'>$sala</td>
					  <td width='180'  class='center'>$cliente</td>
                      <td width='100'  class='center'>"?> <?php echo fechaNumber($ss);?>
                      <?php echo "
                      </td>
                      <td width='50'  class='center'>$start</td>
                      <td width='50'  class='center'>$end</td>
                      <td width='180'  class='center'>$codigo</td>
                      <td width='80'  class='center'>$m</td>
					  
					  <td class='center' width='60'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Imprimir Detalle' style='margin-right:5px' class='btn btn-warning btn-sm' href='modules/s_inventory/printDetalle.php?&codigo=$codigo'><i style='color:#fff' class='glyphicon glyphicon-print'></i>
                          </a>";
                          ?>	
                          
                            <?php 
                            if ($estado == 1) { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/mm/proses.php?act=delete&codigo=<?php echo $codigo;?>" onclick="return confirm('Se eliminará la reserva código <?php echo $codigo; ?> ?');">
                            <i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>
                            <?php } else {  ?> 
                              <a data-toggle="tooltip" data-placement="top" title="No se puede eliminar una reserva confirmada" class="btn btn-default btn-sm" href="" onclick=""><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>	
                            <?php }?>

                        <?php
                        echo "    
                        </div>
                      </td>
                    </tr>";
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