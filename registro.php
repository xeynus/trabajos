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

    $qypais  =ibase_query($conectar, 'select clave from pais order by 1');
    $qyestado=ibase_query($conectar, 'select estado as clave from estado order by 1');
		
?>

<!--*********************
CONTENIDO
*********************-->  
<!-- Título -->
<div class="titulo-principal">
	<h1>Registro de datos <strong>de facturación</strong></h1>
	<h3>Usuario no registrado</h3>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">

<!--********** Formulario **********-->
			<section id="formulario" class="registro">
				
<!-- Encabezado -->
				<h2 class="col-md-6 col-md-offset-3">Favor de ingresar <br><strong>los siguientes datos</strong></h2>

				<br class="clearfix">

<!-- Formulario -->
				<form action="registro_facturacion.php" method="post" >

<!-- Columna izquierda -->
					<div class="col-md-5">
						<label class="col-md-5"><span>*</span>RFC</label>
						<input class="col-md-7"type="text" name="rfc1" value="<?php echo $_SESSION['rfc']; ?>" disabled>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Nombre</label>
						<input class="col-md-7" type="text" name="nombre" required>
						<br class="clearfix">

						<label class="col-md-5">Teléfono</label>
						<input class="col-md-7" type="text" name="telefono">
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Calle</label>
						<input class="col-md-7" type="text" name="calle" required>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Colonia</label>
						<input class="col-md-7" type="text" name="colonia" required>
						<br class="clearfix">

						<label class="col-md-5">Localidad</label>
						<input class="col-md-7" type="text" name="localidad">
						<br class="clearfix">
					</div>

<!-- Columna derecha -->
					<div class="col-md-5">

						<label class="col-md-5 delegacion"><span>*</span>Delegaci&oacute;n / Municipio</label>
						<input class="col-md-7" type="text" name="delmun" required>
						<br class="clearfix">

						<label class="col-md-5">Estado</label>
						<select class="col-md-7" type="text" name="estado" value="<?php echo $edo; ?>" required>
							<?php
								require_once("conexion.php");

							    $qypais  =ibase_query($conectar, 'select clave from pais order by 1');
							    $qyestado=ibase_query($conectar, 'select estado as clave from estado order by 1');
							    
							    while($rowp=ibase_fetch_object($qyestado))
						  		{
						  			$edos = utf8_encode($rowp->CLAVE);
						  			if($edos=="BAJA CALIFORNIA")
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
						  			if($paiss=="MEXICO")
						  	  			{$option=" selected";}
						  			else
						  	  			{$option="";}
						  	  		echo "<option".$option.">".$paiss."</option>\n";
								}
							?>
						</select>
						<br class="clearfix">
						
						<label class="col-md-5">Código Postal</label>
						<input class="col-md-7" type="text" name="cp" required>
						<br class="clearfix">

						<label class="col-md-5"><span>*</span>Email</label>
						<input class="col-md-7" type="text" name="em" required>
						<br class="clearfix">
					</div>

					<br class="clearfix">

<!-- Botón -->
					<div class="col-md-12">
						<p class="aviso">*Estos campos son obligatorios</p>
						<input class="boton azul siguiente" type="submit" value="Enviar Datos">
					</div>	

					<div class="clearfix"></div>	
				
				</form>
			</section>

		</div>
	</div>

</div>
</body>
</html>
