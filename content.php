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

	elseif ($_GET['module'] == 'mm') {
		include "modules/mm/view.php";
	}

	elseif ($_GET['module'] == 'form_mm') {
		include "modules/mm/form.php";
	}
	
	elseif ($_GET['module'] == 'prices') {
		include "modules/prices/view.php";
	}

	elseif ($_GET['module'] == 'form_prices') {
		include "modules/prices/form.php";
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
	
	
	
	elseif ($_GET['module'] == 's_inventory') {
		include "modules/s_inventory/view.php";
	}

	elseif ($_GET['module'] == 's_report') {
		include "modules/s_report/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
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
}
?>