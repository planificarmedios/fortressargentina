
<?php
session_start();
require_once "../../config/database.php";

if(isset($_POST['dataidobat'])) {
$codigo = $_POST['dataidobat'];

 
  $query = mysqli_query($mysqli, "SELECT codigo,nombre,unidad,stock,cliente FROM medicamentos WHERE codigo='$codigo'")
                                  or die('error '.mysqli_error($mysqli));
  $data = mysqli_fetch_assoc($query);

  $stock   = $data['stock'];
  $unidad = $data['unidad'];
  $cliente = $data['cliente'];

	if($stock != '') {
		echo "<div class='form-group'>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='stok' name='stock' value='Stock Disponible: $stock' readonly>
                    <span class='input-group-addon'>$unidad</span>
                  </div>
                </div>
              </div>";
	} else {
		echo "<div class='form-group'>
               
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='stok' name='stock' value='' readonly>
                    <span class='input-group-addon'></span>
                  </div>
                </div>
              </div>";
	}		
}
?> 