 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar chip   </h1>
    <ol class="breadcrumb">
      <li><a href="../mm/?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="../mm/?module=mm"> Sims </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="../mm/modules/mm/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo,6) as codigo FROM medicamentos
                                                ORDER BY codigo DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }


              $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $codigo = "B$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Código</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Número</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="nombre" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)"required>
                </div>
              </div>
              <div class="form-group"><span class="col-sm-2 control-label">Usuario Asignado</span>
			 <div class="col-md-5">
                  <select class="form-control input-sm" name="id_user" data-placeholder="-- Asignar  --" onChange="tampil_obat(this)" autocomplete="off" required>
                    
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT id_user, name_user FROM usuarios ORDER BY name_user ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[id_user]\"> $data_obat[id_user] | $data_obat[name_user] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Prestadora</label>
                <div class="col-md-5">
                  <select class="form-control input-sm" name="unidad" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    
                    <option value="Claro">Claro</option>
                    <option value="Movistar">Movistar</option>
                    <option value="Personal">Personal</option>
              
                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="../mm/?module=mm" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT codigo,nombre,precio_compra,precio_venta,unidad,cliente,id_tecnico_asignado FROM medicamentos WHERE codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar
    </h1>
    <ol class="breadcrumb">
      <li><a href="../mm/?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="../mm/?module=mm"> Sims </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="../mm/modules/mm/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $data['codigo']; ?>" readonly required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cliente" id="cliente" value="<?php echo $data['cliente']; ?>" >
                </div>
              </div>

              <div class="form-group"><span class="col-sm-2 control-label">Número</span>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="nombre" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $data['nombre']; ?>" required>
                </div>
              </div>
              


              <div class="form-group"><span class="col-sm-2 control-label">Usuario Asignado</span>
							<div class="col-md-5">
								<select class="form-control input-sm" id="id_user" name="id_user">
									<?php
										$sql_usuario=mysqli_query($mysqli,"select id_user, name_user from usuarios order by name_user");
										while ($rw=mysqli_fetch_array($sql_usuario)){
											$id_user=$rw["id_user"];
											$name_user=$rw["name_user"];
											if ($data['id_tecnico_asignado']==$id_user){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_user?>" <?php echo $selected;?>><?php echo $name_user?></option>
											<?php
										}
									?>
								</select>
						</div>
			  </div>

              <div class="form-group"><span class="col-sm-2 control-label">Prestadora</span>
                <div class="col-md-5">
                  <select class="form-control input-sm" name="unidad" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="Claro">Claro</option>
                    <option value="Movistar">Movistar</option>
                    <option value="Personal">Personal</option>    </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="../mm/?module=mm" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>