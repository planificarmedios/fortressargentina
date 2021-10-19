<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }

.text-center{
	text-align:center
}
.text-right{
	text-align:right
}
table th, td{
	font-size:13px
}
.detalle td{
	padding:7px;
}

.border-bottom{
	border-bottom: solic 1px #bdc3c7;
}


-->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" style="font-size: 11pt; font-family: arial" >

    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 33%; color: #444444;">
                <img style="width: 100%;" src="../../../../cj - Copia/pdf/img/logo.png" alt="Logo"><br>
                
            </td>
			<td style="width: 34%;">
			<strong>E-mail : </strong> <?php echo email_empresa;?><br>
			<strong>Teléfono : </strong> <?php echo telefono_empresa;?><br>
			<strong>Sitio web : </strong> <?php echo web_empresa;?><br>
			</td>
			<td style="width: 33%;">
				<strong><?php echo nombre_empresa;?> </strong> <br>
				<strong>Dirección : </strong> <?php echo direccion_empresa;?><br>
		
			</td>
			
        </tr>
    </table>
    
	<hr style="display: block;height: 1px;border: 1px solid #bdc3c7;    margin: 0.5em ;    padding: 0;">
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 20%; ">               
            </td>
			<td style="width: 60%;text-align:center;font-size:24px;color:#3F51B5; padding:10px; border-radius: 7px ">
				RECIBO DE PAGO
			</td>
			
			
        </tr>
    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 60%; "> 
				
			</td>
			<td  style="width: 20%;color:white;background-color:#3F51B5;padding:5px;text-align:center "> 
				<strong style="font-size:14px;" >RECIBO #</strong>
			</td>
			<td  style="width: 20%; color:white;background-color:#3F51B5;padding:5px;text-align:center " > 
				<strong style="font-size:14px;">FECHA</strong>
			</td>
		</tr>
		
		<tr>

            <td  style="width: 60%; "> 
				
			</td>
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px"> 
				<?php echo $numero;?>
			</td>
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px " > 
				<?php echo date("d/m/Y");?>
			</td>
		</tr>

    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;" class="detalle">
        
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Recibí de: </strong>
			</td>
			<td  style="width: 55%; " class="border-bottom"> 
				<?php echo nombre_empresa;?>
			</td>
			<td  style="width: 15%; text-align:right"> 
				<strong>Cantidad: </strong>
			</td>
			<td  style="width: 15%;border: solid 1px #bdc3c7" > <?php echo simbolo_moneda;?>
				<?php echo number_format($monto,2);?>
			</td>
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Cantidad: </strong>
			</td>
			
			<td  style="width: 85%; " colspan=3 class="border-bottom"> 
				<?php 
					$monto=number_format($monto,2,'.','');
					echo   $letras = NumeroALetras::convertir($monto,nombre_moneda,'centavos');
				?>
			</td>
				
				
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Concepto: </strong>
			</td>
			
			<td  style="width: 85%; " colspan=3 class="border-bottom"> 
				<?php echo $concepto;?>
			</td>	
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				
			</td>
			
			<td  style="width: 70%; text-align:right" colspan=3 > 
				<strong>Forma de pago: </strong> 
				Efectivo [<?php if ($forma_pago==1){echo "x";}?>] - Cheque [<?php if ($forma_pago==2){echo "x";}?>] - Transferencia [<?php if ($forma_pago==3){echo "x";}?>]
			</td>	
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Recibido por: </strong>
			</td>
			
			<td  style="width: 70%; " colspan=2 > 
				_______________________________
			</td>	
		</tr>
		<tr>
            <td  style="width: 15%; "> 
				
			</td>
			
			<td  style="width: 70%;padding-top:-15px " colspan=2 > 
				<?php echo $cliente;?>
			</td>	
		</tr>
		
		
    </table>
	
	
	
	<div style="width:100%; border-top:dashed 1px;margin-top:10mm;margin-bottom:10mm" > </div>
	
	
	
	
	
	
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 33%; color: #444444;">
                <img style="width: 100%;" src="../../../../cj - Copia/pdf/img/logo.png" alt="Logo"><br>
                
            </td>
			<td style="width: 34%;">
			<strong>E-mail : </strong> <?php echo email_empresa;?><br>
			<strong>Teléfono : </strong> <?php echo telefono_empresa;?><br>
			<strong>Sitio web : </strong> <?php echo web_empresa;?><br>
			</td>
			<td style="width: 33%;">
				<strong><?php echo nombre_empresa;?> </strong> <br>
				<strong>Dirección : </strong> <?php echo direccion_empresa;?><br>
		
			</td>
			
        </tr>
    </table>
    
	<hr style="display: block;height: 1px;border: 1px solid #bdc3c7;    margin: 0.5em ;    padding: 0;">
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 20%; ">               
            </td>
			<td style="width: 60%;text-align:center;font-size:24px;color:#3F51B5; padding:10px; border-radius: 7px ">
				RECIBO DE PAGO
			</td>
			
			
        </tr>
    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 60%; "> 
				
			</td>
			<td  style="width: 20%;color:white;background-color:#3F51B5;padding:5px;text-align:center "> 
				<strong style="font-size:14px;" >RECIBO #</strong>
			</td>
			<td  style="width: 20%; color:white;background-color:#3F51B5;padding:5px;text-align:center " > 
				<strong style="font-size:14px;">FECHA</strong>
			</td>
		</tr>
		
		<tr>

            <td  style="width: 60%; "> 
				
			</td>
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px"> 
				<?php echo $numero;?>
			</td>
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px " > 
				<?php echo date("d/m/Y");?>
			</td>
		</tr>

    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;" class="detalle">
        
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Recibí de: </strong>
			</td>
			<td  style="width: 55%; " class="border-bottom"> 
				<?php echo nombre_empresa;?>
			</td>
			<td  style="width: 15%; text-align:right"> 
				<strong>Cantidad: </strong>
			</td>
			<td  style="width: 15%;border: solid 1px #bdc3c7" > <?php echo simbolo_moneda;?>
				<?php echo number_format($monto,2);?>
			</td>
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Cantidad: </strong>
			</td>
			
			<td  style="width: 85%; " colspan=3 class="border-bottom"> 
				<?php echo   $letras = NumeroALetras::convertir($monto,nombre_moneda,'centavos');?>
			</td>
				
				
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Concepto: </strong>
			</td>
			
			<td  style="width: 85%; " colspan=3 class="border-bottom"> 
				<?php echo $concepto;?>
			</td>	
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				
			</td>
			
			<td  style="width: 70%; text-align:right" colspan=3 > 
				<strong>Forma de pago: </strong> 
				Efectivo [<?php if ($forma_pago==1){echo "x";}?>] - Cheque [<?php if ($forma_pago==2){echo "x";}?>] - Transferencia [<?php if ($forma_pago==3){echo "x";}?>]
			</td>	
		</tr>
		
		<tr>
            <td  style="width: 15%; "> 
				<strong>Recibido por: </strong>
			</td>
			
			<td  style="width: 70%; " colspan=2 > 
				_______________________________
			</td>	
		</tr>
		<tr>
            <td  style="width: 15%; "> 
				
			</td>
			
			<td  style="width: 70%;padding-top:-15px " colspan=2 > 
				<?php echo $cliente;?>
			</td>	
		</tr>
		
		
    </table>
	
	<div style="width:100%; border-top:dashed 1px;margin-top:10mm;margin-bottom:10mm" > </div>
	
</page>	
   