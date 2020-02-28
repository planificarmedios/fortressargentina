<script type="text/javascript">
function validarCuenta(input){
	var ms = input.value;
	if (ms == '3') {
		document.getElementById('grupo').style.visibility='visible';
	} else {
		document.getElementById('grupo').style.visibility='hidden';
	}
}
</script>

<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Usuario
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="../user - Copia/?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="../user - Copia/?module=user"> Usuario </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="../user/modules/user/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre o Razón Social</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido*(Opcional)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="apellido"  name="apellido" autocomplete="off" >
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Dni/CUIT</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="dni" name="dni" autocomplete="off" required>
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
                  <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="domicilio" name="domicilio" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Código Postal</label>
                <div class="col-sm-5">
                  <select class="form-control" id="cp" name="cp" required>
                    <option value="">Seleccionar</option>
                    <?php 
					session_start(); 
					include_once ("../user/callAPI.php");
					$get_data = callAPI('GET', $servidor.'/api/ciudades/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					      $id = $d['id'];
						  $cp = $d['cp'];
						  $_SESSION['localidad'] = $d['localidad'];	
						  $l = $d['localidad'];
						  $_SESSION['provincia']= $d['provincia'];
						  $p = $d['provincia'];
						  $lp = '('.$cp.')';
						  echo "    <option value=\"$cp\"> $cp | $l | $p </option>";
						  
					}
					?>
                    
                  </select>
                </div>
              </div>
              
             <input  id="localidad" name="localidad" value=<?php echo $_SESSION['localidad'] ?> hidden="true" >
             <input  id="provincia" name="provincia" value="<?php echo $_SESSION['provincia'] ?>" hidden="true" >
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Permisos de acceso</label>
                <div class="col-sm-5">
                  <select class="form-control" id="permisos_acceso" name="permisos_acceso" required onchange="validarCuenta(this)">
                    <option value="">Seleccionar</option>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente Titular</option>
                    <option value="3">Cliente Asociado</option>
                    <option value="4">Invitado</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group" id="grupo" name="grupo" style="visibility:hidden">
                <label id="labelusuario" name="labelusuario" class="col-sm-2 control-label">Cliente Autorizante</label>
                 <div class="col-sm-5">
                  <select class="form-control" id="id_autorizante" name="id_autorizante">
                    <option value="">Seleccionar</option>
                    <?php 
					session_start(); 
					include_once ("../user/callAPI.php");
					$get_data = callAPI('GET', $servidor.'/api/titulares/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					      $id = $d['id'];
						  $dni = $d['DNI'];
						  $_SESSION['nombre'] = $d['nombre'];	
						  $n = $d['nombre'];
						  $_SESSION['apellido']= $d['apellido'];
						  $a = $d['apellido'];
						  $lp = '('.$cp.')';
						  echo "    <option value=\"$id\"> $dni | $n $a </option>";
						  
					}
					?>
                    
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-2">
                  <select class="form-control" id="status" name="status" required>
                    <option value="1" selected="selected">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
              </div>
              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a href="../user - Copia/?module=user" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  
<script type="text/javascript">  
function validarCuenta(input){
	var ms = input.value;
	if (ms == '3') {
		document.getElementById('grupo').style.visibility='visible';
	} else {
		document.getElementById('grupo').style.visibility='hidden';
	}
}  
</script>  
  
<?php
} elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id'])) {
	  $i = $_GET['id'];
      
					include_once ("../user/callAPI.php");
					$get_data = callAPI('GET', $servidor.'/api/clientes/'.$i,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					?>
  		


  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Modificar  Usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="../user - Copia/?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="../user - Copia/?module=user"> Usuario </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="../user - Copia/modules/user/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">#</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="id" name="id" value="<?php echo $i; ?>" readonly>
                </div>
              </div>
              
              <input hidden id="usrid" name="usrid" value="<?php echo $usrid; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre o Razón Social</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $d['nombre']; ?>" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido*(Opcional)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="apellido"  name="apellido" value="<?php echo $d['apellido']; ?>" autocomplete="off" >
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" value="<?php echo $d['fnacimiento']; ?>" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Dni/CUIT</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="dni" name="dni" value="<?php echo $d['DNI']; ?>" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Celular</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="celular" name="celular" value="<?php echo $d['telefono_movil']; ?>" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" id="email" value="<?php echo $d['email']; ?>" name="email" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo $d['dommicilio']; ?>" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Código Postal</label>
                <div class="col-sm-5">
                  <select class="form-control" id="cp" name="cp" required>
                    <option value="">Seleccionar</option>
                    <?php 
					 
					include_once ("../user/callAPI.php");
					$get_data = callAPI('GET', $servidor.'/api/ciudades/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					      $id = $d['id'];
						  $cp = $d['cp'];
						  $_SESSION['localidad'] = $d['localidad'];	
						  $l = $d['localidad'];
						  $_SESSION['provincia']= $d['provincia'];
						  $p = $d['provincia'];
						  $lp = '('.$cp.')';
						  echo "    <option value=\"$cp\"> $cp | $l | $p </option>";
						  
					}
					?>
                    
                  </select>
                </div>
              </div>
              
              
              <input  id="localidad" name="localidad" value=<?php echo $_SESSION['localidad'] ?> hidden="true" >
             <input  id="provincia" name="provincia" value="<?php echo $_SESSION['provincia'] ?>" hidden="true" >
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Permisos de acceso</label>
                <div class="col-sm-5">
                  <select class="form-control" id="permisos_acceso" name="permisos_acceso" required onchange="validarCuenta(this)">
                    <option value="">Seleccionar</option>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente Titular</option>
                    <option value="3">Cliente Asociado</option>
                    <option value="4">Invitado</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group" id="grupo" name="grupo" style="visibility:hidden">
                <label id="labelusuario" name="labelusuario" class="col-sm-2 control-label">Cliente Autorizante</label>
                 <div class="col-sm-5">
                  <select class="form-control" id="id_autorizante" name="id_autorizante">
                    <option value="">Seleccionar</option>
                    <?php 
					session_start(); 
					include_once ("../user/callAPI.php");
					$get_data = callAPI('GET', $servidor.'/api/titulares/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					      $id = $d['id'];
						  $dni = $d['DNI'];
						  $_SESSION['nombre'] = $d['nombre'];	
						  $n = $d['nombre'];
						  $_SESSION['apellido']= $d['apellido'];
						  $a = $d['apellido'];
						  $lp = '('.$cp.')';
						  echo "    <option value=\"$id\"> $dni | $n $a </option>";
						  
					}
					?>
                    
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-2">
                  <select class="form-control" id="status" name="status" required>
                    <option value="">Seleccionar</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
              </div>
              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a href="../user - Copia/?module=user" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
} //endforeach
}
}
?>