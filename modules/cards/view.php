<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-credit-card icon-title"></i> Tarjetas

    <a class="btn btn-warning btn-social pull-right" href="?module=form_cards&amp;form=add" title="Agregar" data-toggle="tooltip">
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
            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#</th>
                <th class="center">Fecha Registro</th>
                <th class="center">Marca</th>
				<th class="center">Banco</th>  
                <th class="center">Tipo</th>
                <th class="center">Número</th>
                <th class="center">Vencimiento</th>
              </tr>
            </thead>
            <tbody>
        
        <?php
      include_once ("callAPI.php");
      require_once ("parametros.php");
	  require_once ("fechaNumber.php");
      
      $get_data = callAPI('GET', $servidor.'/api/tarjetas/listar',false);
      $response = json_decode($get_data, true);
        
        foreach ($response as $d) {
                $id = $d['id'];
				$registrado = fechaNumber($d['registrado']);
				//$registrado = $d['registrado'];
                $marca = $d['marca']; 
				$n = $d['numero'];
			    $banco = $d['banco'];
				$tipo = $d['tipo'];
                
				$vencimiento = fechaNumber($d['vencimiento']);
				$v = (substr($vencimiento, 3,7));
      
              echo "<tr>
                      <td width='5'   class='center'>$id</td> 
					  <td width='5'   class='center'>$registrado</td> 
                      <td width='60' class='center'>$marca</td>
					  <td width='60' class='center'>$banco</td>
					  <td width='60' class='center'>$tipo</td>
                      <td width='10'  class='center'>$n</td>
					  <td width='10'  class='center'>$v</td>
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