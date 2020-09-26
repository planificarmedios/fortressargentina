<section class="content-header" style="color:#003">
  <h1>
    
    <i class="fa fa-user-plus icon-title"></i> Servicios y Salas

        <!--
          
        a  class="btn btn-info btn-social pull-center" href="?module=form_prices&form=listar"  data-toggle="tooltip">
          <i class="fa fa-search"></i> Ver tarifario de Cajas
        </a>
        
        <a class="btn btn-warning btn-social pull-right" href="?module=form_prices&form=add" title="Agregar" data-toggle="tooltip">
          <i class="fa fa-plus"></i> Agregar
        </a>
        ------>

        <div class="row">
          <div class="col-md-11">
            <div class="col-md-1 pull-right">
              <a class="btn btn-info btn-social" href="?module=form_prices&form=listar" target="_blank">
                <i class="fa fa-print"></i> Ver tarifario de Cajas
                </a>
            </div>

            <div class="col-md-1 pull-right">
              <a class="btn btn-warning btn-social" href="?module=form_prices&form=add" target="_blank">
                <i class="fa fa-plus"></i> Agregar
              </a>
            </div>
          </div>  
        </div>
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
                <th class="center">Nombre</th>
                <th class="center">Descripción</th>
               
                <th class="center">Precio</th>
                <th class="center">% Comercial</th>
                <th class="center">% Mensual</th>
                <th class="center">% Trimetral</th>
                <th class="center">% Semestral</th>
                <th class="center">% Gold</th>
                <th class="center">% Notificación</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
		  $get_data = callAPI('GET', $servidor.'/api/servicios/adicionales',false);
		  $response = json_decode($get_data, true);
			 
			 foreach ($response as $d) {
				      $id = $d['id'][0];
						  $servicio = $d['nombre'][0]; 
						  $descripcion = $d['descripcion']; 
              $precio = $d['precio'];
              $coef_comercial  = $d['coef_comercial'];
              $coef_mensual  = $d['coef_contr_mensual'];
              $coef_trim = $d['coef_contr_trim'];
              $coef_semestral = $d['coef_contr_semestral'];
              $coef_gold = $d['coef_gold'];
              $coef_notificacion = $d['coef_notificacion'];
              $precio_for = number_format($precio, 2,'.', '');
              $coef_comercial_for = number_format($coef_comercial, 2,'.', '');
              $coef_mensual_for = number_format($coef_mensual, 2,'.', '');
              $coef_trim_for = number_format($coef_trim, 2,'.', '');
              $coef_semestral_for = number_format($coef_semestral, 2,'.', '');
              $coef_gold_for = number_format($coef_gold, 2,'.', '');
              $coef_notificacion_for = number_format($coef_notificacion, 2,'.', '');
						  $intervalo= $d['intervalo'][0];
						  $tipo_servicio= $d['tipo_servicio'];
						  
						  if ($tipo_servicio == 1 ) { 
						  	$tp = "Sala"; 
						  } elseif ($tipo_servicio == 5 ){ 
						  	$tp = "Caja"; 
						  } elseif ($tipo_servicio == 1002 ) { 
						  	$tp = "Amenities"; 
              } elseif ($tipo_servicio == 1003 ) { 
						  	$tp = "Contingencia y Otros"; 
						  } elseif ($tipo_servicio == 1004 ) { 
						  	$tp = "Coef. de Ajuste"; 
						  }
              
						  
			
                      echo "<tr>
                      <td width='10%'  class='center'>$servicio</td>
                      <td width='20%'  class='center'>$descripcion</td>
                      
                      <td width='8%'  class='center'>$ $precio_for</td>
                      <td width='8%'  class='center'>$coef_comercial_for % </td>
                      <td width='8%'  class='center'>$coef_mensual_for % </td>
                      <td width='8%'  class='center'>$coef_trim_for % </td>
                      <td width='8%'  class='center'>$coef_semestral_for % </td>
                      <td width='8%'  class='center'>$coef_gold_for % </td>
                      <td width='9%'  class='center'>$coef_notificacion_for % </td>
           
					  <td class='center' width='9%'>
                        <div>
                          <a  class='btn btn-primary btn-sm' href='?module=form_prices&form=edit&id=$id&tipo_servicio=$tipo_servicio' data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-right:5px'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/prices/proses.php?act=delete&id=<?php echo $id;?>" onclick="return confirm('Se eliminará el servicio <?php echo $servicio; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
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