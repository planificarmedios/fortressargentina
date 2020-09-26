<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Servicio
    </h1>
    <ol class="breadcrumb" style="color:#000">
     
      <li><a href="?module=prices"> Salas y Servicios </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST"  action="modules/prices/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="descripcion"  name="descripcion" autocomplete="off" >
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Precio</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="precio" name="precio" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Uso Comercial</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="1.5" class="form-control" id="coef_comercial" name="coef_comercial" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Contratación Mensual</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="1.8" class="form-control" id="coef_mensual" name="coef_mensual" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Contratación Trimestral</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="1.5" class="form-control" id="coef_trimestral" name="coef_trimestral" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Semestral</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="1.3" class="form-control" id="coef_semestral" name="coef_semestral" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Cobertura Gold</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="1.5" class="form-control" id="coef_gold" name="coef_gold" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Notificación Ingreso a Caja</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="0.00" class="form-control" id="coef_notificacion" name="coef_notificacion" autocomplete="off" required>
                </div>
              </div>


              
              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Servicio</label>
                <div class="col-sm-5">
                   <select class="chosen-select" id="tipo_servicio" name="tipo_servicio"  required>
                    <option value="">-- Seleccionar --</option>
                     <?php 
                    session_start(); 
                    include_once ("callAPI.php");
                    require_once ("parametros.php");
                    $get_data = callAPI('GET', $servidor.'/api/tipoServicio/',false);
                    $response = json_decode($get_data, true);
                    foreach ($response as $d) {
                        $id = $d['id'];
                        $nombre = $d['nombre'];
                        echo "    <option value=\"$id\"> $nombre </option>";
                    }
                    ?>
                   </select>
                </div>
              </div>
              
             <input type="number" id="intervalo" name="intervalo" value=1 hidden="hidden" /> 
              
             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a  href="?module=prices" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
              

<?php
} elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id']) and isset($_GET['tipo_servicio'])) {
    $i = $_GET['id'];
    $tipo_servicio = $_GET['tipo_servicio'];
      
					include_once ("callAPI.php");
					include_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/servicios/'.$i,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					?>
  		

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Modificar  Servicio
    </h1>
    <ol class="breadcrumb">
     
      <li><a href="?module=prices"> Salas y Servicios </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" class="form-horizontal" action="modules/prices/proses.php?act=update" method="POST">
            <div class="box-body">
            
            <div class="form-group">
                <label class="col-sm-2 control-label">#</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="id" name="id" value="<?php echo $i; ?>" readonly>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Servicio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $d['nombre']; ?>" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $d['descripcion']; ?>" >
                </div>
              </div>

              <div class="form-group"><span class="col-sm-2 control-label">Precio</span>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="precio" name="precio" autocomplete="off" value="<?php echo $d['precio']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Uso Comercial</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="<?php echo $d['coef_comercial']; ?>"  class="form-control" id="coef_comercial" name="coef_comercial" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Contratación Mensual</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="<?php echo $d['coef_contr_mensual']; ?>"  class="form-control" id="coef_mensual" name="coef_mensual" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Contratación Trimestral</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="<?php echo $d['coef_contr_trim']; ?>" class="form-control" id="coef_trimestral" name="coef_trimestral" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Semestral</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="<?php echo $d['coef_contr_semestral']; ?>"  class="form-control" id="coef_semestral" name="coef_semestral" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Cobertura Gold</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="<?php echo $d['coef_gold']; ?>"  class="form-control" id="coef_gold" name="coef_gold" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coef. Notificación Ingreso a Caja</label>
                <div class="col-sm-5">
                  <input type="number" step="0.01" value="<?php echo $d['coef_notificacion']; ?>" class="form-control" id="coef_notificacion" name="coef_notificacion" autocomplete="off" required>
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Servicio</label>
                <div class="col-sm-5">
                   <select class="chosen-select" id="tipo_servicio" name="tipo_servicio"  required>
                    <option value="">-- Seleccionar --</option>
                     <?php 
                      session_start(); 
                      include_once ("callAPI.php");
                      require_once ("parametros.php");
                      $get_data = callAPI('GET', $servidor.'/api/tipoServicio/',false);
                      $response = json_decode($get_data, true);
                      foreach ($response as $g) {
                          $id = $g['id'];
                          $nombre = $g['nombre'];
                       
                          if ($tipo_servicio == $id ) {
                            echo "    <option selected='selected' value=\"$id\"> $nombre </option>";
                          } else {
                            echo "    <option value=\"$id\"> $nombre </option>";
                          }
                      }
                     ?>
                   </select>
                </div>
              </div>
              
               <input type="number" id="intervalo" name="intervalo" value=1 hidden="hidden">
              
                          

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=prices" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
	<?php
  }
 }
}

elseif ($_GET['form']=='listar') { 

  ?>
  		

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-search icon-title" style="color:#000"></i> Tarifario de Cajas 
      <a class="btn btn-primary btn-social pull-center" href="?module=formPrintModule_cj&formPrintModule=tarifario" target="_blank">
      <i class="fa fa-print"></i> Imprimir
    </a>

    </h1>
    <ol class="breadcrumb">
     
      <li><a href="?module=prices"> Cajas y Servicios </a></li>
      <li class="active"> Listar </li>
    </ol>
  </section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

        <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
              <th class="center">#</th>
                <th class="center">Nombre</th>
                <th class="center">Tipo Uso</th>
                <th class="center">Mensual Contrat. Anual</th>
                <th class="center">Mensual Cont. Mensual</th>
                <th class="center">Mensual Cont. Trim.</th>
                <th class="center">Mensual Cont. Semes.</th>
                <th class="center">Mensual Gold</th>
                <th class="center">% Notif. Ingreso</th>
                
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
		  $get_data = callAPI('GET', $servidor.'/api/servicios/adicionales',false);
		  $response = json_decode($get_data, true);
			 
			 foreach ($response as $d) {

        if ($d['tipo_servicio'] == 5 ) { 

				      $id = $d['id'][0];
						  $servicio = $d['nombre'][0]; 
						  $descripcion = $d['descripcion']; 
              $precio = $d['precio'];
              $precio_anual = $d['precio'];
              $precio_anual_for = number_format($precio_anual, 2,',', '.');
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
					  	$tp = "Sala"; 
              $abono_mensual = $precio_for * $coef_mensual_for;
              $abono_mensual = number_format($abono_mensual, 2,',', '.');
              $abono_trimestral = $precio_for * $coef_trim_for;
              $abono_trimestral = number_format($abono_trimestral, 2,',', '.');
              $abono_semestral =$precio_for * $coef_semestral_for; 
              $abono_semestral = number_format($abono_semestral, 2,',', '.');
			
                      echo "<tr>
                      <td width='2%' color:'blue'  class='center'>$id</td>
                      <td width='15%' color:'blue'  class='center'>$servicio</td>
                      <td width='8%'  class='center'>Personal</td>
                      <td width='12%'  class='center'>$ $precio_anual_for</td>
                      <td width='12%'  class='center'>$ $abono_mensual</td>
                      <td width='12%'  class='center'>$ $abono_trimestral</td>
                      <td width='12%'  class='center'>$ $abono_semestral</td>
                      <td width='10%'  class='center'>$coef_gold_for % </td>
                      <td width='12%'  class='center'>$coef_notificacion_for % </td>
                      </tr>";

                      $precio_comercial = $precio_for * $coef_comercial_for ;
                      $precio_comercial_for = number_format($precio_comercial, 2,',', '.');
                      $abono_mensual_comercial = $precio_for * $coef_mensual_for * $coef_comercial_for ;
                      $abono_mensual_comercial = number_format($abono_mensual_comercial, 2,',', '.');
                      $abono_trimestral_comercial = $precio_for * $coef_trim_for * $coef_comercial_for ;
                      $abono_trimestral_comercial = number_format($abono_trimestral_comercial, 2,',', '.');
                      $abono_semestral_comercial =$precio_for * $coef_semestral_for * $coef_comercial_for ; 
                      $abono_semestral_comercial = number_format($abono_semestral_comercial, 2,',', '.');

                      echo "<tr>
                      <td width='2%' color:'blue'  class='center'>$id</td>
                      <td width='15%'  class='center'>$servicio</td>
                      <td width='8%'  class='center'>Comercial</td>
                      <td width='12%'  class='center'>$ $precio_comercial_for</td>
                      <td width='12%'  class='center'>$ $abono_mensual_comercial</td>
                      <td width='12%'  class='center'>$ $abono_trimestral_comercial</td>
                      <td width='12%'  class='center'>$ $abono_semestral_comercial </td>
                      <td width='10%'  class='center'>$coef_gold_for % </td>
                      <td width='12%'  class='center'>$coef_notificacion_for % </td>
                      </tr>";


            }
        	}
		    ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content


  	
   
<?php 
}
?>