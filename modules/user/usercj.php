<script type="text/javascript">

	function validarFecha(){
		var fnacimiento = document.getElementById('fnacimiento').value;
		var dd = fnacimiento.substring(0,2);
		var mm = fnacimiento.substring(3,5);
		var aa = fnacimiento.substring(6);
		ff = aa + '-' + mm + '-' + dd;
		document.getElementById('fnacimiento').value = ff;
	}
	
	function validarCuenta(input,id_autorizante){
		var ms = input.value;
		var idaut = id_autorizante;
		
		if (ms == '3') {
			document.getElementById('grupo').style.visibility='visible';
		} else {
			document.getElementById('grupo').style.visibility='hidden';
			document.getElementById('grupo2').style.visibility='hidden';
		}
		
		if (ms == ''){
			document.getElementById('grupo').style.visibility='visible';
		}
		
		
		$.post("modules/user/clientes.php", {
		  dataidobat: ms,
		  dataidaut: idaut,
		}, function(response) {      
		  $('#id_autorizante').html(response)
		 document.getElementById('id_autorizante').focus();
		});
	}

	function ShowSelected(){
		var combo = document.getElementById("cp");
		var cadena = combo.options[combo.selectedIndex].text;
		var lugar = cadena.split("|");
		document.getElementById('localidad').value=lugar[1];
		document.getElementById('provincia').value=lugar[2];
	}

	function cargaForm(){
	   var sms = document.getElementById('permisos_acceso').value;
	   if (sms == 3){
		 //alert ('Perfil cliente: ' + sms);
	     document.getElementById('grupo2').style.visibility='visible';
	   }
	}
	
	function validarDni (input){
		var dni = input.value;
		//alert (dni);
		$.post("module/user/validarCliente.php", {
		 dataidobat: dni,
		  
		}, function(response) {      
		  $('#stok').html(response)
		   
		});
		
	}

</script>



<?php  


if ($_GET['usercj']=='list') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Listar Cajas
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=user"> Usuario </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/user/proses.php?act=insert" enctype="multipart/form-data">
          
          	<span id='stok'><div ></div></span>
            
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
                <label class="col-sm-2 control-label">Fecha Nacimiento*(Opcional)</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" autocomplete="off" >
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Documento</label>
                <div class="col-sm-5">
                  <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                    <option value="">Seleccionar</option>
                    <option value="1">DNI</option>
                    <option value="2">CUIL</option>
                    <option value="3">CUIT</option>
                  </select>
                </div>
              </div>
              
              
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Número DNI - CUIL - CUIT</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" id="dni" name="dni" autocomplete="off" required onblur="validarDni(this);" >
                    </div>
                  </div>
              
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Celular</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="celular" name="celular" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Tel. Fijo</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="tel_fijo" name="tel_fijo" autocomplete="off" required>
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
                  <select class="form-control" id="cp" name="cp" onchange="ShowSelected();" required>
                    <option value="">Seleccionar</option>
                    <?php 
					session_start(); 
					include_once ("callAPI.php");
                    require_once ("parametros.php");
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
              
              <input  id="localidad" name="localidad" hidden="true" >
             <input  id="provincia" name="provincia"  hidden="true" >
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Permisos de acceso</label>
                <div class="col-sm-5">
                  <select class="form-control" id="permisos_acceso" name="permisos_acceso" required onchange="validarCuenta(this)">
                    <option value="">Seleccionar</option>
                    <option value="1">Administrador</option>
                    <option value="5">Empleado</option>
                    <option value="2">Cliente</option>
                    <option value="4">Invitado</option>
                    
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Adjuntar Foto</label>
                <div class="col-sm-5">
                  <input type="file" name="foto" id="foto" required="required">
                </div>
           </div> 
              
              
           <input id="status" name="status" value=1 hidden></input>
           
           
           
           
                     
           </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a href="?module=user" class="btn btn-default btn-reset">Cancelar</a>
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
require_once("fechaNumber.php");
  	if (isset($_GET['id'])) {
	$id = $_GET['id'];
      
	  include_once ("callAPI.php");
          require_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/clientes/'.$id,false);
					$response = json_decode($get_data, true);
					foreach ($response as $d) {
					?>
  		
  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Modificar  Usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="?module=user"> Usuario </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/user/proses.php?act=update" enctype="multipart/form-data" >
          
           <span id='stok'><div ></div></span>
          
           <body onload="cargaForm()">
              <div class="box-body">
                  <input   id="id" name="id" value="<?php echo $id; ?>" hidden>
                  <input  id="usrid" name="usrid" value="<?php echo $d['USRID']; ?>" hidden>
                  
            <fieldset>      
             <div class="form-group">
           	  <div class="row">
               	                   
                 <div class="col-sm-12 col-md-6"> 
					<?php  
                    if ($d['foto']=="") { ?>
                      <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png"  width="100">
                    <?php
                    }
                    else { ?>
                      <img src="images/user/<?php echo $d['foto']; ?>" width="150" height="150" style="border:1px solid #eaeaea;border-radius:100px;"> 
                    <?php
                    }
                    ?>
                </div>
                
                
                <input  id="fotobis" name="fotobis" value="<?php echo $d['foto']; ?>" hidden>
                
                <div class="col-sm-12 col-md-6" align="left">
                    <label class="control-label">Imagen de Archivo</label>
                    <input align="left" type="file" name="foto">
                </div>
                
              </div>
           </fieldset>
           
             <fieldset> 
               <div class="form-group">
               	<div class="row">
               	 <div class="col-sm-12 col-md-4">
                    <label class="control-label">Nombre o R.Social</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $d['nombre']; ?>" autocomplete="off" required/>
                </div>
              
                  <div class="col-sm-12 col-md-4">
                    <label class="control-label">Apellido*(Opcional)</label>
                        <input type="text" class="form-control" id="apellido"  name="apellido" value="<?php echo $d['apellido']; ?>" autocomplete="off"/>
                   </div>
                   
                   <div class="col-sm-12 col-md-4">
                  <label class="control-label">Fecha Nac*(Opcional)</label>
                    <input required="required" type="text" class="form-control" oninvalid="this.setCustomValidity('Formato Incorrecto: ingresar dd-mm-yyyy')"
                    id="fnacimiento" name="fnacimiento" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"
                    value="<?php 
					$ss = substr($d['fecha_nacimiento'], 0,10); 
					echo fechaNumber($ss);
					?>" 
                    autocomplete="off"/>
                </div>
                   
                   
              	</div>
              </div>
             </fieldset>
             
             
             <fieldset> 
               <div class="form-group">
               	<div class="row">
               	 <div class="col-sm-12 col-md-4">
                    <label class="control-label">Celular</label>
                     <input type="number" class="form-control" id="celular" name="celular" value="<?php echo $d['telefono_movil']; ?>" autocomplete="off" >
                 </div>
                 
                 <div class="col-sm-12 col-md-4">
                	<label class="control-label">Email</label>
                  		<input type="email" class="form-control" id="email" value="<?php echo $d['email']; ?>" name="email" autocomplete="off" required>
                </div>
                 
                 <div class="col-sm-12 col-md-4">
                    <label class="control-label">Tel. Fijo</label>
                     <input type="text" class="form-control" id="tel_fijo" name="tel_fijo" value="<?php echo $d['tel_fijo']; ?>" autocomplete="off" >
                 </div>
              	</div>
              </div>
             </fieldset>
             
                
             <fieldset> 
               <div class="form-group">
               	<div class="row">
                
                <div class="col-sm-12 col-md-4">
                   <label class="control-label">Domicilio</label>
                      <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo $d['dommicilio']; ?>" autocomplete="off" required>
             	 </div>
                 
                 <div class="col-sm-12 col-md-4">
                   <label class="control-label">Tipo Documento</label>
                
                  <select class="form-control" id="tipo_documento" name="tipo_documento" >
                      <option value="1" <?php if ($d['tipo_documento']==1){?>  selected="<?php echo 'selected';};?>">DNI</option>
                      <option value="2" <?php if ($d['tipo_documento']==2){?> selected="<?php echo 'selected';};?>">CUIL</option>
                      <option value="3" <?php if ($d['tipo_documento']==3){?> selected="<?php echo 'selected';};?>">CUIL</option>
                  </select>
                </div>
                
                <div class="col-sm-12 col-md-4">
                  <label class="control-label">Número DNI - CUIL - CUIT </label>
                    <input  class="form-control" id="dni" name="dni" value="<?php echo $d['dni']; ?>" autocomplete="off" required onblur="validarDni(this);" >
                </div>
               </div>
              </div>
             </fieldset>
             
             <fieldset> 
              <div class="form-group">
               	<div class="row">
                   <div class="col-sm-12 col-md-4">
                    <label class="control-label">Código Postal</label>
                    <select class="form-control" id="cp" name="cp" onchange="ShowSelected();" required>
                    <?php 
					include_once ("callAPI.php");
          			require_once ("parametros.php");
					$get_data = callAPI('GET', $servidor.'/api/ciudades/',false);
					$response = json_decode($get_data, true);
					foreach ($response as $g) {
					      $id = $g['id'];
						  $cp = $g['cp'];
						  $_SESSION['localidad'] = $g['localidad'];	
						  $l = $g['localidad'];
						  $_SESSION['provincia']= $g['provincia'];
						  $p = $g['provincia'];
						  if ($d['cp'] == $g['cp']) {
						  	echo "    <option selected='selected' value=\"$cp\"> $cp | $l | $p </option>";
						  } else {
						  	echo "    <option value=\"$cp\"> $cp | $l | $p </option>";
						  }
					}
					?>
                  </select>
                </div>
                
                <input id="status" name="status" value=" <?php echo ($d['status']); ?>" hidden>
                
                <div class="col-sm-12 col-md-4">
                   <label class="control-label">Estado</label>
                      <label type="text" class="form-control" id="status2" name="status2">
                      <?php if ($d['status']==1) { echo 'Activo';} else { echo 'Inactivo'; } ?> 
                      </label>
                </div>
                
               <div class="col-sm-12 col-md-4">
                 <label class="control-label">Permisos de acceso</label>
                
                  <select class="form-control" id="permisos_acceso" name="permisos_acceso" required onchange="validarCuenta(this, '<?php echo $d['id_autorizante'];?>')">
                  <option style="background-color:#F7C8BF; text-align-last:center" value="">-- Seleccionar --</option>
                  <option value="1" <?php if ($d['permisos_acceso']==1){?> selected="<?php echo 'selected';};?>">Administrador</option>
                  <option value="2" <?php if ($d['permisos_acceso']==2){?> selected="<?php echo 'selected';};?>">Cliente</option>
 				  <option value="4" <?php if ($d['permisos_acceso']==4){?> selected="<?php echo 'selected';};?>">Invitado</option>
                  <option value="5" <?php if ($d['permisos_acceso']==5){?> selected="<?php echo 'selected';};?>">Empleado</option>
                  </select>
               </div>
                
                
               </div>
              </div>
              </fieldset>
              
              
                       
            <input  id="localidad" name="localidad" hidden="true" >
            <input  id="provincia" name="provincia"  hidden="true" >  
              
            </div>
            <!-- /.box body -->

            <div class="box-footer" align="left">
              <div class="form-group" align="left">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar" onclick="validarFecha()">
                  <a href="?module=user" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
            </body>
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