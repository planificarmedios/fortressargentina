<?php
if ($_GET['formAddAfinidad']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-users icon-title" style="color:#000"></i> Grupos de Afinidad
    </h1>
    <ol class="breadcrumb" style="color:#000">
    
      <li><a href="?module=afinidad"> Grupos de Afinidad </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST"  action="modules/afinidad/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre del Grupo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripción del Grupo</label>
                <div class="col-sm-5">
                    <textarea name="descripcion" id="descripcion" rows="10" cols="90" placeholder="Breve descripción de grupo"></textarea>
                    </div>
              </div>
              
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
} 