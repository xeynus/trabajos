<?php
session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<title>Portal de facturación ABC</title>

<?php include 'head.php';?>

</head>
<body>

<?php include 'header.php';?>

<?php

require_once("conexion.php");
	
	$status="Alta";
	$cliente="S";

	$rfc=$_SESSION['rfc'];
    $empresa=$_SESSION['emp'];
    $clave=$_SESSION['clave'];
        
    $nombre		=utf8_decode($_POST[nombre]);
    $calle		=utf8_decode($_POST[calle]); 
    $colonia	=utf8_decode($_POST[colonia]); 
    $localidad	=utf8_decode($_POST[localidad]); 
    $delmun		=utf8_decode($_POST[delmun]);
    $estado		=utf8_decode($_POST[estado]); 
    $cp			=utf8_decode($_POST[cp]); 
    $telefono	=utf8_decode($_POST[telefono]); 
    $em			=utf8_decode($_POST[em]); 
    $pais		=utf8_decode($_POST[pais]);


	$query="UPDATE OR INSERT INTO CONTACTOS (CLAVE, EMPRESA, NOMBRE, RFC, CALLE, COLONIA, POBLACION, MUNICIPIO, ESTADO, CODIGOPOSTAL, TELEFONOS, EMAIL, PAIS, ESTATUS, CLIENTE)
	VALUES (
    '$clave', 
    '$empresa', 
    '$nombre', 
    '$rfc', 
    '$calle', 
    '$colonia', 
    '$localidad', 
    '$delmun', 
    '$estado', 
    '$cp', 
    '$telefono', 
    '$em', 
    '$pais',
    '$status',
    '$cliente');";
    
	$result=ibase_query($transaction,$query);
	if (!$result) {
		ibase_rollback($transaction);
		echo "Error. Can't insert the record with the query:  $query!";
		exit;
		}
	else {
		ibase_commit($transaction);
		//echo "Tus datos han sido actualizados";
		//regresar automaticamente a la forma de validar datos
		echo "<script language='javascript'>window.location='validar_datos_principal.php'</script>";
		}
/*
<form action="validar_datos_principal.php" method="POST">
	<input type="submit" name="conf" value="Confirmar"> 
	</form>*/
?>


	
</body>
</html>
