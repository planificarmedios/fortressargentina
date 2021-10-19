<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-users icon-title"></i> Gestión de Grupos de Afinidad

    
      <a class="btn btn-success btn-social pull-right" href="?module=formAddAfinidad_afinidad&formAddAfinidad=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i> Agregar Grupo
      </a>
    
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php 
	 

    if (empty($_GET['alert'])) {echo ""; } 
  
  

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> 
              Modificado correctamente!
              </h4>
             
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
                <th class="center">Nombre del Grupo</th>
                <th class="center">Descripcion</th>
                <th class="center">Estado</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
		  include_once ("fechaNumber.php");
	      $get_data = callAPI('GET', $servidor.'/api/Afinidad',false);
		  $response = json_decode($get_data, true);
		  
		
			 foreach ($response as $d) {
				      $id = $d['id'];
						  $nombre = $d['nombre'];
						  $descripcion = $d['descripcion'];
						  $estado = $d['estado'];
						  if (($d['estado']) == 1 ) {
							  $s = 'Vigente';
						  } else  {
							  $s = 'No vigente';
						  }
	
                       
						  
					  echo "<tr>
					  
					  <td width='5%'  class='center'>$id</td>
					  <td width='20%' class='center'>$nombre</td>
            <td width='30%' class='center'>$descripcion</td>
         
					  <td width='10%' class='center'>$s</td>
            <td width='10%' class='center'>
            <div>

            <a data-toggle='tooltip' data-placement='top' title='Editar' style='margin-right:5px' class='btn btn-primary   btn-sm' href='?module=formEdit_afinidad&formEdit=grupo&id=$id'><i style='color:#fff' class='glyphicon glyphicon-edit'></i></a>
            </a>

            <a data-toggle='tooltip' data-placement='top' title='Gestión de Beneficios' style='margin-right:5px' class='btn btn-warning   btn-sm' href='?module=formEdit_afinidad&formEdit=beneficios&id=$id'><i style='color:#fff' class='glyphicon glyphicon-usd'></i></a>
            </a>
					  	 
            <a data-toggle='tooltip' data-placement='top' title='Gestión de Asociados' style='margin-right:5px' class='btn btn-info btn-sm' href='?module=formEdit_afinidad&formEdit=edit&id=$id'><i style='color:#fff' class='glyphicon glyphicon-user'></i></a>
            </a>";

            if ($estado==1) { ?>
              <a data-toggle="tooltip" data-placement="top" title="Desactivar Plan de Afinidad" style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/afinidad/proses.php?plan=off&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-trash"></i>
              </a>
<?php
            } 
            else { ?>
              <a data-toggle="tooltip" data-placement="top" title="Activar Plan de Afinidad" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/afinidad/proses.php?plan=on&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-ok"></i>
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

