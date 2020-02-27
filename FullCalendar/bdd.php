<?php
//$server='localhost';$username='medinilla';$password='LFln785@';$database='calendar';
$server='127.0.0.1';$username='root';$password='monitoreo';$database='fortress'; //conexion real para login de usuario

try{$bdd = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', 'monitoreo');}catch(Exception $e){
        die('Error : '.$e->getMessage());}

$mysqli = new mysqli($server, $username, $password, $database);
if ($mysqli->connect_error) {die('error'.$mysqli->connect_error);}
