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
	<h1>Bienvenido al <br><strong>Sistema de Facturación Electrónica de ABC</strong></h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

<!--********** Formulario **********-->
			<section id="formulario" class="registro">
				<?php
					echo '<p class="center">Favor de verificar que sus boletos sean de la misma empresa</p>';
					?>
				        <form action="portal_facturacion_principal.php" method="POST">
					<input class="boton azul regresar" type="submit" name="regresar" value="Regresar"> 
					</form>
			</section>
		</div>
	</div>
</div>

</body>
</html>
