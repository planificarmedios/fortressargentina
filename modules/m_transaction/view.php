

<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> En/Sd

    <a class="btn btn-primary btn-social pull-right" href="../m_transaction/?module=form_m_transaction&amp;form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> E/s Habilitar
    </a>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 

    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Registrado correctamente!</h4>
              
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
         
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
           
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo de Transación</th>
                <th class="center">Fecha</th>
                <th class="center">Codigo</th>
                <th class="center">Sim</th>
				<th class="center">Tipo</th>
                <th class="center">Cant.</th>
                <th class="center">Prestadora</th>
              </tr>
            </thead>
         
            <tbody>
                        
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content