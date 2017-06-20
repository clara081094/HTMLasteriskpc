<?php
include_once '/var/www/html/funciones.php';
$bd = new Funciones();
$mensaje='';
if(isset($_POST["btnadd"]))
{
  if((!isset($_POST['cont']) || empty($_POST['cont']))&&
     (!isset($_POST['fono']) || empty($_POST['fono']))&&
     (!isset($_POST['ref']) || empty($_POST['ref'])) ){
	$mensaje='REGISTRO INCOMPLETO';
  }else{
     if(!(!isset($_POST['cont']) || empty($_POST['cont']))&&
	!(!isset($_POST['fono']) || empty($_POST['fono']))){
  	//echo "btnadd";
	 if(!($bd->versiNombres($_POST['fono']))){
  	    $bd->ingresarContact($_POST['cont'],$_POST['fono'],$_POST['ref']);
	    $mensaje='SE REGISTRO EL CONTACTO';
	 }else{
	    $mensaje='EL NUMERO TELEFONICO YA EXISTE';
	 }
	}else{
	 $mensaje='REGISTRO INCOMPLETO';
	}
  }
}
else if (isset($_POST["btndel"]))
{
  $bd->deleteContact($_POST['hdi']);
  $mensaje='SE ELIMINO EL CONTACTO';
}
else
{
  if((!isset($_POST['NOMBRE']) || empty($_POST['NOMBRE']))&&
     (!isset($_POST['TELEFONO']) || empty($_POST['TELEFONO']))&&
     (!isset($_POST['REFERENCIA']) || empty($_POST['REFERENCIA'])) ){
        $mensaje='REGISTRO INCOMPLETO';
  }else{
     if(!(!isset($_POST['NOMBRE']) || empty($_POST['NOMBRE']))&&
        !(!isset($_POST['TELEFONO']) || empty($_POST['TELEFONO']))){
        //echo "btnadd";
	if(!($bd->versiNombres($_POST['TELEFONO']))){
            $bd->editarContact($_POST['ID'],$_POST['NOMBRE'],$_POST['TELEFONO'],$_POST['REFERENCIA']);
	    $mensaje='SE EDITO EL CONTACTO'; 
	  }else{
            $mensaje='EL NUMERO TELEFONICO YA EXISTE';
          }
        }else{
         $mensaje='REGISTRO INCOMPLETO';
        }
  }
}
header('Location: '."../phonebook?msm=".$mensaje);
?>
