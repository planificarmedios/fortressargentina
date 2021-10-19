<script type="text/javascript">

function validarFinalizacion (input){
	  document.getElementById('cambio').value = '1';
    //alert (document.getElementById('cambio').value);
}

</script>


<?php

if ($_GET['formEdit']=='grupo') { 

  if (isset($_GET['id'])) {
   
  $id = $_GET['id']; 
  $id_grupo_afinidad = $_GET['id'];
    
        include_once ("callAPI.php");
        include_once ("parametros.php");
        $get_data = callAPI('GET', $servidor.'/api/afinidad/'.$id,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
            $id = $d['id'];
            $nombre = $d['nombre'];
            $descripcion = $d['descripcion'];
            ?>
  		

            <section class="content-header" style="color:#000">
              <h1>
                <i class="fa fa-edit icon-title" style="color:#000"></i> Modificar  Grupo
              </h1>
              <ol class="breadcrumb">
               
                <li><a href="?module=prices"> Grupos de Afinidad </a></li>
                <li class="active"> Modificar </li>
              </ol>
            </section>
          
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-warning">
                    <!-- form start -->
                    <form role="form" style="color:#003" class="form-horizontal" action="modules/afinidad/proses.php?act=update" method="POST">
                      <div class="box-body">

                      <input id="id" name="id" hidden value="<?php echo $id; ?>">
                      
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nombre del Grupo</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" >
                          </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Descripción del Grupo</label>
                        <div class="col-sm-5">
                            <textarea type="text" name="descripcion" id="descripcion" rows="10" cols="90" placeholder="<?php echo $descripcion; ?>"></textarea>
                            </div>
                      </div>    
                                
                    
                      </div><!-- /.box body -->
          
                      <div class="box-footer">
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-warning btn-submit" name="Guardar" value="Guardar">
                            <a href="?module=afinidad" class="btn btn-danger btn-reset">Cancelar</a>
                          </div>
                        </div>
                      </div><!-- /.box footer -->
                    </form>
                  </div>
                </div>
              </div>  
            </section>
            <?php
            }
           }

} 

/////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

if ($_GET['formEdit']=='editarcajabeneficio') { 

  if (  
    isset($_GET['idregistro']) and
    isset($_GET['idgrupoafinidad']) and
    isset($_GET['idbeneficio']) and
    isset($_GET['idcliente']) 
    ) {
   
  $idregistro = $_GET['idregistro'];
  $idgrupoafinidad = $_GET['idgrupoafinidad']; 
  $idbeneficio = $_GET['idbeneficio']; 
  $idcliente = $_GET['idcliente'];  
  
    
        include_once ("callAPI.php");
        include_once ("parametros.php");
        include_once ("fechaNumber.php");
        $get_data = callAPI('GET', $servidor.'/api/cajaBeneficio/'.$idregistro,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
            $id = $d['id'];
            $serie_caja = $d['serie_caja'];
            $descuento = $d['descuento'];
            $inicio = $d['inicio'];
            $finalizacion = $d['finalizacion'];
            $duracion = $d['duracion'];
            ?>
  		

            <section class="content-header" style="color:#000">
              <h1>
                <i class="fa fa-edit icon-title" style="color:#000"></i> Modificar  Beneficios
              </h1>
              <ol class="breadcrumb">
               
                <li><a href="?module=prices"> Caja y Beneficios </a></li>
                <li class="active"> Modificar </li>
              </ol>
            </section>
          
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-warning">
                    <!-- form start -->
                    <form role="form" style="color:#003" class="form-horizontal" action="modules/afinidad/proses.php?act=updatecajaBeneficio" method="POST">
                      <div class="box-body">

                      <input id="id" name="id" hidden value="<?php echo $id; ?>">
                      <input id="idgrupoafinidad" name="idgrupoafinidad" hidden value="<?php echo $idgrupoafinidad; ?>">
                      <input id="idbeneficio" name="idbeneficio" hidden value="<?php echo $idbeneficio; ?>">
                      <input id="idcliente" name="idcliente" hidden value="<?php echo $idcliente; ?>">

                      <div class="form-group">
                          <label class="col-sm-2 control-label">Caja</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?php echo $serie_caja; ?>" readonly>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Descuento</label>
                          <div class="col-sm-5">
                            <input type="text" name="descuento" id="descuento" class="form-control" value="<?php echo $descuento; ?>">
                          </div>
                        </div> 

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Fecha Inicio </label>
                            <div class="col-sm-5">
                              <input type="text"  class="form-control date-picker" data-date-format="mm-dd-yyyy"  value='<?php echo  fechaNumber($inicio);?>'  id="inicio" name="inicio" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Fecha Final </label>
                            <div class="col-sm-5">
                              <input type="text"  class="form-control date-picker" data-date-format="mm-dd-yyyy"  value='<?php echo  fechaNumber($finalizacion);?>'  id="fin" name="fin" autocomplete="off">
                            </div>
                        </div>
                                
                    
                      </div><!-- /.box body -->
          
                      <div class="box-footer">
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-warning btn-submit" name="Guardar" value="Guardar">
                            <a href="?module=afinidad" class="btn btn-danger btn-reset">Cancelar</a>
                          </div>
                        </div>
                      </div><!-- /.box footer -->
                    </form>
                  </div>
                </div>
              </div>  
            </section>
            <?php
            }
           }

} 







//////////////////////////////////////////////////////////////////////////////
if ($_GET['formEdit']=='add') { 

  if (isset($_GET['id'])) {
   
  $id = $_GET['id']; 
  $id_grupo_afinidad = $_GET['id'];
    
        include_once ("callAPI.php");
        include_once ("parametros.php");
        $get_data = callAPI('GET', $servidor.'/api/afinidad/'.$id,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
            $id = $d['id'];
            $nombre = $d['nombre'];
            $descripcion = $d['descripcion'];
            ?>
  		

            <section class="content-header" style="color:#000">
              <h1>
                <i class="fa fa-edit icon-title" style="color:#000"></i> Asociar Nuevo Beneficio al Grupo
              </h1>
              <ol class="breadcrumb">
               
                <li><a href="?module=afinidad"> Planes de Afinidad </a></li>
                <li class="active"> agregar </li>
              </ol>
            </section>
          
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-warning">
                    <!-- form start -->
                    <form role="form" style="color:#003" class="form-horizontal" action="modules/afinidad/proses.php?act=beneficio" method="POST">
                      <div class="box-body">

                      <input id="id" name="id" hidden value="<?php echo $id; ?>">
                      
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Descripción del Beneficio</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" autocomplete="off" required>
                          </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">% de Beneficio</label>
                        <div class="col-sm-5">
                        <input type="number" class="form-control" id="porcentaje" name="porcentaje" autocomplete="off" required>
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meses de aplicación</label>
                        <div class="col-sm-5">
                        <input type="number" class="form-control" id="duracion" name="duracion" autocomplete="off" required>
                            </div>
                      </div>      
                                
                    
                      </div><!-- /.box body -->
          
                      <div class="box-footer">
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-warning btn-submit" name="guardar" value="Guardar">
                            <a href="?module=afinidad" class="btn btn-danger btn-reset">Cancelar</a>
                          </div>
                        </div>
                      </div><!-- /.box footer -->
                    </form>
                  </div>
                </div>
              </div>  
            </section>
            <?php
            }
           }

} 



elseif ($_GET['formEdit']=='beneficios') { 

  if (isset($_GET['id'])) {
   
  $id = $_GET['id']; 
  $id_grupo_afinidad = $_GET['id'];
    
        include_once ("callAPI.php");
        include_once ("parametros.php");
        include_once ("fechaNumber.php");
        $get_data = callAPI('GET', $servidor.'/api/afinidad/'.$id_grupo_afinidad,false);
        $response = json_decode($get_data, true);
        foreach ($response as $d) {
          $id = $d['id'];
          $nombre = $d['nombre'];
          $descripcion = $d['descripcion'];
          $estado = $d['estado'];
          if (($d['estado']) == 1 ) {
            $s = 'Vigente';
          } else  {
            $s = 'No vigente';
          }

          
?>


<section class="content-header" style="color:#003">
<h1>
  <i class="fa fa-users icon-title"></i> <?php echo $nombre ?>

  
  <a class="btn btn-primary btn-social pull-right" href="?module=formEdit_afinidad&formEdit=add&id=<?php echo $id;?>" title="Agregar" data-toggle="tooltip">
    <i class="fa fa-plus"></i> Agregar Plan de Beneficios al Grupo
  </a>
</h1>
</section>



<section class="content">
<div class="row">
  <div class="col-md-12">
   

     <div class="box box-warning" style="color:#003">
       <section class="content">
            <div class="form-group">
               <div class="row">
              
                  <div class="col-sm-6 col-md-6">
                      <h2 class="sub-header">Planes y beneficios</h2>
                        <table  bordercolor="#000000" id="dataTables1" class="table table-bordered  table-hover">
                            <thead>
                              <tr style="background-color: #999; color:#FFF"  bordercolor="#000000">
                               <th class="center">#</th>
                                <th class="center">Descripción</th>
                                <th class="center">% Aplicación</th>
                                <th class="center">Duración</th>
                                <th class="center">Creación</th>
                                <th class="center">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                            include_once ("callAPI.php");
                            include_once ("parametros.php");
                            include_once ("fechaNumber.php");
                            $get_data = callAPI('GET', $servidor.'/api/Beneficios/'.$id_grupo_afinidad,false);
                            $response = json_decode($get_data, true);
                              
                              foreach ($response as $d) {
                            
                                $id_beneficio = $d['id'];
                                $descripcion = $d['descripcion']; 
                                $porcentaje = ' '.$d['porcentaje']; 
                                $duracion = $d['duracion'];
                                $creacion = fechaNumber($d['creacion']);
                                
                                echo "<tr>
                                        <td width='3%' class='center'>$id_beneficio</td> 
                                        <td width='30%' class='center'>$descripcion</td>
                                        <td width='12%' class='center'>$porcentaje %</td>
                                        <td width='10%' class='center'>$duracion meses</td>
                                        <td width='10%' class='center'>$creacion</td>
                                        <td class='center' width='10%'>
                                        <div>";
                                        ?>
                                              <a data-toggle="tooltip" data-placement="top" title="Ver Asociados al Beneficio" style="margin-right:5px" class="btn btn-success btn-sm" 
                                              href="?module=formEdit_afinidad&formEdit=asocbeneficios&id=<?php echo $id_grupo_afinidad;?>&idbeneficio=<?php echo $id_beneficio;?>">
                                              <i style="color:#fff" class="glyphicon glyphicon-user"></i>
                                              </a>

                                             
                                        <?php
                                         
                                           
                                echo "    </div>
                                        </td>
                                      </tr>";
                              }
                            
                          ?>
                              </tbody>
                        </table>
                  </div> 

                
                  <div class="col-sm-6 col-md-6">
                        
                        <h2 class="sub-header">Asociados al Grupo</h2>
                          <table   id="dataTables1" class="table table-hover">
                              <thead>
                                <tr style="background-color: #FFF; color:#FFF">
                                  <th class="center">#</th>
                                  <th class="center">Cliente</th>
                                 
                                  <th class="center">Acciones</th>
                                </tr>
                                <tr style="background-color: #999; color:#FFF">
                                <th class="center">#</th>
                                <th class="center">Cliente</th>
                              
                                <th class="center">Grupo de Afinidad</th>
                                </tr>
                                </tr>
                              </thead>
                              <tbody>
                            <?php
                        include_once ("callAPI.php");
                        include_once ("parametros.php");
                        include_once ("fechaNumber.php");
                         $get_data = callAPI('GET', $servidor.'/api/clientesafinidadIgual/'.$id_grupo_afinidad,false);
                        $response = json_decode($get_data, true);
                          
                          foreach ($response as $d) {
                                $id_cliente = $d['id'];
                                $nombre = $d['nombre']; 
                                $apellido = ' '.$d['apellido']; 
                                $status = $d['status'];
                                $filiacion = $d['FILIACION'];
                                $vip = 1;
                                if ($status==1){$s = 'Activo';} else {$s = 'Inactivo';};
                                $evento = 0;
                        
                                echo "<tr>
                                        <td width='3%' class='center'>$id_cliente</td>  
                                        <td width='30%' class='center'>$nombre$apellido</td>
                                        
                                        <td width='30%'  class='center'>$filiacion</td>
                                        
                                          <div>";
                                          ?>
                                          
                                         <?php
                                            
                                echo "    </div>
                                        </td>
                                      </tr>";
                              }
                            
                          ?>
                              </tbody>
                          </table>
                    </div> 
                </div>   
                
             </div> 
      </div>
</section>

<?php
            }
           }

} 

///////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET['formEdit']=='asocbeneficios') { 

  if (isset($_GET['id'])) {
   
  $id = $_GET['id'];
  $id_grupo_afinidad = $_GET['id'];
  $idbeneficio = $_GET['idbeneficio'];
  if (isset($_GET['descripcion'])) { 
    
    $_SESSION['descripcionPlan'] = ($_GET['descripcion']);
  };
    
        include_once ("callAPI.php");
        include_once ("parametros.php");
        include_once ("fechaNumber.php");
        $get_data = callAPI('GET', $servidor.'/api/afinidad/'.$id,false);
        $response = json_decode($get_data, true);
        foreach ($response as $d) {
          $id = $d['id'];
          $nombre = $d['nombre'];
          $descripcion = $d['descripcion'];
          $estado = $d['estado'];
          if (($d['estado']) == 1 ) {
            $s = 'Vigente';
          } else  {
            $s = 'No vigente';
          }

          
?>


<section class="content-header" style="color:#003">
<h1>
  <i class="fa fa-users icon-title"></i> <?php echo $nombre ?>

  
  <a class="btn btn-primary btn-social pull-right" href="?module=formEdit_afinidad&formEdit=add&id=<?php echo $id;?>" title="Agregar" data-toggle="tooltip">
    <i class="fa fa-plus"></i> Agregar Plan de Beneficios al Grupo
  </a>
</h1>
</section>



<section class="content">
<div class="row">
  <div class="col-md-12">
   

     <div class="box box-warning" style="color:#003">
       <section class="content">
            <div class="form-group">
               <div class="row">
              
                  <div class="col-sm-5 col-md-5">
                      <h2 class="sub-header">Planes y beneficios</h2>
                        <table  bordercolor="#000000" id="dataTables1" class="table table-bordered  table-hover">
                            <thead>
                              <tr style="background-color: #999; color:#FFF"  bordercolor="#000000">
                               <th class="center">#</th>
                                <th class="center">Descripción</th>
                                <th class="center">% Aplicación</th>
                                <th class="center">Duración</th>
                                
                                <th class="center">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                            include_once ("callAPI.php");
                            include_once ("parametros.php");
                            include_once ("fechaNumber.php");
                            $get_data = callAPI('GET', $servidor.'/api/Beneficios/'.$id_grupo_afinidad,false);
                            $response = json_decode($get_data, true);
                              
                              foreach ($response as $d) {
                            
                                $id_beneficio = $d['id'];
                                $descripcion = $d['descripcion']; 
                                $porcentaje = ' '.$d['porcentaje']; 
                                $duracion = $d['duracion'];
                                $creacion = fechaNumber($d['creacion']);
                                
                                echo "<tr>
                                        <td width='3%' class='center'>$id_beneficio</td> 
                                        <td width='30%' class='center'>$descripcion</td>
                                        <td width='12%' class='center'>$porcentaje %</td>
                                        <td width='10%' class='center'>$duracion meses</td>
                                        <
                                        <td class='center' width='10%'>
                                        <div>";
                                        ?>
                                              <a data-toggle="tooltip" data-placement="top" title="Ver Asociados al Beneficio" style="margin-right:5px" class="btn btn-success btn-sm" 
                                              href="?module=formEdit_afinidad&formEdit=asocbeneficios&id=<?php echo $id_grupo_afinidad;?>&idbeneficio=<?php echo $id_beneficio;?>&descripcion=<?php echo $descripcion;?>">
                                              <i style="color:#fff" class="glyphicon glyphicon-user"></i>
                                              </a>

                                              <a data-toggle="tooltip" data-placement="top" title="Asociar Clientes" style="margin-right:5px" class="btn btn-primary btn-sm" 
                                              href="?module=formEdit_afinidad&formEdit=asociarbeneficiario&id=<?php echo $id_grupo_afinidad;?>&idbeneficio=<?php echo $id_beneficio;?>">
                                              <i style="color:#fff" class="glyphicon glyphicon-arrow-right"></i>
                                              </a>
                                        <?php
                                         
                                           
                                echo "    </div>
                                        </td>
                                      </tr>";
                              }
                            
                          ?>
                              </tbody>
                        </table>
                  </div> 

                
                  <div class="col-sm-7 col-md-7">
                        
                        <h2 class="sub-header">Asociados al Beneficio <?php echo $_SESSION['descripcionPlan']?></h2>
                          <table   id="dataTables1" class="table table-hover">
                              <thead>
                                <tr style="background-color: #FFF; color:#FFF">
                                  <th class="center">#</th>
                                  <th class="center">Cliente</th>
                                  <th class="center">Caja</th>
                                  <th class="center">Desde</th>
                                  <th class="center">Hasta</th>
                                  <th class="center">Porcentaje</th>
                                  <th class="center">Acciones</th>
                                </tr>
                                <tr style="background-color: #999; color:#FFF">
                                  <th class="center">#</th>
                                  <th class="center">Cliente</th>
                                  <th class="center">Caja</th>
                                  <th class="center">Desde</th>
                                  <th class="center">Hasta</th>
                                  <th class="center">Porcentaje</th>
                                  <th class="center">Acciones</th>
                                </tr>
                               
                              </thead>
                              <tbody>
                            <?php
                        include_once ("callAPI.php");
                        include_once ("parametros.php");
                        include_once ("fechaNumber.php");
                         $get_data = callAPI('GET', $servidor.'/api/clientesbeneficioscajas/'.$idbeneficio,false);
                        $response = json_decode($get_data, true);
                          
                          foreach ($response as $d) {
                                $id_cliente = $d['id'];
                                $nombre = $d['nombre']; 
                                $apellido = ' '.$d['apellido']; 
                                $inicio = fechaNumber($d['inicio']); 
                                $finalizacion = fechaNumber($d['finalizacion']);
                                $porcentaje = $d['porcentaje'];
                                $status = $d['status'];
                                $serie = $d['serie'];
                             
                                echo "<tr>
                                        <td width='3%' class='center'>$id_cliente</td>  
                                        <td width='30%' class='center'>$nombre$apellido</td>
                                        <td width='5%' class='center'>$serie</td>
                                        <td width='15%' class='center'>$inicio</td>
                                        <td width='15%' class='center'>$finalizacion</td>
                                        <td width='10%' class='center'>$porcentaje %</td> 
                                        <td class='center' width='10%'>
                                        <div>";
                                        ?>
                                             <a data-toggle="tooltip" data-placement="top" title="Cajas y Beneficios" style="margin-right:1px" class="btn btn-primary btn-sm" 
                                          href="?module=formEdit_afinidad&formEdit=beneficioscajas&id=<?php echo $id_grupo_afinidad;?>&idbeneficio=<?php echo $id_beneficio;?>&idcliente=<?php echo $id_cliente;?>">
                                          <i style="color:#fff" class="glyphicon glyphicon-edit"></i>
                                          </a>

                                        <?php
                                         
                                           
                                echo "    </div>
                                        </td>
                                      </tr>";
                              }
                            
                          ?>
                              </tbody>
                          </table>
                    </div> 
                </div>   
                
             </div> 
      </div>
</section>

<?php
            }
           }

} 

///////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET['formEdit']=='asociarbeneficiario') { 

  if (isset($_GET['id']) and ($_GET['idbeneficio'])) {
   
  $id = $_GET['id'];
  $id_grupo_afinidad = $_GET['id'];
  $idbeneficio = $_GET['idbeneficio'];
    
        include_once ("callAPI.php");
        include_once ("parametros.php");
        include_once ("fechaNumber.php");
        $get_data = callAPI('GET', $servidor.'/api/afinidad/'.$id,false);
        $response = json_decode($get_data, true);
        foreach ($response as $d) {
          $id = $d['id'];
          $nombre = $d['nombre'];
          $descripcion = $d['descripcion'];
          $estado = $d['estado'];
          if (($d['estado']) == 1 ) {
            $s = 'Vigente';
          } else  {
            $s = 'No vigente';
          }

          
?>


<section class="content-header" style="color:#003">
<h1>
  <i class="fa fa-users icon-title"></i> <?php echo $nombre ?>

  <a class="btn btn-danger btn-social pull-right" href="?module=formEdit_afinidad&formEdit=asocbeneficios&id=<?php echo $id;?>&idbeneficio=<?php echo $idbeneficio;?>" data-toggle="tooltip">
    <i class="fa fa-close"></i> Volver
  </a>
  
</h1>
</section>



<section class="content">
<div class="row">
  <div class="col-md-12">
   

     <div class="box box-warning" style="color:#003">
       <section class="content">
            <div class="form-group">
               <div class="row">
              
                  <div class="col-sm-12 col-md-12">
                      <h2 class="sub-header">Asociación de Clientes</h2>
                        <table  bordercolor="#000000" id="dataTables1" class="table table-bordered  table-hover">
                            <thead>
                              <tr style="background-color: #999; color:#FFF"  bordercolor="#000000">
                               <th class="center">#</th>
                                <th class="center">Cliente</th>
                                
                                 <th class="center">Desc.</th>
                                <th class="center">Duración</th>
                                <th class="center">Inicio</th>
                                <th class="center">Finalizacion</th>
                                <th class="center">Acciones</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                            include_once ("callAPI.php");
                            include_once ("parametros.php");
                            include_once ("fechaNumber.php");
                            $get_data = callAPI('GET', $servidor.'/api/gruposybeneficiosBis/'.$id_grupo_afinidad.'/'.$idbeneficio,false);
                            $response = json_decode($get_data, true);
                              
                              foreach ($response as $d) {
                                  $id_registro = $d['REGISTRO'];
                                  $id_cliente = $d['ID_CLIENTE'];
                                  $nombre = $d['nombre'];
                                  $apellido = ' '.$d['apellido'];
                                  if ($d['id_plan']>0){
                                      $serie = ' '.$d['serie'];
                                      $descuento = $d['descuento'].' %'; 
                                      $duracion = $d['duracion'].' meses'; 
                                      $inicio = fechaNumber($d['inicio']);
                                      $finalizacion = fechaNumber($d['finalizacion']);
                                  } else {
                                      $serie = ' ';
                                      $descuento = ' '; 
                                      $duracion = ' ';
                                      $inicio = ' ';
                                      $finalizacion = ' ';
                                  }
                                   
                                  
                                  echo "<tr>
                                          <td width='3%' class='center'>$id_cliente</td> 
                                          <td width='35%' class='center'>$nombre$apellido</td> 
                                          
                                          <td width='6%' class='center'>$descuento</td>
                                          <td width='10%' class='center'>$duracion</td>
                                          <td width='10%' class='center'>$inicio</td>
                                          <td width='10%' class='center'>$finalizacion</td>
                                          <td class='center' width='10%'>
                                          <div>";
                                          
                                          
                                           
                                          if ($d['id_plan']>0){
                                          ?>  
                                          <a data-toggle="tooltip" data-placement="top" title="Beneficios y Cajas" style="margin-right:1px" class="btn btn-primary btn-sm" 
                                          href="?module=formEdit_afinidad&formEdit=beneficioscajas&id=<?php echo $id_grupo_afinidad;?>&idbeneficio=<?php echo $idbeneficio;?>&idregistro=<?php echo $id_registro;?>&idcliente=<?php echo $id_cliente;?>">
                                          <i style="color:#fff" class="glyphicon glyphicon-edit"></i>
                                          </a>

                                          <?php 
                                          }
                                            else {
                                          ?>
                                          <a data-toggle="tooltip" data-placement="top" title="Asociar Cliente al Beneficio" style="margin-right:5px" class="btn btn-success btn-sm" 
                                           href="modules/afinidad/proses.php?act=nuevobeneficiario&grupoafinidad=<?php echo $id_grupo_afinidad;?>&idcliente=<?php echo $id_cliente;?>&idbeneficio=<?php echo $idbeneficio;?>"
                                                onclick="return confirm('CONFIRMAR ASOCIACIÓN  DEL CLIENTE AL BENEFICIO?');"><i style="color:#fff" class="glyphicon glyphicon-user"></i>
                                          </a>

                                          <?php    
                                          }
                                    
                                         
                                           
                                echo "    </div>
                                          </td>
                                        </tr>";
                                
                              }
                            
                          ?>
                              </tbody>
                          </table>
                    </div> 
                </div>   
                </div>   
                
             </div> 
      </div>
</section>

<?php
            }
           }

} 

///////////////////////////////////////////////////////////////////////////////////////////////


elseif ($_GET['formEdit']=='beneficioscajas') { 

  if (isset($_GET['id']) and ($_GET['idbeneficio'])) {
   
  $id = $_GET['id'];
  $id_grupo_afinidad = $_GET['id'];
  $idbeneficio = $_GET['idbeneficio'];
  $idcliente = $_GET['idcliente'];
    
        include_once ("callAPI.php");
        include_once ("parametros.php");
        include_once ("fechaNumber.php");
        $get_data = callAPI('GET', $servidor.'/api/afinidad/'.$id,false);
        $response = json_decode($get_data, true);
        foreach ($response as $d) {
          $id = $d['id'];
          $nombre = $d['nombre'];
          $descripcion = $d['descripcion'];
          $estado = $d['estado'];
          if (($d['estado']) == 1 ) {
            $s = 'Vigente';
          } else  { 
            $s = 'No vigente';
          }

          
?>


<section class="content-header" style="color:#003">
<h1>
  <i class="fa fa-users icon-title"></i> GRUPO DE AFINIDAD <?php echo $nombre ?>

  <a class="btn btn-danger btn-social pull-right" href="?module=formEdit_afinidad&formEdit=asocbeneficios&id=<?php echo $id;?>&idbeneficio=<?php echo $idbeneficio;?>" data-toggle="tooltip">
    <i class="fa fa-close"></i> Volver
  </a>
  
</h1>
</section>



<section class="content">
<div class="row">
  <div class="col-md-12">
   

     <div class="box box-warning" style="color:#003">
       <section class="content">
            <div class="form-group">
               <div class="row">
              
                  <div class="col-sm-5 col-md-5">
                      <h2 class="sub-header">Cajas</h2>
                        <table  bordercolor="#000000" id="dataTables1" class="table table-bordered  table-hover">
                            <thead>
                             <tr style="background-color: #999; color:#FFF"  bordercolor="#000000">
                               <th class="center">#</th>
                                <th class="center">Caja</th>
                                <th class="center">Situación</th>
                                <th class="center">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                            include_once ("callAPI.php");
                            include_once ("parametros.php");
                            include_once ("fechaNumber.php");
                            $get_data = callAPI('GET', $servidor.'/api/access/cliente/cajas/'.$idcliente ,false);
                            $response = json_decode($get_data, true);
                              
                              foreach ($response as $d) {
                                    $idcaja = $d['id'];
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
						 
						 
							echo "
               <tr>
                   <td width='5'   class='center'>$idcaja</td> 
							     <td width='5'   class='center'>$serie</td> 
					         <td width='20'   class='center'>$titular</td>
                 
                   <td class='center' width='5'>
                   <div>";
                   ?>

                    <a data-toggle="tooltip" data-placement="top" title="Asociar Caja al Beneficio" style="margin-right:1px" class="btn btn-success btn-sm" 
                      href="modules/afinidad/proses.php?act=asociarcajabeneficio&id=<?php echo $id_grupo_afinidad;?>&serie=<?php echo $serie;?>&idbeneficio=<?php echo $idbeneficio;?>&idcliente=<?php echo $idcliente;?>&idcaja=<?php echo $idcaja;?>"
                      onclick="return confirm('CONFIRMAR ASOCIACIÓN?');">
                    <i style="color:#fff" class="glyphicon glyphicon-check"></i>
                    </a>

                    <?php                
                    echo "   	</div>
                                          </td>
                                        </tr>";
                                
                              }
                            
                          ?>
                              </tbody>
                        </table>
                  </div> 

                
                  <div class="col-sm-7 col-md-7">
                      <h2 class="sub-header">Cajas Asociadas</h2>
                        <table  bordercolor="#000000" id="dataTables1" class="table table-bordered  table-hover">
                        <thead>
                              <tr style="background-color: #999; color:#FFF"  bordercolor="#000000">
                               <th class="center">#</th>
                                <th class="center">Cliente</th>
                                <th class="center">Caja</th>
                                <th class="center">Benef.</th>
                                <th class="center">Inicio</th>
                                <th class="center">Fin</th>
                                <th class="center">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                            include_once ("callAPI.php");
                            include_once ("parametros.php");
                            include_once ("fechaNumber.php");
                            $get_data = callAPI('GET', $servidor.'/api/cajasybeneficios/'.$idbeneficio.'/'.$idcliente,false);
                            $response = json_decode($get_data, true);
                              
                              foreach ($response as $d) {
                                
                                $id_registro = $d['REGISTRO'];
                                $id_cliente = $d['id'];
                                $nombre = $d['nombre'];
                                $apellido = ' '.$d['apellido'];
                                $serie_caja = ' '.$d['serie_caja'];
                                
                                  $id_plan = $d['id_plan'];
                                  $descripcion = $d['descripcion'];
                                  $descuento = $d['descuento'].' %'; 
                                  $duracion = $d['duracion'].' meses'; 
                                  $inicio = fechaNumber($d['inicio']);
                                  $fin = fechaNumber($d['finalizacion']);
                              
                              
                                
                                
                                echo "<tr>
                                        <td width='3%' class='center'>$id_registro</td> 
                                        <td width='40%' class='center'>$nombre$apellido</td> 
                                        <td width='3%' class='center'>$serie_caja</td> 
                                        
                                        <td width='9%' class='center'>$descuento</td>
                                        <td width='15%' class='center'>$inicio</td>
                                        <td width='15%' class='center'>$fin</td>
                                        <td class='center' width='20%'>
                   <div>";
                   ?>

                    <a data-toggle="tooltip" data-placement="top" title="Editar Beneficio" style="margin-right:1px" class="btn btn-primary btn-sm" 
                    href="?module=formEdit_afinidad&formEdit=editarcajabeneficio&idgrupoafinidad=<?php echo $id_grupo_afinidad;?>&idbeneficio=<?php echo $idbeneficio;?>&idcliente=<?php echo $idcliente;?>&idregistro=<?php echo $id_registro;?>">
                    <i style="color:#fff" class="glyphicon glyphicon-check"></i>
                    </a>

                    <a data-toggle="tooltip" data-placement="top" title="Eliminar Beneficio" style="margin-right:1px" class="btn btn-danger btn-sm" 
                      href="modules/afinidad/proses.php?act=eliminarcajabeneficio&idgrupoafinidad=<?php echo $id_grupo_afinidad;?>&idbeneficio=<?php echo $idbeneficio;?>&idcliente=<?php echo $idcliente;?>&idregistro=<?php echo $id_registro;?>"
                      onclick="return confirm('CONFIRMAR ELIMINACIÓN?');">
                    <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                    </a>

                    <?php                
                    echo "   	</div>
                                          </td>
                                        </tr>";
                                
                              }
                            
                          ?>
                              </tbody>
                          </table>
                    </div> 
                </div>   
                </div>   
                
             </div> 
      </div>
</section>

<?php
            }
           }

}

/////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////
else if ($_GET['formEdit']=='edit') { 

  	if (isset($_GET['id'])) {
     
	  $id = $_GET['id']; 
    $id_grupo_afinidad = $_GET['id'];
      
          include_once ("callAPI.php");
          include_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/afinidad/'.$id,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
            $id = $d['id'];
            $nombre = $d['nombre'];
            $descripcion = $d['descripcion'];
            $estado = $d['estado'];
            if (($d['estado']) == 1 ) {
              $s = 'Vigente';
            } else  {
              $s = 'No vigente';
            }

						
					?>


<section class="content-header" style="color:#003">


  <div class="row">
          <div class="col-md-11">
            
            <div class="col-md-2 pull-right">
            <a class="btn btn-primary btn-social pull-right" href="?module=formEdit_afinidad&formEdit=add&id=<?php echo $id;?>" title="Agregar" data-toggle="tooltip">
                <i class="fa fa-plus"></i> Agregar Beneficios
              </a>
            </div>

            <div class="col-md-2 pull-right">
              <a class="btn btn-success btn-social pull-right" href="?module=formEdit_afinidad&formEdit=beneficios&id=<?php echo $id;?>" title="Agregar" data-toggle="tooltip">
                <i class="fa fa-check "></i> Ver Beneficios
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
     ?>

       <div class="box box-warning" style="color:#003">
         <section class="content">
              <div class="form-group">
               	<div class="row">
              	
                    <div class="col-sm-6 col-md-6">
                        <h2 class="sub-header">No Asociados</h2>
                          <table  bordercolor="#000000" id="dataTables1" class="table table-bordered  table-hover">
                              <thead>
                                <tr style="background-color: #999; color:#FFF"  bordercolor="#000000">
                                 <th class="center">#</th>
                                  <th class="center">Cliente</th>
                                  <th class="center">Grupo</th>
                                  <th class="center">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php

                              include_once ("callAPI.php");
                              include_once ("parametros.php");
                              include_once ("fechaNumber.php");
                              $get_data = callAPI('GET', $servidor.'/api/clientesafinidadDistinta/'.$id_grupo_afinidad,false);
                              $response = json_decode($get_data, true);
                                
                                foreach ($response as $d) {
                              
                                  $id_cliente = $d['id'];
                                  $nombre = $d['nombre']; 
                                  $apellido = ' '.$d['apellido']; 
                                  $status = $d['status'];
                                  $filiacion = $d['FILIACION'];
                                  $vip = 1;
                                  if ($status==1){$s = 'Activo';} else {$s = 'Inactivo';};
                                  $evento = 0;
                          
                                  echo "<tr>
                                          <td width='3%' class='center'>$id_cliente</td> 
                                          <td width='30%' class='center'>$nombre$apellido</td>
                                          
                                          <td width='30%'  class='center'>$filiacion</td>
                                          <td class='center' width='8%'>
                                          <div>";
                                          ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Asociar al Grupo" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/afinidad/proses.php?act=on&grupoafinidad=<?php echo $id_grupo_afinidad;?>&id=<?php echo $id_cliente;?>"
                                                onclick="return confirm('CONFIRMAR ASOCIACIÓN? ESTA ACCIÓN NO PODRÁ DESHACERSE Y EL CLIENTE PERDERÁ CUALQUIER BENEFICIO ANTERIOR REGISTRADO');"><i style="color:#fff" class="glyphicon glyphicon-arrow-right"></i>
                                                </a>
                                          <?php
                                           
                                             
                                  echo "    </div>
                                          </td>
                                        </tr>";
                                }
                              
                            ?>
                                </tbody>
                          </table>
                    </div> 

                  
                    <div class="col-sm-6 col-md-6">
                          
                          <h2 class="sub-header">Asociados al Grupo</h2>
                            <table   id="dataTables1" class="table table-hover">
                                <thead>
                                  <tr style="background-color: #FFF; color:#FFF">
                                    <th class="center">#</th>
                                    <th class="center">Cliente</th>
                                    
                                    
                                    <th class="center">Acciones</th>
                                  </tr>
                                  <tr style="background-color: #999; color:#FFF">
                                  <th class="center">#</th>
                                  <th class="center">Cliente</th>
                                  
                                  <th class="center">Grupo</th>
                                  <th class="center">Acciones</th>
                                  </tr>
                                  </tr>
                                </thead>
                                <tbody>
                              <?php
                          include_once ("callAPI.php");
                          include_once ("parametros.php");
                          include_once ("fechaNumber.php");
                          $get_data = callAPI('GET', $servidor.'/api/clientesafinidadIgual/'.$id_grupo_afinidad,false);
                          $response = json_decode($get_data, true);
                            
                            foreach ($response as $d) {
                                  $id_cliente = $d['id'];
                                  $nombre = $d['nombre']; 
                                  $apellido = ' '.$d['apellido']; 
                                  $status = $d['status'];
                                  $filiacion = $d['FILIACION'];
                                  $vip = 1;
                                  if ($status==1){$s = 'Activo';} else {$s = 'Inactivo';};
                                  $evento = 0;
                          
                                  echo "<tr>
                                          <td width='3%' class='center'>$id_cliente</td>  
                                          <td width='30%' class='center'>$nombre$apellido</td>
                                          
                                          <td width='30%'  class='center'>$filiacion</td>
                                          <td class='center' width='5%'>
                                            <div>";
                                            ?>
                                            <a data-toggle="tooltip" data-placement="top" title="Desasociar del Grupo" style="margin-right:5px" class="btn btn-danger btn-sm" href="modules/afinidad/proses.php?act=off&grupoafinidad=<?php echo $id_grupo_afinidad;?>&id=<?php echo $id_cliente;?>"
                                            onclick="return confirm('CONFIRMAR DESASOCIACIÓN? ESTA ACCIÓN NO PODRÁ DESHACERSE Y EL CLIENTE PERDERÁ CUALQUIER BENEFICIO REGISTRADO');"><i style="color:#fff" class="glyphicon glyphicon-arrow-left"></i>
                                            </a>
                                           <?php
                                              
                                  echo "    </div>
                                          </td>
                                        </tr>";
                                }
                              
                            ?>
                                </tbody>
                            </table>
                      </div> 
                  </div>   
                  
               </div> 
        </div>
</section>
 
	<?php
  }
 }  
} 