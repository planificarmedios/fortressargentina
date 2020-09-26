<?php 

if ($_SESSION['permisos_acceso'] == 'Usuario')  { ?>

	<ul class="sidebar-menu"> <li class="header">MENU</li>

	<?php 
	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio</a>
		  </li>
		  
	 <?php 

	
		if ($_GET["module"]=="recepcion" || $_GET["module"]=="form_recepcion") { ?>
			<li class="active">
			<a href="?module=recepcion"><i class="fa fa-home"></i> Recepción de Clientes</a>
			</li>
		<?php
		} 	else { ?>
			<li>
			<a href="?module=recepcion"><i class="fa fa-home"></i> Recepción de Clientes</a>
			</li>
		<?php

		}
		
		if ($_GET["module"]=="bunker" || $_GET["module"]=="form_bunker") { ?>
			<li class="active">
			<a href="?module=bunker"><i class="fa fa-windows"></i> Zona Bunker</a>
			</li>
		<?php
		} 	else { ?>
			<li>
			<a href="?module=bunker"><i class="fa fa-windows"></i> Zona Bunker</a>
			</li>
		<?php
		}

} elseif ($_SESSION['permisos_acceso'] == 'Facturacion')  { ?>

			<ul class="sidebar-menu"> <li class="header">MENU</li>
		
			<?php 
			if ($_GET["module"]=="start") { 
				$active_home="active";
			} else {
				$active_home="";
			}
			?>
					<?php 			  
					 if ($_GET["module"]=="audit" || $_GET["module"]=="form_audit") { ?>
						<li class="active">
						<a href="?module=audit"><i class="fa fa-search"></i> Auditoria</a>
						</li>
					<?php
					}

					else { ?>
						<li>
						<a href="?module=audit"><i class="fa fa-search"></i> Auditoria</a>
						</li>
					<?php
					} 
					
					
					if ($_GET["module"]=="prices" || $_GET["module"]=="form_prices") { ?>
						<li class="active">
						  <a href="?module=prices"><i class="fa fa-folder"></i> Precios y Ajustes</a>
						  </li>
					  <?php
					  }
				
					  else { ?>
						<li>
						  <a href="?module=prices"><i class="fa fa-folder"></i> Precios y Ajustes</a>
						  </li>
					  <?php
					}
					
				
					if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
						<li class="active">
							<a href="?module=user"><i class="fa fa-users"></i>Usuarios</a>
						</li>
					<?php
					}
				
					else { ?>
						<li>
						<a href="?module=user"><i class="fa fa-users"></i>Usuarios</a></li>
					<?php
					}

					if ($_GET["module"]=="rsocial" || $_GET["module"]=="form_rsocial") { ?>
						<li class="active">
							<a href="?module=rsocial"><i class="fa fa-user-plus"></i>Datos Fiscales</a>
						</li>
					<?php
					}
				
					else { ?>
						<li>
						<a href="?module=rsocial"><i class="fa fa-user-plus"></i>Datos Fiscales</a></li>
					<?php
					}
					
					
					if ($_GET["module"]=="cards" || $_GET["module"]=="form_cards") { ?>
						<li class="active">
							<a href="?module=cards"><i class="fa fa-credit-card"></i>Tarjetas</a>
						</li>
					<?php
					}
				
					else { ?>
						<li>
						<a href="?module=cards"><i class="fa fa-credit-card"></i>Tarjetas</a></li>
					<?php
					}

					if ($_GET["module"]=="s_inventory") { ?>
						<li class="active treeview">
								<a href="javascript:void(0);">
								  <i class="fa fa-file-text"></i> <span>Reservas y Consultas</span> <i class="fa fa-angle-left pull-right"></i>
								</a>
							  <ul class="treeview-menu">
								<li class="active"><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
								<li><a href="?module=stock_report"><i class="fa fa-calendar"></i> Reporte Historial </a></li>
								<li><a href="?module=mm"><i class="fa fa-list"></i> Listar</a></li>
								
							  </ul>
						  </li>
						<?php
					  }
					  elseif ($_GET["module"]=="stock_report") { ?>
						<li class="active treeview">
								<a href="javascript:void(0);">
								  <i class="fa fa-file-text"></i> <span>Reservas y Consultas</span> <i class="fa fa-angle-left pull-right"></i>
								</a>
							  <ul class="treeview-menu">
								<li><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
								<li><a href="?module=stock_report"><i class="fa fa-calendar"></i> Reporte Historial  </a></li>
								<li><a href="?module=mm"><i class="fa fa-list"></i> Listar</a></li>
								
							  </ul>
						  </li>
						<?php
					  }
					  else { ?>
						<li class="treeview">
								<a href="javascript:void(0);">
								  <i class="fa fa-file-text"></i> <span>Reservas y Consultas</span> <i class="fa fa-angle-left pull-right"></i>
								</a>
							  <ul class="treeview-menu">
								<li><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
								<li><a href="?module=stock_report"><i class="fa fa-calendar"></i> Reporte Historial </a></li>
								<li><a href="?module=mm"><i class="fa fa-list"></i> Listar</a></li>
								
							  </ul>
						  </li>
						<?php
					}

					if ($_GET["module"]=="cj" || $_GET["module"]=="form_cj") { ?>
						<li class="active">
						  <a href="?module=cj"><i class="fa fa-lock"></i>Cajas</a>
						  </li>
					  <?php
					  }
				
					  else { ?>
						<li>
						  <a href="?module=cj"><i class="fa fa-lock"></i>Cajas</a>
						  </li>
					  <?php
					}
					
					if ($_GET["module"]=="totalizador" || $_GET["module"]=="form_totalizador") { ?>
						<li class="active">
						  <a href="?module=totalizador"><i class="fa fa-unlock"></i> Totalizador Accesos</a>
						  </li>
					  <?php
					  }
				
					  else { ?>
						<li>
						  <a href="?module=totalizador"><i class="fa fa-unlock"></i>Totalizador Accesos</a>
						  </li>
					  <?php
					}

				
				?>
				 <li>
						<a data-toggle="modal" href="#logout"><i class="fa fa-sign-out"></i> Salir </a>
					  </li>
				<?php




} elseif ($_SESSION['permisos_acceso'] == 'Administrador')  { ?>

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
	<?php 

	

	
  
  	if ($_GET["module"]=="prices" || $_GET["module"]=="form_prices") { ?>
		<li class="active">
		  <a href="?module=prices"><i class="fa fa-folder"></i>Precios y Ajustes</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=prices"><i class="fa fa-folder"></i>Precios y Ajustes</a>
		  </li>
	  <?php
	}
	
	
	
		if ($_GET["module"]=="audit" || $_GET["module"]=="form_audit") { ?>
		<li class="active">
		  <a href="?module=audit"><i class="fa fa-search"></i> Auditoria</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=audit"><i class="fa fa-search"></i> Auditoria</a>
		  </li>
	  <?php
	}
	
	 if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
			<li class="active">
				<a href="?module=user"><i class="fa fa-users"></i>Usuarios</a>
			</li>
		<?php
		}
	
		else { ?>
			<li>
			<a href="?module=user"><i class="fa fa-users"></i>Usuarios</a></li>
		<?php
	    }
		
		
		if ($_GET["module"]=="user" || $_GET["module"]=="usercj_user") { ?>
			<li class="active">
				
			</li>
		<?php
		}


		if ($_GET["module"]=="cj" || $_GET["module"]=="form_cj") { ?>
			<li class="active">
			  <a href="?module=cj"><i class="fa fa-lock"></i>Cajas</a>
			  </li>
		  <?php
		  }
	
		  else { ?>
			<li>
			  <a href="?module=cj"><i class="fa fa-lock"></i>Cajas</a>
			  </li>
		  <?php
		}


		if ($_GET["module"]=="facturacion" || $_GET["module"]=="form_facturacion") { ?>
			<li class="active">
			  <a href="?module=facturacion"><i class="fa fa-money"></i>Facturación</a>
			  </li>
		  <?php
		  }
	
		  else { ?>
			<li>
			  <a href="?module=facturacion"><i class="fa fa-money"></i>Facturación</a>
			  </li>
		  <?php
		}
	
		 if ($_GET["module"]=="rsocial" || $_GET["module"]=="form_rsocial") { ?>
			<li class="active">
				<a href="?module=rsocial"><i class="fa fa-user-plus"></i>Datos Fiscales</a>
			</li>
		<?php
		}
	
		else { ?>
			<li>
			<a href="?module=rsocial"><i class="fa fa-user-plus"></i>Datos Fiscales</a></li>
		<?php
	    }
		
		
		if ($_GET["module"]=="cards" || $_GET["module"]=="form_cards") { ?>
			<li class="active">
				<a href="?module=cards"><i class="fa fa-credit-card"></i>Tarjetas</a>
			</li>
		<?php
		}
	
		else { ?>
			<li>
			<a href="?module=cards"><i class="fa fa-credit-card"></i>Tarjetas</a></li>
		<?php
	    }
	
	 if ($_GET["module"]=="s_inventory") { ?>
		<li class="active treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-file-text"></i> <span>Reservas y Consultas</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li class="active"><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
				<li><a href="?module=stock_report"><i class="fa fa-calendar"></i> Reporte Historial </a></li>
				<li><a href="?module=mm"><i class="fa fa-list"></i> Listar</a></li>
				<li><a href="FullCalendar/calendarAdmin.php"><i class="fa fa-bell"></i> Reservar Sala Platinium</a></li>
				<li><a href="FullCalendar/calendarAdminB.php"><i class="fa fa-bell"></i> Reservar Sala Gold</a></li>
			  </ul>
		  </li>
		<?php
	  }
	  elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-file-text"></i> <span>Reservas y Consultas</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
				<li><a href="?module=stock_report"><i class="fa fa-calendar"></i> Reporte Historial  </a></li>
				<li><a href="?module=mm"><i class="fa fa-list"></i> Listar</a></li>
				<li><a href="FullCalendar/calendarAdmin.php"><i class="fa fa-bell"></i> Reservar Sala Platinium</a></li>
				<li><a href="FullCalendar/calendarAdminB.php"><i class="fa fa-bell"></i> Reservar Sala Gold</a></li>
			  </ul>
		  </li>
		<?php
	  }
	  else { ?>
		<li class="treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-file-text"></i> <span>Reservas y Consultas</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li><a href="?module=s_inventory"><i class="fa fa-check"></i> Reservas de la fecha </a></li>
				<li><a href="?module=stock_report"><i class="fa fa-calendar"></i> Reporte Historial </a></li>
				<li><a href="?module=mm"><i class="fa fa-list"></i> Listar</a></li>
				<li><a href="FullCalendar/calendarAdmin.php"><i class="fa fa-bell"></i> Reservar Sala Platinium</a></li>
				<li><a href="FullCalendar/calendarAdminB.php"><i class="fa fa-bell"></i> Reservar Sala Gold</a></li>
			  </ul>
		  </li>
		<?php
	}

	if ($_GET["module"]=="recepcion" || $_GET["module"]=="form_recepcion") { ?>
		<li class="active">
		  <a href="?module=recepcion"><i cclass="fa fa-sign-in"></i>Host de Clientes</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=recepcion"><i class="fa fa-sign-in"></i>Host de Clientes</a>
		  </li>
	  <?php
	}

	
	if ($_GET["module"]=="bunker" || $_GET["module"]=="form_bunker") { ?>
		<li class="active">
		  <a href="?module=bunker"><i class="fa fa-windows"></i>Zona Bunker</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=bunker"><i class="fa fa-windows"></i>Zona Bunker</a>
		  </li>
	  <?php
	}



	  
	if ($_GET["module"]=="sfact" || $_GET["module"]=="form_sfact") { ?>
		<li class="active">
		  <a href="?module=sfact"><i class="fa fa-eye"></i>Ingreso Biométrico</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=sfact"><i class="fa fa-eye"></i>Ingreso Biométrico</a>
		  </li>
	  <?php
	}
	
	
	if ($_GET["module"]=="totalizador" || $_GET["module"]=="form_totalizador") { ?>
		<li class="active">
		  <a href="?module=totalizador"><i class="fa fa-unlock"></i> Totalizador Accesos</a>
		  </li>
	  <?php
	  }

	  else { ?>
		<li>
		  <a href="?module=totalizador"><i class="fa fa-unlock"></i>Totalizador Accesos</a>
		  </li>
	  <?php
	}



	if ($_GET["module"]=="consultas" || $_GET["module"]=="form_consultas") { ?>
		<li class="active treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-list"></i> <span>Consultas y Pendientes</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li><a href="?module=consultas"><i class="fa fa-unlock"></i>En Proceso </a></li>
				<li><a href="?module=form_consultas&form=list"><i class="fa fa-list"></i>Historial </a></li>
				
			  </ul>
		  </li>
		<?php
	  }
	  else { ?>
		<li class="treeview">
				<a href="javascript:void(0);">
				  <i class="fa fa-list"></i> <span>Consultas y Pendientes</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
			  <ul class="treeview-menu">
				<li><a href="?module=consultas"><i class="fa fa-unlock"></i>En Proceso </a></li>
				<li><a href="?module=form_consultas&form=list"><i class="fa fa-list"></i>Historial </a></li>
			
				
			  </ul>
		  </li>
		<?php
	  }

    ?>
	 <li>
			<a data-toggle="modal" href="#logout"><i class="fa fa-sign-out"></i> Salir </a>
	  	</li>
	<?php
}
?>