<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-users icon-title"></i> Gestión de Documentación

    <a class="btn btn-warning btn-social pull-right" href="?module=form_doc&form=add"  title="Agregar" data-toggle="tooltip">
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

      <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#</th>
                <th class="center">Documento</th>
                <th class="center">Reseña</th>
                <th class="center">File</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
      
		  $get_data = callAPI('GET', $servidor.'/api/documentacion/listar',false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $d) {
					    $id = $d['id'];
						  $titulo = $d['titulo']; 
						  $descripcion = ' '.$d['descripcion']; 
						  $foto = $d['foto'];
			    echo "<tr>
			  		  <td width='5'   class='center'>$id</td> 
              <td width='150' class='center'>$titulo</td>
					    <td width='150' class='center'>$descripcion</td>
              <td width='10'  class='center'>$foto</td>
		  			  <td width='10'  class='center'>
              <div>

						  <a data-toggle='tooltip' data-placement='top' title='Descargar' style='margin-right:5px' class='btn btn-success btn-sm' href='images/docs/Manual_Fortress_Web_admin.docx'><i style='color:#fff' class='glyphicon glyphicon-download'></i></a>
               
               <a data-toggle='tooltip' data-placement='top' title='Abrir' style='margin-right:5px' class='btn btn-warning btn-sm' href='?module=form_user&form=edit&id=$id'><i style='color:#fff' class='glyphicon glyphicon-book'></i></a>";
		          
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