<?php
//require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) or (!isset($_SESSION['username']))){
	
	echo "<meta http-equiv='refresh' content='0; url=indexcaptcha.php'>";
}

else {

	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}
	
	if ($_GET['module'] == 'orders') {
		include "modules/orders/view.php";
	}

	if ($_GET['module'] == 'notificaciones') {
		include "modules/notificaciones/view.php";
	}
	
	
	if ($_GET['module'] == 'doc') {
		include "modules/doc/view.php";
	}

	if ($_GET['module'] == 'consultas') {
		include "modules/consultas/view.php";
	}
	
	if ($_GET['module'] == 'rsocial') {
		include "modules/rsocial/view.php";
	}
	
	if ($_GET['module'] == 'cards') {
		include "modules/cards/view.php";
	}

	if ($_GET['module'] == 'facturacion') {
		include "modules/facturacion/view.php";
	}

	if ($_GET['module'] == 'audit') {
		include "modules/audit/view.php";
	}

	elseif ($_GET['module'] == 'mm') {
		include "modules/mm/view.php";
	}

	elseif ($_GET['module'] == 'bunker') {
		include "modules/bunker/view.php";
	}
	
	elseif ($_GET['module'] == 'recepcion') {
		include "modules/recepcion/view.php";
	}

	elseif ($_GET['module'] == 'form_mm') {
		include "modules/mm/form.php";
	}

	elseif ($_GET['module'] == 'form_bunker') {
		include "modules/bunker/form.php";
	}
	
	elseif ($_GET['module'] == 'form_cards') {
		include "modules/cards/form.php";
	}
	
	elseif ($_GET['module'] == 'form_rsocial') {
		include "modules/rsocial/form.php";
	}
	
	elseif ($_GET['module'] == 'form_recepcion') {
		include "modules/recepcion/form.php";
	}
	
	elseif ($_GET['module'] == 'form_doc') {
		include "modules/doc/form.php";
	}
	
	elseif ($_GET['module'] == 'prices') {
		include "modules/prices/view.php";
	}

	elseif ($_GET['module'] == 'form_prices') {
		include "modules/prices/form.php";
	}

	elseif ($_GET['module'] == 'form_consultas') {
		include "modules/consultas/form.php";
	}
	
	elseif ($_GET['module'] == 'dates') {
		include "modules/dates/view.php";
	}

	elseif ($_GET['module'] == 'form_dates') {
		include "modules/dates/form.php";
	}
	
	elseif ($_GET['module'] == 'm_transaction') {
		include "modules/m_transaction/view.php";
	}

	elseif ($_GET['module'] == 'form_m_transaction') {
		include "modules/m_transaction/form.php";
	}
	
	elseif ($_GET['module'] == 'cj') {
		include "modules/cj/view.php";
	}

	
	elseif ($_GET['module'] == 'form_cj') {
		include "modules/cj/form.php";
	}
	
	elseif ($_GET['module'] == 'formPrint_cj') {
		include "modules/cj/formPrint.php";
	}

		
	elseif ($_GET['module'] == 'formAddCaja_cj') {
		include "modules/cj/formAddCaja.php";
	}
	
	elseif ($_GET['module'] == 'formEdit_cj') {
		include "modules/cj/formEdit.php";
	}

	elseif ($_GET['module'] == 'formServicios_cj') {
		include "modules/cj/formServicios.php";
	}
	
	elseif ($_GET['module'] == 'formPrintModule_cj') {
		include "modules/cj/formPrintModule.php";
	}

		
	elseif ($_GET['module'] == 's_inventory') {
		include "modules/s_inventory/view.php";
	}

	elseif ($_GET['module'] == 'sfact') {
		include "modules/sfact/view.php";
	}

	elseif ($_GET['module'] == 'form_sfact') {
		include "modules/sfact/form.php";
	}

	elseif ($_GET['module'] == 'totalizador') {
		include "modules/totalizador/view.php";
	}

	elseif ($_GET['module'] == 'form_totalizador') {
		include "modules/totalizador/form.php";
	}


	elseif ($_GET['module'] == 'stock_report') {
		include "modules/stock_report/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	
	elseif ($_GET['module'] == 'usercj_user') {
		include "modules/user/usercj.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
	}


	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}
	
	elseif ($_GET['module'] == 'calendar') {
		include "modules/calendar/calendar.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}

	elseif ($_GET['module'] == 'facturacion') {
		include "modules/facturacion/exportData.php";
	}

	elseif ($_GET['module'] == 'cj') {
		include "modules/cj/exportData.php";
	}


	elseif ($_GET['module'] == 'afinidad') {
		include "modules/afinidad/view.php";
	}

	elseif ($_GET['module'] == 'acceso') {
		include "modules/acceso/view.php";
	}

	elseif ($_GET['module'] == 'form_acceso') {
		include "modules/acceso/form.php";
	}

	
	elseif ($_GET['module'] == 'form_afinidad') {
		include "modules/afinidad/form.php";
	}
	
	
	elseif ($_GET['module'] == 'formAddAfinidad_afinidad') {
		include "modules/afinidad/formAddAfinidad.php";
	}
	
	
	elseif ($_GET['module'] == 'formEdit_afinidad') {
		include "modules/afinidad/formEdit.php";
	}

	elseif ($_GET['module'] == 'formServicios_afinidad') {
		include "modules/afinidad/formServicios.php";
	}

	elseif ($_GET['module'] == 'form_notificaciones') {
		include "modules/notificaciones/form.php";
	}
	
	
		



	
}
?>