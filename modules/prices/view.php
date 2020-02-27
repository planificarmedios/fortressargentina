<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Gestión de Servicios y Salas

    <a class="btn btn-warning btn-social pull-right" href="?module=form_prices&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
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

      <div class="box box-primary" style="color:#003">
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
                <th class="center">Intervalo</th>
                <th class="center">Tipo Servicio</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  require_once("../MP/mailing_transaction/fechaCastellano.php");
		  require_once("../MP/mailing_transaction/fechaNumber.php");
          $get_data = callAPI('GET', '192.168.1.45:2999/api/servicios/adicionales',false);
		  $response = json_decode($get_data, true);
			 
			 foreach ($response as $d) {
				          $id = $d['id'][0];
						  $servicio = $d['nombre'][0]; 
						  $descripcion = $d['descripcion']; 
						  $precio = $d['precio'];
						  $precio_for = number_format($precio, 2,'.', '');
						  $intervalo= $d['intervalo'][0];
						  $tipo_servicio= $d['tipo_servicio'];
			
                      echo "<tr>
                      <td width='80'  class='center'>$servicio</td>
					  <td width='180'  class='center'>$descripcion</td>
                      <td width='50'  class='center'>$ $precio_for</td>
                      <td width='50'  class='center'>$intervalo</td>
					  <td width='50'  class='center'>$tipo_servicio</td>
           
					  <td class='center' width='60'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_prices&form=edit&id=$id'>
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