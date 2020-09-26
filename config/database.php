<?php
///conexion mysql
//$server   = "127.0.0.1";$username = "root";$password = "monitoreo";$database = "fortress";

$server= '127.0.0.1';$username='root';$password='monitoreo';$database='fortress'; //conexion real
$mysqli = new mysqli($server, $username, $password, $database);
if ($mysqli->connect_error) {die('error'.$mysqli->connect_error);} 

//$conn=odbc_connect("odbcLeaF","medinilla","Medinilla785"); //conexion sqlserver
//if (!$conn) {exit("Connection Failed: " . $conn);}




?>