<?php

//$user=$_POST['usuario'];
$user="";
$archivo="";
$pass="";
//$npass="angel";

if(isset($_POST["btngra"]))
{
	$user="grabador";
	$archivo=".htgrabador";
	$pass=$_POST["passw_gra"];
}
if(isset($_POST["btnope"]))
{
	$user="operador";
	$archivo=".htoperador";
	$pass=$_POST["passw_ope"];
}

if(isset($_POST["btnadm"]))
{
        $user="administrador";
	$archivo="special/.htpasswd";
	$pass=$_POST["passw_adm"];
}

echo shell_exec("htpasswd -b /etc/apache2/".$archivo." ".$user." ".$pass);
$msm="El password se modifico";
header('Location: '."../seguridad?msm=".$msm);

?>
