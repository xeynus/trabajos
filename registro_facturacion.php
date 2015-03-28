<?php

session_start();
require_once("conexion.php");
	

	$status="Alta";
	$cliente="S";
	
	                    $rfc=$_SESSION['rfc'];
	                    $empresa=$_SESSION['emp'];

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
    '$rfc', 
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
	 	echo "Error. Can't insert the record with the query: $query!";
            echo "<p class='aviso'>No se ha podido registrar, favor de revisar de nuevo sus datos.</p>" ;
            echo "<form action='portal_facturacion_principal.php' method='POST'>";
            echo "<input class='boton azul regresar' type='submit' name='regresar' value='Regresar'> ";
            echo "</form>";        
	}
	else {
		ibase_commit($transaction);
		//regresar automaticamente a la forma de validar datos
		echo "<script language='javascript'>window.location='validar_datos_principal.php'</script>";
	}
	
	
?>

