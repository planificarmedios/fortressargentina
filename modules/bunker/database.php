<?php 
include_once ("../../callAPI.php");
require_once ("../../parametros.php");
require_once ("../../fechaNumber.php");


 $get_data = callAPI('GET', $servidor.'/api/access/refreshBunker/',false);
 $response = json_decode($get_data, true);


				foreach ($response as $d) {
					    $id = $d['id']; //id cliente sql
						  $id_evento = $d['ID']; //id orden del evento
						  $CLIENTE = ' '.$d['CLIENTE']; 
					      $alias = $d['alias']; 
						  if ($alias == null or $alias == '') {
							  $CLIENTE = ' '.$d['CLIENTE'];
						  } else {
							  $CLIENTE = $d['alias'] ;
						  }
					
						  $dni = $d['dni'];
						  $ingreso = fechaNumber($d['SRVDT']);
						  $hh = substr($d['SRVDT'], 11,5);
						  $email = $d['email'];
	  
						  if ($d['status']==1){
							  $s = 'Activo';
							  $st = "style='background-color:#BBDAB6'";
						  } else {
						  $s = 'Inactivo';
						     $st = "style='background-color:#F7C8BF'";
						  };

              echo "<tr>
 		                <td width='5%'   class='center'>$id_evento</td> 
		                <td width='5%'   class='center'>$ingreso</td>
    	                <td width='5%'   class='center'>$hh</td>
		                <td width='5%'   class='center'>$id</td>
                        <td width='20%'   class='center'>$CLIENTE</td>
			            <td $st  width='10%'  class='center'>$s</td>
		                <td class='center' width='10%'>
                   <div>

				   <a data-toggle='tooltip' data-placement='top' title='Verificar' href='?module=form_bunker&form=edit&id=$id&id_evento=$id_evento' style='margin-right:5px' class='btn btn-primary btn-sm'><i style='color:#fff' class='glyphicon glyphicon-search'></i></a>";
                    ?>
                   <?php
                   echo "      
                        </div>
                      </td>
                    </tr>";
            }
		    ?>
            </tbody>
          </table>

