<script type="text/javascript">

 function ShowSelected(){
    var combo = document.getElementById("cp");
    var cadena = combo.options[combo.selectedIndex].text;
    var lugar = cadena.split("|");
    document.getElementById('localidad').value=lugar[1];
    document.getElementById('provincia').value=lugar[2];
  }
    
</script>


<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Razón Social
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=rsocial"> Datos Fiscales </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/rsocial/proses.php?act=insert" enctype="multipart/form-data">
          
          	<span id='stok'><div ></div></span>
            
             <div class="box-body">
             <div class="form-group">
                <label class="col-sm-2 control-label">Razón Social</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="denominacion" name="denominacion" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Condición</label>
                <div class="col-sm-5">
                  <select  id="condicion" name="condicion" class="chosen-select" required>
                   <option value="">-- Seleccionar --</option>
                   <option value="Consumidor Final">Consumidor Final</option>
                   <option value="Monotributista">Monotributista</option>
                   <option value="Responsable Inscripto">Responsable Inscripto</option>
                   <option value="Responsable No Inscripto">Responsable No Inscripto</option>
                   <option value="Exento">Exento</option>
                 </select>
                </div>
              </div>
              
             <div class="form-group">
                <label class="col-sm-2 control-label">Tipo</label>
                <div class="col-sm-5">
                  <select  id="tipo" name="tipo" class="chosen-select" required>
                   <option value="">-- Seleccionar --</option>
                   <option value="DNI">DNI</option>
                   <option value="CUIL">CUIL</option>
                   <option value="CUIT">CUIT</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Nro. Doc.</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="numero_doc" name="numero_doc" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="domicilio" name="domicilio" autocomplete="off" required>
                </div>
              </div>
				 
			 <div class="form-group">
                <label class="col-sm-2 control-label">Mail</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Código Postal</label>
                <div class="col-sm-5">
                  <select class="chosen-select	" id="cp" name="cp" onchange="ShowSelected();" required>
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

              
             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a  href="?module=rsocial" class="btn btn-default btn-reset">Cancelar</a>
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