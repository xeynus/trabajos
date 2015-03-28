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

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<script>
	jQuery(document).ready(function($) {
	});

		// $('#validacion-facturas').load(function() {
		// 	 Act on the event 
		// 	$('.cargando').hide();
		// });



</script>

</head>
<body>

<?php include 'header.php';?>

<!--*********************
CONTENIDO
*********************-->
<!-- Título -->
<div class="titulo-principal">
	<h1>Sistema de Facturación Electrónica<strong> de ABC</strong></h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

<!--********** Formulario **********-->
			<section id="formulario">
				<div id="cargando">
					<p>Su factura se esta generando, por favor espere unos minutos.</p>
				</div>

				<div id="validacion-facturas" onload="ocultar()">
					<img src="proof.jpg" alt="">
					<?php

						require_once("conexion.php");

					        $rfc=$_SESSION['rfc'];
					        $empresa=$_SESSION['emp'];
					        $clave=$_SESSION['clave'];
					        $email=$_SESSION['mail'];
					        $tck1=$_SESSION['ticket1'];
					        $tck2=$_SESSION['ticket2'];
					        $tck3=$_SESSION['ticket3'];
					        $tck4=$_SESSION['ticket4'];
					        $tck5=$_SESSION['ticket5'];
						//Buscar ID Boleto para extraer PDF

					    $proced = "execute procedure PRCVFACTURARBOLETOS('$clave','$empresa','$tck1','$tck2','$tck3','$tck4','$tck5')";
					    $resulP = ibase_query($transaction,$proced);
					    if($resulP)
					    {
						   ibase_commit($transaction);
					       while( $rowP = ibase_fetch_object($resulP))
					             {
						      		$idnueva = $rowP->IDNUEVA;
					             }
					                $_SESSION['pdfView']=$idnueva;
					         
							sleep(10); //esperar que se timbre la factura
					    	$sentXML = "select PDF,XML,CFDI_UUID from FACTURAS_CFD where ID = '$idnueva' ";

								//obtener los tres campos en un mismo query
						    $result 		= ibase_query($conectar,$sentXML) or die (ibase_errmsg()); 
					        $data			= ibase_fetch_object($result);

					        	//obtener el valor del campo UUID
					        $UUID			= $data->CFDI_UUID;
					            
					            //obtener los datos del blob del campo "XML"
					        $blob_hndlXML 	= ibase_blob_open($data->XML);
					        $blob_dataXML 	= ibase_blob_info($data->XML);
					        $XML 			= ibase_blob_get($blob_hndlXML, $blob_dataXML[0]);

					            //obtener los datos del blob del campo "PDF"
					        $blob_hndlPDF 	= ibase_blob_open($data->PDF);
					        $blob_dataPDF 	= ibase_blob_info($data->PDF);
					        $PDF 			= ibase_blob_get($blob_hndlPDF, $blob_dataPDF[0]);
								//cerrar los blob
					        ibase_blob_close($blob_hndlXML);
					        ibase_blob_close($blob_hndlPDF);
					        
								//convertir los datos a base64
							$XML64=chunk_split(base64_encode($XML));
							$PDF64=chunk_split(base64_encode($PDF));
							
							//definir variables
							$eol= "\n";
							$mime_boundary=md5(time());

							$dest = $email;
							$asunto = "Factura electronica ABC";
							$email = "facturaonline@abc.com.mx";
							$nombre = "Facturacion ABC";

							$headers = 'From: Facturacion ABC <facturaonline@abc.com.mx>'.$eol;
							$headers .= "X-Mailer: PHP v".phpversion().$eol;
							$headers .= 'MIME-Version: 1.0' .$eol;
							$headers .= "Content-type: multipart/mixed; boundary=".$mime_boundary."".$eol;

							//mensaje para el usuario
							$msg = "--".$mime_boundary.$eol.$eol;
							$msg .= "El comprobante electronico que fue generado en nuestra plataforma, se encuentra disponible para su descarga en el presente correo en sus formatos XML y PDF.".$eol.$eol;
							$msg .= "Este comprobante ha sido enviado de forma automatica desde www.abc.com.mx y NO debe responder este mensaje".$eol.$eol;
							$msg .= "En caso de requerir alguna aclaracion favor de contactar a su emisor al correo electronico facturacion@abc.com.mx".$eol.$eol;

							//anexar pdf
							$msg .= "--".$mime_boundary.$eol;
							$msg .="Content-Type: application/pdf; name=\"".$UUID.".pdf\"".$eol;
							$msg .= "Content-Disposition: attachment; filename=\"".$UUID.".pdf\"".$eol;
							$msg .="Content-Transfer-Encoding: base64".$eol.$eol;
							$msg .= $PDF64;

							//anexar xml
							$msg .= "--".$mime_boundary.$eol;
							$msg .="Content-Type: text/xml; charset=UTF-8; name=\"".$UUID.".xml\"".$eol;
							$msg .="Content-Disposition: attachment; filename=\"".$UUID.".xml\"".$eol;
							$msg .="Content-Transfer-Encoding: base64".$eol.$eol;
							$msg .= $XML64;
							$msg .= "--".$mime_boundary."--".$eol.$eol;
							
							//enviar el mensaje
							ini_set(sendmail_from,"$email");
					                $ok =mail($dest,$asunto,$msg,$headers);
							if($ok)
			                	{
				                    echo "<script language='javascript'>window.location='send.php'</script>";
				                  
					           } else   
				                    {
				                     echo "<b><p>No se ha podido generar su CFDI, favor de intentar mas tarde</b></p>";
				                     echo "<form action='portal_facturacion_principal.php' method='POST'>";
				                     echo "<input class='boton azul regresar' type='submit' name='regresar' value='Regresar'> ";
				                     echo "</form>";
				                    } 
							ini_restore(sendmail_from);  
					 
					  
								} 
								else   
							    	{
					                    echo $resulP=ibase_errmsg();
						   				ibase_rollback($transaction);
					                    echo "<b><p>No se han podido facturar sus boletos, favor de revisar sus datos</b></p>";
					                    echo "<form action='portal_facturacion_principal.php' method='POST'>";
					                    echo "<input class='boton azul regresar' type='submit' name='regresar' value='Regresar'> ";
					                    echo "</form>";
					        }
					?>
				</div>
			</section>
		</div>
	</div>
</div>
</body>
</html>

