<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-users icon-title"></i> Datos Fiscales

    <a class="btn btn-warning btn-social pull-right" href="?module=form_rsocial&amp;form=add" title="Agregar" data-toggle="tooltip">
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

    ?>

      <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1> </a>  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#</th>
                <th class="center">Razón Social</th>
                <th class="center">Situación</th>
                <th class="center">Tipo</th>
                <th class="center">N° Doc.</th>
                <th class="center">Domicilio</th>
                
                <th class="center">Cp</th>  
                <th class="center">Localidad</th>
              </tr>
            </thead>
            <tbody>
        
        <?php
      include_once ("callAPI.php");
      require_once ("parametros.php");
      
      $get_data = callAPI('GET', $servidor.'/api/fiscales/listarTop',false);
      $response = json_decode($get_data, true);
        
        foreach ($response as $d) {
                $id = $d['id'];
                $razon_social = $d['razon_social']; 
                $tipo_iva = ' '.$d['tipo_iva']; 
                $tipo_doc = $d['tipo_doc'];
			        	if($tipo_doc==1){$tp='DNI';}elseif($tipo_doc==2){$tp='CUIL';}elseif($tipo_doc==3){$tp='CUIT';}else{$tp=$tipo_doc;}
                $numero_doc = $d['numero_doc'];
                $domicilio = $d['domicilio'];
                $email = $d['email'];
                $cp = $d['cp'];


					$get_data2 = callAPI('GET', $servidor.'/api/ciudades/',false);
					$response2 = json_decode($get_data2, true);
					foreach ($response2 as $g) {
					    if ($d['cp'] == $g['cp']) {
						  	$localidad = $g['localidad'];
						  } 
					}
					
                
              
      
              echo "<tr>
                      <td width='5%'   class='center'>$id</td> 
                      <td width='15%' class='center'>$razon_social</td>
                      <td width='15%'   class='center'>$tipo_iva</td>
                      <td width='5%'   class='center'>$tp</td>
                      <td width='10%'  class='center'>$numero_doc</td>
                      <td width='20%'  class='center'>$domicilio</td>
					         
                      <td width='5%'  class='center'>$cp</td>
                      <td width='15%'  class='center'>$localidad</td>
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