<?php
if (empty($_SESSION['name_user']) && empty($_SESSION['password'])){
	header("Location: index.php?alert=33"); 
}

?>
<style type="text/css">
.black {
	color: #000;
}
</style>


<section class="content-header">
    <h1 class="black">
      <i class="fa fa-home icon-title"></i> <span class="black">Inicio</span>
  </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"> <span class="black">Inicio</span></a></li>
    </ol>
  </section>
  
 
  <!-- Main content -->
  <section class="content">
  

    <!-- Small boxes (Stat box) -->
    <section class="content">
  <div class="row">
    <div class="col-md-13">

 
<div class="box box-warning" style="color:#003">
<div class="box-body">

 <!-- Small boxes (Stat box) -->
 <div class="row"><!-- ./col --><!-- ./col -->
      <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#dbc76c;color:#fff" class="small-box">
          <div class="inner">
            <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/totales',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $c = $d['cantidad'];
				}
            ?>
            <h3 style="color:#000"><?php echo $c; ?></h3>
            <h4 style="color:#000">Total de Cajas en Bóveda</h4>
          </div>
          <div class="icon">
            <i class="fa fa-lock"></i>
          </div>
          
            <a  class="small-box-footer" data-toggle="tooltip"><i style="color:#dbc76c" class="fa fa-plus"></i></a>
           
        </div>
      </div><!-- ./col -->
  
       <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#FADBD8;color:#fff" class="small-box">
          <div class="inner">
            <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/ocupadas',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $o = $d['cantidad'];
				}
		    ?>
                <h3 style="color:#000"><?php echo $o; ?></h3>
                <h4 style="color:#000">Total de Cajas Ocupadas</h4>
              </div>
              <div class="icon">
                <i class="fa fa-lock"></i>
              </div>
           <a href="?module=cj" class="small-box-footer" title="Ir a cajas" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
         </div>
      </div><!-- ./col -->
      
       <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#D5F5E3;color:#fff" class="small-box">
          <div class="inner">
            <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/cajas/disponibles',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $d = $d['cantidad'];
				}
		    ?>
                <h3 style="color:#000"><?php echo ($c - $o); ?></h3>
                <h4 style="color:#000">Total de Cajas Disponibles</h4>
              </div>
              <div class="icon">
                <i class="fa fa-unlock"></i>
              </div>
           <a href="?module=cj" class="small-box-footer" title="Ir a cajas" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
         </div>
      </div><!-- ./col -->
   
  
   

      <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div style="background-color:#CCC;color:#fff" class="small-box">
          <div class="inner">
            <?php  
         	 	include_once ("callAPI.php");
          		require_once ("parametros.php");
				$get_data = callAPI('GET', $servidor.'/api/estadisticas/reservas/ocupadas/dia',false);
				$response = json_decode($get_data, true);
				//$c = '44';
				foreach ($response as $d) {
					      $dd = $d['cantidad'];
				}
            ?>
            <h3 style="color:#000"><?php echo $dd; ?></h3>
            <h4 style="color:#000">Reservas de la fecha</h4>
          </div>
          <div class="icon">
            <i class="fa fa-calendar"></i>
          </div>
          
            <a href="?module=s_inventory" class="small-box-footer" title="Listar" data-toggle="tooltip"><i style="color:#000" class="fa fa-search"></i></a>
           
        </div>
      </div><!-- ./col -->
  
       
   </div><!-- /.row -->





    
<body link="#0563C1" vlink="#954F72">
<center>
<table border="1" cellpadding="0" cellspacing="0" width="567" style="border-collapse:
 collapse;table-layout:fixed;width:428pt">
 <colgroup><col width="54" style="mso-width-source:userset;mso-width-alt:1974;width:41pt">
 <col width="23" style="mso-width-source:userset;mso-width-alt:841;width:17pt">
 <col width="54" style="mso-width-source:userset;mso-width-alt:1974;width:41pt">
 <col width="33" style="mso-width-source:userset;mso-width-alt:1206;width:25pt">
 <col width="80" span="3" style="mso-width-source:userset;mso-width-alt:2925;
 width:60pt">
 <col width="33" style="mso-width-source:userset;mso-width-alt:1206;width:25pt">
 <col width="54" style="mso-width-source:userset;mso-width-alt:1974;width:41pt">
 <col width="22" style="mso-width-source:userset;mso-width-alt:804;width:17pt">
 <col width="54" style="mso-width-source:userset;mso-width-alt:1974;width:41pt">
 </colgroup><tbody><tr height="20" style="height:15.0pt">
  <td colspan="11" height="20" bgcolor="black" class="xl70" width="567" style="height:15.0pt;
  width:428pt">&nbsp;</td>
 </tr>
 <tr height="20" style="mso-height-source:userset;height:15.0pt">
  <td bgcolor="grey" rowspan="4" height="80" class="xl75" width="54" style="border-bottom:.5pt solid black;
  height:60.0pt;width:41pt">Mod B</td>    

<?php
include_once ("callAPI.php");
		  include_once ("parametros.php");
		  include_once ("fechaNumber.php");
      
      $get_data = callAPI('GET', $servidor.'/api/caja/'.'B1',false);
		  $response = json_decode($get_data, true);
		  foreach ($response as $d) {
        if($d['id_cliente'] == 0 ){
              $B1 = '<td class="xl69" bgcolor="green" style="border-left:none">B1</td>';
        } else { 
              $B1 = '<td class="xl69" bgcolor="red" style="border-left:none">B1</td>';
        }
        echo $B1;
      }

      $get_data = callAPI('GET', $servidor.'/api/caja/'.'B9',false);
		  $response = json_decode($get_data, true);
		  foreach ($response as $d) {
        if($d['id_cliente'] == 0 ){
              $B9 = '<td class="xl69" bgcolor="green" style="border-left:none">B9</td>';
        } else { 
              $B9= '<td class="xl69" bgcolor="red" style="border-left:none">B9</td>';
        }
        echo $B9;
      }

               
?>
	
  <td rowspan="2" class="xl76" 
  <?php
     $get_data = callAPI('GET', $servidor.'/api/caja/'.'B17',false);
      $response = json_decode($get_data, true);
      foreach ($response as $d) {
          if($d['id_cliente'] == 0 ){
                echo 'bgcolor ="green"';
          } else { 
            echo 'bgcolor ="red"';
          }
      }
  ?>
  style="border-bottom:.5pt solid black">B17</td>
 
  <td rowspan="2" class="xl76" style="border-bottom:.5pt solid black">21B</td>
  <td bgcolor="black"></td> 
  <td rowspan="2" class="xl76" style="border-bottom:.5pt solid black">21C</td>
  <td rowspan="2" class="xl76" style="border-bottom:.5pt solid black">17C</td>
  <td class="xl69" style="border-left:none">9C</td>
  <td class="xl69" style="border-left:none">1C</td>
  <td bgcolor="grey" rowspan="4" class="xl75" width="54" style="border-bottom:.5pt solid black;
  width:41pt">Mod C</td>
 </tr>
 <tr height="20" style="mso-height-source:userset;height:15.0pt">
  <td height="20" class="xl65" style="height:15.0pt;border-top:none;border-left:
  none">B2</td>
  <td class="xl65" style="border-top:none;border-left:none">B10</td>
  <td bgcolor="black"></td> 
  <td class="xl65" style="border-top:none;border-left:none">10C</td>
  <td class="xl65" style="border-top:none;border-left:none">2C</td>
 </tr>
 <tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" style="height:15.0pt;border-top:none;border-left:
  none">3B</td>
  <td class="xl65" style="border-top:none;border-left:none">11B</td>
  <td rowspan="2" class="xl67" style="border-bottom:.5pt solid black;border-top:
  none">18B</td>
  <td rowspan="2" class="xl67" style="border-bottom:.5pt solid black;border-top:
  none">22B</td>
  <td bgcolor="black"></td> 
  <td rowspan="2" class="xl67" style="border-bottom:.5pt solid black;border-top:
  none">22C</td>
  <td rowspan="2" class="xl67" style="border-bottom:.5pt solid black;border-top:
  none">18C</td>
  <td class="xl65" style="border-top:none;border-left:none">11C</td>
  <td class="xl65" style="border-top:none;border-left:none">3C</td>
 </tr>
 <tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" style="height:15.0pt;border-top:none;border-left:
  none">4B</td>
  <td class="xl65" style="border-top:none;border-left:none">12B</td>
  <td bgcolor="black"></td> 
  <td class="xl65" style="border-top:none;border-left:none">12C</td>
  <td class="xl65" style="border-top:none;border-left:none">4C</td>
 </tr>
 <tr height="31" style="mso-height-source:userset;height:23.25pt">
  <td colspan="5" height="31" bgcolor="black" class="xl71" width="244" style="height:23.25pt;
  width:184pt">&nbsp;</td>
  <td bgcolor="black"></td> 
  <td colspan="5" bgcolor="black" class="xl71" width="243" style="width:184pt">&nbsp;</td>
 </tr>
 <tr height="20" style="mso-height-source:userset;height:15.0pt">
  <td bgcolor="grey" rowspan="4" height="80" class="xl72" width="54" style="height:60.0pt;border-top:
  none;width:41pt">Mod A</td>
  <td class="xl65" bgcolor="<?php echo $color ?>" style="border-top:none;border-left:none">A1</td>
  <td class="xl65" style="border-top:none;border-left:none">9A</td>
  <td rowspan="2" class="xl66" style="border-top:none">17A</td>
  <td rowspan="2" class="xl66" style="border-top:none">21A</td>
  <td bgcolor="black"></td> 
  <td rowspan="2" class="xl66" style="border-top:none">21D</td>
  <td rowspan="2" class="xl66" style="border-top:none">17D</td>
  <td class="xl65" style="border-top:none;border-left:none">9D</td>
  <td class="xl65" style="border-top:none;border-left:none">1D</td>
  <td bgcolor="grey" rowspan="4" class="xl72" width="54" style="border-top:none;width:41pt">Mod D</td>
 </tr>
 <tr height="20"  style="mso-height-source:userset;height:15.0pt">
  <td height="20" class="xl65" style="height:15.0pt;border-top:none;border-left:
  none">A2</td>
  <td class="xl65" style="border-top:none;border-left:none">10A</td>
  <td bgcolor="black"></td> 
  <td class="xl65" style="border-top:none;border-left:none">10D</td>
  <td class="xl65" style="border-top:none;border-left:none">2D</td>
 </tr>
 <tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" style="height:15.0pt;border-top:none;border-left:
  none">3A</td>
  <td class="xl65" style="border-top:none;border-left:none">11A</td>
  <td rowspan="2" class="xl66" style="border-top:none">18A</td>
  <td rowspan="2" class="xl66" style="border-top:none">22A</td>
  <td bgcolor="black"></td> 
  <td rowspan="2" class="xl66" style="border-top:none">22D</td>
  <td rowspan="2" class="xl66" style="border-top:none">18D</td>
  <td class="xl65" style="border-top:none;border-left:none">11D</td>
  <td class="xl65" style="border-top:none;border-left:none">3D</td>
 </tr>
 <tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" style="height:15.0pt;border-top:none;border-left:
  none">4A</td>
  <td class="xl65" style="border-top:none;border-left:none">12A</td>
  <td bgcolor="black"></td> 
  <td class="xl65" style="border-top:none;border-left:none">12D</td>
  <td class="xl65" style="border-top:none;border-left:none">4D</td>
 </tr>
 <tr class="xl73" height="20" style="height:15.0pt">
  <td colspan="5" height="20" bgcolor="black" class="xl71" width="244" style="height:15.0pt;width:184pt">&nbsp;</td>
  <td bgcolor="black"></td> 
  <td colspan="5" bgcolor="black" bgcolor="black" class="xl71" width="243" style="width:184pt">&nbsp;</td>
 </tr>
 <!--[if supportMisalignedColumns]-->
 <tr height="0" style="display:none">
  <td width="54" style="width:41pt"></td>
  <td width="23" style="width:17pt"></td>
  <td width="54" style="width:41pt"></td>
  <td width="33" style="width:25pt"></td>
  <td width="80" style="width:60pt"></td>
  <td width="80" style="width:60pt"></td>
  <td width="80" style="width:60pt"></td>
  <td width="33" style="width:25pt"></td>
  <td width="54" style="width:41pt"></td>
  <td width="22" style="width:17pt"></td>
  <td width="54" style="width:41pt"></td>
 </tr>
 <!--[endif]-->
</tbody></table>




</body>


        </div>
      </div>
    </div>
  </div>   
</section>

