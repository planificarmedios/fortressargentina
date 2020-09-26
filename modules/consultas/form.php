<script type="text/javascript">
  function validar(input){
    var c = input.value;
    //alert (c);
    if (c == 0) {
      //alert ('If:' + c);
      document.getElementById('grupo').style.visibility='visible';
      document.getElementById('nombre').disabled = false;
      document.getElementById('celular').disabled = false;
      document.getElementById('email').disabled = false;
    } 
    
    if (c > 0) {
      document.getElementById('grupo').disabled=true;
      //alert ('Else:' + c);
    }

  }
</script>

<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Reservar Caja
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=consultas"> Reserva de Cajas </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/consultas/proses.php?act=insert" enctype="multipart/form-data">


             <div class="box-body" >
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Ingresar Selección</label>
                <div class="col-sm-5">
                  <select id="id_cliente" name="id_cliente" class="chosen-select" onchange =validar(this); >
                      <option value="0">-- No Cliente--</option>
                      <?php 
                         
                        include_once ("callAPI.php");
                        require_once ("parametros.php");
                        $get_data = callAPI('GET', $servidor.'/api/titulares/',false);
                        $response = json_decode($get_data, true);
                        
                            foreach ($response as $g) {
                                  $id2 = $g['id']; //id_cliente
                                  $dni2 = $g['dni'];
                                  $_SESSION['nombre'] = $g['nombre']; 
                                  $n2 = $g['nombre'];
                                  $_SESSION['apellido']= $g['apellido'];
                                  $a2 = $g['apellido'];
                                  $usrid = $g['USRID'];
                                  
                                   if ($g['id'] == 0) {
                                    echo "    <option selected='selected' value=\"$id2\"> -- Seleccionar-- </option>";
                                  } else if ($d['id_cliente'] == $id2) {
                                    echo "    <option selected='selected' value=\"$id2\"># Cliente: $id2 Doc.: $dni2 | $n2 $a2 </option>";
                                  } else {
                                    echo "    <option value=\"$id2\"> # Cliente: $id2 Doc.: $dni2 | $n2 $a2  </option>";
                                  }
                            }
                        
                        ?>
                      </select>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Caja</label>
                <div class="col-sm-5">
                  <select id="tipo_caja" class="form-control" name="tipo_caja" required>
                  <option value="">-- Seleccionar --</option>
                  <?php 
                  include_once ("callAPI.php");
                  require_once ("parametros.php");
                  $get_data = callAPI('GET', $servidor.'/api/cajas/detalle',false);
                  $response = json_decode($get_data, true);
                  foreach ($response as $d) {
                      $id = $d['id'];
                      $nombre = $d['nombre'];
                      $descripcion = $d['descripcion'];
                      echo "    <option value=\"$id\"> $nombre: $descripcion </option>";
                  }
                  ?>
                   </select>
                </div>
              </div>


          <fieldset id='grupo' name='grupo'>        
             <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Celular</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="celular" name="celular" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                </div>
              </div>
          </fieldset>  
                      
           </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a href="?module=consultas" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  
 <!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content -->
 <!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content -->
 <!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content -->
  
 <?php
}
 elseif ($_GET['form']=='asoc') 
{ 
	if ($_GET['id']) {
		$id_consulta = $_GET['id'];
  }	
?>
	
  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Acciones Realizadas
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=consultas"> Consultas y Pendientes </a></li>
      <li class="active"> comentarios </li>
    </ol>
  </section>
  
  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST"  action="modules/consultas/proses.php?act=comentarios" enctype="multipart/form-data">
            <div class="box-body">

            <input name="id_consulta" id="id_consulta" value="<?php echo $id_consulta; ?>" hidden>


            <div  class="form-group">
               	

                <div align="center" class="col-sm-12 col-md-8">
                    <textarea name="comentario" id="comentario" rows="10" cols="100" placeholder="Escribir en este campo"></textarea>
                </div>

             
             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a  href='?module=form_consultas&form=edit&id=<?php echo $id_consulta;?>'  class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->

   <?php
  
 } elseif ($_GET['form']=='edit') 
{ 
  
  if (isset($_GET['id'])) 
  {
    $id = $_GET['id'];
  }
        include_once ("callAPI.php");
        include_once ("fechaNumber.php");
        require_once ("parametros.php");
        $get_data = callAPI('GET', $servidor.'/api/consultas/listar/'.$id,false);
        $response = json_decode($get_data, true);
        foreach ($response as $d) {
            $id = $d['id'];
            $c = $d['Cliente'];
            $email = $d['email'];
            $telefono_movil =  $d['telefono_movil'];
            $fecha = fechaNumber($d['fecha']);
            $consulta =  $d['consulta'];
            $contacto =  $d['contacto'];
            $descripcion =  $d['descripcion'];
        ?>
    
  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Consultas 
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=consultas"> Consultas y Pendientes </a></li>
      <li class="active"> consultas </li>
    </ol>
  </section>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" class="form-horizontal" action="" method="POST">
            <div class="box-body">
                        
            <fieldset> 

               <div class="form-group">
               	<div class="row">

                <div class="col-sm-12 col-md-4">
                    <label class="control-label">Fecha</label>
                      <input type="text" class="form-control" value="<?php echo $fecha; ?>" readonly>
                </div>

               	 <div class="col-sm-12 col-md-4">
                    <label class="control-label">Contacto</label>
                      <input type="text" class="form-control" value="<?php echo $contacto; ?>" readonly>
                </div>
              
                  <div class="col-sm-12 col-md-4">
                    <label class="control-label">Situación</label>
                        <input type="text" class="form-control" i value="<?php echo $c; ?>" readonly>
                   </div>
                </div>
              </div>

             </fieldset>
               
             <fieldset> 

               <div class="form-group">
               	<div class="row">

                <div class="col-sm-12 col-md-4">
                    <label class="control-label">Consulta</label>
                      <input type="text" class="form-control" value="<?php echo $consulta; ?>" readonly>
                </div>

               	 <div class="col-sm-12 col-md-4">
                    <label class="control-label">Tipo de Caja Solicitada</label>
                      <input type="text" class="form-control" value="<?php echo $descripcion; ?>" readonly>
                </div>
              
                  <div class="col-sm-12 col-md-4">
                    <label class="control-label">Estado</label>
                        <input type="text" class="form-control" i value="En Proceso" readonly>
                   </div>
                </div>
              </div>
              
             </fieldset>
            </div><!-- /.btn btn-outline--->

          </form>
          
          <section> 
            <h1>     
              <i class="fa fa-users icon-title" style="color:#FFF"></i> 
                  <a class="btn btn-success btn-social pull-right" href='?module=form_consultas&form=asoc&id=<?php echo $id;?>' 
                    title="Agregar Acción" data-toggle="tooltip">
                    <i class="fa fa-edit"></i> Agregar Acción
                  </a>
                  
                  <i class="fa fa-users icon-title" style="color:#FFF"></i> 
                  <a class="btn btn-warning pull-center" href='?module=consultas' 
                    title="Agregar Acción" data-toggle="tooltip">
                    Volver
                  </a>
              
          </h1>
        </section>
          
          
                <div class="box box-warning" style="color:#003">
                    <div class="box-body">
                        <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
                         <thead>
                          <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                            
                            <th class="center">Fecha</th>
                            <th class="center">Hora</th>
                            <th class="center">Comentario</th>
                            <th class="center">Usuario</th>
                          </tr>
                        </thead>
                        <tbody>
                        
          <?php
		  include_once ("callAPI.php");
      include_once ("fechaNumber.php");
      include_once ("fechaCastellano.php");
      require_once ("parametros.php");
      $get_data = callAPI('GET', $servidor.'/api/consultas/comentarios/'.$id,false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $t) {
					      
						    $comentario = $t['comentario'];
                $fecha = fechaCastellano($t['fecha']); 
                $hh = substr($t['fecha'], 11,5);
						    $id_consulta = ' '.$t['id_consulta']; 
						    $usuario = $t['usuario'];

			
              echo "<tr>
			  		            
                        <td width='20%'   class='center'>$fecha</td>
                        <td width='10%'   class='center'>$hh</td>
                        <td width='50%' class='center'>$comentario</td>
					              <td width='20%' class='center'>$usuario</td>
				                <div>
						 
                          <a></i></a>";
			
	          
              echo "    </div>
                      </td>
                    </tr>";
            }
		    ?>
            </tbody>
          </table>
                        
  
                    </div>
                </div>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  
	<?php
  }
} elseif ($_GET['form']=='list') 
{ 

?>    
  <section class="content-header" style="color:#003">
  <h1><i class="fa fa-lock icon-title"></i> Historial de Consultas</h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-13">
      <div class="box box-warning" style="color:#003">
        <div class="box-body">
          <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
              <thead>
              <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                <th class="center">#</th>
                <th class="center">Fecha Registro</th>
                <th class="center">Nombre</th>
                <th class="center">Situación</th>
                <th class="center">Consulta</th>
                <th class="center">Estado</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
            <tbody>
        <?php
  		  include_once ("callAPI.php");
        include_once ("parametros.php");
        include_once ("fechaNumber.php");
  	    $get_data = callAPI('GET', $servidor.'/api/consultas/historial',false);
  		  $response = json_decode($get_data, true);
    
          foreach ($response as $d) {
				      $id = $d['id'];
						  $fecha = fechaNumber($d['fecha']);
              $contacto = $d['contacto'];
              $c = $d['Cliente'];
						  $tel = $d['telefono_movil'];
						  $email = $d['email']; 
						  $consulta = $d['consulta'];
						  $descripcion = $d['descripcion']; 
              $estado = $d['estado'];
              if ($estado == '1'){$e = 'Cerrado';} else {$e = 'En Proceso';};

                echo "<tr>
                <td width='3%'  class='center'>$id</td>
                <td width='10%'  class='center'>$fecha</td>
                <td width='15%'  class='center'>$contacto </td>
                <td width='5%'   class='center'>$c</td>
                <td width='20%'  class='center'>$consulta</td>
                <td width='5%'  class='center'>$e</td>
                <td class='center' width='5%'>
                <a data-toggle='tooltip' data-placement='top' title='Consultar Detalle' style='margin-right:5px' class='btn btn-warning btn-sm' 
                href='?module=form_consultas&form=listar&id=$id'><i style='color:black' class='glyphicon glyphicon-search'></i></a>";
              

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
<?php
} elseif ($_GET['form']=='listar') 
{ 
  
  if (isset($_GET['id'])) 
  {
    $id = $_GET['id'];
  }
        include_once ("callAPI.php");
        include_once ("fechaNumber.php");
        require_once ("parametros.php");
        $get_data = callAPI('GET', $servidor.'/api/consultas/historial/'.$id,false);
        $response = json_decode($get_data, true);
        foreach ($response as $d) {
            $id = $d['id'];
            $c = $d['Cliente'];
            $email = $d['email'];
            $telefono_movil =  $d['telefono_movil'];
            $fecha = fechaNumber($d['fecha']);
            $consulta =  $d['consulta'];
            $contacto =  $d['contacto'];
            $descripcion =  $d['descripcion'];
            $estado =  $d['estado'];
            if ($estado == '1'){$e = 'Cerrado';} else {$e = 'En Proceso';};
        ?>
    
  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Consultas 
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=consultas"> Consultas y Pendientes </a></li>
      <li class="active"> consultas </li>
    </ol>
  </section>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" class="form-horizontal" action="" method="POST">
            <div class="box-body">
                        
            <fieldset> 

               <div class="form-group">
               	<div class="row">

                <div class="col-sm-12 col-md-4">
                    <label class="control-label">Fecha</label>
                      <input type="text" class="form-control" value="<?php echo $fecha; ?>" readonly>
                </div>

               	 <div class="col-sm-12 col-md-4">
                    <label class="control-label">Contacto</label>
                      <input type="text" class="form-control" value="<?php echo $contacto; ?>" readonly>
                </div>
              
                  <div class="col-sm-12 col-md-4">
                    <label class="control-label">Situación</label>
                        <input type="text" class="form-control" i value="<?php echo $c; ?>" readonly>
                   </div>
                </div>
              </div>

             </fieldset>
               
             <fieldset> 

               <div class="form-group">
               	<div class="row">

                <div class="col-sm-12 col-md-4">
                    <label class="control-label">Consulta</label>
                      <input type="text" class="form-control" value="<?php echo $consulta; ?>" readonly>
                </div>

               	 <div class="col-sm-12 col-md-4">
                    <label class="control-label">Tipo de Caja Solicitada</label>
                      <input type="text" class="form-control" value="<?php echo $descripcion; ?>" readonly>
                </div>
              
                  <div class="col-sm-12 col-md-4">
                    <label class="control-label">Estado</label>
                        <input type="text" class="form-control" i value="<?php echo $e; ?>" readonly>
                   </div>
                </div>
              </div>
              
             </fieldset>
            </div><!-- /.btn btn-outline--->

          </form>
          
          <section> 
            <h1>     
              <i class="fa fa-users icon-title" style="color:#FFF"></i> 
                  <i class="fa fa-users icon-title" style="color:#FFF"></i> 
                  <a class="btn btn-warning pull-center" href='?module=consultas' 
                    title="Agregar Acción" data-toggle="tooltip">
                    Volver
                  </a>
              
          </h1>
        </section>
          
          
                <div class="box box-warning" style="color:#003">
                    <div class="box-body">
                        <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
                         <thead>
                          <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                            
                            <th class="center">Fecha</th>
                            <th class="center">Hora</th>
                            <th class="center">Comentario</th>
                            <th class="center">Usuario</th>
                          </tr>
                        </thead>
                        <tbody>
                        
          <?php
		  include_once ("callAPI.php");
      include_once ("fechaNumber.php");
      include_once ("fechaCastellano.php");
      require_once ("parametros.php");
      $get_data = callAPI('GET', $servidor.'/api/consultas/comentarios/'.$id,false);
		  $response = json_decode($get_data, true);
				
				foreach ($response as $t) {
					      
						    $comentario = $t['comentario'];
                $fecha = fechaCastellano($t['fecha']); 
                $hh = substr($t['fecha'], 11,5);
						    $id_consulta = ' '.$t['id_consulta']; 
						    $usuario = $t['usuario'];

			
              echo "<tr>
			  		            
                        <td width='20%'   class='center'>$fecha</td>
                        <td width='10%'   class='center'>$hh</td>
                        <td width='50%' class='center'>$comentario</td>
					              <td width='20%' class='center'>$usuario</td>
				                <div>
						 
                          <a></i></a>";
			
	          
              echo "    </div>
                      </td>
                    </tr>";
            }
		    ?>
            </tbody>
          </table>
                        
  
                    </div>
                </div>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  
	<?php
  }
}

