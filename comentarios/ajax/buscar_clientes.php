<?php

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_cuenta=intval($_GET['id']);
		$sql = "select * from agencias.cuentas where id_cuenta='".$id_cuenta."'";		
		$query=mysqli_query($con, $sql);
		$rw_cuenta=mysqli_fetch_array($query);
		$count=$rw_cuenta['id_cuenta'];
		if ($id_cuenta!=1){
			if ($delete1=mysqli_query($con,"DELETE FROM agencias.cuentas WHERE id_cuenta='".$id_cuenta."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Algo ha salido mal con el Objetivo.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puede borrar el usuario administrador. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('abonado', 'nombre_objetivo');//Columnas de busqueda
		 $sTable = "agencias.cuentas ac left join agencias.`localidad-partido` lp 
     				on ac.codigo_localidad = lp.cd_localidad";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by nombre_objetivo asc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
		$sql="SELECT ac.*, lp.ds_localidad 
			  FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);

		//loop through fetched data
		if ($numrows>0){
			
			?>						
			<div id="gridtable" class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Abonado</th>
					<th>Nombre Objetivo</th>
					<th>Domicilio</th>
					<th>Localidad</th>
					<th>Informado</th>
					<th>Fecha Comunicación</th>
					<th><span class="pull-right">Acciones</span></th>
									
				</tr>
				
				
				
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_cuenta = $row['id_cuenta'];
					$abonado = $row['abonado'];
					$nombre_objetivo = $row['nombre_objetivo'];
					$codigo_rubro = $row['codigo_rubro'];
					$codigo_tipo_prestacion = $row['codigo_tipo_prestacion'];
					$vigilancia_fisica = $row['vigilancia_fisica'];
					$monitoreo_fijo = $row['monitoreo_fijo'];
					$monitoreo_movil = $row['monitoreo_movil'];
					$nro_pago_objetivo = $row['nro_pago_objetivo'];
					$con_arma = $row['con_arma'];
					$codigo_ambito = $row['codigo_ambito'];
					$observaciones = $row['observaciones'];
					$tipo_calle = $row['tipo_calle'];
					$calle = $row['calle'];
					$nro_domicilio = $row['nro_domicilio'];
					$medio = $row['medio'];
					$piso = $row['piso'];
					$depto = $row['depto'];
					$entre_calle_1 = $row['entre_calle_1'];
					$entre_calle_2 = $row['entre_calle_2'];
					$codigo_localidad = $row['codigo_localidad'];
					$codigo_partido = $row['codigo_partido'];
					$codigo_provincia = $row['codigo_provincia'];
					
					$domicilio = $row['calle']." ".$row["nro_domicilio"];
					$localidad = $row['ds_localidad'];
					$fecha_creacion_archivo = $row['fecha_creacion_archivo'];
					// Verifica si el objetivo fue informado tomando la fecha de creacion del archivo como flag
					if ($fecha_creacion_archivo === "0000-00-00"){
						$fecha_creacion_archivo = "";
						$informado = "NO";
					}else{ 					
						$fecha_creacion_archivo	= date("d-m-Y", strtotime($fecha_creacion_archivo));
						$informado = "SI";											
					}
				?>	
				
					<input type="hidden" value="<?php echo $abonado;?>" id="abonado<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $nombre_objetivo;?>" id="nombre_objetivo<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $codigo_rubro;?>" id="codigo_rubro<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $codigo_tipo_prestacion;?>" id="codigo_tipo_prestacion<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $vigilancia_fisica;?>" id="vigilancia_fisica<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $monitoreo_fijo;?>" id="monitoreo_fijo<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $monitoreo_movil;?>" id="monitoreo_movil<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $nro_pago_objetivo;?>" id="nro_pago_objetivo<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $con_arma;?>" id="con_arma<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $codigo_ambito;?>" id="codigo_ambito<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $observaciones;?>" id="observaciones<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $tipo_calle;?>" id="tipo_calle<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $calle;?>" id="calle<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $nro_domicilio;?>" id="nro_domicilio<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $medio;?>" id="medio<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $piso;?>" id="piso<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $depto;?>" id="depto<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $entre_calle_1;?>" id="entre_calle_1<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $entre_calle_2;?>" id="entre_calle_2<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $codigo_localidad;?>" id="codigo_localidad<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $codigo_partido;?>" id="codigo_partido<?php echo $id_cuenta;?>">
					<input type="hidden" value="<?php echo $codigo_provincia;?>" id="codigo_provincia<?php echo $id_cuenta;?>">
								
					<tr>
						<td><?php echo $abonado; ?></td>
						<td><?php echo $nombre_objetivo; ?></td>
						<td><?php echo $domicilio; ?></td>
						<td><?php echo $localidad; ?></td>
						<td><?php echo $informado; ?></td>
						<td><?php echo $fecha_creacion_archivo;?></td>
						<?php if ($informado == "NO"){?>
						<td>
							<span class="pull-right">																							
								<a href="#" class='btn btn-default' title='Editar Objetivo' onclick="obtener_datos('<?php echo $id_cuenta;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 							
																
							</span>
						</td>
                        <?php }else{?>
                        	<td></td>
							<td></td>
                        <?php }?>
                        
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=9><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>				
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>