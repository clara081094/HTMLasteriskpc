<?php

$myFile="/etc/network/interfaces";
$myfile2="/etc/network/interfaces";
$fh = fopen($myFile,'r+');
$buscar="iface eth0 inet static";
$texto="";

$ip=$_POST['ip'];
$masc=$_POST['mascara'];
$gate=$_POST['gateway'];
if(($ip!=null)&&($masc!=null)&&($gate!=null)){

while(!feof($fh)) {
	$lines = fgets($fh);
	//echo "1.".substr($lines,0,-1)."\n\n\n";
	$texto.= $lines;
        if (strcmp(substr((string)$lines,0,-1),$buscar)==0) {
	    $lines = fgets($fh);
	    $texto.= "address ".$ip."\n";
	    $lines = fgets($fh);
	    $texto.= "netmask ".$masc."\n";
            $lines = fgets($fh);
	    $texto.= "gateway ".$gate."\n";
        }
}


fclose($fh);

$myfile = fopen($myfile2, "w");
fwrite($myfile, $texto);
fclose($myfile);
$msm="Reinicie la maquina para aplicar la nueva configuracion";
}
header('Location: '."../ip?msm=".$msm);

?>
