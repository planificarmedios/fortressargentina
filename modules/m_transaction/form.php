<script type="text/javascript">
	
  function tampil_obat(input){
    var num = input.value;

    $.post("modules/m_transaction/mm.php", {
      dataidobat: num,
    }, function(response) {      
      $('#stok').html(response)
	//alert ('Recibimos el valor');		
      document.getElementById('jumlah_masuk').focus();
    });
  }

  function cek_jumlah_masuk(input) {
    jml = document.formObatMasuk.jumlah_masuk.value;
    var jumlah = eval(jml);
    if(jumlah < 1){
      alert('Jumlah Masuk Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }

  function hitung_total_stok() {
    bil1 = document.formObatMasuk.stok.value;
    bil2 = document.formObatMasuk.jumlah_masuk.value;
	tt = document.formObatMasuk.transaccion.value;
	
    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var salida = eval(bil1) - eval(bil2);
	  var hasil = eval(bil1) + eval(bil2);
    }

	if (tt=="Salida"){
		document.formObatMasuk.total_stok.value = (salida);
	}	else {
		document.formObatMasuk.total_stok.value = (hasil);
	} 
    
  }
</script>

<?php  
if ($_GET['form']=='edit') { ?>
  
  <section class="content-header">
    <h1>
    <i class="fa fa-edit icon-title"></i> - Habilitar -    </h1>
    <ol class="breadcrumb">
      <li><a href="../m_transaction/?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="../m_transaction/?module=m_transaction"> Entrada </a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="../m_transaction/modules/m_transaction/proses.php?act=insert" method="POST" name="formObatMasuk">
            <div class="box-body">
              <?php  
            
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo_transaccion,7) as codigo FROM transaccion_medicamentos
                                                ORDER BY codigo_transaccion DESC LIMIT 1")
                                                or die('Error : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                 
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }

             
              $tahun          = date("Y");
              $buat_id        = str_pad($codigo, 7, "0", STR_PAD_LEFT);
              $codigo_transaccion = "TM-$tahun-$buat_id";
              ?>

              <div class="form-group row">
              	<div class="col-xs-7">
                  <input type="text" class="form-control" name="codigo_transaccion" value="<?php echo $codigo_transaccion; ?>" readonly required>
                </div>
                           
                <div class="col-xs-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha_a" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" readonly required>
                </div>
              </div>
              
              <div class="form-group">
               
                <div class="col-sm-5">
                  <select name="transaccion" method="GET" id="transaccion" required class='form-control' onchange="hitung_total_stok();">
                  
                  <?php if ($_SESSION['permisos_acceso']=='Almacen') 
				        { ?>
                        <option value="Habilitar">Habilitar</option>
                       	<?php
						} 
				  ?>	
				  </select>
                  
                </div>
              </div>
              
              
   <div class="form-group">  
                
              <div class="col-sm-5">
                  <select class="form-control input-sm" name="codigo"  data-placeholder="-- Seleccionar Sim --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
						
												
						if (($_SESSION['permisos_acceso'] == 'Almacen')) {
						    $query_obat = mysqli_query($mysqli, "
							SELECT 
							m.codigo, m.stock, m.nombre, m.cliente, m.aceptado,
							if (m.aceptado = '1', ' -- En  Stock - ', 'A confirmar') as aceptado, 
							m.id_tecnico_asignado
							FROM Medicamentos m 
							WHERE m.stock > 0 and m.aceptado = 0 and m.id_tecnico_asignado = '". $_SESSION['id_user']."'
							ORDER BY m.nombre ASC")
							or die('error '.mysqli_error($mysqli));
						}
						
						
						while ($data_obat = mysqli_fetch_assoc($query_obat)) {
							echo"<option value=\"$data_obat[codigo]\"> $data_obat[aceptado] | $data_obat[nombre] </option>";
						}
						$n = $data_obat['codigo'];
                      	echo $n;					
                    ?>
                    
                                        
                  </select>
                </div>
              </div>
              
              <span id='stok'>
              <div class="form-group">
                <div class="col-sm-5">
                  <input type="text" placeholder="Stock Disponible" class="form-control" id="stok" name="stock" readonly required>
                </div>
              </div>
              </span>

              <div class="form-group">
                
                <div class="col-sm-5">
                  <input type="text" value="1" placeholder="Ingresar 1" class="form-control" id="jumlah_masuk" name="num" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_masuk(this)" required required pattern="[1]+" title="Ingresar 1">
                </div>
              </div>
			  
			  

               <div class="form-group">
                <div class="col-sm-5">
                  <input type="text" placeholder "Total de Stock" class="form-control" id="total_stok" style="color:#E6E6E6" name="total_stock" readonly>
                </div>
              </div>
  
              
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="../m_transaction/?module=m_transaction" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->


<!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content --><!-- /.content-->
<?php
}
?>

<?php



if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
    <i class="fa fa-edit icon-title"></i> Et /Sd -</h1>
    <ol class="breadcrumb">
      <li><a href="../m_transaction/?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="../m_transaction/?module=m_transaction"> Entrada </a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="../m_transaction/modules/m_transaction/proses.php?act=insert" method="POST" name="formObatMasuk">
            <div class="box-body">
              <?php  
            
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo_transaccion,7) as codigo FROM transaccion_medicamentos
                                                ORDER BY codigo_transaccion DESC LIMIT 1")
                                                or die('Error : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);


              if ($count <> 0) {
                 
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }

             
              $tahun          = date("Y");
              $buat_id        = str_pad($codigo, 7, "0", STR_PAD_LEFT);
              $codigo_transaccion = "TM-$tahun-$buat_id";
              ?>

              <div class="form-group row">
                <div class="col-xs-1">
                  <input type="text" class="form-control" name="codigo_transaccion" value="<?php echo $codigo_transaccion; ?>" readonly required>
                </div>
              
                <div class="col-xs-5">
                  <input type="text" style="text-align:left" class="form-control date-picker" data-date-format="dd-mm-yy" name="fecha_a" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" readonly required>
                </div>
              
              
              <div class="col-xs-5">
               
                  <select name="transaccion" method="GET" id="transaccion" required class='form-control' onchange="hitung_total_stok();">
                  
                  <?php if ($_SESSION['permisos_acceso']=='Super Admin') 
				        { 
						?>
						<option value="Salida">Salida</option>
						<option value="Entrada">Entrada</option>
                        
                        <?php
						} else { ?>
						<option value="Salida">Salida</option>
                        	<?php
						} 
				  ?>	
				  </select>
                
              </div> 
         </div>     
              
              <div class="form-group">
                <div class="col-sm-5">
                  <input type="text" placeholder="Ingresar nro. de abonado o ØØØØ" required class="form-control" name="cliente" id="cliente" title="Ingresar abonado" >
                </div>
              </div>
              
              
   <div class="form-group">  
                <div class="col-sm-5">
                  <select class="form-control input-sm" name="codigo"  data-placeholder="-- Seleccionar Sim --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
						
						if ($_SESSION['permisos_acceso'] == 'Super Admin' ) {
						    $query_obat = mysqli_query($mysqli, "
							SELECT codigo, aceptado, cliente, nombre 
							FROM Medicamentos 
							ORDER BY nombre ASC")
							or die('error '.mysqli_error($mysqli));
						  
                        }
						
						
						if (($_SESSION['permisos_acceso'] == 'Almacen') and ($accion='Salida')) {
						    $query_obat = mysqli_query($mysqli, "
							SELECT m.codigo, m.stock, m.nombre, m.cliente, m.aceptado,
							if (m.aceptado = '1', ' -- En  Stock - ', 'A confirmar') as aceptado, 
							m.id_tecnico_asignado
							FROM Medicamentos m 
							WHERE m.stock > 0 and m.aceptado = 1 and m.id_tecnico_asignado = '". $_SESSION['id_user']."'
							ORDER BY m.nombre ASC")
							or die('error '.mysqli_error($mysqli));
						}
						
						
						while ($data_obat = mysqli_fetch_assoc($query_obat)) {
							echo"<option value=\"$data_obat[codigo]\"> $data_obat[aceptado] | $data_obat[nombre] </option>";
						}
						$n = $data_obat['codigo'];
                      	echo $n;					
                    ?>
                </select>
                
                </div>
              </div>
              
              
             <span id='stok'>
              <div class="form-group">
                
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="stok" name="stock"  required>
                </div>
              </div>
            </span>
              

              <div class="form-group">
                <div class="col-sm-5">
                  <input type="text" class="form-control" placeholder="Ingresar 1" id="jumlah_masuk" name="num" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_masuk(this)" required required pattern="[1]+" title="Ingresar 1">
                </div>
              </div>
			  
			  
			  
               <div class="form-group">
               <label class="col-sm-2 control-label">Stock total</label>
                <div class="col-sm-5">
                  <input type="text" readonly class="form-control" id="total_stok" name="total_stock"  required>
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="../m_transaction/?module=m_transaction" class="btn btn-default btn-reset">Cancelar</a>
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