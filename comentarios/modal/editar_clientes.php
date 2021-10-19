	<?php
		if (isset($con))		
		{			
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
		  		<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Objetivo</h4>
		  		</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
						<div id="resultados_ajax2"></div>
							<div class="form-group">
								<label for="abonado" class="col-sm-3 control-label">#Abonado</label>
								<div class="col-sm-8">
							  		<input type="text" class="form-control" id="mod_abonado" name="mod_abonado" maxlength="5" required>
							  		<input type="hidden" id="mod_id" name="mod_id">
								</div>
						  	</div>
			            
						 	<div class="form-group">
								<label for="nombre_objetivo" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="mod_nombre_objetivo" name="mod_nombre_objetivo" maxlength="30" required>
								</div>
						  	</div>
						  	
						  	<div class="form-group">
								<label for="codigo_rubro" class="col-sm-3 control-label">Cód. Rubro</label>
								<div class="col-md-8">									
									<?php $codigo_rubro20 = "";?>
									<select class="form-control input-sm-8" name="mod_codigo_rubro" id="mod_codigo_rubro" required>
			                        	<option value="" selected="selected">-- Seleccionar --</option>
										<?php
											$sql_rubro=mysqli_query($con,"select * from rubro order by cd_rubro ASC");
											while ($rw=mysqli_fetch_array($sql_rubro)){
												$codigo_rubro=$rw["cd_rubro"];
												$nombre_rubro=$rw["ds_rubro"];
										?>
	                                            
												<option value="<?php echo $codigo_rubro?>" <?php ?>><?php echo $nombre_rubro;?></option>
	                                            
										<?php } ?>
									</select>
			
								</div>
			              	</div>
			              
			              	<div class="form-group">
								<label for="con_arma" class="col-sm-3 control-label">Cód. Tipo Prestación</label>
								<div class="col-sm-8">
								 	<select class="form-control" id="mod_codigo_tipo_prestacion" name="mod_codigo_tipo_prestacion" required>
										<option value="1" selected>Vigilancia y Protección de bienes  </option>
                                        <option value="2">Escolta y protección de persona</option>
                                        <option value="3">Transporte, custodia, protecc. objetos lícito, excepto caudales</option>
                                        <option value="4">Vigilancia y protección de personas y bienes en espectáculos públicos, locales bailables, eventos, reuniones, etc</option>
                     					<option value="5">Obtención de evidencias </option>
								  </select>
								</div>
						  	</div>
						  	
			               	<div class="form-group">
								<label for="vigilancia_fisica" class="col-sm-3 control-label">Vig. Física</label>
								<div class="col-sm-3">
									<select class="form-control" id="mod_vigilancia_fisica" name="mod_vigilancia_fisica" required>
										<option value="">-- Seleccionar --</option>
										<option value="S">Si</option>
										<option value="N" selected>No</option>
									</select>
								</div>
						  	</div>
			              
			              	<div class="form-group">
								<label for="monitoreo_fijo" class="col-sm-3 control-label">Monitoreo Fijo</label>
								<div class="col-sm-3">
									<select class="form-control" id="mod_monitoreo_fijo" name="mod_monitoreo_fijo" required>
										<option value="">-- Seleccionar --</option>
										<option value="S" selected>Si</option>
										<option value="N">No</option>
								  	</select>
								</div>
						  	</div>
			              
			              	<div class="form-group">
								<label for="monitoreo_movil" class="col-sm-3 control-label">Monitoreo Móvil</label>
								<div class="col-sm-3">
									<select class="form-control" id="mod_monitoreo_movil" name="mod_monitoreo_movil" required>
										<option value="">-- Seleccionar --</option>
										<option value="S" >Si</option>
										<option value="N" selected>No</option>
								  	</select>
								</div>
						  	</div>
			              
			           		<div class="form-group">
								<label for="nro_pago_objetivo" class="col-sm-3 control-label">#Pago Objetivo</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_nro_pago_objetivo" name="mod_nro_pago_objetivo" maxlength="7" required >
								</div>
						  	</div>
			
							<div class="form-group">
								<label for="con_arma" class="col-sm-3 control-label">Con Arma</label>
								<div class="col-sm-3">
								<select class="form-control" id="mod_con_arma" name="mod_con_arma" required>
									<option value="">-- Seleccionar --</option>
									<option value="S">Si</option>
									<option value="N" selected>No</option>
								</select>
								</div>
						  	</div>
			              
			               	<div class="form-group">
							<label for="codigo_ambito" class="col-sm-3 control-label">Cód. Ambito</label>
								<div class="col-md-8">
									<select class="form-control input-sm-8" name="mod_codigo_ambito" id="mod_codigo_ambito" required>
	                                	<option value="" selected="selected">-- Seleccionar --</option>
										<?php
										$sql_ambito=mysqli_query($con,"select * from ambito order by cd_ambito ASC");
										while ($rw=mysqli_fetch_array($sql_ambito)){
											$codigo_ambito=$rw["cd_ambito"];
											$nombre_ambito=$rw["ds_ambito"];
									?>
	                                            
											<option value="<?php echo $codigo_ambito?>" <?php ?>><?php echo $nombre_ambito;?></option>
	                                            
									<?php } ?>
									</select>		
								</div>
			              	</div>
			              	
			              	<div class="form-group">
								<label for="observaciones" class="col-sm-3 control-label">Observaciones</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_observaciones" name="mod_observaciones"   maxlength="100">
								</div>
						  	</div>
			              
			              	<div class="form-group">
							<label for="tipo_calle" class="col-sm-3 control-label">Tipo de Calle</label>
								<div class="col-sm-8">
									<select class="form-control" id="mod_tipo_calle" name="mod_tipo_calle" required>
										<option value="">-- Seleccionar --</option>
                                        <option value="1" selected>CALLE</option>
                                        <option value="2">AVENIDA</option>
                                        <option value="3">DIAG.</option>
                                        <option value="4">PLAZA</option>
                                        <option value="5">CAMINO</option>
                                        <option value="6">RUTA</option>
                                        <option value="7">BOUL.</option>
                                        <option value="8">PASAJE</option>
                                        <option value="9">COLECT.</option>
									</select>
								</div>
						  	</div>
			              	<div class="form-group">
								<label for="calle" class="col-sm-3 control-label">Calle</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_calle" name="mod_calle"   maxlength="40" required>
								</div>
						  	</div>
			              
			              	<div class="form-group">
								<label for="nro_domicilio" class="col-sm-3 control-label">#Domicilio</label>
								<div class="col-sm-8">
								 	<input type="text" class="form-control" id="mod_nro_domicilio" name="mod_nro_domicilio"   maxlength="11" required>
								</div>
						  	</div>
			              
			              	<div class="form-group">
							<label for="medio" class="col-sm-3 control-label">Medio</label>
								<div class="col-sm-3">
									<select class="form-control" id="mod_medio" name="mod_medio" required>
										<option value="">-- Seleccionar --</option>
										<option value="S" selected>Si</option>
										<option value="N">No</option>
									</select>
								</div>
						  	</div>
			              	
			              	<div class="form-group">
								<label for="piso" class="col-sm-3 control-label">#Piso</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_piso" name="mod_piso"   maxlength="3" >
								</div>
						  	</div>
			              
			              	<div class="form-group">
								<label for="depto" class="col-sm-3 control-label">Dpto</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="mod_depto" name="mod_depto"   maxlength="4" >
								</div>
						  	</div>
			              
			              	<div class="form-group">
								<label for="entre_calle_1" class="col-sm-3 control-label">Entre Calle</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_entre_calle_1" name="mod_entre_calle_1"   maxlength="40" >
								</div>
						  	</div>
			              	<div class="form-group">
								<label for="entre_calle_2" class="col-sm-3 control-label">Entre Calle</label>
								<div class="col-sm-8">
							  		<input type="text" class="form-control" id="mod_entre_calle_2" name="mod_entre_calle_2"   maxlength="40" >
								</div>
						  	</div>
			              
			 				<div class="form-group">
								<label for="codigo_localidad" class="col-sm-3 control-label">Cód. Localidad</label>
								<div class="col-md-8">
									<select class="form-control input-sm-8" id="mod_codigo_localidad" name="mod_codigo_localidad" required>
	                                	<option value="" selected="selected">-- Seleccionar --</option>
										<?php
											$sql_localidad=mysqli_query($con,"select cd_localidad, ds_localidad from `localidad-partido` order by cd_localidad ASC");
											while ($rw=mysqli_fetch_array($sql_localidad)){
												$codigo_localidad=$rw["cd_localidad"];
												$nombre_localidad=$rw["ds_localidad"];
										?>
	                                            
												<option value="<?php echo $codigo_localidad?>" <?php ?>><?php echo $nombre_localidad;?></option>
	                                            
												<?php
												
											}
										?>
									</select>		
								</div>
			              	</div>
			              	
							<div class="form-group">
								<label for="codigo_partido" class="col-sm-3 control-label">Cód. Partido</label>
								<div class="col-md-8">
									<select class="form-control input-sm-8" id="mod_codigo_partido" name="mod_codigo_partido" required>
			                        	<option value="" selected="selected">-- Seleccionar --</option>
											<?php
												$sql_partido=mysqli_query($con,"select DISTINCT cd_partido, ds_partido  from `localidad-partido` order by cd_partido ASC ");
												while ($rw=mysqli_fetch_array($sql_partido)){
													$codigo_partido=$rw["cd_partido"];
													$nombre_partido=$rw["ds_partido"];
													?>
			                                            
													<option value="<?php echo $codigo_partido?>" <?php ?>><?php echo $nombre_partido;?></option>
			                                            
												<?php } ?>
									</select>
			
								</div>
			              	</div>
							
							<div class="form-group">
								<label for="medio" class="col-sm-3 control-label">Cód. Prov.</label>
								<div class="col-sm-8">
									<select class="form-control" id="mod_codigo_provincia" name="mod_codigo_provincia" required>
										<option value="1" selected>Prov. Bs.As.</option>
									</select>
								</div>
						  	</div>
						  	
						  	<div class="modal-footer">
					 			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
					  		</div>					
				  	</form>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>