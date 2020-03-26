<?php 

if ($_SESSION['permisos_acceso'] == 'Administrador')  { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
        
        <li>
			<a data-toggle="modal" href="#logout"><i class="fa fa-sign-out"></i> Salir </a>
	  	</li>
	<?php
      if ($_GET["module"]=="mm" || $_GET["module"]=="form_mm") { ?>
		<li class="active">
		  <a href="?module=mm"><i class="fa fa-calendar"></i> Reservas</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=mm"><i class="fa fa-calendar"></i> Reservas</a>
		  </li>
	  <?php
	}
	
  
  	if ($_GET["module"]=="prices" || $_GET["module"]=="form_prices") { ?>
		<li class="active">
		  <a href="?module=prices"><i class="fa fa-folder"></i> Servicios</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=prices"><i class="fa fa-folder"></i> Servicios</a>
		  </li>
	  <?php
	}
	
	 if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
			<li class="active">
				<a href="?module=user"><i class="fa fa-user"></i>Usuarios</a>
			</li>
		<?php
		}
	
		else { ?>
			<li>
			<a href="?module=user"><i class="fa fa-user"></i>Usuarios</a></li>
		<?php
	}

	 if ($_GET["module"]=="s_inventory") { ?>
		<li class="active treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-file-text"></i> <span>Reporte de Reservas</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li class="active"><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
				<li><a href="?module=stock_report"><i class="fa fa-list"></i> Reporte Historial </a></li>
			  </ul>
		  </li>
		<?php
	  }
	  elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-file-text"></i> <span>Reporte de Reservas</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
				<li class="active"><a href="?module=stock_report"><i class="fa fa-list"></i> Reporte Historial  </a></li>
			  </ul>
		  </li>
		<?php
	  }
	  else { ?>
		<li class="treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-file-text"></i> <span>Reporte de Reservas</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
				<li><a href="?module=stock_report"><i class="fa fa-list"></i> Reporte Historial </a></li>
			  </ul>
		  </li>
		<?php
	  }
	  
	  if ($_GET["module"]=="sfact" || $_GET["module"]=="form_sfact") { ?>
		<li class="active">
		  <a href="?module=sfact"><i class="fa fa-eye"></i>Ingreso Biomêtrico</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=sfact"><i class="fa fa-eye"></i>Ingreso Biomêtrico</a>
		  </li>
	  <?php
	}
	  
  
  

	?>
	</ul>
<?php
}
?>