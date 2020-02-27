
<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-user icon-title"></i> Gestión de Usuarios

    <a class="btn btn-warning btn-social pull-right" href="?module=form_user&form=add" title="Agregar" data-toggle="tooltip">
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

      <div class="box box-primary" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">Cliente</th>
                <th class="center">Telef</th>
                <th class="center">Email</th>
                <th class="center">Perfil</th>
                <th class="center">Estado</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
      
		  $get_data = callAPI('GET', $servidor.'/api/clientes/',false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $d) {
					      $id = $d['id'];
						  $nombre = $d['nombre']; 
						  $apellido = ' '.$d['apellido']; 
						  $telefono = $d['telefono_movil'];
						  $email = $d['email'];
						  $dommicilio = $d['dommicilio'];
						  $localidad= $d['localidad'];
						  $provincia = $d['provincia'];
						  $id_autorizante = $d['id_autorizante'];
						  $descripcion= $d['descripcion'];
						  $permisos_acceso = $d['permisos_acceso'];
						  $status = $d['status'];
						  if ($status==1){$s = 'Activo';} else {$s = 'Inactivo';};
			
              echo "<tr>
                      <td width='100'  class='center'>$nombre$apellido</td>
					  <td width='80'  class='center'>$telefono</td>
                      <td width='50'  class='center'>$email</td>
                      <td width='80'  class='center'>$descripcion</td>
                      <td width='80'  class='center'>$s</td>
					  <td class='center' width='30'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-right:5px' class='btn btn-warning btn-sm' href='?module=form_user&form=edit&id=$id'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
						  
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