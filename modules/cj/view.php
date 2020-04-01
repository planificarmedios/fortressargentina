<section class="content-header" style="color:#003">
  <h1>     <i class="fa fa-lock icon-title"></i> Gestión de Cajas

    <a class="btn btn-warning btn-social pull-right" href="?module=form_cj&form=add" title="Agregar" data-toggle="tooltip">
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
                <th class="center"># Caja</th>
                <th class="center">Tipo de Caja</th>
                <th class="center">Descripción</th>
                <th class="center"># Cliente</th>
                <th class="center">Nombre Titular</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
	      $get_data = callAPI('GET', $servidor.'/api/cajas/listar',false);
		  $response = json_decode($get_data, true);
			 
			 foreach ($response as $d) {
				          $id = $d['id'];
						  $nrocaja = $d['nro_caja'];
						  $tipocaja = $d['tipocaja'];
						  $id_cliente = $d['id_cliente'];
						  $nombre = $d['nombre']; 
						  $apellido = $d['apellido']; 
						  $descripcion= $d['descripcion'];
						  $cliente = $nombre.' '.$apellido;
						  if ($id_cliente == 0) {$m = 'Disponible'; $color = "#00993"; } else {$m = $id_cliente;};
						  
					  echo "<tr>
					  <td width='5'  class='center'>$nrocaja</td>
					  <td width='50' class='center'>$tipocaja</td>
                      <td width='50' class='center'>$descripcion</td>
					  <td width='5'  class='center'>$m</td>
					  <td width='80' class='center'>$cliente</td>
                      <td width='1'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_cj&form=edit&id=$id'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            if ($id_cliente == 0) {
			?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/cj/proses.php?act=delete&id=<?php echo $id;?>" onclick="return confirm('Se eliminará la caja nro. <?php echo $nrocaja; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php } ?>              
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