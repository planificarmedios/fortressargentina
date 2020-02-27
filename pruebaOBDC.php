<html>
<body>
<?php
  
$conn=odbc_connect("odbcLeaF","medinilla","Medinilla785");

if (!$conn) {exit("Connection Failed: " . $conn);}
$sql="SELECT USERID,name FROM USERINFO";
$rs=odbc_exec($conn,$sql);
if (!$rs)
  {exit("Error in SQL");}
echo "<table><tr>";
echo "<th>Nombre</th>";
echo "<th>Apellido</th>";

while (odbc_fetch_row($rs)){
	$nombre=odbc_result($rs,"USERID");
	$apellido=odbc_result($rs,"name");
  
  echo "<tr><td>$nombre</td>";
  echo "<td>$apellido</td>";
}
odbc_close($conn);
echo "</table>";
?>
</body>
</html>