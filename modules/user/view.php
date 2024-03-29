<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-users icon-title"></i> Gestión de Usuarios

    <a class="btn btn-success btn-social pull-right" href="?module=form_user&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
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
                <th class="center">#</th>
                <th class="center">Ingreso</th>
                <th class="center">Cliente</th>
                <th class="center">Doc</th>
               
                <th class="center">VIP</th>
                <th class="center">Permiso</th>
                <th class="center">Email</th>
               
                <th class="center">Estado</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        <?php
		  include_once ("callAPI.php");
      require_once ("parametros.php");
      require_once ("fechaNumber.php");
      
		  $get_data = callAPI('GET', $servidor.'/api/clientes/',false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $d) {
					      $id = $d['id'];
              $nombre = $d['nombre']; 
              $ingreso = fechaNumber ($d['fecha_ingreso']);
						  $apellido = ' '.$d['apellido']; 
						  $descripcion = $d['descripcion'];
						  $email = $d['email'];
						  $dommicilio = $d['dommicilio'];
						  $localidad= $d['localidad'];
						  $provincia = $d['provincia'];
						  $tel_movil = $d['telefono_movil'];
              $dni = $d['dni'];
              $fecha_nacimiento = $d['fecha_nacimiento'];
              $nacimiento = fechaNumber ($fecha_nacimiento);
              $USRID = $d['USRID'];
						  $tel_fijo = $d['tel_fijo'];
						  $id_autorizante = $d['id_autorizante'];
						  $descripcion= $d['descripcion'];
              $permisos_acceso = $d['permisos_acceso'];
              $vip = $d['vip'];
              if ($vip == true){ $v = 'SI';} else { $v = 'NO';};
						  $status = $d['status'];
						  if ($status==1){$s = 'Activo';} else {$s = 'Inactivo';};
						  $evento = 0;
			
              echo "<tr>
                      <td width='5%'   class='center'>$id</td> 
                      <td width='5%'   class='center'>$ingreso</td>
                      <td width='20%' class='center'>$nombre$apellido</td>
                      <td width='5%' class='center'>$dni</td>
                      
                      <td width='3%' class='center'>$v</td>
					            <td width='20%'  class='center'>$descripcion</td>
                      <td width='15%'  class='center'>$email</td>
                     
                      <td width='5%'  class='center'>$s</td>
					            <td class='center' width='25%'>
                      <div>
						  
						  <a data-toggle='tooltip' data-placement='top' title='Ver Cajas Asociadas' style='margin-right:5px' class='btn btn-default btn-sm' href='?module=form_recepcion&form=print&id=$id&id_evento=$evento'><i style='color:#0e001a' class='fas fa-arrow-circle-right'></i></a>
						  
                          <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_user&form=edit&id=$id'><i style='color:#fff' class='glyphicon glyphicon-edit'></i></a>";
						  
			if ($s=='Activo') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Bloquear" style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/user/proses.php?act=off&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Activar" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/user/proses.php?act=on&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          }

      if ($vip=='true') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Cambiar a Cliente no VIP " style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/user/proses.php?vip=off&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-star"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Cambiar a Cliente VIP" style="margin-right:5px" class="btn btn-warning btn-sm" href="modules/user/proses.php?vip=on&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-star"></i>
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