<?php

include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$id_factura= $_SESSION['id_factura'];
$numero_factura= $_SESSION['numero_factura'];
if (isset($_POST['id'])){$id=intval($_POST['id']);}
if (isset($_POST['cantidad'])){$cantidad=intval($_POST['cantidad']);}
if (isset($_POST['precio_venta'])){$precio_venta=floatval($_POST['precio_venta']);}
if (isset($_POST['valorDolar'])){$valorDolar=floatval($_POST['valorDolar']);}
if (isset($_POST['valor_venta_alpublico'])){$precio_venta=floatval($_POST['valor_venta_alpublico']);}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../../funciones.php");
if (!empty($id) and !empty($cantidad) and !empty($precio_venta) and !empty($valorDolar) and !empty($valor_venta_alpublico))
{
$insert_tmp=mysqli_query($con, "INSERT INTO detalle_factura (numero_factura, id_producto,cantidad,precio_venta,valor_venta_alpublico,valorDolar) VALUES ('$numero_factura','$id','$cantidad','$precio_venta',$valor_venta_alpublico','$valorDolar')");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_detalle=intval($_GET['id']);	
$delete=mysqli_query($con, "DELETE FROM detalle_factura WHERE id_detalle='".$id_detalle."'");
}
$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);

?>
<table class="table">
<tr>
	<th class='text-center'>CODIGO</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCION</th>
    <th class='text-center'>Cotizacion u$s</th>
    <th class='text-center'>u$sVenta unit.</th>
    <th class='text-center'>u$sVenta Total</th>
	<th class='text-center'>u$sCosto unit.</th>
	<th class='text-center'>u$sCosto total</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sumadorVENTA_total=0;
	
	$sql=mysqli_query($con, "select * from products, facturas, detalle_factura where facturas.numero_factura=detalle_factura.numero_factura and  facturas.id_factura='$id_factura' and products.id_producto=detalle_factura.id_producto");
	while ($row=mysqli_fetch_array($sql))
	{
	
	$id_detalle=$row["id_detalle"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['nombre_producto'];
	
	$valorDolar=$row['valorDolar']; ///// VARIABLE VENTA
	$valorDolar_f=number_format($valorDolar,2);//Formateo variables-
	$valorDolar_r=str_replace(",","",$valorDolar_f);//Reemplazo las comas
			
	$valor_venta_alpublico=$row['valor_venta_alpublico']; ///// VARIABLE VENTA
	$valor_venta_alpublico_f=number_format($valor_venta_alpublico,2);//Formateo variables-
	$valor_venta_alpublico_r=str_replace(",","",$valor_venta_alpublico_f);//Reemplazo las comas
	
	$venta_total=$valor_venta_alpublico_r*$cantidad;
	$venta_total_f=number_format($venta_total,2);//u$sCosto total formateado
	$venta_total_r=str_replace(",","",$venta_total_f);//Reemplazo las comas
	$sumadorVENTA_total+=$venta_total_r;//Sumador
	
	
	
	$precio_venta=$row['precio_venta']; /////////// VARIABLE COSTO
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables-
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//u$sCosto total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	
	$subtotalVentas=number_format($sumadorVENTA_total,2,'.',''); // total ventas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>
			<tr>
			<td class='text-center'><?php echo $codigo_producto;?></td>
           	<td class='text-center'><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
            <td class='text-center'><?php echo $valorDolar_f;?></td>
            <td class='text-center'><?php echo $valor_venta_alpublico_f;?></td>
            <td class='text-center'><?php echo $venta_total_f;?></td>
			<td class='text-center'><?php echo $precio_venta_f;?></td>
			<td class='text-center'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;
	$update=mysqli_query($con,"update facturas set total_venta='$total_factura' where id_factura='$id_factura'");
?>
<td class='text-right' colspan=4></td><td class='text-right' colspan=4></td>
<td class='text-right' colspan=4></td><td class='text-right' colspan=4></td>

<tr>
	<td class='text-right' colspan=4>SUBTOTAL VENTA <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotalVentas,2);?></td>
	<td></td>
</tr>

<tr>
	<td class='text-right' colspan=4>SUBTOTAL COSTO <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>

<tr>
	<td class='text-right' colspan=4>SUBTOTAL UTILIDAD <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>
