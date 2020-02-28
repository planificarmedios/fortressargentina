<?php
if (empty($_SESSION['name_user']) && empty($_SESSION['password'])){
	header("Location: index.php?alert=33"); 
}

?>

  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Inicio
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
    </ol>
  </section>
  
 
  <!-- Main content -->
  <section class="content">
  
  <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Sesión iniciada por <strong><?php echo $_SESSION['name_user']; ?></strong> 
          </p>        
        </div>
      </div>  
    </div>
    
   
    <!-- Small boxes (Stat box) -->
    <div class="row"><!-- ./col --><!-- ./col -->
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dcc48c" class="small-box" >
          <div class="inner">
               <center><h1 style="color:#dcc48c"><?php echo 'Reserva'; ?></h1>
            <p align="center">Sala Ejecutive</p>
          </div>
          
          <div class="icon">
            <i class="fa fa-calendar"></i>
          </div>
          <a href="../fortressargentina/FullCalendar/calendar.php" class="small-box-footer" title="Reservas" data-toggle="tooltip"><i class="fa fa-calendar"></i></a>
        </div>
      </div><!-- ./col -->
      
      
      <!-- ./col --><!-- ./col --><!-- ./col --><!-- ./col --><!-- ./col --><!-- ./col --><!-- ./col --><!-- ./col -->      

      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dbc76c" class="small-box">
          <div class="inner">
           <center><h1 style="color:#dbc76c"><?php echo 'Reserva'; ?></h1>
            <p align="center">Sala Excelence</p>
          </div>
          <div class="icon">
            <i class="fa fa-calendar"></i>
          </div>
          <a href="../fortressargentina/FullCalendar/salaB.php" class="small-box-footer" title="Reservas" data-toggle="tooltip"><i class="fa fa-calendar"></i></a>
        </div>
      </div><!-- ./col --><!-- ./col -->
      
   </div><!-- /.row -->
   <!-- Compiled and minified Bootstrap CSS -->
   
  </section><!-- /.content -->



  
  
  
  