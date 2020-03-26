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
    

      <div class="box box-primary" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#Evento</th>
                <th class="center">Denominación del Cliente</th>
                <th class="center">Fecha</th>
                <th class="center">Verificado</th>
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
          $get_data = callAPI('GET', $servidor.'/api/movimientos/'.$id,false);
		  $response = json_decode($get_data, true);
		
		 foreach ($response as $d) {
						 
						 $id= $d['ID'];
					     $usrid= $d['USRID'];
						 $cliente= $d['CLIENTE'];
						 $srvdt= $d['SRVDT'];
						 $verificado= $d['VERIFICADO'];
						 if ($verificado == 1) {$m = 'Verificado'; } else { $m = 'No verificado'; } ;
						 
		   
              echo "<tr>
                      <td width='5'  class='center'>$id</td>
                      <td width='100'  class='center'>$cliente</td>
					  <td width='5'  class='center'>$srvdt</td>
					  <td width='30'  class='center'>$m</td>
                      <td class='center' width='20'>";
           
		   if ($m == 'No verificado') { ?>	
                           <a data-toggle="tooltip" data-placement="top" title="Actualizar" style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/sfact/proses.php?act=clear&amp;id=<?php echo $id;?>&usrid=<?php echo $usrid;?>" onclick="return confirm('AL CONFIRMAR ESTA ACCION NO PODRÂ DESHACERSE!!!! Se actualizará el registro <?php echo $id; ?> ?');"><i style="color:#fff" class="glyphicon glyphicon-alert"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a  data-placement="top" style="margin-right:5px" class="btn btn-success btn-sm"><i style="color:#fff" class="glyphicon glyphicon-ok"></i>
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
  		
