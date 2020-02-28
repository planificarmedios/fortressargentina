<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Servicio
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=user"> Usuario </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST"  action="../fortressargentina/modules/prices/proses.php?act=insert" enctype="multipart/form-data">
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
                <label class="col-sm-2 control-label">Intervalo</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="intervalo" name="intervalo" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Servicio</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="tipo_servicio" name="tipo_servicio" autocomplete="off" required>
                </div>
              </div>
              
             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a  href="../fortressargentina/main.php?module=prices" class="btn btn-default btn-reset">Cancelar</a>
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
					$get_data = callAPI('GET', $servidor.'/api/servicios/'.$i,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					?>
  		

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Modificar  Servicio
    </h1>
    <ol class="breadcrumb">
      <li><a href="../mm/?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="../mm/?module=prices"> Servicios y Salas </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" style="color:#003" class="form-horizontal"  action="../fortressfortressargentina/modules/prices/proses.php?act=update" method="POST">
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
              
              <div class="form-group"><span class="col-sm-2 control-label">Intervalo</span>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="intervalo" name="intervalo" autocomplete="off" value="<?php echo $d['intervalo']; ?>" required>
                </div>
              </div>
              
               <div class="form-group"><span class="col-sm-2 control-label">Tipo Servicio</span>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="tipo_servicio" name="tipo_servicio" autocomplete="off" value="<?php echo $d['tipo_servicio']; ?>" required>
                </div>
              </div>
              
                          

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" name="Guardar" value="Guardar">
                  <a href="../fortressargentina/main.php?module=prices" class="btn btn-default btn-reset">Cancelar</a>
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