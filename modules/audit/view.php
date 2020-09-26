<?php include_once ("fechaNumber.php"); ?>
<section class="content-header" style="color:#003">
  <h1>
    <i class="fa fa-search icon-title"></i> Módulo Auditoria
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    
	 

    

      <div class="box box-warning" style="color:#003">
        <div class="box-body">

        <form role="form" class="form-horizontal" method="GET" action="modules/s_report/printAudit.php"  target="_blank">
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



          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
       
  
            <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
              <th class="center">#</th>
                <th class="center">Fecha</th>
                <th class="center">Hora</th>
                <th class="center">Caja Nro</th>
				        <th class="center">Serie</th>  
				        <th class="center">Acción</th>
                <th class="center">Valor Ant.</th>
                <th class="center">Valor Nuevo</th>
                <th class="center">Gestionó</th>
                
              </tr>
            </thead>
            <tbody>
        
        <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
		  require_once ("fechaNumber.php");
      
		  $get_data = callAPI('GET', $servidor.'/api/auditoria/listar',false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $d) {
					    $id = $d['id'];
						  $serie = $d['serie'];
						  $CLIENTE = $d["CLIENTE"];
						  $IDCLIENTE = $d["IDCLIENTE"];
						  $fecha = fechaNumber($d['fecha']);
						  $hh = substr($d['fecha'], 11,5); 
						  $desc_evento = $d['desc_evento']; 
              $nro_caja = $d['nro_caja'];
              $tipo_cambio = $d['tipo_cambio'];
              $valor_anterior = $d['valor_anterior'];
              $valor_nuevo = $d['valor_nuevo'];
              $id_usuario_cambio = $d['id_usuario_cambio'];
              $nombre_usuario = $d['nombre_usuario'];
              


              
						  if ($tipo_cambio == '4' ) {
                if ( $valor_anterior == '0') {
                  $valor_anterior = 'No contratado'; $valor_nuevo = 'Contratado';
                } elseif ( $valor_anterior == '1') {
                  $valor_anterior = 'Contratado'; $valor_nuevo = 'No Contratado';
                }
              }elseif ($tipo_cambio == '5' ) {
                if ( $valor_anterior == '0') {
                  $valor_anterior = 'Personal'; $valor_nuevo = 'Comercial';
                } elseif ( $valor_anterior == '1') {
                  $valor_anterior = 'Comercial'; $valor_nuevo = 'Personal';
                }
              }elseif ($tipo_cambio == '8' ) {
                if ( $valor_anterior == '0') {
                  $valor_anterior = 'No contratado'; $valor_nuevo = 'Contratado';
                } elseif ( $valor_anterior == '1') {
                  $valor_anterior = 'Contratado'; $valor_nuevo = 'No Contratado';
                }
              } elseif ($tipo_cambio == '7' ) {

                  if ( $valor_nuevo == '1900-01-01') {
                    $valor_nuevo = '0';
                    
                  } elseif ( $valor_anterior == '1900-01-01') {
                    $valor_anterior = '0';
                  } 

                } elseif ($tipo_cambio == '6' ) {

                  if ( $valor_nuevo == '1900-01-01') {
                    $valor_nuevo = '0';
                  } elseif ( $valor_anterior == '1900-01-01') {
                    $valor_anterior = '0';
                  } 

              } elseif ($tipo_cambio == '9' ) {

                if ( $valor_anterior == 1) { $valor_anterior  = 'Anual'; } 
                elseif ( $valor_anterior == 2) { $valor_anterior  = 'Semestral'; } 
                elseif ( $valor_anterior == 3) { $valor_anterior  = 'Trimestral'; } 
                elseif ( $valor_anterior == 4) { $valor_anterior  = 'Mensual'; } 
                 

                if ( $valor_nuevo == 1) { $valor_nuevo  = 'Anual'; } 
                elseif ( $valor_nuevo == 2) { $valor_nuevo  = 'Semestral'; } 
                elseif ( $valor_nuevo == 3) { $valor_nuevo = 'Trimestral'; } 
                elseif ( $valor_nuevo == 4) { $valor_nuevo  = 'Mensual'; } 
             
              }
			
              echo "<tr>
                
                  <td width='1%' class='center'>$id</td>
                  <td width='10%' class='center'>$fecha</td>
                  <td width='10%'  class='center'>$hh</td>
                  <td width='5%'  class='center'>$nro_caja</td>	
                  <td width='5%'  class='center'>$serie</td>
                  <td width='20%' class='center'>$desc_evento</td>
                  <td width='10%' class='center'>$valor_anterior</td>
                  <td width='10%' class='center'>$valor_nuevo</td>
                  <td width='20%' class='center'>$nombre_usuario</td>
                  
                          
					    <div>
						  <a></a>";
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