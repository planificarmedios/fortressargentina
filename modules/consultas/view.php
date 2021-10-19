<section class="content-header" style="color:#003">
  <h1>     


      


  </h1>

  <div class="row">
          <div class="col-md-15">

          <div class="col-md-2 pull-left">
            <a class="btn btn-warning btn-social" href="?module=form_consultas&form=add"  title="Reservar Caja" data-toggle="tooltip">
                <i class="fa fa-lock"></i> Registrar reserva de Caja
              </a>
            </div>
            
            <div class="col-md-2 pull-left">
            <a class="btn btn-success btn-social" href="?module=form_consultas&form=temporal" title="Crear Evento Temporal" data-toggle="tooltip">
              <i class="fa fa-calendar"></i> Registrar Evento Temporal
                </a>
            </div>

            
            <div class="col-md-2 pull-left">
              <a class="btn btn-primary btn-social" href="?module=form_consultas&form=permanente" title="Crear Evento Permanente" data-toggle="tooltip">
              <i class="fa fa-calendar"></i> Registrar Evento Permanente
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
              <h4>  <i class='icon fa fa-check-circle'></i> Registro Almacenado correctamente!</h4>
             
            </div>";
    }

   
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Registro Actualizado correctamente!</h4>
            
            </div>";
    }
    ?>

<div class="box box-warning" style="color:#003">
        <div class="box-body">
    
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
              <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                
                
                <th class="center">Registro</th>
                <th class="center">Nombre</th>
                <th class="center">Estado</th>
                <th class="center">Acción</th>
                <th class="center">N° Caja</th>
                <th class="center">Comentario</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>

        <?php
  		  include_once ("callAPI.php");
        include_once ("parametros.php");
        include_once ("fechaNumber.php");
  	    $get_data = callAPI('GET', $servidor.'/api/consultas/listarAlertasPendientes',false);
  		  $response = json_decode($get_data, true);
		  
		
			 foreach ($response as $d) {
				      $id = $d['id'];
						  $fecha = fechaNumber($d['FECHA_REGISTRO']);
              $contacto = $d['contacto'];
              $c = $d['Cliente'];
              $serie = $d['serie'];
              $tel = $d['TELEFONO_MOVIL'];
              $email = $d['email']; 
              $comentario = $d['comentario'];
						  $consulta = $d['consulta'];
						  $descripcion = $d['descripcion']; 
              
                echo "<tr>
                
                <td width='5%'  class='center'>$fecha</td>
                <td width='15%'  class='center'>$contacto </td>
                <td width='5%'   class='center'>$c</td>
                
                <td width='13%'  class='center'>$descripcion</td>
                <td width='5%'  class='center'>$serie</td>
                <td width='40%'  class='center'>$comentario</td>
                <td class='center' width='8%'>
                <a data-toggle='tooltip' data-placement='top' title='Consultar' style='margin-right:5px' class='btn btn-default btn-sm' href='?module=form_consultas&form=edit&id=$id'><i style='color:black' class='glyphicon glyphicon-search'></i></a>";
              ?>	
                  <a data-toggle="tooltip" data-placement="top" title="Archivar Consulta" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/consultas/proses.php?act=update&amp;id=<?php echo $id;?>" onclick="return confirm('AL CONFIRMAR ESTA ACCIÓN NO PODRÁ DESHACERSE!!!! Se archivará permanentemente el registro <?php echo $id; ?> ?');"><i style="color:#fff" class="glyphicon glyphicon-ok"></i></a>
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