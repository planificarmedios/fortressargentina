<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-eye icon-title"></i> Registro de Biométrico

    
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
    

      <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#Usuario</th>
                <th class="center">Usuario Identificado</th>
                <th class="center">Total de Ingresos</th>
                
                 <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
		  $hoy = date("d/m/Y");
		  $get_data = callAPI('GET', $servidor.'/api/movimientos/control/',false);
		  $response = json_decode($get_data, true);
		
		 foreach ($response as $d) {
					
					     $id= $d['USRID'];
						 $cliente= $d['CLIENTE'];
						 $id_= $d['CLIENTE'];
						 $nombreTit = $d['nombre'];
             $apellidoTit = $d['apellido'];
             
						 $titular = $nombreTit.' '.$apellidoTit;
						 $id_autorizante= $d['id_autorizante'];
						 if ($id_autorizante==0) {$m = 'Titular';} else {$m = 'Asociado';};
						 $ingresos= $d['Ingresos'];
						 $pendientes= $d['Pendientes'];
						 
		   
              echo "<tr>
                      <td width='5'  class='center'>$id</td>
                      <td width='100'  class='center'>$cliente</td>
                     
					  <td width='5'  class='center'>$ingresos</td>
					 
                      <td class='center' width='40'>
                        <a data-toggle='tooltip' data-placement='top' title='Listar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_sfact&form=listar&id=$id'>
                              <i style='color:#fff' class='glyphicon glyphicon-search'></i>
                          </a>";
            ?>	
                          
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