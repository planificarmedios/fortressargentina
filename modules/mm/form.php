 <?php  

if ($_GET['form']=='edit') { 
  	if (isset($_GET['codigo'])) {
  	require_once("fechaNumber.php");  
	  $codigo = $_GET['codigo']; 
    $_SESSION['codigo'] = $_GET['codigo']; 
   ?>


  <section class="content-header" style="color:#000">
    <h1>
    
      <i class="fa fa-lock icon-title"></i> Asistentes a Reserva <?php echo $codigo; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=mm"> Reserva </a></li>
      <li class="active"> Asistentes </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" style="color:#003" class="form-horizontal" action="MP/crud/cc.php" method="POST">
            <div class="box-body">
            
             </form>
        
                <h1>     
                <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" id="guardar" name="guardar" value="Modificar">
                  <a href="?module=mm" class="btn btn-danger btn-reset">Volver</a>
                </div>
              </div>
            </div>

                
                </h1>

                <div >
                    <div class="box-body">
                        <table border=10 bordercolor="#000000" id="dataTables1" class="table table-bordered table-striped table-hover">
                         <thead>
                          <tr style="background-color: #999; color:#FFF"  border=1 bordercolor="#000000">
                            <th class='center'>#</th>
                            <th class="center">Asistente</th>
                            <th class="center">Mail</th>
							              <th class="center">Dni</th>
						              	<th class="center">Tel.Móvil</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        
          <?php
		  	include_once ("callAPI.php");
        include_once ("parametros.php");
        $get_data = callAPI('GET', $servidor.'/api/asistentes/'.$codigo,false);
        $response = json_decode($get_data, true);
        foreach ($response as $d) {
          $id = $d['id'];
          $nombre = $d['nombre'];
          $apellido = $d['apellido'];
          $dni = $d['dni'];
          $celular = $d['celular'];
          $email = $d['email'];
			
              echo "<tr>
			  		          <td width='5%'   class='center'>$id</td> 
					            <td width='20%'   class='center'>$nombre</td>
                      <td width='20%' class='center'>$apellido</td>
					            <td width='10%' class='center'>$dni</td>
					            <td width='10%' class='center'>$celular</td>
                      
                      
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

?>