<section class="content-header" style="color:#003">
  <h1> <i class="fa fa-calendar icon-title"></i> Historico de Reservas </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-13">
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
              <h4>  <i class='icon fa fa-check-circle'></i> Modificado correctamente!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
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
		  include_once ("parametros.php");
		  require_once("fechaCastellano.php");
		  require_once("fechaNumber.php");
          $get_data = callAPI('GET', $servidor.'/api/reservas/viewall/',false);
		  $response = json_decode($get_data, true);
				foreach ($response as $d) {
						  $sala = $d['nombre']; 
						  $fecha_reserva = $d['fecha_reserva']; 
						  $idInicio = $d['idInicio'];
						  $idFin = $d['idFin'];
						  $start = $d['start'];
						  $ss = substr($fecha_reserva, 0,10);
						  //fechaNumber($ss)
						  $end = $d['end'];
						  $cliente= $d['apellido_nombre'];
						  $estado = $d['estado'];
              $codigo = $d['codigo'];
              
						  if ($estado == '0'){$m = 'Cancelado';}else {$m = 'Reservado';}
		   
              echo "<tr>
                      <td width='80'  class='center'>$sala</td>
					            <td width='180'  class='center'>$cliente</td>
                      <td width='100'  class='center'>"?> <?php echo fechaNumber($ss);?>
                      <?php echo "
                      </td>
                      <td width='10%'  class='center'>$start</td>
                      <td width='10%'  class='center'>$end</td>
                      <td width='10%'  class='center'>$codigo</td>
                      <td width='15%'  class='center'>$m</td>
					            <td class='center' width='10%'>
                        <div>

                        <a data-toggle='tooltip' data-placement='top' title='Asistentes' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_mm&form=edit&codigo=$codigo'><i style='color:#fff' class='glyphicon glyphicon-user'></i></a>

                            
                        <a data-toggle='tooltip' data-placement='top' title='Imprimir Detalle' style='margin-right:5px' class='btn btn-primary btn-sm' href='modules/s_inventory/printDetalle.php?&codigo=$codigo'>
                              <i style='color:#fff' class='glyphicon glyphicon-print'></i>
                          </a>";
			if ($estado == 1 ) {			  
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/mm/proses.php?act=delete&codigo=<?php echo $codigo;?>" onclick="return confirm('Se eliminará la reserva código <?php echo $codigo; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php } else { ?>
            			   <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-success btn-sm" href="modules/mm/proses.php?act=delete&codigo=<?php echo $codigo;?>" onclick="return confirm('Se eliminará la reserva código <?php echo $codigo; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            
			<?php } 
              echo "    </div>
                      </td>
                    </tr>";
            }
		    ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content