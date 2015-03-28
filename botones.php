<?php
     session_start();
?>

<!DOCTYPE HTML><!DOCTYPE html>
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
	<h1>Sisterma de <br><strong>Facturación ABC</strong></h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

<!--********** Formulario **********-->
			<section id="formulario">

<!-- Encabezado -->
				<h2 class="col-md-8 col-md-offset-2">Selecciona <strong>una accion</strong> </h2>

				<div class="clearfix"></div>

<!-- Botones -->
				<form class="clearfix" action="accionbotones.php" method="POST">
					<div class="col-md-4 col-md-offset-2">
						<input class="boton azul" type="submit" name="pdf" value="Mostrar PDF">
					</div>
					 
					<div class="col-md-4">
						<input class="boton azul" type="submit" name="xml" value="Descargar XML">
					</div>
					
				</form>
			</section>
		</div>
	</div>
</div>

	
</body>
</html>
