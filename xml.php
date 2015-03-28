<?php
    session_start();
    require_once("conexion.php");

     $idnueva=$_SESSION['pdfView'];

     $sentXMLopen = "select XML,CFDI_UUID from FACTURAS_CFD where ID = '$idnueva' ";
	$resultXMLopen = ibase_query($conectar,$sentXMLopen) or die (ibase_errmsg()); 
        $dataXMLopen = ibase_fetch_object($resultXMLopen);
        $openXML = $dataXMLopen->XML;
        $name = $dataXMLopen->CFDI_UUID;
            
 if($openXML){
     header("Content-type: text/xml; charset=UTF-8"); 
     header("Content-Disposition: attachment; filename=".$name.".xml");
     ibase_blob_echo($openXML);
     }
?>

