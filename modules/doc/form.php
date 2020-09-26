<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Documento
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="module=doc"> Documentación</a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/doc/proses.php?act=insert" enctype="multipart/form-data">
          
          	<span id='stok'><div ></div></span>
            
             <div class="box-body">
             <div class="form-group">
                <label class="col-sm-2 control-label">Nombre Documento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Reseña</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="resena"  name="resena" autocomplete="off" >
                </div>
              </div>
              
              
             <div class="form-group">
                <label class="col-sm-2 control-label">Adjuntar Foto</label>
                <div class="col-sm-5">
                  <input type="file" name="foto" id="foto" required="required">
                </div>
           </div> 
             
           
                     
           </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a href="?module=doc" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  
<?php  

} elseif ($_GET['form']=='download') { 
      if (isset($_GET['foto'])) {
	    $foto = $_GET['foto'];
		$path_file          = "../../images/doc/".$foto;
        $file = $foto;
        if (is_file($foto)) {
          $filename = "cv0descargado.pdf"; 
          header("Content-Type: application/force-download");
          header("Content-Disposition: attachment; filename=\"$path_file\"");
          readfile($foto);
        } else {
          die("Error: no se encontró el archivo '$file'");
        }
	 }
} 