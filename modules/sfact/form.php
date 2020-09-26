<?php  
if ($_GET['form']=='listar') { 
				if (isset($_GET['id'])) { 
				    $id = $_GET['id'];	
?>
<section class="content-header" style="color:#003">
  <h1> <i class="fa fa-calendar icon-title"></i> Movimientos por Cliente </h1>

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

    ?>
    

      <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#Evento</th>
                <th class="center">Cliente</th>
                <th class="center">Zona de Acceso / Caja</th>
                <th class="center">Fecha de Ingreso</th>
                <th class="center">Hora</th>
                <th class="center">Biómetrico</th>
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
          $get_data = callAPI('GET', $servidor.'/api/movimientos/'.$id,false);
		  $response = json_decode($get_data, true);
		
		 foreach ($response as $d) {
						 
						 $id= $d['ID'];
					     $usrid= $d['USRID'];
						 $cliente= $d['CLIENTE'];
						 $srvdt= $d['SRVDT'];
             $nro_caja= $d['NRO_CAJAS'];
             $id_biometrico= $d['id_biometrico'];
             if ($nro_caja == '-1'){ $nro_caja = 'Sala';}; 
             if ($id_biometrico == 3000){ $id_biometrico = 'Bunker';} elseif ($id_biometrico == 5000){ $id_biometrico = 'Recepcion';}
						 $ss = fechaCastellano(substr($srvdt, 0,10));
						 $hh = substr($srvdt, 11,8);
						 $verificado= $d['VERIFICADO'];
						 if ($verificado == 1) {$m = ''; } else { $m = ''; } ;
						 
		   
              echo "<tr>
                      <td width='5'  class='center'>$id</td>
                      <td width='40'  class='center'>$cliente</td>
					            <td width='5'  class='center'>$nro_caja</td>
                      <td width='30'  class='center'>$ss</td>
                      <td width='5'  class='center'>$hh</td>
                      <td width='5'  class='center'>$id_biometrico</td>
                      <td class='center' width='10'>";
           
		   if ($m == 'No verificado') { ?>	
                           <a data-toggle="tooltip" data-placement="top" title="Actualizar" style="margin-right:2px" class="btn btn-danger btn-sm" href="modules/sfact/proses.php?act=clear&amp;id=<?php echo $id;?>&usrid=<?php echo $usrid;?>" onclick="return confirm('AL CONFIRMAR ESTA ACCION NO PODRÂ DESHACERSE!!!! Se actualizará el registro <?php echo $id; ?> ?');"><i style="color:#fff" class="glyphicon glyphicon-alert"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                          <a  data-toggle="tooltip" data-placement="top" style="margin-right:2px" class="btn btn-success btn-sm"><i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          }
	          
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
              

	<?php
	}
} 
?>
  		
