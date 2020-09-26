<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Asociado</h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="../cj/?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="../cj/?module=user"> Usuario </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST"  action="modules/cj/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nro. Caja</label>
                <div class="col-sm-5">
                	 <?php 
						include_once ("callAPI.php");
						require_once ("parametros.php");
						$get_data = callAPI('GET', $servidor.'/api/cajas/',false);
						$response = json_decode($get_data, true);
						foreach ($response as $d) {
							  $max = $d['max'];
							  $u = $max + 1;
						}
						?>
                  <input type="number" value="<?php echo $u;?>" class="form-control" id="nrocaja" name="nrocaja" readonly required>
                  
                  
                  
                </div>
              </div>
              
                            
              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Caja</label>
                <div class="col-sm-5">
                   <select class="form-control" id="tipo_caja" name="tipo_caja">
                    <option value="0">-- Seleccionar --</option>
                     <?php 
						include_once ("/callAPI.php");
						require_once ("parametros.php");
						$get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
						$response = json_decode($get_data, true);
						foreach ($response as $d) {
							  $id = $d['id'];
							  $nombre = $d['nombre'];
							  $descripcion = $d['descripcion'];
							  echo "    <option value=\"$id\"> $nombre: $descripcion </option>";
						}
						?>
                   </select>
                </div>
              </div>
              
             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a  href="../seguridad-fortress/main.php?module=prices" class="btn btn-default btn-reset">Cancelar</a>
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
  	if (isset($_GET['id'])) {
	  $i = $_GET['id'];
      
					include_once ("callAPI.php");
					include_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/cajas/'.$i,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
						$id = $d['id'];
						$id_cliente = $d['id_cliente'];
						$id_servicio = $d['id_servicio'];
						$nro_caja = $d['nro_caja'];
						$tipocaja = $d['tipocaja'];
						$descripcion = $d['descripcion'];
						$apellido = $d['apellido'];
						$nombre = $d['nombre'];
						$cliente = $nombre.' '.$apellido;
					?>
  		

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Modificar  Caja
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=prices"> Servicios y Salas </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" style="color:#003" class="form-horizontal" action="modules/cj/proses.php?act=update" method="POST">
            <div class="box-body">
            
            <input type="number" id="id" name="id" value=<?php echo $_GET['id']; ?> hidden="hidden">
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Nro. Caja</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nro_caja" name="nro_caja" value="<?php echo $d['nro_caja']; ?>" readonly>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Cliente Titular</label>
                <div class="col-sm-5">
                   <select class="form-control" id="id_cliente" name="id_cliente" required>
                   <option value="0">-- Disponible --</option>
                    <?php 
					session_start(); 
					include_once ("callAPI.php");
                    require_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/titulares/',false);
					$response = json_decode($get_data, true);
					
						foreach ($response as $g) {
							  $id2 = $g['id'];
							  $dni2 = $g['dni'];
							  $_SESSION['nombre'] = $g['nombre'];	
							  $n2 = $g['nombre'];
							  $_SESSION['apellido']= $g['apellido'];
							  $a2 = $g['apellido'];
							  $usrid = $g['USRID'];
							  
							   if ($g['id'] == 0) {
							    echo "    <option selected='selected' value=\"$id2\"> -- Disponible -- </option>";
							  } else if ($d['id_cliente'] == $usrid) {
							    echo "    <option selected='selected' value=\"$usrid\"> $dni2 | $n2 $a2 </option>";
							  } else {
								echo "    <option value=\"$usrid\"> $dni2 | $n2 $a2  </option>";
						      }
						}
					
					?>
                  </select>
                </div>
              </div>
              
              
               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Caja</label>
                <div class="col-sm-5">
                   <select class="form-control" id="id_servicio" name="id_servicio"  required>
                    <option value="">-- Seleccionar --</option>
                     <?php 
						include_once ("/callAPI.php");
						require_once ("parametros.php");
						$get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
						$response = json_decode($get_data, true);
						foreach ($response as $t) {
							  $id3 = $t['id'];
							  $nombre = $t['nombre'];
							  $descripcion2 = $t['descripcion'];
							  $id_servicio2 = $t['$id_servicio'];
							  
							  if ($id_servicio == $t['id']) {
							    echo "    <option selected='selected' value=\"$id3\"> $nombre: $descripcion2 </option>";
							  } else {
								echo "    <option value=\"$id3\"> $nombre: $descripcion2 </option>";
						      }
						}
						?>
                   </select>
                </div>
              </div>
              
            
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=cj" class="btn btn-default btn-reset">Cancelar</a>
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
?>