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
		<div class="col-md-12">

<!--********** Formulario **********-->
			<section id="formulario">

<!-- Encabezado -->
				<h2 class="col-md-8 col-md-offset-2">Por favor <strong>Escribe tus datos correctos</strong> </h2>

				<div class="clearfix"></div>

				<?php
			        $rfc=$_SESSION['rfc'];
			        $empresa=$_SESSION['emp'];

					require_once("conexion.php");
					require_once("consulta.php");

				    $result = ibase_query($conectar, $sent) or die(ibase_errmsg());
				    $qypais = ibase_query($conectar, 'select clave from pais order by 1');
				    $qyestado=ibase_query($conectar, 'select estado as clave from estado order by 1');
					while($row2=ibase_fetch_object($result)){
					
					$nom 	= utf8_encode($row2->NOMBRE);
					$calle 	= utf8_encode($row2->CALLE);
					$col 	= utf8_encode($row2->COLONIA);
					$pob 	= utf8_encode($row2->POBLACION);
					$mun 	= utf8_encode($row2->MUNICIPIO);
					$edo 	= utf8_encode($row2->ESTADO);
					$cp		= utf8_encode($row2->CODIGOPOSTAL);
					$tel 	= utf8_encode($row2->TELEFONOS);
					$em 	= utf8_encode($row2->EMAIL);
					$pais 	= utf8_encode($row2->PAIS);
					
					}
					
				?>			

<!-- Formulario -->
				<form action="editar_facturacion.php" method="post">

<!-- Columna izquierda -->
					<div class="col-md-5">

						<label class="col-md-5"><span>*</span>RFC</label>
						<input class="col-md-7" type="text" name="nombre" value="<?php echo $rfc; ?>" required disabled>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Nombre</label>
						<input class="col-md-7" type="text" name="nombre" value="<?php echo $nom; ?>" required>
						<br class="clearfix">

						<label class="col-md-5">Teléfono</label>
						<input class="col-md-7" type="text" name="telefono" value="<?php echo $tel; ?>" required>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Calle</label>
						<input class="col-md-7" type="text" name="calle" value="<?php echo $calle; ?>" required>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Colonia</label>
						<input class="col-md-7" type="text" name="colonia" value="<?php echo $col; ?>" required>
						<br class="clearfix">

						<label class="col-md-5">Localidad</label>
						<input class="col-md-7" type="text" name="localidad" value="<?php echo $pob; ?>" required>
						<br class="clearfix">
					</div>

<!-- Columna derecha -->
					<div class="col-md-5">

						<label class="col-md-5 delegacion"><span>*</span>Delegaci&oacute;n / Municipio</label>
						<input class="col-md-7" type="text" name="delmun" value="<?php echo $mun; ?>" required>
						<br class="clearfix">

						<label class="col-md-5">Estado</label>
						<select class="col-md-7" type="text" name="estado" value="<?php echo $edo; ?>" required>
							<?php
						 		while($rowp=ibase_fetch_object($qyestado))
						  		{
						  			$edos = utf8_encode($rowp->CLAVE);
						  			if($edo==$edos)
						  	  			{$option=" selected";}
						  			else
						  	  			{$option="";}
						  	  		echo "<option".$option.">".$edos."</option>\n";
								}
							?>
						</select>
						<br class="clearfix">

						<label class="col-md-5">País</label>
						<select class="col-md-7" type="text" name="pais" value="<?php echo $pais; ?>" required>
							<?php
						 		while($rowpa=ibase_fetch_object($qypais))
						  		{
						  			$paiss = utf8_encode($rowpa->CLAVE);
						  			if($pais==$paiss)
						  	  			{$option=" selected";}
						  			else
						  	  			{$option="";}
						  	  		echo "<option".$option.">".$paiss."</option>\n";
								}
							?>
						</select>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>C&oacute;digo Posta</label>
						<input class="col-md-7" type="text" name="cp" value="<?php echo $cp; ?>" required>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Email</label>
						<input class="col-md-7" type="text" name="em" value="<?php echo $em; ?>" required>
						<br class="clearfix">
					</div>

					<br class="clearfix">

<!-- Botón -->
					<div class="col-md-12">
						<p class="aviso">*Estos campos son obligatorios</p>
						<input class="boton azul siguiente" type="submit" value="Aceptar">
					</div>	

				</form>

			</section>
		</div>
	</div>
</div>
</body>
</html>
