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

<!--*********************
CONTENIDO
*********************-->
<!-- Título -->
<div class="titulo-principal">
     <h1>Confirmación <br><strong>de envío</strong></h1>
</div>

<div class="container">
     <div class="row">
          <div class="col-md-8 col-md-offset-2">
               <section id="formulario">
                    <?php     
                    	session_start();              

                         $idnueva=$_SESSION['pdfView']; 

                         echo '<h2 class="col-md-8 col-md-offset-2">Se ha enviado a su correo el <strong>CFDI</strong> exitosamente</h2><br class="clearfix">';
                         echo " <h4>¿Que desea hacer?</h4>";
// Formulario
                         echo '<form class="col-md-4" action="accionbotones.php" method="POST" target="_blank">';
                         echo '<input class="boton azul"  type="submit" name="PDFopen" value="Visualizar PDF"> ';
                         echo "</form>";

                         echo '<form class="col-md-4" action="accionbotones.php" method="POST" target="_blank">';
                         echo '<input class="boton magenta"  type="submit" name="PrintXML" value="Descargar XML"> ';
                         echo "</form>";

                         echo '<form class="col-md-4" action="portal_facturacion_principal.php" method="POST">';
                         echo '<input class="boton cielo" type="submit" name="exit" value="Terminado"> ';
                         echo '</form><br class="clearfix">';

                         echo '<br><p class="center col-md-12">Gracias por su preferencia</p> <div class="clearfix"></div>';
                    ?>
               </section>
          </div>
     </div>
</div>
</body>
</html>