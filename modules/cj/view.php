<section class="content-header" style="color:#003">

    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Cajas</li>
      <li class="active"> Listar</li>
    </ol>

  <h1>
          
  </h1>

    
    <div class="row">
          <div class="col-md-11">
            
            <div class="col-md-2 pull-left">
              <a class="btn btn-success btn-social" href="?module=formAddCaja_cj&formAddCaja=add">
                <i class="fa fa-plus"></i> Agregar Caja
              </a>
            </div>

            <div class="col-md-2 pull-left">
              <a class="btn btn-info btn-social" href="modules/cj/exportTotales.php" target="_blank">
              <i class="fa fa-file-excel-o"></i> Informe Auditoría 
                </a>
            </div>

            <div class="col-md-2 pull-left">
              <a class="btn btn-primary btn-social" href="?module=formPrintModule_cj&formPrintModule=listarDisponibles">
              <i class="fa fa-list"></i> Listar Cajas Disponibles
                </a>
            </div>

            <div class="col-md-2 pull-left">
              <a class="btn btn-danger btn-social" href="?module=formPrintModule_cj&formPrintModule=listarOcupadas">
              <i class="fa fa-list"></i> Listar Cajas Ocupadas
                </a>
            </div>

          </div>  
        </div>

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php 
	 

    if (empty($_GET['alert'])) {echo ""; } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Almacenado correctamente!</h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> 
              Modificado correctamente!
              </h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 4)  {
      
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i>
              <strong>Caja actualizada  a Disponible!!!!!</strong> Hay clientes en espera para este tipo de cajas
              <a href='?module=consultas' class='alert-link'>Consultar</a>
              </i> 
              </h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-warning alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> 
              Caja actualizada sin Clientes en espera de disponibilidad !
              </h4>
             
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Eliminado correctamente!</h4>
            </div>";
    }
    ?>

      <div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  <h1>
      
    </a>
  </h1>

            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                
                
                <th class="center"># Caja</th>
                <th class="center">Tipo de Caja</th>
                <th class="center">Libro</th>
                <th class="center"># Cliente</th>
                <th class="center">Titular</th>
                <th class="center">Estado Cliente</th>
                <th class="center">Inicio. Contrato</th>
                <th class="center">Vto. Contrato</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
        
        <?php
		  include_once ("callAPI.php");
		  include_once ("parametros.php");
		  include_once ("fechaNumber.php");
	      $get_data = callAPI('GET', $servidor.'/api/cajas/consultaOcupadas',false);
		  $response = json_decode($get_data, true);
		  
		
			 foreach ($response as $d) {
				      $id = $d['id'];
						  $nrocaja = $d['nro_caja'];
						  $serie = $d['serie'];
						  $tipocaja = $d['tipocaja'];
						  $id_cliente = $d['id_cliente'];
						  $nombre = $d['nombre']; 
						  if (($d['id_cliente']) > 1 and ($d['status']==1)) {
							  $s = 'Activo';
						  } elseif (($d['id_cliente']) > 1 and ($d['status']==0)) {
						     $s = 'Inactivo';
						  } elseif (($d['id_cliente'])== 0 and ($d['status']==0)) {
							  $s = '';
						  }
              
              $libro = $d['libro']; 
						  $apellido = $d['apellido']; 
              $descripcion= $d['descripcion'];
              $f_inicio = $d['f_inicio'];
						  $f_final  = $d['f_final'];
						  $f_inicio = fechaNumber($f_inicio); 
							$f_final = fechaNumber($f_final);	
              
              $cliente = $nombre.' '.$apellido;
              if ($id_cliente == 0) 
              {
                $m = 'Disponible'; $color = "#00993"; 
                $f_inicio = '';
                $f_final  = '';
              } else {
                $m = $id_cliente;
              };
              
						  
					  echo "<tr>
					  
					  <td width='5%'  class='center'>$serie</td>
					  <td width='10%' class='center'>$tipocaja</td>
            <td width='5%' class='center'>$libro</td>
					  <td width='7%'  class='center'>$m</td>
					  <td width='25%' class='center'>$cliente</td>
            		  <td width='10%' class='center'>$s</td>
            		  <td width='10%' class='center'>$f_inicio</td>
					  <td width='10%' class='center'>$f_final</td>
                      <td width='20%' class='center'>
                      <div>
					  
					  	 
              <a data-toggle='tooltip' data-placement='top' title='Acciones' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=formEdit_cj&formEdit=edit&id=$id&nrocaja=$nrocaja'><i style='color:#fff' class='glyphicon glyphicon-edit'></i></a>
						  				  
						  <a data-toggle='tooltip' data-placement='top' title='Listar Registros' style='margin-right:5px' class='btn btn-warning btn-sm' href='?module=form_cj&form=list&id=$id&nrocaja=$nrocaja&serie=$serie'><i style='color:#fff' class='glyphicon glyphicon-search'></i>
                          </a>
                          
                          <a  class='btn btn-danger btn-sm' href='?module=formEdit_cj&formEdit=libro&id=$id&nrocaja=$nrocaja&serie=$serie' data-toggle='tooltip' data-placement='top' title='Modificar Indice' style='margin-right:5px'>
                          <i style='color:#fff' class='glyphicon glyphicon-book'></i>
                      </a>"            
                          ;
				 
			if ($id_cliente <> 0 ) {
			?> 
            <a href='?module=formPrintModule_cj&formPrintModule=print&id=<?php echo $id;?>&id_titular=<?php echo $id_cliente;?>&nrocaja=<?php echo $nrocaja;?>' data-toggle='tooltip' data-placement='top' title='Módulo Impresiones' style='margin-right:5px' class='btn btn-primary btn-sm' ><i style='color:#fff' class='glyphicon glyphicon-print'></i></a>
           
            
            <?php } else { ?>
			<a data-toggle="tooltip" data-placement="top"  class="btn btn-default btn-sm" href="" onclick=""><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>	
              
			<?php 

    }
				 
						  
            if ($id_cliente == 0) {
			?> 
            <a href="modules/cj/prosesDelete.php?act=delete&id=<?php echo $id;?>&nrocaja=<?php echo $nrocaja;?>&serie=<?php echo $serie;?>" data-toggle="tooltip" data-placement="top" title="Eliminar Caja" class="btn btn-danger btn-sm" onclick="return confirm('Se eliminará la caja nro. <?php echo $serie; ?> ?');"><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>
            <?php } else { ?>
			<a data-toggle="tooltip" data-placement="top" title="No se puede eliminar" class="btn btn-default btn-sm" href="" onclick=""><i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>			 
			<?php 
			}
			?>  
				
				
            <?php

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

