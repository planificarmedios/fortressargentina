<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-list icon-title"></i> Generar Reporte Totalizador de Ingresos por Caja 
  </h1>
  <ol class="breadcrumb">
    <li><a href="./?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active">informe</li>
    <li class="active"> registros</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      
      <div class="box box-warning">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="GET" action="modules/totalizador/print.php"  target="_blank">
          <div class="box-body">

            <div class="form-group">
              <label class="col-sm-1">Fecha</label>
              <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" autocomplete="off"  required />
              </div>

              <label class="col-sm-1">Hasta</label>
              <div class="col-sm-2">
                <input  type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" autocomplete="off" required />
              </div>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 120px;">
                  <i class="fa fa-print"></i> Imprimir
                </button>
				
				
				  
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->