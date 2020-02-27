<?php
$prueba5 = 'prueba5';
$pass5 = 'pass5';
$Remark = 'Remark';
$Status = 'Status';
$last_login = '2019-09-10 09:03:33.547';
  
$con=odbc_connect("conectorODBC_php","sa","Medinilla785");
$stmt = odbc_prepare($con, "INSERT INTO auth_user (username,password,Remark,Status,last_login) 
VALUES 
('$prueba5', '$pass5','$Remark','$Status','last_login');" ); 

    	  /* check for errors */
    	  if (!odbc_execute( $stmt))
        	  {
       	   /* error  */
       	   echo "Whoops";
        	  }
/* close connection */
odbc_close($conn);

?>