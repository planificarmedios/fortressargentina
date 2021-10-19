<?php

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_cuenta=intval($_GET['id']);
		$query=mysqli_query($con, "select * from cuentas where id_cuenta='".$id_cuenta."'");
		$rw_user=mysqli_fetch_array($query);
		$count=$rw_user['id_cuenta'];
		if ($id_cuenta!=1){
			if ($delete1=mysqli_query($con,"DELETE FROM users WHERE id_cuenta='".$id_cuenta."'")){
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
			  <strong>Error!</strong> Algo ha salido mal con el Usuario.
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
		$sql="SELECT ac.abonado, ac.nombre_objetivo, ac.calle,  ac.nro_domicilio, lp.ds_localidad, ac.fecha_creacion_archivo 
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
									
				</tr>
				
				<?php
				while ($row=mysqli_fetch_array($query)){
						$abonado=$row['abonado'];
						$nombre_objetivo=$row['nombre_objetivo'];
						$domicilio=$row['calle']." ".$row["nro_domicilio"];
						$localidad=$row['ds_localidad'];
						$fecha_creacion_archivo=$row['fecha_creacion_archivo'];
						// Verifica si el objetivo fue informado tomando la fecha de creacion del archivo como flag
						if ($fecha_creacion_archivo === "0000-00-00"){
							$fecha_creacion_archivo = "";
							$informado = "NO";
						}else{ 					
							$fecha_creacion_archivo	= date("d-m-Y", strtotime($fecha_creacion_archivo));
							$informado = "SI";											
						}
					?>					
					<tr>
						<td><?php echo $abonado; ?></td>
						<td><?php echo $nombre_objetivo; ?></td>
						<td><?php echo $domicilio; ?></td>
						<td><?php echo $localidad; ?></td>
						<td><?php echo $informado; ?></td>
						<td><?php echo $fecha_creacion_archivo;?></td>
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