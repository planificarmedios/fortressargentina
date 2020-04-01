<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-eye icon-title"></i> Ingreso por Detector Biométrico

    
  </h1>

</section>

<section class="content">
  <div class="row">
    <div class="col-md-13">
    
    <?php
	
        if (empty($_GET['alert'])) {echo ""; } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Actualizado correctamente!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Modificado correctamente!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Eliminado correctamente!</h4>
            
            </div>";
    }
    ?>
    

      <div class="box box-primary" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#Usuario</th>
                <th class="center">Denominación del Cliente</th>
                <th class="center">Total de Ingresos</th>
                <th class="center">Pendientes de Verificar</th>
                 <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
		  $hoy = date("d/m/Y");
		  require_once("../MP/mailing_transaction/fechaCastellano.php");
		  require_once("../MP/mailing_transaction/fechaNumber.php");
          $get_data = callAPI('GET', $servidor.'/api/movimientos/control/',false);
		  $response = json_decode($get_data, true);
		
		 foreach ($response as $d) {
						 //$fecha= $d['SRVDT']; 
						 //$ss = substr($fecha, 0,10);
					     $id= $d['USRID'];
						 $cliente= $d['CLIENTE'];
						 $ingresos= $d['Ingresos'];
						 $pendientes= $d['Pendientes'];
						 
		   
              echo "<tr>
                      <td width='5'  class='center'>$id</td>
                      <td width='100'  class='center'>$cliente</td>
					  <td width='5'  class='center'>$ingresos</td>
					  <td width='5'  class='center'>$pendientes</td>
                      <td class='center' width='40'>
                        <a data-toggle='tooltip' data-placement='top' title='Listar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_sfact&form=listar&id=$id'>
                              <i style='color:#fff' class='glyphicon glyphicon-list'></i>
                          </a>";
            ?>	
                          <a data-toggle="tooltip" data-placement="top" title="Actualizar" style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/sfact/proses.php?act=update&amp;id=<?php echo $id;?>" onclick="return confirm('AL CONFIRMAR ESTA ACCION NO PODRÂ DESHACERSE!!!! Se actualizará <?php echo $pendientes; ?> registro del cliente <?php echo $cliente; ?> ?');"><i style="color:#fff" class="glyphicon glyphicon-alert"></i>
                            </a>
            <?php

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