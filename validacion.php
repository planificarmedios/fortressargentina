<?php
$response = $_POST["g-recaptcha-response"];
 
if(!empty($response))
{
    $secret = "6LdVsrcUAAAAAG2Lz-OZUV3g0Np2Uh04UmcyPKvJ";
    $ip = 'localhost';
    $respuestaValidación = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
 
    //Si queremos visualizar la información obtenida de la petición a la api de validación de Google para comprobar el estado de esta lo haremos con la función de PHP var_dump
    var_dump($respuestaValidación);
 
    $jsonResponde = json_decode($respuestaValidación);
    if($jsonResponde->success)
    {
	header("location:login-check.php");	
    }
    else
    {
    //Google ha detectado que se trata de un proceso no humano
	//header("location:indexcaptcha.php?mensaje=humanCaptcha");
	header("Location: indexcaptcha.php?alert=3");
	exit();
    }
}
else
{
    //si entra aquí significa que no se ha pulsado el Captcha///
    //header("location:indexcaptcha.php?mensaje=errorCaptcha");
	header("Location: indexcaptcha.php?alert=4");
    exit();
}
?>