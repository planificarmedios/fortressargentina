<?php
if ($_GET['formAddCaja']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar 
    </h1>
    <ol class="breadcrumb" style="color:#000">
    
      <li><a href="main.php?module=cj"> Cajas </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST"  action="modules/cj/prosesAdd.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">#</label>
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
                <label class="col-sm-2 control-label">Serie</label>
                <div class="col-sm-5">
                   <input type="text" value='A1' class="form-control" id="serie" name="serie" required >
                </div>
              </div>
              
                            
              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Caja</label>
                <div class="col-sm-5">
                   <select id="tipo_caja" name="tipo_caja" class="chosen-select" required>
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
                  <a  href="?module=cj" class="btn btn-default btn-reset">Cancelar</a>
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