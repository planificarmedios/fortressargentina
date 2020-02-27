<?php
//$server='localhost';$username='medinilla';$password='LFln785@';$database='calendar';
$server='127.0.0.1';$username='root';$password='monitoreo';$database='fortress'; //conexion real no borrar!!

try{$bdd = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', 'monitoreo');}catch(Exception $e){
        die('Error : '.$e->getMessage());}
$mysqli = new mysqli($server, $username, $password, $database);


/*

if ($mysqli->connect_error) {die('error'.$mysqli->connect_error);}
$dsn = "odbcLeaF"; 
$usuario = "medinilla";
$clave="Medinilla785";
$cid=odbc_connect($dsn, $usuario, $clave);
		
	if (!$cid){
    exit("<strong>Ya ocurrido un error tratando de conectarse con el origen de datos.</strong>");
    }
*/		
    //$sql="Select USERID,name from USERINFO";
    // generamos la tabla mediante odbc_result_all(); utilizando borde 1
    //$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
    //print odbc_result_all($result,"border=1");

?>
