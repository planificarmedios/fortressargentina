
<section class="content-header" style="color:#003">
  <h1>
  <h1>
    <i class="fa fa-user icon-title"></i> Gestión de Días y Horarios

   
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

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
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
                <th class="center">#</th>
                <th class="center">Día</th>
                <th class="center">Estado</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        <?php
		  include_once ("callAPI.php");
      require_once ("parametros.php");
		  $get_data = callAPI('GET', '192.168.1.72:2999/api/dias/',false);
		  $response = json_decode($get_data, true);
				foreach ($response as $d) {
              $id = $d['id'];
              $dia = $d['dia'];
						  $status = $d['laboral'];
						  if ($status=='1'){$s = 'Laborable';} else { $s = 'No laborable';};
						  
		   
              echo "<tr>
                      <td width='50'  class='center'>$id</td>
                      <td width='50'  class='center'>$dia</td>
					            <td width='50'  class='center'>$s</td>
					            <td class='center' width='30'>
                        <div>
                    ";
					
					if ($s=='Laborable') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Cambiar a No Laborable" style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/dates/proses.php?act=off&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Cambiar a Laborable" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/dates/proses.php?act=on&id=<?php echo $d['id'];?>"><i style="color:#fff" class="glyphicon glyphicon-ok"></i>
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