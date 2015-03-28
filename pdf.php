<?php
    session_start();
    require_once("conexion.php");

     $idnueva=$_SESSION['pdfView'];

     $sentPDFopen = "select PDF,CFDI_UUID from FACTURAS_CFD where ID = '$idnueva' ";
	$resultPDFopen = ibase_query($conectar,$sentPDFopen) or die (ibase_errmsg()); 
        $dataPDFopen = ibase_fetch_object($resultPDFopen);
        $open = $dataPDFopen->PDF;
        $name = $dataPDFopen->CFDI_UUID;
            

 if($open){
    header("Content-type: application/pdf ");
    header("Content-Disposition: inline; filename=".$name.".pdf"); 
    ibase_blob_echo($open); 
    }


?>

