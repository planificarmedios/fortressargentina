
<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-users icon-title"></i> Gestión de Notificaciones

    <a data-toggle="tooltip" data-placement="top" title="Confirmar Notificación" style="margin-right:5px" class="btn btn-danger btn-social pull-right" href="modules/notificaciones/proses.php?act=enviarnotificaciones" onclick="return confirm('Seguro que deseas enviar la notificación a todos los clientes!!! ');"> 
      <i class="fa fa-plus"></i> Enviar Notificacion
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
              <h4>  <i class='icon fa fa-check-circle'></i> Procesado correctamente!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Modificado correctamente!</h4>
             
            </div>";
    }
	
	elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Cliente Bloqueado!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Eliminado correctamente!</h4>
            
            </div>";
    }
	
	elseif ($_GET['alert'] == 6) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Cliente Habilitado!</h4>
             
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
             
                <th class="center">Email</th>
               
              </tr>
            </thead>
            <tbody>
        
        <?php
		  include_once ("callAPI.php");
      require_once ("parametros.php");
      require_once ("fechaNumber.php");
      
		  $get_data = callAPI('GET', $servidor.'/api/mailsPrueba/',false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $d) {
					     $mail = $d['mail'];
						 
              echo "<tr>
               
                      <td width='15%'  class='center'>$mail</td>
                     
                      <div>
						";
	
	          
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