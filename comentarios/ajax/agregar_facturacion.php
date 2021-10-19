<?php

include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['valorDolar'])){$valorDolar=$_POST['valorDolar'];}
if (isset($_POST['valor_venta_alpublico'])){$valor_venta_alpublico=$_POST['valor_venta_alpublico'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}


	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../../funciones.php");
if (!empty($id) and !empty($cantidad) and !empty($precio_venta)and !empty($valor_venta_alpublico) and !empty($valorDolar))
{
$insert_tmp=mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,valor_venta_alpublico_tmp, valorDolar_tmp, session_id) 
VALUES 
('$id','$cantidad','$precio_venta','$valor_venta_alpublico', '$valorDolar','$session_id')");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
}
$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
?>
<table class="table">
<tr>
	<th class='text-left'>CODIGO</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCION</th>
    <th class='text-center'>Cotizac Dolar</th>
    <th class='text-center'>u$sVenta U.</th>
    <th class='text-center'>$Vta Ttal</th>
	<th class='text-center'>u$sCosto U.</th>
	<th class='text-center'>$Cto Ttal</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sumadorVENTA_total=0;
	$sql=mysqli_query($con, "select * from products, tmp where products.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	
	$valor_venta_alpublico=$row['valor_venta_alpublico_tmp']; ///// VARIABLE VENTA
	$valor_venta_alpublico_f=number_format($valor_venta_alpublico,2);//Formateo variables-
	$valor_venta_alpublico_r=str_replace(",","",$valor_venta_alpublico_f);//Reemplazo las comas
	
	$valorDolar=$row['valorDolar_tmp']; ///// VARIABLE VENTA
	$valorDolar_f=number_format($valorDolar,2);//Formateo variables-
	$valorDolar_r=str_replace(",","",$valorDolar_f);//Reemplazo las comas
	
	$venta_total=$valor_venta_alpublico_r*$cantidad*$valorDolar;
	$venta_total_f=number_format($venta_total,2);//u$sCosto total formateado
	$venta_total_r=str_replace(",","",$venta_total_f);//Reemplazo las comas
	$sumadorVENTA_total+=$venta_total_r;//Sumador
	
	$precio_venta=$row['precio_tmp']; /////////// VARIABLE COSTO
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables-
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	
	$precio_total=$precio_venta_r*$cantidad*$valorDolar;
	$precio_total_f=number_format($precio_total,2);//u$sCosto total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>
		<tr>
			<td class='text-left'><?php echo $codigo_producto;?></td>
           	<td class='text-center'><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
            <td class='text-center'><?php echo $simbolo_moneda;?><?php echo $valorDolar_f;?></td>
            <td class='text-center'>u$s <?php echo $valor_venta_alpublico_f;?></td>
            <td class='text-center'><?php echo $simbolo_moneda;?><?php echo $venta_total_f;?></td>
			<td class='text-center'>u$s <?php echo $precio_venta_f;?></td>
			<td class='text-center'><?php echo $simbolo_moneda;?><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	
	
	$subtotal=number_format($sumador_total,2,'.','');
	
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	
	$subtotalVentas=number_format($sumadorVENTA_total,2,'.',''); // total ventas
	$total_factura=$subtotalVentas-$subtotal /// total de comisiones

?>

<td class='text-right' colspan=3></td><td class='text-right' colspan=3></td>
<td class='text-right' colspan=3></td><td class='text-right' colspan=3></td>

<tr>
	<td class='text-right' colspan=3>SUBTOTAL VENTA <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotalVentas,2);?></td>
	<td></td>
</tr>

<tr>
	<td class='text-right' colspan=3>SUBTOTAL COSTO <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>

<tr>
	<td class='text-right' colspan=3>SUBTOTAL UTILIDAD <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

<tr>
	<td class='text-right' colspan=3>&nbsp;</td>
	<td class='text-right'>&nbsp;</td>
	<td></td>
</tr>


</table>
