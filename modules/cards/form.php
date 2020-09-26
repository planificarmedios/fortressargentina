<?php  
if ($_GET['form']=='add') { ?>

  <section class="content-header" style="color:#000">
    <h1>
      <i class="fa fa-edit icon-title" style="color:#000"></i> Agregar Tarjeta
    </h1>
    <ol class="breadcrumb" style="color:#000">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=cards"> Tarjetas </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>

  <section class="content" style="color:#000">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/cards/proses.php?act=insert" enctype="multipart/form-data">
          
          	
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Marca</label>
                <div class="col-sm-5">
                  <select  id="marca" name="marca" class="chosen-select" >
                   <option value="">-- Seleccionar --</option>
                   <option value="Amex">Amex</option>
                   <option value="Clipper">Clipper</option>
                   <option value="Fava">Fava</option>
                   <option value="MasterCard">MasterCard</option>
                   <option value="Maestro">Maestro</option>
                   <option value="Naranja">Naranja</option>
                   <option value="Visa">Visa</option>
                   <option value="Visa Electro">Visa Electron</option>
                   
                 </select>
                </div>
              </div>
              
             <div class="form-group">
                <label class="col-sm-2 control-label">Tipo</label>
                <div class="col-sm-5">
                  <select  id="tipo" name="tipo" class="chosen-select">
                   <option value="0">-- Seleccionar --</option>
                   <option value="Debito">Débito</option>
                   <option value="Credito">Crédito</option>
				   <option value="Cbu">Débito por CBU</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                    <label class="col-sm-2 control-label">Número de Tarjeta / CBU </label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" id="numero" name="numero" autocomplete="off" required>
                    </div>
               </div>
				
			<div class="form-group">
                    <label class="col-sm-2 control-label">Banco </label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="banco" name="banco" required>
                    </div>
               </div>
             
             <div class="form-group">
                    <label class="col-sm-2 control-label">Fecha de Vencimiento</label>
                    <div class="col-sm-5">
                      <input type="month" class="form-control" id="vencimiento" name="vencimiento">
                    </div>
               </div>
              
              
             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-warning btn-submit" id="guardar" name="guardar" value="Guardar">
                  <a  href="?module=cards" class="btn btn-default btn-reset">Cancelar</a>
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