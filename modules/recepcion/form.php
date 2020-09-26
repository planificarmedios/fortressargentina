

<?php
if ($_GET['form']=='edit') { 
    require_once("fechaNumber.php");
  	if ((isset($_GET['id'])) and (isset($_GET['id_evento']))) {
  $id = $_GET['id'];
  $asistente = $_GET['id'];;
	$id_evento = $_GET['id_evento'];
	if ($id_evento == 0){ $t = 'Cajas asociadas: '; } else { $t = 'Registro de Ingreso '; } 
	
    $id_cliente = $id;  
		  include_once ("callAPI.php");
          require_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/clientes/'.$id,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
						if ($d['protesis_metalica']== true) {
						  $lugar_protesis = ' - Zona de protesis: ' . $d['sector_cuerpo'] ;
						  $sty = "style='color:#FF0000'";
						} else {
							
						  $lugar_protesis = ' - No declaró prótesis ' ;
				   	  	  $sty = "style='color:#008000'";
						}
					?>
  		
<section class="content-header" <?php echo $sty ?>>
    <h1>
      <i class="fa fa-user icon-title" style="color:#000"></i> 
          <?php 
			  
		       if ($d['alias'] == null or $d['alias']  == '') {
							  $CLIENTE = $d['nombre']. ' '.$d['apellido'] ;
				} else {
							  $CLIENTE = $d['alias'] ;
				}
					
				
				
					
						echo $t. ' ' .$CLIENTE . $lugar_protesis;
		
		  ?>
		
     
		
	<a data-toggle="tooltip" data-placement="top" title="Confirmar Ingreso" style="margin-right:5px" class="btn btn-danger btn-social pull-right"href="modules/recepcion/proses.php?act=update&nro_caja=-1&id_evento=<?php echo $id_evento;?>" onclick="return confirm(' Se confirmará ingreso sin asociación a ninguna caja ');"><i style="color:#fff" class="glyphicon glyphicon-ok"></i>Limpiar Registro de Pantalla </a>
		
    </h1>
	
 
  </section>


  <!-- Main content -->
  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" >
           <body onload="cargaForm()">
              <div class="box-body">
                  <input   id="id" name="id" value="<?php echo $id; ?>" hidden>
                  <input  id="usrid" name="usrid" value="<?php echo $d['USRID']; ?>" hidden>
                  
            <fieldset>      
             <div class="form-group">
           	  <div class="row">
                 <div class="col-sm-12 col-md-6"> 
                   <?php  

                    if ($d['protesis_metalica']== true) {
					 
                      $style = "border:1px solid #eaeaea;border-radius:100px;background-color:red;";
                    } else {
                      $style = "border:1px solid #eaeaea;border-radius:100px;background-color:green;";
						
                    }
						
						

                    if ($d['foto']=="") { ?>
                      <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png"  width="100">
                    <?php
                    }
                    else { ?>
                      <img src="images/user/<?php echo $d['foto']; ?>" width="150" height="150" style="border:1px solid #eaeaea;border-radius:100px;"> 
                      <img  width="150" height="150" style="<?php echo $style?>"> 
                    <?php
                    }
                    ?>
                </div>
				           
                		
                 			 
					  
              </div>
				 
           </fieldset>
           
				
				
             <fieldset> 
               <div class="form-group">
               	<div class="row">
                     
                    <div class="form-group">
                      <?php if ($d['status']==1) { 
					  			$a = 'Activo';
								$st = "style='text-align:left;color:#093'";
								$c =  "style=color:#093";
								} else { 
								$a = 'Inactivo';
								$st= "style='text-align:left;color:#F00'";
								$c =  "style=color:#F00";
							}
					  ?>
                    </div>
              </fieldset>
              
            </div>
            </body>
            
          </form>
          
          <section>     
   	</section>
                <div class="box box-default" style="color:#003">
                    <div class="box-body">
                        <table border=10 id="dataTables1" class="table table-bordered table-striped table-hover">
                         <thead>
                          <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                            <th class="center"># Caja </th>
                            <th class="center">Condición sobre la Caja</th>
							              <th class="center"># Titular</th> 
                            <th class="center">Situación del Titular</th>
                            <th class="center">Confirmar Caja</th>
                          </tr>
                        </thead>
                        <tbody>
                        
          <?php
		  include_once ("callAPI.php");
          require_once ("parametros.php");
          $get_data = callAPI('GET', $servidor.'/api/access/cliente/cajas/'.$id ,false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $d) {
					    $id = $d['id'];
						  $serie = $d['serie'];
					    $id_titular = $d['id_cliente'];
						  $status = $d['status'];
              $nro_caja = $d['nro_caja'];

                if ($status==0){
                  $s = 'Inactivo';
                }else{
                  $s="Activo";
                }
              
              if ( $d['titular'] == 'TITULAR' ) {
                 $titular = 'TITULAR';
              } else {
                $titular = 'ASOCIADO';
              } 
						 
						 if ($id_evento > 0) {
			 				 echo "
							 <tr>
					   		 <td width='5'   class='center'>$serie</td> 
							 <td width='20'   class='center'>$titular</td>
							 <td width='5'   class='center'>$id_titular</td> 
						     <td width='20'   class='center'>$s</td>
							 <td class='center' width='5'>
							 <div>
							 <a></i></a>";
							 ?>
               <a data-toggle="tooltip" data-placement="top" title="Confirmar Ingreso a Caja" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/recepcion/proses.php?act=update&nro_caja=<?php echo $nro_caja;?>&id_titular=<?php echo $id_titular?>&id_evento=<?php echo $id_evento;?>" onclick="return confirm(' Se confirmará ingreso a Caja Serie Nº <?php echo $serie; ?> ?');"><i style="color:#fff" class="glyphicon glyphicon-ok"></i></a>
               
               <a data-toggle="tooltip" data-placement="top" title="Imprimir Ingreso a Caja" style="margin-right:5px" class="btn btn-primary btn-sm" href="?module=formPrintModule_cj&formPrintModule=print&id=<?php echo $id;?>&nrocaja=<?php echo $nro_caja?>&asistente=<?php echo $asistente?>&id_evento=<?php echo $id_evento?>"><i style="color:#fff" class="glyphicon glyphicon-print"></i></a>

							<?php
						 } else {
							echo "
							 <tr>
							     <td width='5'   class='center'>$serie</td> 
					         <td width='20'   class='center'>$titular</td>
                   <td width='5'   class='center'>$id_titular</td> 
                   <td width='20'   class='center'>$s</td>
                   <td class='center' width='5'>
							     <div>
							 <a></i></a>";
							
						 }
							  echo "    
							  </div>
							  </td>
							 </tr>";
							}
							?>
							</tbody>
						  </table>
                        
                       
                        </tbody>
                    </table>
                    </div>
                </div>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->

 
<?php
} //endforeach
}
}
